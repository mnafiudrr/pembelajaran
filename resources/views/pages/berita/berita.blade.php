@extends('partials.master') 

@section('content')

    <div class="container-fluid">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800 flex-grow-1">Berita {{ $berita->judul }}</h1>
            <a href="/berita" class="d-none d-sm-inline-block btn btn-lg btn-success shadow-sm mr-2">
                <i class="fas fa-backward fa-sm text-white-50"></i> List Berita
            </a>
            <a href="edit" class="d-none d-sm-inline-block btn btn-lg btn-warning shadow-sm mr-2">
                <i class="fas fa-edit fa-sm text-white-50"></i> Edit Berita
            </a>
            <a href="{{ route('berita.delete', $berita->id) }}" class="d-none d-sm-inline-block btn btn-lg btn-danger shadow-sm">
                <i class="fas fa-trash fa-sm text-white-50"></i> Hapus Berita
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
                            <td>Judul</td>
                            <td>{{ $berita->judul }}</td>
                        </tr>
                        <tr>
                            <td>Photo 1</td>
                            <td>
                                @if($berita->photo1 == null)
                                    Tidak ada.
                                @else
                                    <img src="{{ asset('storage/berita/'. $berita->photo1)}}" style="max-height: 100px;">
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Photo 2</td>
                            <td>
                                @if($berita->photo2 == null)
                                    Tidak ada.
                                @else
                                    <img src="{{ asset('storage/berita/'. $berita->photo2)}}" style="max-height: 100px;">
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Photo 3</td>
                            <td>
                                @if($berita->photo3 == null)
                                    Tidak ada.
                                @else
                                    <img src="{{ asset('storage/berita/'. $berita->photo3)}}" style="max-height: 100px;">
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Paragraf 1</td>
                            <td>{{ $berita->paragraf1 }}</td>
                        </tr>
                        <tr>
                            <td>Paragraf 2</td>
                            <td>
                                @if($berita->paragraf2 == null)
                                    Tidak ada.
                                @else
                                    {{ $berita->paragraf2 }}
                                @endif 
                            </td>
                        </tr>
                        <tr>
                            <td>Paragraf 3</td>
                            <td>
                                @if($berita->paragraf3 == null)
                                    Tidak ada.
                                @else
                                    {{ $berita->paragraf3 }}
                                @endif 
                            </td>
                        </tr>
                        <tr>
                            <td>Paragraf 4</td>
                            <td>
                                @if($berita->paragraf4 == null)
                                    Tidak ada.
                                @else
                                    {{ $berita->paragraf4 }}
                                @endif 
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

    </div>

@endsection