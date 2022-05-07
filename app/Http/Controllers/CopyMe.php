<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Validator;

class KategoriController extends Controller
{
    public function index()
    {
        return view('master.kategori.index');
    }

    public function kategoriGet()
    {
        $kategori = Kategori::all();
        return Datatables::of($kategori)->make();
    }

    public function edit($id)
    {
        $id = Kategori::find($id);
        return response()->json($id);
    }

    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'nama' => 'bail|required|max:255|unique:kategori,nama',
        ])->validate();

        Kategori::updateOrCreate(
            ['id' => $request->id],
            [
                'nama' => $request->nama,
            ]
        );

        return response()->json(['Kategori saved successfully.']);
    }

    public function destroy($id)
    {
        Kategori::where('id', $id)->delete();
        return response()->json(['Kategori Delete']);
    }
}
