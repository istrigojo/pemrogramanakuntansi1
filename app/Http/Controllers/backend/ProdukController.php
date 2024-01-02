<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Produk;
use App\Models\Backend\Kategori;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produk = Produk::orderBy('id', 'asc')->get();
        return view('backend.v_produk.index', [
            'judul' => 'Persediaan',
            'sub' => 'Data Persediaan',
            'produk' => $produk
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = Kategori::orderBy('id', 'asc')->get();
        return view('backend.v_produk.create', [
            'judul' => 'Persediaan',
            'sub' => 'Tambah Persediaan',
            'kategori' => $kategori
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        ddd($request->all());
        $validatedData = $request->validate([
            'nama_produk' => 'required|max:100',
            'detail' => 'required',
            'merk' => 'required',
            'stok' => 'required|max:2',
            'harga' => 'required',
            'tanggal_masuk' => 'required',
            'tanggal_keluar' => 'required',
            'kategori_id' => 'required',
            // belumbuatstatus
            // 'img_produk' => 'image|mimes:jpeg,jpg,png,gif|file|max:1024',
        ]);
        Produk::create($validatedData);
        return redirect('/backend/produk')->with('success', 'Data berhasil tersimpan');
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
        $kategori = Kategori::orderBy('id', 'asc')->get();
        $produk = Produk::findorFail($id);
        return view('backend.v_produk.edit', [
            'judul' => 'Persediaan',
            'sub' => 'Tambah Persediaan',
            'kategori' => $kategori,
            'edit' => $produk

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // $produk = Produk::findOrFail($id);
        // $rules = [
        //         'status' => 'required',
        //         'detail' => 'required',
        //         'merk' => 'required',
        //         'stok' => 'required|max:2',
        //         'harga' => 'required',
        //         'tanggal_masuk' => 'required',
        //         'tanggal_keluar' => 'required',
        //         'kategori_id' => 'required'
        //         // 'img_produk' => 'image|mimes:jpeg,jpg,png,gif|file|max:1024',
        //     ];
        // }
        //     Produk::create($validatedData);
        //     return redirect('/backend/produk')->with('success', 'Data berhasil tersimpan');
        // };
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
