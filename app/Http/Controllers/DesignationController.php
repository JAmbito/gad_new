<?php

namespace App\Http\Controllers;

use App\Designation;
use App\ManagementType;
use Illuminate\Http\Request;
use Auth;
use App\Http\Controllers\Controller;

class DesignationController extends Controller
{
    protected $func;

    public function __construct()
    {
        $this->func = new Controller();
    }

    public function index()
    {
        $designations = Designation::orderBy('id')->get();
        $management_types = ManagementType::orderBy('id')->get();
        return view('backend.pages.maintenance.designation', compact('designations', 'management_types'));
    }

    public function store(Request $request)
    {
        $designation = $request->validate([
            'designation' => ['required', 'max:250'],
        ]);

        $request->request->add(['created_user' => Auth::user()->id]);

        if ($request->action === "save") {
            Designation::create($request->except(['action', 'id']));
            $this->func->setLog("Designation Added", "Inserted", '"'.$request->designation."\" was added at Designation Record");
        } else {
            Designation::find($request->id)->update($request->except(['action', 'id']));
            $this->func->setLog("Designation Updated", "Update", '"'.$request->designation."\" was updated at Designation Record");
        }

        return response()->json(compact('designation'));
    }

    public function get()
    {
        if (request()->ajax()) {
            return datatables()->of(
                Designation::orderBy('id', 'desc')->with('management_type')->get()
            )
            ->addIndexColumn()
            ->make(true);
        }
    }

    public function edit($id)
    {
        $designation = Designation::where('id', $id)->orderBy('id')->firstOrFail();
        return response()->json(compact('designation'));
    }

    public function destroy($id)
    {
        $destroy = Designation::find($id);
        $destroy->delete();
        $this->func->setLog("Designation Deleted", "Deleted", 'Record id "'.$id."\" was deleted at Designation Record");
        return redirect()->back()->with('success', 'Successfully Deleted!');
    }
}
