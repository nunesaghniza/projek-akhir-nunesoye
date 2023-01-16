@extends('template.main')
<link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}">

@section('container')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data User</h1>
    </div>
    <a class="btn btn-primary" href="/user/create" role="button">Tambah User</a>
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
            <div class="card-body">
                <div class="table-responsive">
                    <table id="DataTable" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th> Username </th>
                                <th> Password </th>
                                <th> Aksi </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no = 1; @endphp
                            @foreach ($users as $row)
                                <tr>
                                    <td>{{ $row->username }}</td>
                                    <td>{{ $row->password }}</td>
                                    <td>
                                        <form action="/user/{{ $row->id }}", method="post" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <a href="/user/{{ $row->id }}/edit" class="btn btn-sm btn-primary">
                                                <i class="fa fa-edit"></i></a>
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                onclick="return confirm('Apa yakin akan menghapus data user ?')"><i
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
