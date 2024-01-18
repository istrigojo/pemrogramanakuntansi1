<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Montir;
use App\Models\Backend\Kategori;
use App\Models\Backend\User;
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
        $montir = Montir::orderBy('id', 'asc')->paginate(5);
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
        $user = User::orderBy('id', 'asc')->get();
        $kategori = Kategori::orderBy('id', 'asc')->get();
        return view('backend.v_montir.create', [
            'judul' => 'Montir',
            'sub' => 'Data Montir',
            'user' => $user,
            'kategori' => $kategori
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'user_id' => 'required',
            'tanggal_lahir' => 'required',
            // 'email' => 'required|email|unique:montir',
            // 'no_hp' => 'required|min:9|max:14',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'kategori_id' => 'required|array',
            //     'img_montir' => 'sometimes|nullable|image|mimes:jpeg,jpg,png,gif|file|max:1024',
            // ], $messages = [
            //     'img_montir.image' => 'Format gambar gunakan file dengan ekstensi jpeg, jpg, png, atau gif.',
            //     'img_montir.max' => 'Ukuran file gambar Maksimal adalah 1024 KB.'
        ]);
        $montir = new Montir();
        $montir->nama_montir = $validatedData['user_id'];
        // $montir->email = $validatedData['email'];
        // $montir->no_hp = $validatedData['no_hp'];
        $montir->jenis_kelamin = $validatedData['jenis_kelamin'];
        $montir->alamat = $validatedData['alamat'];
        // if ($request->hasFile('img_montir')) {
        //     $image = $request->file('img_montir');
        //     $imageName = date('YmdHis') . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

        // Resize and store the image using Intervention Image
        // $resizedImage = Image::make($image)->fit(400, 400, function ($constraint) {
        //     $constraint->upsize();
        // });

        // Store the resized image in the public path
        //     $resizedImage->save(public_path('storage/img-montir/' . $imageName));

        //     $montir->img_montir = 'storage/img-montir/' . $imageName;
        // }

        // $montir->save();
        $montir->kategori()->attach($validatedData['kategori_id']);

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

    public function getIdUser($id)
    {
        $user = User::find($id);

        return response()->json([
            'email' => $user->email,
            'no_hp' => $user->no_hp,
        ]);
    }
}
