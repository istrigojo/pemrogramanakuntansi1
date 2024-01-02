@extends('backend.v_layouts.app')
@section('content')

<div class="col-md-12">
    <div class="card">
        <form action="{{ route('mobil.store') }}" method="post" class="card">
            @csrf

            <div class="card-header">
                <h3 class="card-title"> {{$sub}} </h3>
            </div>
            <div class="card-body">
                <div class="mb-3 row">
                    <label class="col-3 col-form-label required">Nomor Plat Mobil</label>
                    <div class="col">
                        <input name="no_plat" type="text" class="form-control @error('no_plat') is-invalid @enderror" placeholder="Masukkan Nomor Plat Mobil" value="{{ old('no_plat') }}">
                        <!-- <small class="form-hint">We'll never share your email with anyone else.</small> -->
                    </div>
                    @error('no_plat')
                    <span class="invalid-feedback alert-danger" role="alert">
                        {{ $message }}
                    </span>
                    @enderror
                    <p></p>
                </div>
                <div class="mb-3 row">
                    <label class="col-3 col-form-label required">Warna Mobil</label>
                    <div class="col">
                        <input name="warna" type="text" class="form-control @error('warna') is-invalid @enderror" placeholder="Masukkan Warna Mobil" value="{{ old('warna') }}">
                        <!-- <small class="form-hint">We'll never share your email with anyone else.</small> -->
                    </div>
                    @error('warna')
                    <span class="invalid-feedback alert-danger" role="alert">
                        {{ $message }}
                    </span>
                    @enderror
                    <p></p>
                </div>
                <div class="mb-3 row">
                    <label class="col-3 col-form-label required">Merek</label>
                    <div class="col">
                        <input name="merk" type="text" class="form-control @error('merk') is-invalid @enderror" placeholder="Masukkan Merek Mobil" value="{{ old('merk') }}">
                        <!-- <small class="form-hint">We'll never share your email with anyone else.</small> -->
                    </div>
                    @error('merk')
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
                        <a href="{{ route('mobil.index') }}"><button type="button" class="btn btn-ghost-danger active w-17"><i class="fa fa-arrow-left"></i> &nbsp; Kembali</button>
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