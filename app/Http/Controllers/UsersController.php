<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Campus;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;

class UsersController extends Controller
{
    public function index()
    {
        $campus = Campus::get();
        $roles = Role::all();
        return view('backend.pages.users.user', compact('campus', 'roles'));
    }

    public function store(Request $request)
    {
        $user = $request->validate([
            'name' => ['required', 'max:250'],
            'email' => ['required', 'max:250'],
            'campus_id' => ['required', 'max:250'],
            'role' => ['required', 'max:50'],
        ]);


        if ($request->action === 'save') {
            $request->request->add(['password' => Hash::make('P@ssw0rd')]);
            $userModel = User::create($request->except(['_token', 'id', 'action', 'role']));

            $this->setLog("User Added", "Insert", '"'.$request->name."\" was added at User Account");
        } else {
            $userModel = User::find($request->id);
            $userModel->update($request->except(['_token', 'id', 'action', 'role']));

            $this->setLog("User Updated", "Update", '"'.$request->name."\" was updated at User Account");
        }

        $roleName = $request->get('role');
        $role = Role::findByName($roleName);
        $userModel->syncRoles([$role]);

        return response()->json(compact('user'));
    }

    public function get()
    {
        if (request()->ajax()) {
            return datatables()->of(
                User::with('roles')->orderBy('id', 'desc')->get()
            )
            ->addIndexColumn()
            ->make(true);
        }
    }

    public function edit($id)
    {
        $user = User::where('id', $id)->with('roles')->firstOrFail();
        return response()->json(compact('user'));
    }


    public function destroy($id)
    {
        $destroy = User::find($id);
        $destroy->delete();
        $this->setLog("User Account Deleted", "Deleted", 'Record id "'.$id."\" was deleted at User Account");
        return redirect()->back()->with('success', 'Successfully Deleted!');
    }
}
