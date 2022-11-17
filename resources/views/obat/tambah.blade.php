@extends('template.main')

@section('container')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tambah Data Obat</h1>
</div>

<div class="col">
    <form action="/obat" method="post">
        @csrf
        <div class="container">
            <div class="form-group row">
                <div class="col-2">
                    <label for="kd_obat">Kode Obat</label>
                </div>
                <div class="col-6">
                    <input class="form-control" type="text" name="kd_obat">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="form-group row">
                <div class="col-2">
                    <label for="nama_obat">Nama Obat</label>
                </div>
                <div class="col-6">
                    <input class="form-control" type="text" name="nama_obat">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="form-group row">
                <div class="col-2">
                    <label for="jenis_satuan">Jenis Satuan</label>
                </div>
                <div class="col-6">
                    <select class="form-control" name="jenis_satuan" id="cars">
                        <option value="Tablet">Tablet</option>
                        <option value="Kapsul">Kapsul</option>
                        <option value="Ampul">Ampul</option>
                        <option value="Botol">Botol</option>
                        <option value="Tube">Tube</option>
                        <option value="Pot">Pot</option>
                        <option value="Vial">Vial</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="form-group row">
                <input class="btn btn-primary" type="submit" name="submit" value="Simpan">
                <a class="btn btn-danger" href="">Batal</a>
            </div>
        </div>
</div>

</form>
</div>
</div>
@endsection