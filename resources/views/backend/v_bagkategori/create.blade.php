@extends('backend.v_layouts.app')
@section('content')

<div class="col-md-12">
    <div class="card">
        <form action="{{ route('bagkategori.store') }}" method="post" class="card">
            @csrf

            <div class="card-header">
                <h3 class="card-title"> {{$sub}} </h3>
            </div>
            <div class="card-body">
                <div class="mb-3 row">
                    <label class="col-3 col-form-label required">Kategori Servis</label>
                    <div class="col">
                        <input name="kategori_servis" type="text" class="form-control @error('kategori_servis') is-invalid @enderror" placeholder="Masukkan nama jenis servis" value="{{ old('kategori_servis') }}">
                        <!-- <small class="form-hint">We'll never share your email with anyone else.</small> -->
                    </div>
                    @error('kategori_servis')
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
                        <a href="{{ route('bagkategori.index') }}"><button type="button" class="btn btn-ghost-danger active w-17"><i class="fa fa-arrow-left"></i> &nbsp; Kembali</button>
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary"> <i class="fa fa-save"></i> &nbsp;&nbsp;Simpan</button>
                        <!-- <button type="submit" class="btn btn-primary"> Simpan</button> -->
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection