@extends('template.main')

@section('container')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Table Peramalan Obat {{ $obat->kd_obat }} - {{ $obat->nama_obat }}</h1>
        <a class="btn btn-warning" href="/obat">Kembali</a>
    </div>
    <div class="col">
        <div class="card-body">
            <div class="table-responsive">
                <div class="col-7">
                    <h4>Nilai Alpha Saat ini adalah 0,1</h4>
                    <table class="table table-striped table-hover table-bordered">
                        <thead>
                            <tr>
                                <th> Bulan-Tahun </th>
                                <th> Data Aktual </th>
                                <th> Forecasting </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tampil as $v)
                                <tr>
                                    <td>{{ $v->bln_thn }}</td>
                                    <td>{{ $v->d_aktual }}</td>
                                    <td>{{ $array_perkiraan[$loop->index] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <h4 class="alert alert-info">Perkiraan untuk bulan selanjutnya yaitu {{ $d_perkiraan }} {{ $obat->jenis_satuan }}</h4>
                </div>
            </div>
        </div>
    </div>
@endsection
