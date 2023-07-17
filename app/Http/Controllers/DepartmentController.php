<?php

namespace App\Http\Controllers;

use App\Department;
use Illuminate\Http\Request;
use Auth;
use App\Http\Controllers\Controller;

class DepartmentController extends Controller
{
    protected $func;

    public function __construct() {
        $this->func = new Controller();
    }
    
    public function index()
    {
        $departments = Department::orderBy('id')->get();
        return view('backend.pages.maintenance.department', compact('departments'));
    }

    public function store(Request $request)
    {
        $department = $request->validate([
            'department' => ['required', 'max:250'],
        ]);

        $request->request->add(['created_user' => Auth::user()->id]);

        if($request->action === "save") {
            Department::create($request->except(['action', 'id']));
            $this->func->setLog("Department added", "Inserted", '"'.$request->department."\" was added at Department Record");
        }
        else {
            Department::find($request->id)->update($request->except(['action', 'id']));
            $this->func->setLog("Department Updated", "Update", '"'.$request->department."\" was updated at Department Record");
        }

        return response()->json(compact('department'));
    }

    public function get() {
        if(request()->ajax()) {
            return datatables()->of(
                Department::orderBy('id', 'desc')->get()
            )
            ->addIndexColumn()
            ->make(true);
        }
    }

    public function edit($id)
    {
        $department = Department::where('id', $id)->orderBy('id')->firstOrFail();
        return response()->json(compact('department'));
    }

    public function destroy($id)
    {
        $destroy = Department::find($id);
        $destroy->delete();
        $this->func->setLog("Department Deleted", "Deleted", 'Record id "'.$id."\" was deleted at Department Record");
        return redirect()->back()->with('success','Successfully Deleted!');
    }
}
