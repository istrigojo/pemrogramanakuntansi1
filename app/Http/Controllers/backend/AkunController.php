<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Akun;
use Illuminate\Support\Facades\DB;

class AkunController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $akun = Akun::orderBy('id', 'asc')->paginate(5);
        return view('backend.v_akun.index', [
            // 'akun' => DB::table('akun')->paginate(5),
            'judul' => 'Akun',
            'sub' => 'Data Akun',
            'akun' => $akun
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.v_akun.create', [
            'judul' => 'Akun',
            'sub' => 'Tambah Akun',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // ddd($request->all());
        $validatedData = $request->validate([
            'kode_akun' => 'required',
            'nama_akun' => 'required',
        ]);
        Akun::create($validatedData);
        return redirect('/backend/akun')->with('success', 'Data berhasil tersimpan');
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
