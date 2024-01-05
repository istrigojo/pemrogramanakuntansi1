@extends('backend.v_layouts.app')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <form action="{{ route('servis.store') }}" method="post" class="card">
                @csrf

                <div class="card-header">
                    <h3 class="card-title"> {{ $sub }} </h3>
                </div>
                <div class="card-body">
                    <div class="mb-3 row">
                        <label class="col-2 col-form-label required">Nama Customer</label>
                        <div class="col">
                            <input name="nama_customer" type="text"
                                class="form-control @error('nama_customer') is-invalid @enderror"
                                placeholder="Masukkan nama lengkap" value="{{ old('nama_customer') }}">
                            <!-- <small class="form-hint"></small> -->
                        </div>
                        @error('nama_customer')
                            <span class="invalid-feedback alert-danger" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                        <p></p>
                    </div>
                    <div class="mb-3 row form-floating">
                        <label class="col-2 col-form-label ">Mobil Customer</label>
                        <!-- <div class="col"> -->
                        <select class="form-control form-select @error('mobil_id') is invalid @enderror" name="mobil_id"
                            id="floatingSelect" aria-label="Floating label select example">
                            <option selected="">Pilih mobil customer</option>
                            @foreach ($mobil as $row)
                                <option value="{{ $row->id }}"> {{ $row->id }} </option>
                            @endforeach
                        </select>
                        <!-- </div> -->
                        @error('mobil_id')
                            <span class="invalid-feedback alert-danger" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                        {{-- <label for="floatingSelect">Data Mobil</label> --}}
                    </div>
                    <div class="mb-3 row">
                        <label class="col-2 col-form-label ">Email</label>
                        <div class="col">
                            <input name="email" type="text" class="form-control @error('email') is-invalid @enderror"
                                placeholder="Masukkan email email anda" value="{{ old('email') }}">
                            <small class="form-hint">Masukkan email anda.</small>
                        </div>
                        @error('email')
                            <span class="invalid-feedback alert-danger" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                        <p></p>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-2 col-form-label required">Nomor Hp</label>
                        <div class="col">
                            <input name="no_hp" type="text" class="form-control @error('no_hp') is-invalid @enderror"
                                placeholder="Masukkan nomor hp anda" value="{{ old('no_hp') }}"
                                placeholder="Masukkan nomor hp anda">
                            <small class="form-hint">Ketik tanpa spasi.</small>
                        </div>
                        @error('no_hp')
                            <span class="invalid-feedback alert-danger" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                        <p></p>
                    </div>
                    <!-- make select -->
                    <div class="mb-3 row">
                        <label class="col-2 col-form-label required">Jenis Kelamin</label>
                        <div class="col">
                            <input name="jenis_kelamin" type="text"
                                class="form-control @error('jenis_kelamin') is-invalid @enderror"
                                placeholder="Masukkan nomor hp anda" value="{{ old('jenis_kelamin') }}" ">
                                <!-- <small class=" form-hint"></small> -->
                            </div>
                            @error('jenis_kelamin')
        <span class="invalid-feedback alert-danger" role="alert">
                                        {{ $message }}
                                    </span>
    @enderror
                            <p></p>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-2 col-form-label required">Alamat</label>
                            <textarea name="alamat" id="alamat" rows="3" class="form-control @error('alamat') is-invalid @enderror"
                                placeholder="Masukkan alamat customer" value="{{ old('alamat') }}">
                </textarea>
                            @error('alamat')
        <span class=" invalid-feedback alert-danger" role="alert">
                                        {{ $message }}
                                    </span>
    @enderror
                            <p></p>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <div class="card-footer text-start">
                            <a href="{{ route('customer.index') }}"><button type="button" class="btn btn-ghost-danger active w-17">Kembali</button>
                        </div>
                        <div class="card-footer text-end">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
@endsection
