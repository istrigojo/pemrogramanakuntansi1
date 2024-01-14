@extends('backend.v_layouts.app')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <form action="{{ route('user.store') }}" method="post" enctype="multipart/form-data" class="card">
                @csrf

                <div class="card-header">
                    <h3 class="card-title"> {{ $sub }} </h3>
                </div>
                <div class="card-body">
                    <div class="mb-3 row">
                        <label class="col-3 col-form-label">Foto</label>
                        <div class="col">
                            <style>
                                .foto-preview {
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
                            <img class="foto-preview">
                            <input type="file" name="foto"
                                class="form-cont rol @error('foto') is-invalid @enderror value="{{ old('foto') }}""
                                onchange="previewFoto()">
                        </div>
                        @error('foto')
                            <div class="invalid-feedback alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3 row">
                        <label class="col-3 col-form-label required">Hak Ases User</label>
                        <div class="col">
                            <select class="form-control form-select @error('akses') is invalid @enderror" name="akses"
                                id="floatingSelect" aria-label="Floating label select example">
                                <option value="" {{ old('akses') == '' ? 'selected' : '' }}> --Pilih Hak Akses--
                                </option>
                                <option value="1" {{ old('akses') == '1' ? 'selected' : '' }}>Super Admin</option>
                                <option value="2" {{ old('akses') == '2' ? 'selected' : '' }}>Administrator
                                </option>
                                <option value="3" {{ old('akses') == '3' ? 'selected' : '' }}>Montir</option>
                            </select>
                        </div>
                        @error('akses')
                            <span class="invalid-feedback alert-danger" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3 row">
                        <label class="col-3 col-form-label required">Nama User</label>
                        <div class="col">
                            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                                placeholder="Masukkan nama lengkap" value="{{ old('nama') }}">
                            <!-- <small class="form-hint">We'll never share your email with anyone else.</small> -->
                        </div>
                        @error('nama')
                            <span class="invalid-feedback alert-danger" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                        <p></p>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-3 col-form-label required">Email</label>
                        <div class="col">
                            <input name="email" type="text" class="form-control @error('email') is-invalid @enderror"
                                placeholder="Masukkan alamat email exp: teguhbengkel@gmail.com"
                                value="{{ old('email') }}">
                        </div>
                        @error('email')
                            <span class="invalid-feedback alert-danger" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                        <p></p>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-3 col-form-label">Nomor Handphone</label>
                        <div class="col">
                            <input name="no_hp" type="text" onkeypress="return hanyaAngka(event)"
                                class="form-control @error('no_hp') is-invalid @enderror"
                                placeholder="Masukkan nomor telephone" value="{{ old('no_hp') }}">
                        </div>
                        @error('no_hp')
                            <span class="invalid-feedback alert-danger" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                        <p></p>
                    </div>
                    {{-- <div class="mb-3 row">
                        <label class="col-3 col-form-label required">Jenis Kelamin</label>
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
                        <label class="col-3 col-form-label ">Tanggal Lahir</label>
                        <div class="col">
                            <input name="tanggal_lahir" type="date"
                                class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                value="{{ old('tanggal_lahir') }}">
                            <!-- <small class="form-hint">We'll never share your tanggal_lahir with anyone else.</small> -->
                        </div>
                        @error('tanggal_lahir')
                            <span class="invalid-feedback alert-danger" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                        <p></p>
                    </div> --}}
                    <div class="mb-3 row">
                        <label class="col-3 col-form-label required">Password</label>
                        <div class="col">
                            <input name="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" placeholder="**********"
                                value="{{ old('password') }}">
                            <small class="form-hint">Password harus terjadi dari huruf kecil (a-z), huruf besar (A-Z), angka
                                (1,2,3) dan simbol karakter (?=.*[\W_]).</small>
                        </div>
                        @error('password')
                            <span class="invalid-feedback alert-danger" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                        <p></p>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-3 col-form-label required">Konfirmasi Password</label>
                        <div class="col">
                            <input name="password_confirmation" type="password"
                                class="form-control @error('password') is-invalid @enderror" placeholder="**********">
                            <small class="form-hint">Masukkan kembali password.</small>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-between">
                        <div class="text-start">
                            <a href="{{ route('user.index') }}"><button type="button"
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
