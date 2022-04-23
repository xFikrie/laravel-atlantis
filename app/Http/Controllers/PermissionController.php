<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;
use yajra\Datatables\Datatables;
use Illuminate\Validation\Rule;

class PermissionController extends Controller
{
    public function index()
    {
        return view('user-management.permission.index');
    }

    public function permissionGet()
    {
        $permission = Permission::all();
        return Datatables::of($permission)->make();
    }

    public function edit($id)
    {
        $id = Permission::find($id);
        return response()->json($id);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255|' . Rule::unique('permissions')->ignore($request->id),
        ]);

        if ($request->id) {
            $permission = Permission::find($request->id);
            $permission->title = $request->title;
            $permission->save();
        } else {
            if ($request->crudCheck) {
                $permissionValue = ['_create', '_read', '_update', '_delete'];
                for ($i = 0; $i < count($permissionValue); $i++) {
                    Permission::create([
                        'title' => $request->title . $permissionValue[$i]
                    ]);
                }
            } else {
                Permission::create([
                    'title' => $request->title
                ]);
            }
        }

        return response()->json(['Permission saved successfully.']);
    }

    public function destroy($id)
    {
        Permission::where('id', $id)->delete();
        return response()->json(['Permission Delete']);
    }
}
