@extends('partials.master') 

@section('content')

    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">List Berita</h1>
            <a href="/berita/create" class="d-none d-sm-inline-block btn btn-lg btn-primary shadow-sm">
                <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Berita
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
                                <th>Judul</th>
                                <th>Dibuat pada</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($berita as $berita)
                                
                                <tr>
                                    <td>
                                        {{$berita->judul}}
                                    </td>
                                    <td>
                                        {{$berita->created_at}}
                                    </td>
                                    <td>
                                        <a href="{{ route('berita.detail', $berita->id) }}" class="d-none d-sm-inline-block shadow-sm btn-success btn-lg"><i class="fas fa-info-circle fa-sm text-white-50"> Detail</a>
                                        <a href="{{ route('berita.delete', $berita->id) }}" class="d-none d-sm-inline-block shadow-sm btn-danger btn-lg"><i class="fas fa-trash fa-sm text-white-50"> Hapus</a>
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