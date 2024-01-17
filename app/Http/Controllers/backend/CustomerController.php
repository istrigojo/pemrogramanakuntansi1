<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Customer;
use App\Models\Backend\Mobil;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customer = Customer::orderBy('id', 'asc')->paginate(5);
        return view('backend.v_customer.index', [
            'judul' => 'Customer',
            'sub' => 'Data Customer',
            'customer' => $customer,
            // 'mobil' => $mobil
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mobil = Mobil::orderBy('id', 'asc')->get();
        return view('backend.v_customer.create', [
            'judul' => 'Customer',
            'sub' => 'Tambah Customer',
            'mobil' => $mobil
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'nama_customer' => 'required|max:255',
            'mobil_id' => 'required',
            'email' => 'required|email|unique:customer',
            'no_hp' => 'required|min:10|max:14',
            'jenis_kelamin' => 'required',
            'alamat' => 'required|max:255',
        ]);
        Customer::create($validatedData);
        return redirect('/backend/customer')->with('success', 'Data berhasil tersimpan');
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
