@extends('backend.v_layouts.app')
@section('content')
    <div class="card-header">
        <h3 class="card-title">{{ $sub }}</h3>
    </div>
    <div class="card-body border-bottom py-3">
        <div class="d-flex">
            <div class="text-secondary">
                Show
                <div class="mx-2 d-inline-block">
                    <input type="text" class="form-control form-control-sm" value="4" size="3"
                        aria-label="Invoices count">
                </div>
                entries
            </div>
            <div class="ms-auto text-secondary">
                Search:
                <div class="ms-2 d-inline-block">
                    <input type="text" class="form-control form-control-sm" aria-label="Search invoice">
                </div>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <div class="card-body border-bottom py-3">
            <a href="{{ route('produk.create') }}" title="Tambahkan data baru">
                <button type="button" class="btn btn-outline-primary w-17"> <i class="fa fa-plus"></i>
                    &nbsp;Tambah</button>
            </a>
        </div>
        <table class="table card-table table-vcenter text-nowrap datatable">
            <thead>
                <tr>
                    <th> No </th>
                    <th> Nama Produk </th>
                    <th> Detail </th>
                    <th> Merk </th>
                    <th> Stok </th>
                    <th> Harga </th>
                    <th> Jenis Servis </th>
                    <th> Tanggal Masuk </th>
                    <!-- <th> Tanggal Keluar </th> -->
                    <th> Aksi </th>
                </tr>
            </thead>
            @foreach ($produk as $index => $row)
                <tbody>
                    <tr>
                        <td> {{ $index + 1 }} </td>
                        <td> {{ $row->nama_produk }}
                        </td>
                        <td> {{ $row->detail }}</td>
                        <td> {{ $row->merk }}</td>
                        <td> {{ $row->stok }}</td>
                        <td> {{ $row->harga }}</td>
                        <td> {{ $row->kategori->jenis_servis }}</td>
                        <td> {{ $row->tanggal_masuk }}</td>
                        <!-- <td> {{ $row->tanggal_keluar }}</td> -->
                        <td>
                            <form method="POST" action="#" style="display: inline-block;">
                                @csrf
                                <button type="button" class="btn btn-outline-secondary" data-toggle="tooltip"
                                    title='Detail' data-konf-proses="#"><i
                                        class="fa fa-chevron-circle-up"></i>Detail</button>
                                <!-- <button type="button" class="btn btn-secondary  btn-sm show_confirm_proses" data-toggle="tooltip" title='Detail Persediaan' data-konf-="#"><i class="fas fa-chevron-circle-up"></i> Detail
                                </button> -->
                            </form>
                            <a href="{{ route('produk.edit', $row->id) }}" title="Ubah Data">
                                <span class="btn btn-outline-primary"><i class=" fa-edit"></i>Ubah</span>
                            </a>
                            <form method="POST" action="{{ route('produk.destroy', $row->id) }}"
                                style="display: inline-block;">
                                @method('delete')
                                @csrf
                                <button type="button" class="btn btn-outline-danger" data-toggle="tooltip" title='Hapus'
                                    data-konf-delete="{{ $row->kode_akun }}"><i class="fa fa-trash"></i>Hapus</button>
                            </form>
                        </td>
                    </tr>
            @endforeach
            </tbody>
        </table>
        <div class="card-footer d-flex align-items-center">
            <p class="m-0 text-secondary"> Showing <span> {{ $produk->firstItem() }} </span> to <span>
                    {{ $produk->lastItem() }} </span> of <span> {{ $produk->total() }} </span> entries</p>
            <ul class="pagination m-0 ms-auto">
                <li class="page-item ">
                    <a class="page-link" href=" {{ $produk->previousPageUrl() }} " tabindex="-1">
                        <!-- Download SVG icon from http: //tabler-icons.io/i/chevron-left -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M15 6l-6 6l6 6" />
                        </svg>
                        prev
                    </a>
                </li>
                @for ($i = 1; $i <= $produk->lastPage(); $i++)
                    <li class="page-item @if ($produk->currentPage() == $i) active @endif">
                        <a class="page-link" href="{{ $produk->url($i) }}"> {{ $i }} </a>
                    </li>
                @endfor
                <li class="page-item">
                    <a class="page-link" href="{{ $produk->nextPageUrl() }}">
                        next <!--Download SVG icon from http: //tabler-icons.io/i/chevron-right -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                            viewBox="0 0 24 24 stroke - width=" 2" stroke="currentColor" fill="none" stroke -
                            linecap="round" stroke linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M9 6l6 6l-6 6" />
                        </svg>
                    </a>
                <li>
            </ul>
        </div>
    </div>

    <!--penutuan template-->
@endsection
