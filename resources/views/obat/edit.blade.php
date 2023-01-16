@extends('template.main')

@section('container')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Ubah Data Obat</h1>
    </div>
    <div class="col">
        <form action="/obat/{{ $obat->kd_obat }}" method="post">
            @method('put')
            @csrf
            <div class="container">
                <div class="form-group row">
                    <div class="col-2">
                        <label for="kd_obat">Kode Obat</label>
                    </div>
                    <div class="col-6">
                        <input class="form-control @error('kd_obat') is-invalid @enderror" type="text" name="kd_obat"
                            value="{{ old('kd_obat', $obat->kd_obat) }}" disabled>
                        @error('kd_obat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-2">
                        <label for="nama_obat">Nama Obat</label>
                    </div>
                    <div class="col-6">
                        <input class="form-control @error('nama_obat') is-invalid @enderror" type="text" name="nama_obat"
                            value="{{ old('nama_obat', $obat->nama_obat) }}">
                        @error('nama_obat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-2">
                        <label for="jenis_satuan">Jenis Satuan</label>
                    </div>
                    <div class="col-6">
                        <select class="form-control  @error('jenis_satuan') is-invalid @enderror"
                            value="{{ old('jenis_satuan', $obat->jenis_satuan) }}" name="jenis_satuan" id="jenis_satuan">
                            <option value="Tablet" {{ $obat->jenis_satuan === 'Tablet' ? 'Selected' : '' }}>Tablet</option>
                            <option value="Kapsul" {{ $obat->jenis_satuan === 'Kapsul' ? 'Selected' : '' }}>Kapsul</option>
                            <option value="Ampul" {{ $obat->jenis_satuan === 'Ampul' ? 'Selected' : '' }}>Ampul</option>
                            <option value="Botol" {{ $obat->jenis_satuan === 'Botol' ? 'Selected' : '' }}>Botol</option>
                            <option value="Tube" {{ $obat->jenis_satuan === 'Tube' ? 'Selected' : '' }}>Tube</option>
                            <option value="Pot" {{ $obat->jenis_satuan === 'Pot' ? 'Selected' : '' }}>Pot</option>
                            <option value="Vial" {{ $obat->jenis_satuan === 'Vial' ? 'Selected' : '' }}>Vial</option>
                        </select>
                        @error('jenis_satuan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="container">
                    <div class="col-8">
                        <div class="text-right">
                            <input class="btn btn-success" type="submit" name="submit" value="Update">
                            <a class="btn btn-danger" href="{{ url()->previous() }}">Batal</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
