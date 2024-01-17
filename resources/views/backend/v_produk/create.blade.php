@extends('backend.v_layouts.app')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <form action="{{ route('produk.store') }}" method="post" class="card">
                @csrf

                <div class="card-header">
                    <h3 class="card-title"> {{ $sub }} </h3>
                </div>
                <div class="card-body">
                    <div class="mb-3 row">
                        <label class="col-2 col-form-label">Foto Produk</label>
                        <div class="col">
                            <style>
                                .img-produk-preview {
                                    max-width: 200px;
                                    /* Lebar maksimum 100% dari container */
                                    height: auto;
                                    /* Tinggi disesuaikan untuk menjaga rasio aspek gambar */
                                    border: 1px solid #ddd;
                                    /* Tambahkan border untuk efek visual */
                                    margin-top: 10px;
                                    /* Atur margin atas sesuai kebutuhan Anda */
                                }
                            </style>
                            <img class="img-produk-preview">
                            <input type="file" name="img_produk"
                                class="form-cont rol @error('img_produk') is-invalid @enderror value="{{ old('img_produk') }}""
                                onchange="previewImgProduk()">
                        </div>
                        @error('img_produk')
                            <div class="invalid-feedback alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3 row">
                        <label class="col-2 col-form-label required">Nama Produk</label>
                        <div class="col">
                            <input name="nama_produk" type="text"
                                class="form-control @error('nama_produk') is-invalid @enderror"
                                placeholder="Masukkan nama produk" value="{{ old('nama_produk') }}">
                        </div>
                        @error('nama_produk')
                            <span class="invalid-feedback alert-danger" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                        <p></p>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-2 col-form-label">Merk</label>
                        <div class="col">
                            <input name="merk" type="text" class="form-control @error('merk') is-invalid @enderror"
                                placeholder="Masukkan merek produk" value="{{ old('merk') }}">
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
                        <label class="col-2 col-form-label">Detail</label>
                        <div class="col">
                            <textarea name="detail" id="detail" class="form-control @error('detail') is-invalid @enderror"
                                placeholder="Masukkan keterangan tambahan tentang produk" value="{{ old('nama_produk') }}"></textarea>
                        </div>
                        @error('detail')
                            <span class=" invalid-feedback alert-danger" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                        <p></p>
                    </div>


                    <div class="mb-3 row">
                        <label class="col-2 col-form-label">Stok</label>
                        <div class="col">
                            <input name="stok" type="number" class="form-control @error('stok') is-invalid @enderror"
                                placeholder="Masukkan nilai stok barang" value="{{ old('stok') }}">
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
                        <label class="col-2 col-form-label required required">Harga</label>
                        <div class="col">
                            <input name="harga" type="number" class="form-control @error('harga') is-invalid @enderror"
                                placeholder="Masukkan harga barang per satuannya" value="{{ old('harga') }}">
                        </div>
                        @error('harga')
                            <span class="invalid-feedback alert-danger" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                        <p></p>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-2 col-form-label required">Tanggal Masuk</label>
                        <div class="col">
                            <input name="tanggal_masuk" type="date"
                                class="form-control @error('tanggal_masuk') is-invalid @enderror"
                                placeholder="Masukkan tanggal masuk barang" value="{{ old('tanggal_masuk') }}">
                        </div>
                        @error('tanggal_masuk')
                            <span class="invalid-feedback alert-danger" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                        <p></p>
                    </div>
                    {{-- <div class="mb-3 row">
                        <label class="col-2 col-form-label">Tanggal Keluar</label>
                        <div class="col">
                            <input name="tanggal_keluar" type="date"
                                class="form-control @error('tanggal_keluar') is-invalid @enderror"
                                placeholder="Masukkan tanggal_keluar Barang" value="{{ old('tanggal_keluar') }}">
                        </div>
                        @error('tanggal_keluar')
                            <span class="invalid-feedback alert-danger" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                        <p></p>
                    </div> --}}
                    {{-- <div class="mb-3 row form-floating">
                        <div class="mb-3 row">
                            <label class="col-2 col-form-label">Jenis Servis</label>
                            <div class="col">
                                <select class="form-control form-select @error('kategori_id') is invalid @enderror"
                                    name="kategori_id" id="floatingSelect" aria-label="Floating label select example">
                                    <option selected="">-Pilih jenis servis-</option>
                                    @foreach ($kategori as $row)
                                        <option value="{{ $row->id }}"> {{ $row->jenis_servis }} </option>
                                    @endforeach
                                </select>
                            </div>
                            @error('kategori_id')
                                <span class="invalid-feedback alert-danger" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div> --}}

                    <div class="card-footer">
                        <div class="d-flex justify-content-between">
                            <div class="text-start">
                                <a href="{{ route('produk.index') }}"><button type="button"
                                        class="btn btn-ghost-danger active w-17">
                                        <i class="fa fa-arrow-left"></i> &nbsp;
                                        Kembali</button>
                            </div>
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary"> <i class="fa fa-save"></i>
                                    &nbsp;&nbsp;Simpan</button>
                                <!-- <button type="submit" class="btn btn-primary"> Simpan</button> -->
                            </div>
                        </div>
                    </div>
            </form>
        </div>
    </div>
@endsection
