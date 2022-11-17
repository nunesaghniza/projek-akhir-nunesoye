@extends('template.main')

@section('container')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tambah data Obat</h1>
</div>
<div class="col">
    <form action="/obat/{{$id }}/aktual" method="post">
    @csrf    
    <div class="row">
            <div class="form-group col">
                <label for="bulan">Bulan</label>
                <select name="bulan" class="form-control">
                    <option selected="selected">Bulan</option>
                    <?php
                    $bulan = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
                    $jlh_bln = count($bulan);
                    for ($c = 0; $c < $jlh_bln; $c += 1) {
                        echo "<option value=$bulan[$c]> $bulan[$c] </option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group col">
                <label for="tahun">Tahun</label>
                <?php
                $now = date("Y");
                echo "<select name='tahun' class='form-control'>
						<option>Tahun</option>";
                for ($a = 2010; $a <= $now; $a++) {
                    echo "<option value='$a'>$a</option>";
                }
                echo "</select>";
                ?>
            </div>
        </div>
        <div class="form-group">
            <label for="d_aktual">Data Aktual</label>
            <input class="form-control" type="text" name="d_aktual">
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