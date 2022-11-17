@extends('template.main')

@section('container')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Ubah Data Penjualan</h1>
</div>
<div class="col">
    <form action="/penjualan" method="post">
        @csrf
        <div class="row">
            <div class="form-group col">
                <label for="bulan">Bulan</label>
                <select name="bulan" class="form-control">
                    <?php
                    $bulan = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
                    $jlh_bln = count($bulan);
                    for ($c = 0; $c < $jlh_bln; $c += 1) {
                        if ($bulan[$c] != $penjualan['bulan']) {
                            echo "<option value=$bulan[$c]> $bulan[$c] </option>";
                        }else{
                            echo "<option value=$bulan[$c] selected='true'> $bulan[$c] </option>";
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="form-group col">
                <label for="tahun">Tahun</label>
                <select name='tahun' class='form-control'>
                    <?php
                    $now = date("Y");
                    for ($a = 2010; $a <= $now; $a++) {
                        if ($a != $penjualan['tahun']) {
                            echo "<option value='$a'>$a</option>";
                        }else{
                            echo "<option value='$a' selected='true'>$a</option>";
                        }
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="d_aktual">Data Aktual</label>
            <input class="form-control" type="text" name="d_aktual" value="{{$penjualan['data']['d_aktual']}}">
        </div>
        <div style="display: flex;">
            <div style="margin-top:20px;">
                <input class="btn btn-primary" type="submit" name="submit" value="Simpan">
            </div>
            <div style="margin: 20px 0px 0px 20px;">
                <a class="btn btn-danger" href="">Batal</a>
            </div>
        </div>
    </form>
</div>
@endsection