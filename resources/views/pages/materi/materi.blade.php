@extends('partials.master') 

@section('content')

    <div class="container-fluid">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800 flex-grow-1">Materi {{ $materi->judul }}</h1>
            <a href="/materi" class="d-none d-sm-inline-block btn btn-lg btn-success shadow-sm mr-2">
                <i class="fas fa-backward fa-sm text-white-50"></i> List Materi
            </a>
            <a href="edit" class="d-none d-sm-inline-block btn btn-lg btn-warning shadow-sm mr-2">
                <i class="fas fa-edit fa-sm text-white-50"></i> Edit Materi
            </a>
            <a href="{{ route('materi.delete', $materi->id) }}" class="d-none d-sm-inline-block btn btn-lg btn-danger shadow-sm">
                <i class="fas fa-trash fa-sm text-white-50"></i> Hapus Materi
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
                        <tr>
                            <td>Icon/logo</td>
                            <td>
                                <img src="{{ asset('storage/materi/'. $materi->icon)}}" style="max-height: 100px;">
                            </td>
                        </tr>
                        <tr>
                            <td>Header</td>
                            <td>
                                <img src="{{ asset('storage/materi/'. $materi->header)}}" style="max-height: 100px;">
                            </td>
                        </tr>
                        <tr>
                            <td>Judul</td>
                            <td>{{ $materi->judul }}</td>
                        </tr>
                        <tr>
                            <td>Link Preview</td>
                            <td><a href="{{ $materi->link }}" target="_blank">{{ $materi->link }}</a></td>
                        </tr>
                        <tr>
                            <td>Photo</td>
                            <td>
                                <img src="{{ asset('storage/materi/'. $materi->photo)}}" style="max-height: 100px;">
                            </td>
                        </tr>
                        <tr>
                            <td>Paragraf 1</td>
                            <td>{{ $materi->paragraf1 }}</td>
                        </tr>
                        <tr>
                            <td>Paragraf 2</td>
                            <td>
                                @if($materi->paragraf2 == null)
                                    Tidak ada.
                                @else
                                    {{ $materi->paragraf2 }}
                                @endif 
                            </td>
                        </tr>
                        <tr>
                            <td>Paragraf 3</td>
                            <td>
                                @if($materi->paragraf3 == null)
                                    Tidak ada.
                                @else
                                    {{ $materi->paragraf3 }}
                                @endif 
                            </td>
                        </tr>
                        <tr>
                            <td>Paragraf 4</td>
                            <td>
                                @if($materi->paragraf4 == null)
                                    Tidak ada.
                                @else
                                    {{ $materi->paragraf4 }}
                                @endif 
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">List submateri</h1>
            <a href="/submateri/create?materiId={{$materi->id}}" class="d-none d-sm-inline-block btn btn-lg btn-primary shadow-sm">
                <i class="fas fa-plus fa-lg text-white-50"></i> Tambah Submateri
            </a>
        </div>

        @if(session('sukses-sub'))
            <div class="alert alert-success" role="alert">
                {{ session('sukses-sub') }}
            </div>
        @elseif(session('hapus-sub'))
            <div class="alert alert-danger" role="alert">
                {{ session('hapus-sub') }}
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
                            @foreach($submateri as $submateri)
                                <tr>
                                    <td>
                                        {{$submateri->judul}}
                                    </td>
                                    <td>
                                        {{$submateri->created_at}}
                                    </td>
                                    <td>
                                        <a href="{{ route('submateri.detail', $submateri->id) }}" class="d-none d-sm-inline-block shadow-sm btn-success btn-lg"><i class="fas fa-info-circle fa-sm text-white-50"> Detail</a>
                                        <a href="{{ route('submateri.delete', $submateri->id) }}" class="d-none d-sm-inline-block shadow-sm btn-danger btn-lg"><i class="fas fa-trash fa-sm text-white-50"> Hapus</a>
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