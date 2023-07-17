<?php

namespace App\Http\Controllers;

use App\Administrative_rank;
use Illuminate\Http\Request;
use Auth;
use App\Http\Controllers\Controller;

class AdministrativeRankController extends Controller
{
    
    protected $func;

    public function __construct() {
        $this->func = new Controller();
    }
    
    public function index()
    {
        $administratives = Administrative_rank::orderBy('id')->get();
        return view('backend.pages.maintenance.administrative-rank', compact('administratives'));
    }

    public function store(Request $request)
    {
        $administrative = $request->validate([
            'administrative_rank' => ['required', 'max:250'],
        ]);

        $request->request->add(['created_user' => Auth::user()->id]);

        if($request->action === "save") {
            Administrative_rank::create($request->except(['action', 'id']));
            $this->func->setLog("Administrative Rank added", "Inserted", '"'.$request->administrative_rank."\" was added at Administrative Rank Record");
        }
        else {
            Administrative_rank::find($request->id)->update($request->except(['action', 'id']));
            $this->func->setLog("Administrative Rank Updated", "Update", '"'.$request->administrative_rank."\" was updated at Administrative Rank Record");
        }

        return response()->json(compact('administrative'));
    }

    public function get() {
        if(request()->ajax()) {
            return datatables()->of(
                Administrative_rank::orderBy('id', 'desc')->get()
            )
            ->addIndexColumn()
            ->make(true);
        }
    }

    public function edit($id)
    {
        $administrative = Administrative_rank::where('id', $id)->orderBy('id')->firstOrFail();
        return response()->json(compact('administrative'));
    }

    public function destroy($id)
    {
        $destroy = Administrative_rank::find($id);
        $destroy->delete();
        $this->func->setLog("Administrative Rank Deleted", "Deleted", 'Record id "'.$id."\" was deleted at Administrative Rank Record");
        return redirect()->back()->with('success','Successfully Deleted!');
    }
}
