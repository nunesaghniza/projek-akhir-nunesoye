@extends('template.main')

@section('container')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Data User</h1>
    </div>

    <div class="col">
        <form action="/user" method="post">
            @csrf
            <div class="container">
                <div class="form-group row">
                    <div class="col-2">
                        <label for="username">Username</label>
                    </div>
                    <div class="col-6">
                        <input id="username" type="text"
                        class="form-control rounded-top @error('username') is-invalid @enderror"
                        name="username" value="{{ old('username') }}" required>
                    @error('username')
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
                        <label for="password">Password</label>
                    </div>
                    <div class="col-6">
                        <input id="password" type="password"
                            class="form-control pwstrength  rounded-top @error('password') is-invalid @enderror"
                            data-indicator="pwindicator" name="password" required>
                        <div id="pwindicator" class="pwindicator">
                            <div class="bar"></div>
                            <div class="label"></div>
                        </div>
                        @error('password')
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
