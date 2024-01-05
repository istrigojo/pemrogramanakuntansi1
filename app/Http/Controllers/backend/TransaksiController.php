<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Transaksi;
use App\Models\Backend\Servis;
use App\Models\Backend\Akun;
use App\Models\Backend\Kategori;
use App\Models\Backend\Produk;
// use App\Models\Backend\Produk;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transaksi = Transaksi::orderBy('id', 'asc')->paginate(5);
        $servis = Servis::orderBy('id', 'asc')->paginate(5);
        // $mobil = Mobil::orderBy('mobil_id', 'asc')->get();
        return view('backend.v_transaksi.index', [
            'judul' => 'Transaksi',
            'sub' => 'Transaksi',
            'servis' => $servis,
            'transaksi' => $transaksi
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $servis = Servis::orderBy('id', 'asc')->get();
        $akun = Akun::orderBy('id', 'asc')->get();
        $kategori = Kategori::orderBy('id', 'asc')->get();
        $produk = Produk::orderBy('id', 'asc')->get();
        return view('backend.v_customer.create', [
            'judul' => 'Customer',
            'sub' => 'Tambah Customer',
            'servis' => $servis,
            'akun' => $akun,
            // 'kategori,' => $kategori,
            // 'produk,' => $produk
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            // 'nama_customer' => 'required|max:255',
            // 'mobil_id' => 'required',
            // 'email' => 'required|email|unique:customer',
            // 'no_hp' => 'required|min:10|max:14',
            // 'jenis_kelamin' => 'required',
            // 'alamat' => 'required|max:255',
        ]);
        Servis::create($validatedData);
        return redirect('/backend/servis')->with('success', 'Data berhasil tersimpan');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
