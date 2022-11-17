@extends('template.main')

@section('container')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Ubah Data Obat</h1>
    </div>
    <div class="col">
        <form action="/obat/{{ $obat->id }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group col-5">
                <label for="kd_obat">Kode Obat</label>
                <input class="form-control" type="text" name="kd_obat" value="{{ $obat->kd_obat }}">
            </div>
            <div class="form-group col-5">
                <label for="nama_obat">Nama Obat</label>
                <input class="form-control" type="text" name="nama_obat" value="{{ $obat->nama_obat }}">
            </div>
            <div class="form-group col-5">
                <label for="jenis_satuan">Jenis Satuan</label>
                <select class="form-control" name="jenis_satuan" id="cars" value="{{ $obat->jenis_satuan }}">
                    <option value="Tablet">Tablet</option>
                    <option value="Kapsul">Kapsul</option>
                    <option value="Ampul">Ampul</option>
                    <option value="Botol">Botol</option>
                    <option value="Tube">Tube</option>
                    <option value="Pot">Pot</option>
                    <option value="Vial">Vial</option>
                </select>
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
