<?php

namespace App\Http\Controllers;

use App\EmploymentStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmploymentStatusController extends Controller
{
    public function index()
    {
        $employment_statuses = EmploymentStatus::orderBy('id')->get();
        return view('backend.pages.maintenance.employment-status', compact('employment_statuses'));
    }

    public function store(Request $request)
    {
        $employment_status = $request->validate([
            'employment_status' => ['required', 'max:250'],
        ]);

        $request->request->add(['created_user' => Auth::user()->id]);

        if ($request->action === "save") {
            EmploymentStatus::create($request->except(['action', 'id']));
            $this->setLog("Employment Status added", "Inserted", '"'.$request->employment_status."\" was added at Employment Status Record");
        } else {
            EmploymentStatus::find($request->id)->update($request->except(['action', 'id']));
            $this->setLog("Employment Status Updated", "Update", '"'.$request->employment_status."\" was updated at Employment Status Record");
        }

        return response()->json(compact('employment_status'));
    }

    public function get()
    {
        if (request()->ajax()) {
            return datatables()->of(
                EmploymentStatus::orderBy('id', 'desc')->get()
            )
                ->addIndexColumn()
                ->make(true);
        }
    }

    public function edit($id)
    {
        $employment_status = EmploymentStatus::where('id', $id)->orderBy('id')->firstOrFail();
        return response()->json(compact('employment_status'));
    }

    public function destroy($id)
    {
        $destroy = EmploymentStatus::find($id);
        $destroy->delete();
        $this->setLog("Employment Status Deleted", "Deleted", 'Record id "'.$id."\" was deleted at Employment Status Record");
        return redirect()->back()->with('success', 'Successfully Deleted!');
    }
}
