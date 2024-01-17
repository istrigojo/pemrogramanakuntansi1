<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Produk;
// use App\Models\Backend\Kategori;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produk = Produk::orderBy('id', 'asc')->paginate(5);
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
        return view('backend.v_produk.create', [
            'judul' => 'Persediaan',
            'sub' => 'Tambah Persediaan',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'nama_produk' => 'required|max:100',
            'detail' => 'required',
            'merk' => 'required',
            'stok' => 'required|max:2',
            'harga' => 'required',
            'tanggal_masuk' => 'required',
            // 'tanggal_keluar' => 'required',
            // 'kategori_id' => 'required',
            // belumbuatstatus
            'img_produk' => 'sometimes|nullable|image|mimes:jpeg,jpg,png,gif|file|max:1024',
        ], $messages = [
            'img_produk.image' => 'Format gambar gunakan file dengan ekstensi jpeg, jpg, png, atau gif.',
            'img_produk.max' => 'Ukuran file gambar Maksimal adalah 1024 KB.'
        ]);
        $produk = new Produk();
        $produk->nama_produk = $validatedData['nama_produk'];
        $produk->detail = $validatedData['detail'];
        $produk->merk = $validatedData['merk'];
        $produk->stok = $validatedData['stok'];
        $produk->harga = $validatedData['harga'];
        $produk->tanggal_masuk = $validatedData['tanggal_masuk'];
        if ($request->hasFile('img_produk')) {
            $image = $request->file('img_produk');
            $imageName = date('YmdHis') . '_' . uniqid() . '.' .
                $image->getClientOriginalExtension();

            // Resize and store the image using Intervention Image
            $resizedImage = Image::make($image)->fit(400, 400, function ($constraint) {
                $constraint->upsize();
            });

            $resizedImage->save(public_path('storage/img-produk' . $imageName));

            $produk->img_produk = 'storage/img-produk/' . $imageName;
        }
        $produk->save();
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
        $produk = Produk::findorFail($id);
        return view('backend.v_produk.edit', [
            'judul' => 'Persediaan',
            'sub' => 'Tambah Persediaan',
            // 'kategori' => $kategori,
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
