@extends('template.main')

@section('container')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Penggunaan Obat</h1>
</div>
<a class="btn btn-primary" href="/penjualan/tambah" role="button">Tambah Data</a>
<div class="row">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th> No </th>
                        <th> Bulan Tahun </th>
                        <th> Data Aktual </th>
                        <th> Aksi </th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @foreach($penjualan as $row)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $row->bulan_thn }}</td>
                        <td>{{ $row->d_aktual }}</td>
                        <td>
                            <form action="{{ route('penjualan.destroy', ['penjualan' =>  $row->id ]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a href="/penjualan/{{ $row->id}}/edit" class="btn btn-sm btn-warning">
                                    <i class="fa fa-edit"></i></a>
                                <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>
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