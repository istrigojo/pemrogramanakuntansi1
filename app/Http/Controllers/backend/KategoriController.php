<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Kategori;
use App\Models\Backend\Bagkategori;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bagkategori = Bagkategori::orderBy('id', 'desc')->get();
        $kategori = Kategori::orderBy('id', 'desc')->paginate(5);
        return view('backend.v_kategori.index', [
            'judul' => 'Jenis Servis',
            'sub' => 'Jenis Servis',
            'kategori' => $kategori,
            'bagkategori' => $bagkategori
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $bagkategori = Bagkategori::orderBy('id', 'desc')->get();
        return view('backend.v_kategori.create', [
            'judul' => 'Data Jenis Servis',
            'sub' => 'Tambah Jenis Servis',
            'bagkategori' => $bagkategori
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $validatedData = $request->validate([
            'jenis_servis' => 'required|max:255|unique:kategori',
            'spesialis' => 'required',
            'bagkategori_id' => 'required',
            'biaya_servis' => 'required'
        ]);
        Kategori::create($validatedData);
        return redirect('backend/kategori')->with('success', 'Data berhasil tersimpan');
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
