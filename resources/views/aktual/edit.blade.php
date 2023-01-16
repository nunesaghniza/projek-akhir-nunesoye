@extends('template.main')

@section('container')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Ubah Data Aktual {{ $aktual->kd_obat  }} - {{ $obat->nama_obat }}</h1>
    </div>
    <div class="col">
        <form action="/obat/{{ $aktual->kd_obat }}/aktual/{{ $aktual->id }}" method="POST">
            @method('put')
            @csrf
            <div class="container">
                <div class="form-group row">
                    <div class="col-2">
                        <label for="bulan">Bulan</label>
                    </div>
                    <div class="col-6">
                        <select name="bulan" class="form-control">
                            <option selected="selected">Bulan</option>
                            <?php
                            $listbulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                            $jlh_bln = count($listbulan);
                            for ($c = 0; $c < $jlh_bln; $c += 1) {
                                echo '<option ' . ($bulan == $listbulan[$c] ? 'Selected' : '') . " value=$listbulan[$c]> $listbulan[$c] </option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-2">
                        <label for="tahun">Tahun</label>
                    </div>
                    <div class="col-6">
                        <?php
                        $now = date('Y');
                        echo "<select name='tahun' class='form-control'>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                						<option>Tahun</option>";
                        for ($a = 2018; $a <= $now; $a++) {
                            echo '<option ' . ($tahun == $a ? 'Selected' : '') . " value='$a'>$a</option>";
                        }
                        echo '</select>';
                        ?>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-2">
                        <label for="d_aktual">Data Aktual</label>
                    </div>
                    <div class="col-6">
                        <input class="form-control @error('d_aktual') is-invalid @enderror" type="text" name="d_aktual"
                            value="{{ old('d_aktual', $aktual->d_aktual) }}">
                        @error('d_aktual')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-2">
                    </div>
                    <div class="col-6">
                        <input type="hidden" name="kd_obat" id="kd_obat" value="{{ $aktual->kd_obat }}">
                        <input type="hidden" name="id" id="id" value="{{ $aktual->id }}">
                    </div>
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
        </form>
    </div>
@endsection
