@extends('backend.v_layouts.app')
@section('content')


<div class="col-md-12">
    <div class="card">
        <form action="{{ route('montir.store') }}" method="post" class="card">
            @csrf

            <div class="card-header">
                <h3 class="card-title"> {{$sub}} </h3>
            </div>
            <div class="card-body">
                <div class="mb-3 row">
                    <label class="col-2 col-form-label">Foto</label>
                    <div class="col">
                        <img class="foto-preview">
                        <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror">
                    </div>
                    @error('foto')
                    <div class="invalid-feedback alert-danger">{{ $message }}</div>
                    @enderror

                </div>
                <!-- <div class="col-md-8">
                    {{-- div right --}} -->
                <div class="mb-3 row">
                    <label class="col-2 col-form-label required">Nama montir</label>
                    <div class="col">
                        <input name="nama_montir" type="text" class="form-control @error('nama_montir') is-invalid @enderror" placeholder="Masukkan nama lengkap" value="{{ old('nama_montir') }}">
                        <!-- <small class="form-hint"></small> -->
                    </div>
                    @error('nama_montir')
                    <span class="invalid-feedback alert-danger" role="alert">
                        {{ $message }}
                    </span>
                    @enderror
                    <p></p>
                </div>
                <div class="mb-3 row form-floating">
                    <div class="mb-3 row">
                        <label class="col-2 col-form-label">Jenis Servis</label>
                        <label for="btn-radio-vertical-dropdown-dropdown" class="col-2 col-form-label btn dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Spesialis Servis</label>

                        <div class="dropdown-menu dropdown-menu-demo col">
                            @foreach ($kategori as $row)
                            <label class="dropdown-item">
                                <input class="form-check-input m-0 me-2" type="checkbox" name="kategori_id[]" value="{{ $row->id }}"> {{ $row->id}}
                            </label>
                            @endforeach
                            </label>
                        </div>
                        @error('kategori_id')
                        <span class="invalid-feedback alert-danger" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>



                    <div class="mb-3 row">
                        <label class="col-2 col-form-label  required">Email</label>
                        <div class="col">
                            <input name="email" type="text" class="form-control @error('email') is-invalid @enderror" placeholder="Masukkan alamat email (exp: teguhbengkel@gmail.com)" value="{{ old('email') }}">
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
                        <label class="col-2 col-form-label required">Nomor Hp</label>
                        <div class="col">
                            <input name="no_hp" type="text" class="form-control @error('no_hp') is-invalid @enderror" placeholder="Masukkan nomor handphone" value="{{ old('no_hp') }}">
                            <!-- <small class="form-hint">Ketik tanpa spasi.</small> -->
                        </div>
                        @error('no_hp')
                        <span class="invalid-feedback alert-danger" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                        <p></p>
                    </div>
                    <div class="mb-3 row form-floating">
                        <div class="mb-3 row">
                            <label class="col-2 col-form-label">Jenis Kelamin</label>
                            <div class="col">
                                <select class="form-control form-select @error('jenis_kelamin') is invalid @enderror" name="jenis_kelamin" id="floatingSelect" aria-label="Floating label select example">
                                    <option value=""> Pilih Jenis Kelamin </option>
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
                    </div>
                    <div class="mb-3 row">
                        <label class="col-2 col-form-label">Alamat</label>
                        <div class="col">
                            <textarea name="alamat" id="alamat" class="form-control @error('alamat') is-invalid @enderror" placeholder="Masukkan alamat lengkap"></textarea>
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
                            <a href="{{ route('montir.index') }}"><button type="button" class="btn btn-ghost-danger active w-17"><i class="fa fa-arrow-left"></i> &nbsp; Kembali</button>
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary"> <i class="fa fa-save"></i> &nbsp;&nbsp;Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection