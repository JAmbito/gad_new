<?php

namespace App\Http\Controllers;

use App\ManagementType;
use Illuminate\Http\Request;
use DataTables;
use Auth;
use App\Http\Controllers\Controller;

class ManagementTypeController extends Controller
{
    protected $func;

    public function __construct()
    {
        $this->func = new Controller();
    }

    public function index()
    {
        $management_types = ManagementType::orderBy('id')->get();
        return view('backend.pages.maintenance.management_type', compact('management_types'));
    }

    public function store(Request $request)
    {
        $management_type = $request->validate([
            'management_type' => ['required', 'max:250'],
        ]);

        $request->request->add(['created_user' => Auth::user()->id]);

        if ($request->action === "save") {
            ManagementType::create($request->except(['action', 'id']));
            $this->func->setLog("Management Type Added", "Inserted", '"'.$request->management_type."\" was added at Management Type Record");
        } else {
            ManagementType::find($request->id)->update($request->except(['action', 'id']));
            $this->func->setLog("Management Type Updated", "Update", '"'.$request->management_type."\" was updated at Management Type Record");
        }

        return response()->json(compact('management_type'));
    }

    public function get()
    {
        if (request()->ajax()) {
            return datatables()->of(
                ManagementType::orderBy('id', 'desc')->get()
            )
            ->addIndexColumn()
            ->make(true);
        }
    }

    public function edit($id)
    {
        $management_type = ManagementType::where('id', $id)->orderBy('id')->firstOrFail();
        return response()->json(compact('management_type'));
    }

    public function destroy($id)
    {
        $destroy = ManagementType::find($id);
        $destroy->delete();
        $this->func->setLog("Management Type Deleted", "Deleted", 'Record id "'.$id."\" was deleted at Management Type Record");
        return redirect()->back()->with('success', 'Successfully Deleted!');
    }
}
