@extends('template.main')

@section('container')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">A. Data Peramalan Bulan Berikutnya</h1>
</div>
<div class="col">
    <div class="card-body">
        <h4>Nilai Alpha Saat ini adalah 0,1</h4>
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th> Bulan-Tahun </th>
                        <th> Data Aktual </th>
                        <th> Data Perkiraan </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tampil as $v)
                    <tr>
                        <td>{{ $v->bulan_thn }}</td>
                        <td>{{ $v->d_aktual }}</td>
                        <td>{{ $array_perkiraan[$loop->index]}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <h4 class="alert alert-info">Perkiraan untuk bulan berikutnya adalah {{ $d_perkiraan }}</h4>
        </div>
    </div>
</div>
@endsection