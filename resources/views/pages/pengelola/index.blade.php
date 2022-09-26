@extends('partials.master') 

@section('content')

    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">List Pengelola</h1>
            <a href="/pengelola/create" class="d-none d-sm-inline-block btn btn-lg btn-primary shadow-sm">
                <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Pengelola
            </a>
        </div>

        @if(session('sukses'))
            <div class="alert alert-success" role="alert">
                {{ session('sukses') }}
            </div>
        @elseif(session('hapus'))
            <div class="alert alert-danger" role="alert">
                {{ session('hapus') }}
            </div>
        @endif

        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Dibuat pada</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data_pengelola as $pengelola)
                                <tr>
                                    <td>
                                        {{$pengelola->name}}
                                    </td>
                                    <td>
                                        {{$pengelola->username}}
                                    </td>
                                    <td>
                                        {{$pengelola->created_at}}
                                    </td>
                                    <td>
                                        <a href="{{ route('pengelola.delete', $pengelola->id) }}" class="d-none d-sm-inline-block shadow-sm btn-danger btn-sm">Hapus</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection