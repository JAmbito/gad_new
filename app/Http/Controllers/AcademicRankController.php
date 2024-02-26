<?php

namespace App\Http\Controllers;

use App\AcademicRank;
use Illuminate\Http\Request;
use Auth;
use App\Http\Controllers\Controller;

class AcademicRankController extends Controller
{
    protected $func;

    public function __construct()
    {
        $this->func = new Controller();
    }

    public function index()
    {
        $academic_ranks = AcademicRank::orderBy('id')->get();
        return view('backend.pages.maintenance.academic-rank', compact('academic_ranks'));
    }

    public function store(Request $request)
    {
        $academic_rank = $request->validate([
            'academic_rank' => ['required', 'max:250'],
        ]);

        $request->request->add(['created_user' => Auth::user()->id]);

        if ($request->action === "save") {
            AcademicRank::create($request->except(['action', 'id']));
            $this->func->setLog("Academic Rank added", "Inserted", '"'.$request->academic_rank."\" was added at Academic Rank Record");
        } else {
            AcademicRank::find($request->id)->update($request->except(['action', 'id']));
            $this->func->setLog("Academic Rank Updated", "Update", '"'.$request->academic_rank."\" was updated at Academic Rank Record");
        }

        return response()->json(compact('academic_rank'));
    }

    public function get()
    {
        if (request()->ajax()) {
            return datatables()->of(
                AcademicRank::orderBy('id', 'desc')->get()
            )
            ->addIndexColumn()
            ->make(true);
        }
    }

    public function edit($id)
    {
        $academic_rank = AcademicRank::where('id', $id)->orderBy('id')->firstOrFail();
        return response()->json(compact('academic_rank'));
    }

    public function destroy($id)
    {
        $destroy = AcademicRank::find($id);
        $destroy->delete();
        $this->func->setLog("Academic Rank Deleted", "Deleted", 'Record id "'.$id."\" was deleted at Academic Rank Record");
        return redirect()->back()->with('success', 'Successfully Deleted!');
    }
}
