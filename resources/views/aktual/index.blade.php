@extends('template.main')

@section('container')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Lihat Data Aktual {{ $obat->kd_obat }} - {{ $obat->nama_obat }}</h1>
        <a class="btn btn-warning" href="/obat">Kembali</a>
    </div>
    <div class="col">
        <a class="btn btn-primary" href="/obat/{{ $obat->kd_obat }}/aktual/create" role="button">Tambah Data</a>
    </div>
    <div class="row">
        <div class="card-body">
            <div class="section-body">
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible show fade">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                                <span>×</span>
                            </button>
                            {{ session('success') }}
                        </div>
                    </div>
                @endif
                @if (session()->has('gagal'))
                    <div class="alert alert-danger alert-dismissible show fade">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                                <span>×</span>
                            </button>
                            {{ session('gagal') }}
                        </div>
                    </div>
                @endif
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th> No </th>
                            <th> Bulan - Tahun </th>
                            <th> Data Aktual </th>
                            <th> User </th>
                            <th> Aksi </th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 1; @endphp
                        @foreach ($aktual as $row)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $row->bln_thn }}</td>
                                <td>{{ $row->d_aktual }}</td>
                                <td>{{ $row->username }}</td>
                                <td>
                                    <form action="/obat/{{ $obat->kd_obat }}/aktual/{{ $row->id }}", class="d-inline"
                                        method="POST">
                                        @method('delete')
                                        @csrf
                                        <a href="/obat/{{ $obat->kd_obat }}/aktual/{{ $row->id }}/edit"
                                            class="btn btn-sm btn-primary">
                                            <i class="fa fa-edit"></i></a>
                                        <input type="hidden" name="id" id="id" value="{{ $obat->id }}">
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Apa yakin akan menghapus data obat ?')"><i
                                                class="fas fa-trash-alt"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
