@extends('partials.master') 

@section('content')

    <div class="container-fluid">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800 flex-grow-1">Submateri {{ $submateri->judul }}</h1>
            <a href="{{ route('materi.detail', $submateri->materis_id) }}" class="d-none d-sm-inline-block btn btn-lg btn-success shadow-sm mr-2">
                <i class="fas fa-backward fa-sm text-white-50"></i> List Submateri
            </a>
            <a href="edit" class="d-none d-sm-inline-block btn btn-lg btn-warning shadow-sm mr-2">
                <i class="fas fa-edit fa-sm text-white-50"></i> Edit Submateri
            </a>
            <a href="{{ route('submateri.delete', $submateri->id) }}" class="d-none d-sm-inline-block btn btn-lg btn-danger shadow-sm">
                <i class="fas fa-trash fa-sm text-white-50"></i> Hapus Submateri
            </a>
        </div>

        @if(session('edit'))
            <div class="alert alert-warning" role="alert">
                {{ session('edit') }}
            </div>
        @endif

        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                            <td>Judul</td>
                            <td>{{ $submateri->judul }}</td>
                        </tr>
                        <tr>
                            <td>Photo</td>
                            <td>
                                <img src="{{ url($submateri->photo )}}" style="max-height: 100px;">
                            </td>
                        </tr>
                        <tr>
                            <td>Paragraf 1</td>
                            <td>{{ $submateri->paragraf1 }}</td>
                        </tr>
                        <tr>
                            <td>Paragraf 2</td>
                            <td>
                                @if($submateri->paragraf2 == null)
                                    Tidak ada.
                                @else
                                    {{ $submateri->paragraf2 }}
                                @endif 
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">List subsubmateri</h1>
            <a href="/subsubmateri/create?submateriId={{$submateri->id}}" class="d-none d-sm-inline-block btn btn-lg btn-primary shadow-sm">
                <i class="fas fa-plus fa-lg text-white-50"></i> Tambah Subsubmateri
            </a>
        </div>

        @if(session('sukses-subsub'))
            <div class="alert alert-success" role="alert">
                {{ session('sukses-subsub') }}
            </div>
        @elseif(session('hapus-subsub'))
            <div class="alert alert-danger" role="alert">
                {{ session('hapus-subsub') }}
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
                            @foreach($subsubmateri as $subsubmateri)
                                <tr>
                                    <td>
                                        {{$subsubmateri->judul}}
                                    </td>
                                    <td>
                                        {{$subsubmateri->created_at}}
                                    </td>
                                    <td>
                                        <a href="{{ route('subsubmateri.detail', $subsubmateri->id) }}" class="d-none d-sm-inline-block shadow-sm btn-success btn-lg"><i class="fas fa-info-circle fa-sm text-white-50"> Detail</a>
                                        <a href="{{ route('subsubmateri.delete', $subsubmateri->id) }}" class="d-none d-sm-inline-block shadow-sm btn-danger btn-lg"><i class="fas fa-trash fa-sm text-white-50"> Hapus</a>
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