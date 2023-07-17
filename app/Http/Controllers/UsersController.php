<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Campus;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    protected $func;

    public function __construct() {
        $this->func = new Controller();
    }

    public function index() {
        $campus = Campus::get();
        return view('backend.pages.users.user', compact('campus'));
    }

    public function store(Request $request) {
        
        $user = $request->validate([
            'name' => ['required', 'max:250'],
            'email' => ['required', 'max:250'],
            'campus_id' => ['required', 'max:250'],
        ]);


        if($request->action === 'save') {
            $request->request->add(['password' => Hash::make('password')]);
            User::create($request->except(['_token', 'id', 'action']));
            
            $this->func->setLog("User Added", "Insert", '"'.$request->name."\" was added at User Account");
        }
        else {
            User::find($request->id)->update($request->except(['_token', 'id', 'action']));

            $this->func->setLog("User Updated", "Update", '"'.$request->name."\" was updated at User Account");
        }

        return response()->json(compact('user'));
    }
    
    public function get() {
        if(request()->ajax()) {
            return datatables()->of(
                User::orderBy('id', 'desc')->get()
            )
            ->addIndexColumn()
            ->make(true);
        }
    }

    public function edit($id)
    {
        $user = User::where('id', $id)->firstOrFail();
        return response()->json(compact('user'));
    }

    
    public function destroy($id)
    {
        $destroy = User::find($id);
        $destroy->delete();
        $this->func->setLog("User Account Deleted", "Deleted", 'Record id "'.$id."\" was deleted at User Account");
        return redirect()->back()->with('success','Successfully Deleted!');
    }
}
