@extends('backend.v_layouts.app')
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="col-md-12">
        <div class="card">
            <form action="{{ route('montir.store') }}" method="post" class="card">
                @csrf

                <div class="card-header">
                    <h3 class="card-title"> {{ $sub }} </h3>
                </div>
                <div class="card-body">
                    <div class="mb-3 row">
                        <label class="col-2 col-form-labelts-wrapper form-
                        ">Pilih User</label>
                        <div class="col">
                            <select class="form-control form-select @error('user_id') is invalid @enderror" name="user_id"
                                id="user" aria-label="Floating label select example">
                                <option value=""> Pilih Nama Montir </option>
                                @foreach ($user as $row)
                                    <option value="{{ $row->id }}">
                                        {{ ($row->akses == 0 ? 'Super Admin' : ($row->akses == 1 ? 'Administrator' : 'Montir')) . ' | ' . $row->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        @error('user_id')
                            <span class="invalid-feedback alert-danger" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    {{-- <div class="mb-3 row">
                        <label class="col-3 col-form-label">Foto</label>
                        <div class="col">
                            <img class="foto-preview">
                            <input type="file" name="foto"
                                class="form-cont rol @error('foto') is-invalid @enderror value="{{ old('foto') }}""
                                onchange="previewFoto()">
                        </div>
                        @error('foto')
                            <div class="invalid-feedback alert-danger">{{ $message }}</div>
                        @enderror
                    </div> --}}

                    {{-- <div class="mb-3 row">
                        <label class="col-2 col-form-label">Foto</label>
                        <div class="col">
                            <style>
                                .img-montir-preview {
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
                            <img class="img-montir-preview">
                            <input type="file" name="img_montir"
                                class="form-control @error('img_montir') is-invalid @enderror"
                                onchange="previewImgMontir()">
                        </div>
                        @error('img_montir')
                            <div class="invalid-feedback alert-danger">{{ $message }}</div>
                        @enderror
                    </div> --}}

                    {{-- ajax didnt work yet --}}
                    {{-- <div class="mb-3 row">
                        <label class="col-2 col-form-label">Email</label>
                        <div class="col">
                            <input type="string" disabled name="email" value="{{ old('email') }}"
                                class="form-control @error('email') is-invalid @enderror" id="email">
                        </div>
                        @error('email')
                            <span class="invalid-feedback alert-danger" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                        <p></p>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-2 col-form-label">Nomor Hp</label>
                        <div class="col">
                            <input type="number" disabled onkeypress="return hanyaAngka(event)" name="no_hp"
                                value="{{ old('no_hp') }}" class="form-control @error('no_hp') is-invalid @enderror"
                                id="no_hp">
                        </div>
                        @error('no_hp')
                            <span class="invalid-feedback alert-danger" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                        <p></p>
                    </div> --}}


                    {{-- <div class="mb-3 row">
                        <label class="col-2 col-form-label">Nama montir</label>
                        <div class="col">
                            <input name="nama_montir" type="text"
                                class="form-control @error('nama_montir') is-invalid @enderror"
                                placeholder="Masukkan nama lengkap" value="{{ old('nama_montir') }}">
                            <!-- <small class="form-hint"></small> -->
                        </div>
                        @error('nama_montir')
                            <span class="invalid-feedback alert-danger" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                        <p></p>
                    </div> --}}
                    <div class="mb-3 row">
                        <label class="col-2 col-form-label">Jenis Servis</label>
                        <div class="col">
                            <!-- Default dropend button -->
                            <div class="btn-group dropend">
                                <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    Pilih Spesialis Servis
                                </button>
                                <div class="dropdown-menu">
                                    @foreach ($kategori as $k)
                                        <label class="dropdown-item">
                                            <input class="form-check-input" type="checkbox" name="kategori_id[]"
                                                value="{{ $k->id }}"> {{ $k->jenis_servis }}
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
                        </div>
                    </div>
                    {{-- 
                    <div class="mb-3 row">
                        <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Spesialis Servis
                        </button>
                        <div class="dropdown-menu">
                            @foreach ($kategori as $k)
                                <label class="dropdown-item">
                                    <input class="form-check-input" type="checkbox" name="kategori_id[]"
                                        value="{{ $k->id }}">{{ $k->jenis_servis }}
                                </label>
                            @endforeach
                            </label>
                        </div>
                        @error('kategori_id')
                            <span class="invalid-feedback alert-danger" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div> --}}
                    {{-- <label class="form-label">Select</label>
                        <div>
                            <select class="form-select">
                                <option>Option 1</option>
                                <optgroup --}}
                    {{-- <label class="col-2 col-form-label">Jenis Servis</label>  --}}
                    {{-- <div class="mb-3 row">
                        <label for="btn-radio-vertical-dropdown"
                            class="col-2 col-md-auto col-form-label btn btn-secondary dropdown-toggle" type="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Spesialis Servis</label>
                        <div class="dropdown-menu dropdown-menu-demo col">
                            @foreach ($kategori as $k)
                                <label class="dropdown-item">
                                    <input class="form-check-input" type="checkbox" name="kategori_id[]"
                                        value="{{ $k->id }}">{{ $k->jenis_servis }}
                                </label>
                            @endforeach
                            </label>
                        </div>
                        @error('kategori_id')
                            <span class="invalid-feedback alert-danger" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div> --}}

                    <div class="mb-3 row">
                        <label class="col-2 col-form-label">Jenis Kelamin</label>
                        <div class="col">
                            <select class="form-control form-select @error('jenis_kelamin') is invalid @enderror"
                                name="jenis_kelamin" id="floatingSelect" aria-label="Floating label select example">
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
                    </div>
                    <div class="mb-3 row">
                        <label class="col-2 col-form-label">Tanggal Lahir</label>
                        <div class="col">
                            <input type="date" name="tanggal_lahir" id="tanggal_lahir"
                                class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                placeholder="Masukkan tanggal lahir">
                        </div>
                        @error('tanggal_lahir')
                            <span class=" invalid-feedback alert-danger" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                        <p></p>
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
                            <a href="{{ route('montir.index') }}"><button type="button"
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


    {{-- <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });

        $(function() {
            $('#user').on('change', function() {
                var user_id = $("#user").val();

                $.ajax({
                    url: 'backend/getIdUser/' + user_id,
                    type: 'GET', // Update this line to use 'GET'
                    cache: false,
                    success: function(response) {
                        $('#email').val(response.email);
                        $('#no_hp').val(response.no_hp);
                    },
                    error: function(xhr, status, error) {
                        console.log('Error:', error);
                        $('#idUser').val('');
                        // Handle errors if needed
                    }
                });
            });
        }); --}}
    </script>
@endsection
