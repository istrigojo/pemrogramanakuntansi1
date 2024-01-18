@extends('backend.v_layouts.app')
@section('content')
    <!-- template -->
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>

    <body>
        <h3> {{ $sub }} </h3>

        <form action="{{ route('produk.store') }}" method="post" encpyt="multipart/form-data">
            @csrf

            <label>Tanggal</label><br>
            <input type="date" name="tanggal" value="{{ old('tanggal') }}"
                class="form-control @error('tanggal') is-invalid @enderror" placeholder="Masukkan tanggal Lengkap">
            @error('tanggal')
                <span class="invalid-feedback alert-danger" role="alert">
                    {{ $message }}
                </span>
            @enderror
            <p></p>

            <label>Nama Produk</label><br>
            <input type="text" name="nama_produk" value="{{ old('nama_produk') }}"
                class="form-control @error('nama_produk') is-invalid @enderror" placeholder="Masukkan nama produk">
            @error('nama_produk')
                <span class="invalid-feedback alert-danger" role="alert">
                    {{ $message }}
                </span>
            @enderror
            <p></p>

            <label>Detail</label><br>
            <input type="text" name="detail" value="{{ old('detail') }}"
                class="form-control @error('detail') is-invalid @enderror" placeholder="Masukkan Detail Produk">
            @error('Detail')
                <span class="invalid-feedback alert-danger" role="alert">
                    {{ $message }}
                </span>
            @enderror
            <p></p>

            <label>Harga</label><br>
            <input type="number" name="harga" value="{{ old('harga') }}"
                class="form-control @error('harga') is-invalid @enderror" placeholder="Masukkan Harga">
            @error('harga')
                <span class="invalid-feedback alert-danger" role="alert">
                    {{ $message }}
                </span>
            @enderror
            <p></p>

            <label>Stok</label><br>
            <input type="number" name="stok" value="{{ old('stok') }}"
                class="form-control @error('stok') is-invalid @enderror" placeholder="Masukkan Nomor Stok">
            @error('stok')
                <span class="invalid-feedback alert-danger" role="alert">
                    {{ $message }}
                </span>
            @enderror
            <p></p>


            <label>Kategori</label>
            <select class="form-control @error('kategori_id') is-invalid @enderror" name="kategori_id">
                <option value="" selected>--Pilih Kategori--</option>
                @foreach ($kategori as $row)
                    <option value="{{ $row->id }}"> {{ $row->kategori_id . '|' . $row->nama_kategori }} </option>
                @endforeach
            </select>
            @error('kategori_id')
                <span class="invalid-feedback alert-danger" role="alert">
                    {{ $message }}
                </span>
            @enderror

            <button type="submit" class="btn btn-primary me-1 mb-1">Simpan</button> <button type="button">Kembali</button>
            </a>
        </form>

    </body>

    </html>
    <!-- template -->
@endsection
