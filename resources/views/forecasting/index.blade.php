@extends('template.main')

@section('container')
    <script language="JavaScript">
        var tgl = new Date();
        var tahun = tgl.getFullYear() + 1;
        tanggallengkap = tahun;
    </script>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Table Peramalan Obat Bulan
            <?php
            $bln = date('m');
            $nbln = '';
            if ($bln == '01') {
                $nbln = 'Februari';
            } elseif ($bln == '02') {
                $nbln = 'Maret';
            } elseif ($bln == '03') {
                $nbln = 'April';
            } elseif ($bln == '04') {
                $nbln = 'Mei';
            } elseif ($bln == '05') {
                $nbln = 'Juni';
            } elseif ($bln == '06') {
                $nbln = 'Juli';
            } elseif ($bln == '07') {
                $nbln = 'Agustus';
            } elseif ($bln == '08') {
                $nbln = 'September';
            } elseif ($bln == '09') {
                $nbln = 'Oktober';
            } elseif ($bln == '10') {
                $nbln = 'November';
            } elseif ($bln == '11') {
                $nbln = 'Desember';
            } elseif ($bln == '12') {
                $nbln = 'Januari';
            }
            echo $nbln;
            ?>
            @if (date('m') == 12)
                <script language='JavaScript'>
                    document.write(tanggallengkap);
                </script>
            @else
                {{ date('Y') }}
            @endif
        </h1>
    </div>
    <div class="col">
        <div class="card-body">
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
            <div class="table-responsive">
                <div class="col-7">
                    <table class="table table-striped table-hover table-bordered">
                        <thead>
                            <tr>
                                <th> Kode Obat </th>
                                <th> Nama Obat </th>
                                <th> Jenis Satuan </th>
                                <th> Forecasting </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tampil as $v)
                                <tr>
                                    <td>{{ $v['kd_obat'] }}</td>
                                    <td>{{ $v['nama_obat'] }}</td>
                                    <td>{{ $v['jenis_satuan'] }}</td>
                                    <td>{{ $v['forecasting'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="text-right">
                        <a class="btn btn-primary" href="/forecasting/cetak">Cetak Data</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
