<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        $role = Role::all();
        return view('user-management.user.index', compact('role'));
    }

    public function userGet()
    {
        $user = User::with('role');
        return Datatables::of($user)->make();
    }

    public function edit($id)
    {
        $id = User::find($id);
        return response()->json($id);
    }

    public function store(Request $request)
    {
        if ($request->id) {
            Validator::make($request->all(), [
                'nama' => 'bail|required|max:255',
                'email' => 'required|max:255',
                'password' => 'required|max:255|confirmed|min:8',
                'password_confirmation' => 'required|max:255|min:8',
                'role_id' => 'required',
            ])->validate();
        } else {
            Validator::make($request->all(), [
                'nama' => 'bail|required|max:255',
                'email' => 'required|max:255',
                'password' => 'required|max:255|confirmed|min:8',
                'password_confirmation' => 'required|max:255|min:8',
                'role_id' => 'required',
            ])->validate();
        }

        User::updateOrCreate(
            ['id' => $request->id],
            [
                'name' => $request->nama,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'role_id' => $request->role_id,
            ]
        );

        return response()->json(['User saved successfully.']);
    }

    public function destroy($id)
    {
        User::where('id', $id)->delete();
        return response()->json(['User Delete']);
    }
}
