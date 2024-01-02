@extends('backend.v_layouts.app')
@section('content')

<div class="card-header">
    <h3 class="card-title">{{$sub}}</h3>
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
        <a href="{{ route('bagkategori.create') }}" title="Tambahkan data baru">
            <button type="button" class="btn btn-outline-primary w-17"> <i class="fa fa-plus"></i> &nbsp;Tambah</button>
        </a>
    </div>
    <table class="table card-table table-vcenter text-nowrap datatable">
        <thead>
            <tr>
                <th> No </th>
                <th> Kategori Servis </th>
                <th> Aksi </th>
            </tr>
        </thead>
        @foreach($bagkategori as $index => $row)
        <tbody>
            <tr>
                <td> {{ $index + 1 }} </td>
                <td> {{ $row -> kategori_servis }} </td>
                <!-- <td> {{ $row -> spesialis }}</td> -->
                <td>
                    <a href="{{ route('bagkategori.edit', $row->id) }}" title="Ubah Data">
                        <span class="btn btn-outline-primary"><i class="fa fa-pencil"></i>Ubah</span>
                    </a>
                    <form method="POST" action="{{ route('bagkategori.destroy', $row->id) }}" style="display: inline-block;">
                        @method('delete')
                        @csrf
                        <button type="button" class="btn btn-outline-danger" data-toggle="tooltip" title='Hapus' data-konf-delete="{{ $row->bagkategori }}"><i class="fa fa-trash"></i>Hapus</button></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="card-footer d-flex align-items-center">
        <p class="m-0 text-secondary"> Showing <span> {{$bagkategori->firstItem()}} </span> to <span> {{$bagkategori->lastItem()}} </span> of <span> {{$bagkategori->total()}} </span> entries</p>
        <ul class="pagination m-0 ms-auto">
            <li class="page-item ">
                <a class="page-link" href=" {{$bagkategori->previousPageUrl()}} " tabindex="-1">
                    <!-- Download SVG icon from http: //tabler-icons.io/i/chevron-left -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M15 6l-6 6l6 6" />
                    </svg>
                    prev
                </a>
            </li>
            @for ($i = 1; $i <= $bagkategori->lastPage(); $i++)
                <li class="page-item @if($bagkategori->currentPage() == $i) active @endif">
                    <a class="page-link" href="{{$bagkategori->url($i)}}"> {{$i}} </a>
                </li>
                @endfor
                <li class="page-item">
                    <a class="page-link" href="{{$bagkategori->nextPageUrl()}}">
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