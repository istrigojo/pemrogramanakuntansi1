@extends('backend.v_layouts.app')
@section('content')

<div class="col-md-12">
    <div class="card">
        <form action="{{ route('akun.store') }}" method="post" class="card">
            @csrf

            <div class="card-header">
                <h3 class="card-title"> {{$sub}} </h3>
            </div>
            <div class="card-body">
                <div class="mb-3 row">
                    <label class="col-3 col-form-label required">Kode Akun</label>
                    <div class="col">
                        <input name="kode_akun" type="text" class="form-control @error('kode_akun') is-invalid @enderror" placeholder="Masukkan kode akun" value="{{ old('kode_akun') }}">
                        <!-- <small class="form-hint">We'll never share your email with anyone else.</small> -->
                    </div>
                    @error('kode_akun')
                    <span class="invalid-feedback alert-danger" role="alert">
                        {{ $message }}
                    </span>
                    @enderror
                    <p></p>
                </div>
                <div class="mb-3 row">
                    <label class="col-3 col-form-label required">Nama Akun</label>
                    <div class="col">
                        <input name="nama_akun" type="text" class="form-control @error('nama_akun') is-invalid @enderror" placeholder="Masukkan nama akun" value="{{ old('nama_akun') }}">
                        <!-- <small class="form-hint">We'll never share your email with anyone else.</small> -->
                    </div>
                    @error('kode_akun')
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
                        <a href="{{ route('akun.index') }}"><button type="button" class="btn btn-ghost-danger active w-17"><i class="fa fa-arrow-left"></i> &nbsp; Kembali</button>
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary"> <i class="fa fa-save"></i> &nbsp;&nbsp;Simpan</button>
                    </div>
                </div>
        </form>
    </div>
</div>
@endsection