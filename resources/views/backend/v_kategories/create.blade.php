@extends('backend.v_layouts.app')
@section('content')

<div class="col-md-12">
    <div class="card">
        <form action="{{ route('kategories.store') }}" method="post" class="card">
            @csrf

            <div class="card-header">
                <h3 class="card-title"> {{$sub}} </h3>
            </div>
            <div class="card-body">
                <div class="mb-3 row">
                    <label class="col-3 col-form-label required">Nama Kategori</label>
                    <div class="col">
                        <input name="nama_kategori" type="text" class="form-control @error('nama_kategori') is-invalid @enderror" placeholder="Masukkan nama kategori berita" value="{{ old('nama_kategori') }}">
                        <!-- <small class="form-hint">We'll never share your email with anyone else.</small> -->
                    </div>
                    @error('nama_kategori')
                    <span class="invalid-feedback alert-danger" role="alert">
                        {{ $message }}
                    </span>
                    @enderror
                    <p></p>
                </div>

            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-between">
                    <div class="text-start">
                        <a href="{{ route('kategories.index') }}"><button type="button" class="btn btn-ghost-danger active w-17"><i class="fa fa-arrow-left"></i> &nbsp; Kembali</button>
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary"> <i class="fa fa-save"></i> &nbsp;&nbsp;Simpan</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection