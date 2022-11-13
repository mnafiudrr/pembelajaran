@extends('partials.master') 

@section('content')

    <div class="container-fluid">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800 flex-grow-1">Subsubmateri {{ $subsubmateri->judul }}</h1>
            <a href="{{ route('submateri.detail', $subsubmateri->submateris_id) }}" class="d-none d-sm-inline-block btn btn-lg btn-success shadow-sm mr-2">
                <i class="fas fa-backward fa-sm text-white-50"></i> List Subsubmateri
            </a>
            <a href="edit" class="d-none d-sm-inline-block btn btn-lg btn-warning shadow-sm mr-2">
                <i class="fas fa-edit fa-sm text-white-50"></i> Edit Subsubmateri
            </a>
            <a href="{{ route('subsubmateri.delete', $subsubmateri->id) }}" class="d-none d-sm-inline-block btn btn-lg btn-danger shadow-sm">
                <i class="fas fa-trash fa-sm text-white-50"></i> Hapus Subsubmateri
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
                                <img src="{{ url($subsubmateri->icon )}}" style="max-height: 100px;">
                            </td>
                        </tr>
                        <tr>
                            <td>Header</td>
                            <td>
                                <img src="{{ url($subsubmateri->header )}}" style="max-height: 100px;">
                            </td>
                        </tr>
                            <td>Judul</td>
                            <td>{{ $subsubmateri->judul }}</td>
                        </tr>
                        <tr>
                            <td>Photo 1</td>
                            <td>
                                <img src="{{ url($subsubmateri->photo1 )}}" style="max-height: 100px;">
                            </td>
                        </tr>
                        <tr>
                            <td>Paragraf 1</td>
                            <td>{{ $subsubmateri->paragraf1 }}</td>
                        </tr>
                        <tr>
                            <td>Paragraf 2</td>
                            <td>
                                @if($subsubmateri->paragraf2 == null)
                                    Tidak ada.
                                @else
                                    {{ $subsubmateri->paragraf2 }}
                                @endif 
                            </td>
                        </tr>
                        <tr>
                            <td>Paragraf 3</td>
                            <td>
                                @if($subsubmateri->paragraf3 == null)
                                    Tidak ada.
                                @else
                                    {{ $subsubmateri->paragraf3 }}
                                @endif 
                            </td>
                        </tr>
                        <tr>
                            <td>Paragraf 4</td>
                            <td>
                                @if($subsubmateri->paragraf4 == null)
                                    Tidak ada.
                                @else
                                    {{ $subsubmateri->paragraf4 }}
                                @endif 
                            </td>
                        </tr>
                        <tr>
                            <td>Photo 2</td>
                            <td>
                                <img src="{{ url($subsubmateri->photo2 )}}" style="max-height: 100px;">
                            </td>
                        </tr>
                        <tr>
                            <td>Paragraf 5</td>
                            <td>{{ $subsubmateri->paragraf5 }}</td>
                        </tr>
                        <tr>
                            <td>Paragraf 6</td>
                            <td>
                                @if($subsubmateri->paragraf6 == null)
                                    Tidak ada.
                                @else
                                    {{ $subsubmateri->paragraf6 }}
                                @endif 
                            </td>
                        </tr>
                        <tr>
                            <td>Paragraf 7</td>
                            <td>
                                @if($subsubmateri->paragraf7 == null)
                                    Tidak ada.
                                @else
                                    {{ $subsubmateri->paragraf7 }}
                                @endif 
                            </td>
                        </tr>
                        <tr>
                            <td>Paragraf 8</td>
                            <td>
                                @if($subsubmateri->paragraf8 == null)
                                    Tidak ada.
                                @else
                                    {{ $subsubmateri->paragraf8 }}
                                @endif 
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">List kontensubsubmateri</h1>
            <a href="/kontenssm/create?subsubmateriId={{$subsubmateri->id}}" class="d-none d-sm-inline-block btn btn-lg btn-primary shadow-sm">
                <i class="fas fa-plus fa-lg text-white-50"></i> Tambah Kontenssm
            </a>
        </div>

        @if(session('sukses-kontenssm'))
            <div class="alert alert-success" role="alert">
                {{ session('sukses-kontenssm') }}
            </div>
        @elseif(session('hapus-kontenssm'))
            <div class="alert alert-danger" role="alert">
                {{ session('hapus-kontenssm') }}
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
                            @foreach($kontenssm as $kontenssm)
                                <tr>
                                    <td>
                                        {{$kontenssm->judul}}
                                    </td>
                                    <td>
                                        {{$kontenssm->created_at}}
                                    </td>
                                    <td>
                                        <a href="{{ route('kontenssm.detail', $kontenssm->id) }}" class="d-none d-sm-inline-block shadow-sm btn-success btn-lg"><i class="fas fa-info-circle fa-sm text-white-50"> Detail</a>
                                        <a href="{{ route('kontenssm.delete', $kontenssm->id) }}" class="d-none d-sm-inline-block shadow-sm btn-danger btn-lg"><i class="fas fa-trash fa-sm text-white-50"> Hapus</a>
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