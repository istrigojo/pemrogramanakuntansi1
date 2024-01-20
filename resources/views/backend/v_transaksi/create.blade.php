@extends('backend.v_layouts.app')
@section('content')
    <script src="{{ asset('backend/dist/libs/tom-select/dist/js/tom-select.custom.min.js') }}" defer></script>

    <div class="col-md-12">
        <div class="card">
            <form action="{{ route('transaksi.store') }}" method="post" class="card">
                @csrf

                <div class="card bg-primary text-primary-fg text-center">
                    <br>
                    <h2> {{ $sub }} <br> Teguh Service Mobil</h2>

                </div>
                <div class="card bg-primary-lt">
                    <div class="card-body">
                        <div class="mb-3 row">
                            <label class="col-2 col-form-label">Nomor Transaksi</label>
                            <div class="col-3">
                                <select name="no_trans"
                                    class="form-control form-select @error('status') is invalid @enderror" id="no_trans"
                                    id="select-produk" aria-label="Floating label select example" value="">
                                    <option selected="">Pilih Nomor Transaksi</option>
                                    @foreach ($servis as $row)
                                        <option value="{{ $row->id }}">
                                            {{ $row->no_trans . ' | ' . $row->customer->nama_customer }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            @error('no_trans')
                                <span class=" invalid-feedback alert-danger" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3 row">
                            <label class="col-2 col-form-label">Pilih User</label>
                            <div class="col-3">
                                <select name="user_id"
                                    class="form-control form-select @error('user_id') is invalid @enderror"
                                    id="floatingSelect" aria-label="Floating label select example">
                                    <option selected="">Pilih ID User</option>
                                </select>
                            </div>
                            @error('user_id')
                                <span class="invalid-feedback alert-danger" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3 row">
                            <label class="col-2 col-form-label">Status</label>
                            <div class="col">
                                <select name="status"
                                    class="form-control form-select @error('status') is invalid @enderror"
                                    id="select-produk" aria-label="Floating label select example" value="">
                                    <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Proses</option>
                                    <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Selesai</option>
                                </select>
                                @error('status')
                                    <span class="invalid-feedback alert-danger" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-2 col-form-label">Tanggal Masuk</label>
                            <div class="col">
                                <input type="date" name="tanggal_masuk" id="tanggal_masuk"
                                    class="form-control @error('tanggal_masuk') is-invalid @enderror"
                                    value="{{ 'tanggal_masuk' }}">
                            </div>
                            @error('tanggal_masuk')
                                <span class=" invalid-feedback alert-danger" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3 row">
                            <label class="col-2 col-form-label">Tanggal Keluar</label>
                            <div class="col">
                                <input type="date" name="tanggal_selesai" id="tanggal_selesai"
                                    class="form-control @error('tanggal_selesai') is-invalid @enderror"
                                    value="{{ 'tanggal_selesai' }}">
                            </div>
                            @error('tanggal_selesai')
                                <span class=" invalid-feedback alert-danger" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        {{-- tanggal keluar ada di detail karena detail itu nanti proses diubah keSELESAI baru nanti input tanggal keluar+pembayarannya --}}
                        <div class="mb-3 row">
                            <label class="col-2 col-form-label">Nama Customer</label>
                            <div class="col">
                                <select name="customer_id"
                                    class="form-control form-select @error('customer_id') is invalid @enderror"
                                    id="floatingSelect" aria-label="Floating label select example">
                                    <option selected="">Pilih ID Customer</option>
                                </select>
                            </div>
                            @error('customer_id')
                                <span class="invalid-feedback alert-danger" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3 row">
                            <label class="col-2 col-form-label">Jasa Servis</label>
                            <div class="col">
                                <!-- Default dropend button -->
                                <div class="btn-group dropend">
                                    <button type="button" class="btn btn-secondary dropdown-toggle"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        Pilih Jasa transaksi
                                    </button>
                                    <div class="dropdown-menu">
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
                        <div class="mb-3 row col-2">
                            <small class="text-secondary">*Pilih transaksi yang dibutuhkan sesuai dengan kebutuhan
                                mobil.</small>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-2 col-form-label">Sparepart</label>
                            <div class="col">
                                <select name="produk_id"
                                    class="form-control form-select @error('produk_id') is invalid @enderror"
                                    id="select-produk" aria-label="Floating label select example" value="">
                                    <option selected="">Pilih Sparepart Mobil</option>

                                </select>
                                @error('produk_id')
                                    <span class="invalid-feedback alert-danger" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row col-2">
                            {{-- <div class=""> --}}
                            <small class="text-secondary">*Pilih sparepart yang dibutuhkan sesuai dengan transaksi
                                mobil.</small>
                            {{-- </div> --}}
                        </div>
                        <div class="mb-3 row">
                            <label class="col-2 col-form-label">Total Servis</label>
                            <div class="col">
                                <input type="text" name="total_servis" id="total_servis"
                                    onkeypress="return hanyaAngka(event)"
                                    class="form-control @error('total_servis') is-invalid @enderror"
                                    value="{{ old('total_servis') }}" placeholder="">

                                <small class="text-secondary">Total Biaya Servis, sudah termasuk Jasa Servis dan
                                    Sparepart.</small>
                            </div>
                            @error('total_servis')
                                <span class="invalid-feedback alert-danger" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3 row">
                            <label class="col-2 col-form-label">Total Bayar</label>
                            <div class="col">
                                <input type="text" name="total_bayar" id="total_bayar"
                                    onkeypress="return hanyaAngka(event)"
                                    class="form-control @error('total_bayar') is-invalid @enderror"
                                    value="{{ old('total_bayar') }}" placeholder="">
                                {{-- <small class="text-secondary"></small> --}}
                                {{-- total bayar ini buat pembayaran yang dilakuin sama cust, nah nanti otomatis b=dibutin jurnal transaksinya gitu. 
                                *Kalau ga dibuat masukin jurnalnya, jadi dari transaksi nanti masuk ke jurnalnya gitu. Harusnya otomatis tapi dibuat manusal dulu aja buat input annya --}}
                            </div>
                            @error('total_bayar')
                                <span class="invalid-feedback alert-danger" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="card-footer bg-primary-lt">
                        <div class="d-flex justify-content-between">
                            <div class="text-start">
                                <a href="{{ route('transaksi.index') }}"><button type="button"
                                        class="btn btn-ghost-danger active w-17"><i class="fa fa-arrow-left"></i>
                                        &nbsp;
                                        Kembali</button>
                            </div>
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary"> <i class="fa fa-save"></i>
                                    &nbsp;&nbsp;Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>

    <script>
        // @formatter:off
        document.addEventListener("DOMContentLoaded", function() {
            var el;
            window.TomSelect &&
                new TomSelect(
                    (el = document.getElementById("select-transaksi")), {
                        copyClassesToDropdown: false,
                        dropdownParent: "body",
                        controlInput: "<input>",
                        render: {
                            item: function(data, escape) {
                                if (data.customProperties) {
                                    return (
                                        '<div><span class="dropdown-item-indicator">' +
                                        data.customProperties +
                                        "</span>" +
                                        escape(data.text) +
                                        "</div>"
                                    );
                                }
                                return (
                                    "<div>" + escape(data.text) + "</div>"
                                );
                            },
                            option: function(data, escape) {
                                if (data.customProperties) {
                                    return (
                                        '<div><span class="dropdown-item-indicator">' +
                                        data.customProperties +
                                        "</span>" +
                                        escape(data.text) +
                                        "</div>"
                                    );
                                }
                                return (
                                    "<div>" + escape(data.text) + "</div>"
                                );
                            },
                        },
                    }
                );
        });
        // @formatter:on
    </script>
@endsection
