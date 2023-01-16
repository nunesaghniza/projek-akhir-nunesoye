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
                        <input class="form-control @error('kd_obat') is-invalid @enderror" value="{{ old('kd_obat') }}"
                            type="text" name="kd_obat" min="3" max="3">
                        @error('kd_obat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="form-group row">
                    <div class="col-2">
                        <label for="nama_obat">Nama Obat</label>
                    </div>
                    <div class="col-6">
                        <input class="form-control @error('nama_obat') is-invalid @enderror" value="{{ old('nama_obat') }}"
                            type="text" name="nama_obat">
                        @error('nama_obat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="form-group row">
                    <div class="col-2">
                        <label for="jenis_satuan">Jenis Satuan</label>
                    </div>
                    <div class="col-6">
                        <select class="form-control @error('jenis_satuan') is-invalid @enderror"
                            value="{{ old('jenis_satuan') }}" name="jenis_satuan" id="jenis_satuan">
                            <option selected>Pilih Satuan</option>
                            <option value="Tablet">Tablet</option>
                            <option value="Kapsul">Kapsul</option>
                            <option value="Ampul">Ampul</option>
                            <option value="Botol">Botol</option>
                            <option value="Tube">Tube</option>
                            <option value="Pot">Pot</option>
                            <option value="Vial">Vial</option>
                        </select>
                        @if ($errors->has('jenis_satuan'))
                            <p class="help-block error">{{ $errors->first('jenis_satuan') }}</p>
                        @endif
                        @error('jenis_satuan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="col-8">
                    <div class="text-right">
                        <input class="btn btn-primary" type="submit" name="submit" value="Simpan">
                        <a class="btn btn-danger" href="{{ url()->previous() }}">Batal</a>
                    </div>
                </div>
            </div>
    </div>
@endsection
