@extends('template.main')

@section('container')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Obat</h1>
    </div>
    <a class="btn btn-primary" href="/obat/create" role="button">Tambah Data</a>
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
                <table id="DataTable" class="table table-striped table-hover table-bordered">
                    <thead>
                        <tr>
                            <th> No </th>
                            <th> Kode Obat </th>
                            <th> Nama Obat </th>
                            <th> Satuan </th>
                            <th> User </th>
                            <th> Aksi </th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 1; @endphp
                        @foreach ($obat as $row)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $row->kd_obat }}</td>
                                <td>{{ $row->nama_obat }}</td>
                                <td>{{ $row->jenis_satuan }}</td>
                                <td>{{ $row->username }}</td>
                                <td>
                                    <form action="/obat/{{ $row->kd_obat }}", method="post" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <a href="/obat/{{ $row->kd_obat }}/edit" class="btn btn-sm btn-primary">
                                            <i class="fa fa-edit"></i></a>
                                        <a href="/obat/{{ $row->kd_obat }}/aktual" class="btn btn-sm btn-success">
                                            <i class="fas fa-eye"></i></a>
                                        <a href="/obat/{{ $row->kd_obat }}/forecasting/show" class="btn btn-sm btn-warning">
                                            Forecasting</a>
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
    @stop
    @section('js')
        <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script type="text/javascript" language="javascript"
            src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" language="javascript"
            src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
    
        <script>
            $(document).ready(function() {
                // $('#DataTable').DataTable();
    
            })
        </script>
    @stop