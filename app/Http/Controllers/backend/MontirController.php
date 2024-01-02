<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Montir;
use App\Models\Backend\Kategori;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class MontirController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategori = Kategori::orderBy('id', 'asc')->get();
        $montir = Montir::orderBy('id', 'asc')->get();
        return view('backend.v_montir.index', [
            'judul' => 'Montir',
            'sub' => 'Data Montir',
            'montir' => $montir,
            'kategori' => $kategori
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = Kategori::orderBy('id', 'asc')->get();
        return view('backend.v_montir.create', [
            'judul' => 'Montir',
            'sub' => 'Data Montir',
            'kategori' => $kategori
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd($request->all());
        $validatedData = $request->validate([
            'nama_montir' => 'required',
            'email' => 'required|email|unique:montir',
            'no_hp' => 'required|min:9|max:14',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'kategori_id' => 'nullable|array',
            // 'spesialis' => 'required',
            'foto' => 'image|mimes:jpeg,jpg,png,gif|file|max:1024',
        ], $messages = [
            'foto.image' => 'Format gambar gunakan file dengan ekstensi jpeg, jpg, png, atau gif.',
            'foto.max' => 'Ukuran file gambar Maksimal adalah 1024 KB.'
        ]);
        // $selectedCategories = $request->input('kategori_id');
        if ($request->file('foto')) {
            $file = $request->file('foto');
            $extension = $file->getClientOriginalExtension();
            $fileName = date('YmdHis') . '_' . uniqid() . '.' . $extension;
            $destinationPath = public_path('storage/img-user/');
            $image = Image::make($file);
            //resize manual
            $image->fit(400, 400, function ($constraint) {
                $constraint->upsize();
            });
            //resize otomatis    
            // $image->resize(400, null, function ($constraint) {
            //     $constraint->aspectRatio();
            //     $constraint->upsize();
            // });
            $image->save($destinationPath . $fileName);
            $validatedData['foto'] = $fileName;
        }

        Montir::create($validatedData);
        return redirect('/backend/montir')->with('success', 'Data berhasil tersimpan');
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
