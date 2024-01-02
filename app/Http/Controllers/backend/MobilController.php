<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Mobil;
use App\Models\Backend\Customer;

class MobilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mobil = Mobil::orderBy('id', 'asc')->paginate(5);
        return view('backend.v_mobil.index', [
            'judul' => 'Mobil',
            'sub' => 'Data Mobil',
            'mobil' => $mobil
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $customer = Customer::orderBy('id', 'asc')->get();
        return view('backend.v_mobil.create', [
            'judul' => 'Mobil',
            'sub' => 'Data Mobil',
            // 'customer' => $customer
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // ddd($request->all());
        $validatedData = $request->validate([
            'no_plat' => 'required|unique:mobil',
            'merk' => 'required',
            'warna' => 'required',
        ]);
        Mobil::create($validatedData);
        return redirect('/backend/mobil')->with('success', 'Data berhasil tersimpan');
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
