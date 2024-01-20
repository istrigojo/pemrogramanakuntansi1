<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Jurnal;
use App\Models\Backend\Transaksi;
use App\Models\Backend\Akun;

class JurnalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jurnal = Jurnal::orderBy('id', 'asc')->paginate(5);
        $transaksi = Transaksi::orderBy('id', 'asc')->get();
        $akun = Akun::orderBy('id', 'asc')->get();
        return view('backend.v_jurnal.index', [
            'judul' => 'Jurnal',
            'sub' => 'Jurnal',
            'jurnal' => $jurnal,
            'transaksi' => $transaksi,
            'akun' => $akun
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jurnal = Jurnal::orderBy('id', 'asc')->paginate(5);
        $transaksi = Transaksi::orderBy('id', 'asc')->get();
        $akun = Akun::orderBy('id', 'asc')->get();
        return view('backend.v_jurnal.create', [
            'judul' => 'Transaksi',
            'sub' => 'Input Jurnal',
            'jurnal' => $jurnal,
            'transaksi' => $transaksi,
            'akun' => $akun
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
        Transaksi::create($validatedData);
        return redirect('/backend/transaksi')->with('success', 'Data berhasil tersimpan');
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
