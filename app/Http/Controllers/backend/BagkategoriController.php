<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Bagkategori;
use App\Models\Backend\Montir;

class BagkategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bagkategori = Bagkategori::orderBy('id', 'desc')->get();
        return view('backend.v_bagkategori.index', [
            'judul' => 'Golongan Kategori',
            'sub' => 'Data Kategori Servis',
            'bagkategori' => $bagkategori
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //     $montir = Montir::orderBy('id', 'desc')->get();
        return view('backend.v_bagkategori.create', [
            'judul' => 'Golongan Kategori',
            'sub' => 'Tambah Kategori Servis'
            // 'montir' => $montir
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // ddd($request);
        $validatedData = $request->validate([
            'kategori_servis' => 'required|max:255|unique:bagkategori',
            // 'spesialis' => 'required',
        ]);
        Bagkategori::create($validatedData);
        return redirect('backend/bagkategori')->with('success', 'Data berhasil tersimpan');
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
        // $kategori = Kategori::findOrFail($id);
        // return view('backend.v_kategori.edit', [
        //     'judul' => 'Kategori',
        //     'sub' => 'Ubah Kategori',
        //     'edit' => $kategori
        // ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // $kategori = Type::findOrFail($id);
        // $rules = [
        //     'nama_kategori' => 'required|max:255',
        // ];
        // if ($request->nama_type != $type->nama_type) {
        //     $rules['nama_kategori'] = 'required|max:255|unique:type';
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
