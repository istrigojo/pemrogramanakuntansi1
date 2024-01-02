<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Kategories;

class KategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategories = Kategories::orderBy('id', 'desc')->get();
        return view('backend.v_kategories.index', [
            'judul' => 'Kategori Berita',
            'sub' => 'Data Kategori Berita',
            'kategories' => $kategories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.v_kategories.create', [
            'judul' => 'Kategori Berita',
            'sub' => 'Tambah Kategori Berita',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // ddd($request);
        $validatedData = $request->validate([
            'nama_kategori' => 'required|max:255|unique:kategories',
        ]);
        Kategories::create($validatedData);
        return redirect('backend/kategories')->with('success', 'Data berhasil tersimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // $kategories = Kategories::findOrFail($id);
        // return view('backend.v_kategories.edit', [
        //     'judul' => 'Kategories',
        //     'sub' => 'Ubah Kategories',
        //     'edit' => $kategories
        // ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // $kategories = Type::findOrFail($id);
        // $rules = [
        //     'nama_kategories' => 'required|max:255',
        // ];
        // if ($request->nama_type != $type->nama_type) {
        //     $rules['nama_kategories'] = 'required|max:255|unique:type';
        // }

        // $validatedData = $request->validate($rules);
        // Type::where('id', $id)->update($validatedData);
        // return redirect('/type')->with('success', 'Data berhasil diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // $type = Type::findOrFail($id);
        // $type->delete();
        // return redirect('/type');
    }
}
