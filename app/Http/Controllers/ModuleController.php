<?php

namespace App\Http\Controllers;

use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use yajra\Datatables\Datatables;

class ModuleController extends Controller
{
    public function index()
    {
        $parent = Module::where('parent', 0)->get();
        return view('setting.module.index', compact('parent'));
    }

    public function moduleGet()
    {
        $module = Module::all();
        return Datatables::of($module)->make();
    }

    public function edit($id)
    {
        $id = Module::find($id);
        return response()->json($id);
    }

    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'module'    => 'bail|required|max:255',
            'icon'  => 'required|max:255',
            'url'   => 'required|max:255',
            'urutan'    => 'required|numeric',
            'parent'    => 'required|numeric',
        ])->validate();

        Module::updateOrCreate(
            ['id' => $request->id],
            [
                'module'    => $request->module,
                'icon'  => $request->icon,
                'url'   => $request->url,
                'urutan'    => $request->urutan,
                'parent'    => $request->parent,
            ]
        );

        return response()->json(['Module saved successfully.']);
    }

    public function destroy($id)
    {
        Module::where('id', $id)->delete();
        return response()->json(['Module Delete']);
    }
}
