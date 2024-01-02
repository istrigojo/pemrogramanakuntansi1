@extends('backend.v_layouts.app')
@section('content')


<div class="col-md-12">
    <div class="card">
        <form action="{{ route('kategori.store') }}" method="post" class="card">
            @csrf

            <div class="card-header">
                <h3 class="card-title"> {{$sub}} </h3>
            </div>
            <div class="card-body">
                <div class="mb-3 row form-floating">
                    <div class="mb-3 row">
                        <label class="col-2 col-form-label">Kategori Servis</label>
                        <div class="col">
                            <select class="form-control form-select @error('bagkategori_id') is invalid @enderror" name="bagkategori_id" id="floatingSelect" aria-label="Floating label select example">
                                <option selected="">-Pilih kategori servis-</option>
                                @foreach ($bagkategori as $row)
                                <option value="{{ $row->id }}"> {{ $row->kategori_servis }} </option>
                                @endforeach
                            </select>
                        </div>
                        @error('bagkategori_id')
                        <span class="invalid-feedback alert-danger" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-2 col-form-label ">Jenis Servis</label>
                    <div class="col">
                        <input name="jenis_servis" type="text" class="form-control @error('jenis_servis') is-invalid @enderror" placeholder="Masukkan jenis servis sesuai dengan kategori servis" value="{{ old('jenis_servis') }}">
                    </div>
                    @error('jenis_servis')
                    <span class="invalid-feedback alert-danger" role="alert">
                        {{ $message }}
                    </span>
                    @enderror
                    <p></p>
                </div>
                <div class="mb-3 row">
                    <label class="col-2 col-form-label ">Biaya Servis</label>
                    <div class="col">
                        <input name="biaya_servis" type="text" class="form-control @error('biaya_servis') is-invalid @enderror" placeholder="Masukkan jenis servis sesuai dengan kategori servis" value="{{ old('biaya_servis') }}">
                    </div>
                    @error('biaya_servis')
                    <span class="invalid-feedback alert-danger" role="alert">
                        {{ $message }}
                    </span>
                    @enderror
                    <p></p>
                </div>
                <div class="mb-3 row">
                    <label class="col-2 col-form-label ">Spesialis Montir</label>
                    <div class="col">
                        <input name="spesialis" type="text" class="form-control @error('spesialis') is-invalid @enderror" placeholder="Masukkan Spesialis Montir" value="{{ old('spesialis') }}">
                    </div>
                    @error('spesialis')
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
                        <a href="{{ route('kategori.index') }}"><button type="button" class="btn btn-ghost-danger active w-17"><i class="fa fa-arrow-left"></i> &nbsp; Kembali</button>
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary"> <i class="fa fa-save"></i> &nbsp;&nbsp;Simpan</button>
                    </div>
                </div>
        </form>
    </div>
</div>
@endsection