@extends('backend.v_layouts.app')
@section('content')
<!-- pemanggilan awal template -->

<!-- untuk membuat button -->
<div class="card-header">
    <h3 class="card-title"> {{$sub}} </h3>
</div>
<div class="card-body border-bottom py-3">
    <div class="d-flex">
        <div class="text-secondary">
            Show
            <div class="mx-2 d-inline-block">
                <input type="text" class="form-control form-control-sm" value="4" size="3" aria-label="Invoices count">
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
        <a href="{{ route('montir.create') }}" title="Tambahkan data baru">
            <button type="button" class="btn btn-outline-primary w-17"> <i class="fa fa-plus"></i> &nbsp;Tambah</button>
        </a>
    </div>
    <table class="table card-table table-vcenter text-nowrap datatable">
        <thead>
            <tr>
                <th> No </th>
                <th> Nama Montir </th>
                <th> Email </th>
                <th> Nomor HP </th>
                <th> Jenis Kelamin </th>
                <th> Spesialis </th>
                <th> Aksi </th>
            </tr>
        </thead>
        @foreach($montir as $index => $row)
        <tbody>
            <tr>
                <td> {{ $index + 1 }} </td>
                <td> {{ $row -> nama_montir }} </td>
                <td> {{ $row -> email}} </td>
                <td> {{ $row -> no_hp}} </td>
                <td> {{ $row -> jenis_kelamin}} </td>
                <td> {{ $row -> kategori -> spesialis}} </td>
                <td>
                    <a href="{{ route('montir.edit', $row->id) }}" title="Ubah Data">
                        <span class="btn btn-outline-primary"><i class="fa fa-pencil"></i>Ubah</span>
                    </a>
                    <form method="POST" action="{{ route('montir.destroy', $row->id) }}" style="display: inline-block;">
                        @method('delete')
                        @csrf
                        <button type="button" class="btn btn-outline-danger" data-toggle="tooltip" title='Hapus' data-konf-delete="{{ $row->kode_montir }}"><i class="fa fa-trash"></i>Hapus</button></button>
                    </form>
                </td>
                <!-- <td class="text">
                    <span class="dropdown">
                        <button class="btn dropdown-toggle align-text-top" data - bs - boundary="viewport" data - bs - toggle="dropdown"> Aksi </button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="{{ route('akun.edit', $row->id) }}">
                                Ubah </a>
                            <a class="dropdown-item" href="{{ route('akun.destroy', $row->id) }}">
                                Hapus </a>
                        </div>
                    </span>
                </td> -->
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="card-footer d-flex align-items-center">
        <p class="m-0 text-secondary"> Showing <span> 1 </span> to <span>4</span> of <span> 4 </span> entries</p>
        <ul class="pagination m-0 ms-auto">
            <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1" aria - disabled="true">
                    <!--Download SVG icon from http: //tabler-icons.io/i/chevron-left -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke - width="2" stroke="currentColor" fill="none" stroke - linecap="round" strok - linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M15 6l-6 6l6 6" />
                    </svg>
                    prev
                </a>
            </li>
            <li class="page-item active">
                <a class="page-link" href="#"> 1 </a>
            </li>
            <li class="page-item">
                <a class="page-link" href="#"> 2 </a>
            </li>
            <li class="page-item">
                <a class="page-link" href="#"> 3 </a>
            </li>
            <li class="page-item">
                <a class="page-link" href="#"> 4 </a>
            </li>
            <li class="page-item">
                <a class="page-link" href="#"> 5 </a>
            </li>
            <li class="page-item">
                <a class="page-link" href="#">
                    next <!--Download SVG icon from http: //tabler-icons.io/i/chevron-right -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24 stroke - width=" 2" stroke="currentColor" fill="none" stroke - linecap="round" stroke linejoin="round">
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