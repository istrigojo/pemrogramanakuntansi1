@extends('backend.v_layouts.app')
@section('content')

<div class="col-md-12">
    <div class="card">
        <form action="{{ route('produk.update', $edit->id) }}" method="post" class="card">
            @method('put')
            @csrf

            <div class="card-header">
                <h3 class="card-title"> {{$sub}} </h3>
            </div>
            <div class="card-body">
                <div class="mb-3 row">
                    <label class="col-3 col-form-label required">Nama Produk</label>
                    <div class="col">
                        <input name="nama_produk" type="text" class="form-control @error('nama_produk') is-invalid @enderror" placeholder="Masukkan Nama Produk" value="{{ old('nama_produk') }}">
                        <!-- <small class="form-hint">We'll never share your email with anyone else.</small> -->
                    </div>
                    @error('nama_produk')
                    <span class="invalid-feedback alert-danger" role="alert">
                        {{ $message }}
                    </span>
                    @enderror
                    <p></p>
                </div>
                <div class="mb-3 row">
                    <label class="col-3 col-form-label ">Detail</label>
                    <div class="col">
                        <textarea name="detail" id="detail" class="form-control @error('detail') is-invalid @enderror" placeholder="Masukkan detail produk" value="{{ old('detail') }}">
                    </textarea>
                    </div>
                    @error('detail')
                    <span class="invalid-feedback alert-danger" role="alert">
                        {{ $message }}
                    </span>
                    @enderror
                    <p></p>
                </div>

                <div class="mb-3 row">
                    <label class="col-3 col-form-label required">Merk</label>
                    <div class="col">
                        <input name="merk" type="text" class="form-control @error('merk') is-invalid @enderror" placeholder="Masukkan Merek produk" value="{{ old('merk') }}">
                        <!-- <small class="form-hint">We'll never share your email with anyone else.</small> -->
                    </div>
                    @error('merk')
                    <span class="invalid-feedback alert-danger" role="alert">
                        {{ $message }}
                    </span>
                    @enderror
                    <p></p>
                </div>
                <div class="mb-3 row">
                    <label class="col-3 col-form-label required">Stok</label>
                    <div class="col">
                        <input name="stok" type="number" class="form-control @error('stok') is-invalid @enderror" placeholder="Masukkan Nilai Stok Barang" value="{{ old('stok') }}">
                        <!-- <small class="form-hint">We'll never share your email with anyone else.</small> -->
                    </div>
                    @error('stok')
                    <span class="invalid-feedback alert-danger" role="alert">
                        {{ $message }}
                    </span>
                    @enderror
                    <p></p>
                </div>
                <div class="mb-3 row">
                    <label class="col-3 col-form-label required">Harga</label>
                    <div class="col">
                        <input name="harga" type="text" class="form-control @error('harga') is-invalid @enderror" placeholder="Masukkan Harga Barang" value="{{ old('harga') }}">
                        <!-- <small class="form-hint">We'll never share your email with anyone else.</small> -->
                    </div>
                    @error('harga')
                    <span class="invalid-feedback alert-danger" role="alert">
                        {{ $message }}
                    </span>
                    @enderror
                    <p></p>
                </div>
                <div class="mb-3 row">
                    <label class="col-3 col-form-label required">Tanggal Masuk</label>
                    <div class="col">
                        <input name="tanggal_masuk" type="date" class="form-control @error('tanggal_masuk') is-invalid @enderror" placeholder="Masukkan tanggal_masuk Barang" value="{{ old('tanggal_masuk') }}">
                        <!-- <small class="form-hint">We'll never share your email with anyone else.</small> -->
                    </div>
                    @error('tanggal_masuk')
                    <span class="invalid-feedback alert-danger" role="alert">
                        {{ $message }}
                    </span>
                    @enderror
                    <p></p>
                </div>
                <div class="mb-3 row">
                    <label class="col-3 col-form-label required">Tanggal Keluar</label>
                    <div class="col">
                        <input name="tanggal_keluar" type="date" class="form-control @error('tanggal_keluar') is-invalid @enderror" placeholder="Masukkan tanggal_keluar Barang" value="{{ old('tanggal_keluar') }}">
                        <!-- <small class="form-hint">We'll never share your email with anyone else.</small> -->
                    </div>
                    @error('tanggal_keluar')
                    <span class="invalid-feedback alert-danger" role="alert">
                        {{ $message }}
                    </span>
                    @enderror
                    <p></p>
                </div>
                <div class="mb-3 row">
                    <label class="col-3 col-form-label">Jenis Servis</label>
                    <div class="col">
                        <select class="form-control form-select @error('kategori_id') is invalid @enderror" name="kategori_id" id="floatingSelect" aria-label="Floating label select example">
                            <option selected="">Pilih Jenis Servis</option>
                            @foreach ($kategori as $row)
                            <option value="{{ $row->id }}"> {{ $row->id }} </option>
                            @endforeach
                        </select>
                    </div>
                    @error('kategori_id')
                    <span class="invalid-feedback alert-danger" role="alert">
                        {{ $message }}
                    </span>
                    @enderror
                    <p></p>
                    <!-- <label for="floatingSelect">Data produk</label> -->
                </div>
                <p style="font-size: small; text-align: right;">
                    dibuat:
                    {{ $edit->created_at }}<br>
                    pembaharuan:
                    {{ $edit->updated_at }}<br>
                    Autor:
                    <!-- {{ $edit->user->nama }}<br> -->
                <p>
            </div>
            <div class="d-flex justify-content-between">
                <div class="card-footer text-start">
                    <a href="{{ route('produk.index') }}"><button type="button" class="btn btn-ghost-danger active w-17">Kembali</button>
                </div>
                <div class="card-footer text-end">
                    <button type="submit" class="btn btn-primary">Perbaharui</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection