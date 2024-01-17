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
                    <div class="mb-3 row form-floating">
                        <div class="mb-3 row">
                            <label class="col-2 col-form-label">Nama Customer</label>
                            <div class="col">
                                <select name="nama_customer"
                                    class="form-control form-select @error('nama_customer') is invalid @enderror"
                                    id="floatingSelect" aria-label="Floating label select example">
                                    <option selected="">-Pilih kategori servis-</option>
                                    @foreach ($customer as $row)
                                        <option value="{{ $row->id }}"> {{ $row->nama_customer }} </option>
                                    @endforeach
                                </select>
                            </div>
                            @error('nama_customer')
                                <span class="invalid-feedback alert-danger" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                    </div>
                    <div class="d-flex justify-content-between">
                        <div class="card-footer text-start">
                            <a href="{{ route('customer.index') }}"><button type="button"
                                    class="btn btn-ghost-danger active w-17">Kembali</button>
                        </div>
                        <div class="card-footer text-end">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>`
            </form>
        </div>
    </div>
@endsection
