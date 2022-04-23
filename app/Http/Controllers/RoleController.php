<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\PermissionRole;
use App\Models\Role;
use Illuminate\Http\Request;
use yajra\Datatables\Datatables;
use Illuminate\Validation\Rule;

class RoleController extends Controller
{
    public function index()
    {
        $permission = Permission::all();
        return view('user-management.role.index', compact('permission'));
    }

    public function roleGet()
    {
        $role = Role::all();
        return Datatables::of($role)->make();
    }

    public function edit($id)
    {
        $id = Role::find($id);

        $permission_role = PermissionRole::where('role_id', $id->id)->get();
        if (count($permission_role)) {
            foreach ($permission_role as $value) {
                $permission[] = $value->permission_id;
            }
        } else {
            $permission = [];
        }

        return response()->json(['Role' => $id, 'Permission' => $permission]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:255|' . Rule::unique('roles', 'name')->ignore($request->id),
        ]);

        $role = Role::updateOrCreate(
            ['id' => $request->id],
            [
                'name'  => $request->nama,
            ]
        );

        $plucked = collect($request->permissions);
        PermissionRole::where('role_id', $request->id ? $request->id : $role->id)->delete();
        for ($i = 0; $i < $plucked->count(); $i++) {
            PermissionRole::create([
                'role_id' => $request->id ? $request->id : $role->id,
                'permission_id' => $plucked[$i],
            ]);
        }

        return response()->json(['Role saved successfully.']);
    }

    public function destroy($id)
    {
        Role::where('id', $id)->delete();
        return response()->json(['Role Delete']);
    }

    public function manage($id)
    {
        $data = PermissionRole::with('permission')->where('role_id', $id)->get();
        return response()->json(['data' => $data]);
    }
}
