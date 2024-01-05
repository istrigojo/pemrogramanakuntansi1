@extends('backend.v_layouts.app')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <form action="{{ route('customer.store') }}" method="post" class="card">
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

                    <div class="mb-3 row">
                        <label class="col-2 col-form-label">Mobil Customer</label>
                        <div class="col">
                            <select class="form-control form-select @error('mobil_id') is invalid @enderror" name="mobil_id"
                                id="floatingSelect" aria-label="Floating label select example">
                                <option selected="">Pilih mobil customer</option>
                                @foreach ($mobil as $row)
                                    <option value="{{ $row->id }}"> {{ $row->no_plat }} </option>
                                @endforeach
                            </select>
                        </div>
                        @error('mobil_id')
                            <span class="invalid-feedback alert-danger" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3 row">
                        <label class="col-2 col-form-label required ">Email</label>
                        <div class="col">
                            <input name="email" type="text" class="form-control @error('email') is-invalid @enderror"
                                placeholder="Masukkan alamat email (exp: teguhbengkel@gmail.com)"
                                value="{{ old('email') }}">
                            <!-- <small class="form-hint">Masukkan email anda.</small> -->
                        </div>
                        @error('email')
                            <span class="invalid-feedback alert-danger" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                        <p></p>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-2 col-form-label required required">Nomor Hp</label>
                        <div class="col">
                            <input name="no_hp" type="text" onkeypress="return hanyaAngka(event)"
                                class="form-control @error('no_hp') is-invalid @enderror"
                                placeholder="Masukkan nomor handphone" value="{{ old('no_hp') }}">
                            <!-- <small class="form-hint">Ketik tanpa spasi.</small> -->
                        </div>
                        @error('no_hp')
                            <span class="invalid-feedback alert-danger" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                        <p></p>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-2 col-form-label required">Jenis Kelamin</label>
                        <div class="col">
                            <select class="form-control form-select @error('jenis_kelamin') is invalid @enderror"
                                name="jenis_kelamin" id="floatingSelect" aria-label="Floating label select example">
                                <option selected="">Pilih jenis kelamin</option>
                                <option value="Laki-laki"> Laki-laki </option>
                                <option value="Perempuan"> Perempuan </option>
                            </select>
                        </div>
                        @error('jenis_kelamin')
                            <span class="invalid-feedback alert-danger" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                        <!-- <label for="floatingSelect">Data Mobil</label> -->

                    </div>

                    <div class="mb-3 row">
                        <label class="col-2 col-form-label">Alamat</label>
                        <div class="col">
                            <textarea name="alamat" id="alamat" class="form-control @error('alamat') is-invalid @enderror"
                                placeholder="Masukkan alamat lengkap"></textarea>
                        </div>
                        @error('alamat')
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
                            <a href="{{ route('customer.index') }}"><button type="button"
                                    class="btn btn-ghost-danger active w-17"><i class="fa fa-arrow-left"></i> &nbsp;
                                    Kembali</button>
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary"> <i class="fa fa-save"></i>
                                &nbsp;&nbsp;Simpan</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
