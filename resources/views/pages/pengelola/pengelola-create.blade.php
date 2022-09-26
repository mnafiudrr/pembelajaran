@extends('partials.master') 
@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Pengelola</h1>
    </div>

    <div class="col-md-6 offset-3">
        <div class="card shadow mb-4">
            <div class="card-body">
                <form
                    action="/pengelola"
                    method="POST"
                    enctype="multipart/form-data"
                >
                    @csrf
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input
                            type="text"
                            name="name"
                            class="form-control @error('name') is-invalid @enderror"
                            id="name"
                            placeholder="Masukkan Nama Pengelola"
                            value="{{ old('name') }}"
                            required
                        />
                        @error('name')
                            <div class="invalid-feedback">
                                Nama tidak sesuai ketentuan
                            </div>
                        @enderror
                    </div>

                    <p class="alert alert-warning">Isikan nama minimal 6 karakter dan 1 suku kata / lebih, contoh : "Admin1" / "Pengelola Budi"</p>

                    <div class="form-group">
                        <label for="username">Username</label>
                        <input
                            type="text"
                            class="form-control @error('username') is-invalid @enderror"
                            name="username"
                            id="username"
                            placeholder="Masukkan Username Pengelola"
                            value="{{ old('username') }}"
                            required
                        />
                        @error('username')
                            <div class="invalid-feedback">
                                Username tidak sesuai ketentuan.
                            </div>
                        @enderror
                    </div>

                    <p class="alert alert-warning">Isikan username minimal 6 karakter, tidak boleh sama dengan username yang sudah ada pada list pengelola, 1 suku kata saja, contoh "admin1" / "pengelolabudi"</p>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input
                            type="password"
                            class="form-control @error('password') is-invalid @enderror"
                            name="password"
                            id="password"
                            placeholder="Masukkan Password"
                            required
                        />
                        @error('password')
                            <div class="invalid-feedback">
                                Password tidak sesuai ketentuan.
                            </div>
                        @enderror
                    </div>

                    <p class="alert alert-warning">Isikan password minimal 8 karakter, disarankan menggunakan kombinasi angka, huruf, dan simbol</p>
                   
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@endsection
