@extends('template.main')

@section('container')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Obat</h1>
</div>
<a class="btn btn-primary" href="/obat/create" role="button">Tambah Data</a>
<div class="row">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th> No </th>
                        <th> Kode Obat </th>
                        <th> Nama Obat </th>
                        <th> Jenis Satuan </th>
                        <th> Aksi </th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @foreach($obat as $row)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $row->kd_obat }}</td>
                        <td>{{ $row->nama_obat }}</td>
                        <td>{{ $row->jenis_satuan }}</td>
                        <td>
                            <form action="{{ route('obat.destroy', ['obat' =>  $row->id ]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a href="/obat/{{ $row->id}}/edit" class="btn btn-sm btn-primary">
                                    <i class="fa fa-edit"></i></a>
                                <a href="/obat/{{ $row->id }}/aktual" class="btn btn-sm btn-success">
                                <i class="fas fa-eye"></i></a>
                                <a href="/obat/{{ $row->id}}/forecasting" class="btn btn-sm btn-warning">
                                    Forecasting</a>
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