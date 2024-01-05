@extends('backend.v_layouts.app')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <form action="{{ route('berita.store') }}" method="post" enctype="multipart/form-data" class="card">
                @csrf

                <div class="card-header">
                    <h3 class="card-title"> {{ $sub }} </h3>
                </div>
                <div class="card-body">
                    <div class="mb-3 row">
                        <label class="col-2 col-form-label">Foto</label>
                        <div class="col">
                            <style>
                                .img-berita-preview {
                                    max-width: 600px;
                                    /* Lebar maksimum 100% dari container */
                                    height: auto;
                                    /* Tinggi disesuaikan untuk menjaga rasio aspek gambar */
                                    border: 1px solid #ddd;
                                    /* Tambahkan border untuk efek visual */
                                    margin-top: 10px;
                                    /* Atur margin atas sesuai kebutuhan Anda */
                                }
                            </style>
                            <img class="img-berita-preview">
                            <input type="file" name="img_berita"
                                class="form-control @error('img_berita') is-invalid @enderror"
                                onchange="previewImgBerita()">
                        </div>
                        @error('img_berita')
                            <div class="invalid-feedback alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3 row">
                        <label class="col-2 col-form-label ">Tanggal</label>
                        <div class="col">
                            <input name="tanggal" type="datetime-local"
                                class="form-control @error('tanggal') is-invalid @enderror" value="{{ old('tanggal') }}">
                            <!-- <small class="form-hint">Masukkan tanggal anda.</small> -->
                        </div>
                        @error('tanggal')
                            <span class="invalid-feedback alert-danger" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                        <p></p>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-2 col-form-label required">Judul Berita</label>
                        <div class="col">
                            <input name="judul" type="text" class="form-control @error('judul') is-invalid @enderror"
                                placeholder="Masukkan judul berita" value="{{ old('judul') }}">
                        </div>
                        @error('judul')
                            <span class="invalid-feedback alert-danger" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                        <p></p>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-2 col-form-label required">Kategori</label>
                        <div class="col">
                            <select class="form-control form-select @error('kategories_id') is-invalid @enderror"
                                name="kategories_id" id="floatingSelect" aria-label="Floating label select example">
                                <option selected="">Pilih kategori berita</option>
                                @foreach ($kategories as $row)
                                    <option value="{{ $row->id }}"> {{ $row->nama_kategori }} </option>
                                @endforeach
                            </select>
                        </div>
                        @error('kategories')
                            <span class="invalid-feedback alert-danger" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                        <p></p>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-2 col-form-label required">Detail</label>
                        <div class="col">
                            <textarea name="detail" rows="3" class="form-control @error('detail') is-invalid @enderror" id="ckeditor"
                                placeholder="Masukkan detail customer" value="{{ old('detail') }}"></textarea>
                            @error('detail')
                                <span class=" invalid-feedback alert-danger" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                            <p></p>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-between">
                            <div class="text-start">
                                <a href="{{ route('berita.index') }}"><button type="button"
                                        class="btn btn-ghost-danger active w-17"><i class="fa fa-arrow-left"></i> &nbsp;
                                        Kembali</button>
                            </div>
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary"> <i class="fa fa-save"></i>
                                    &nbsp;&nbsp;Simpan</button>
                                <!-- <button type="submit" class="btn btn-primary"> Simpan</button> -->
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
