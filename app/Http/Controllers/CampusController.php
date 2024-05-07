<?php

namespace App\Http\Controllers;

use App\Campus;
use Illuminate\Http\Request;
use Yajra\Address\Entities\Province;
use Yajra\Address\Entities\City;
use Yajra\Address\Entities\Barangay;
use Auth;
use App\Http\Controllers\Controller;

class CampusController extends Controller
{
    protected $func;

    public function __construct()
    {
        $this->func = new Controller();
    }

    public function index()
    {
        $campuses = Campus::orderBy('id')->get();
        $provinces = Province::get();
        return view('backend.pages.maintenance.campus', compact('campuses', 'provinces'));
    }

    public function store(Request $request)
    {
        $campus = $request->validate([
            'campus_name' => ['required', 'max:250'],
            'detailed_address' => ['required', 'max:250'],
            'province' => ['required', 'max:250'],
            'city' => ['required', 'max:250'],
            'barangay' => ['required', 'max:250'],
            'zip_code' => ['required', 'max:250'],
            'email' => ['required', 'max:250'],
            'tel_no' => ['required', 'max:250'],
            'mobile_no' => ['required', 'max:250'],
        ]);

        $request->request->add(['created_user' => Auth::user()->id]);

        $requestData = $request->except(['_token', 'action', 'id']);
        $file = $request->image->getClientOriginalName();
        $filename = pathinfo($file, PATHINFO_FILENAME);

        $imageName = $filename.time().'.'.$request->image->extension();
        $image = $request->image->move(public_path('files/campus'), $imageName);

        $requestData = $request->all();
        $requestData['image'] = $imageName;

        if ($request->action === "save") {
            Campus::create($requestData);
            $this->func->setLog("Campus Added", "Inserted", '"'.$request->campus_name."\" was added at Campus Record");
        } else {
            Campus::find($request->id)->update($requestData);
            $this->func->setLog("Campus Updated", "Update", '"'.$request->campus_name."\" was updated at Campus Record");
        }

        return response()->json(compact('campus'));
    }

    public function get()
    {
        if (request()->ajax()) {
            return datatables()->of(
                Campus::orderBy('id', 'desc')->get()
            )
            ->addIndexColumn()
            ->make(true);
        }
    }

    public function edit($id)
    {
        $campus = Campus::where('id', $id)->orderBy('id')->firstOrFail();
        return response()->json(compact('campus'));
    }

    public function city($id)
    {
        $cities = City::where('province_id', $id)->get();
        return response()->json(compact('cities'));
    }

    public function barangay($id)
    {
        $barangays = Barangay::where('city_id', $id)->get();
        return response()->json(compact('barangays'));
    }

    public function destroy($id)
    {
        $destroy = Campus::find($id);
        $destroy->delete();
        $this->func->setLog("Campus Deleted", "Inserted", 'Record id "'.$id."\" was deleted at Campus Record");
        return redirect()->back()->with('success', 'Successfully Deleted!');
    }
}
