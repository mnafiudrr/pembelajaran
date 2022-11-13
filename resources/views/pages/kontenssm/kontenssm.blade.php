@extends('partials.master') 

@section('content')

    <div class="container-fluid">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800 flex-grow-1">Konten Subsubmateri {{ $kontenssm->judul }}</h1>
            <a href="{{ route('subsubmateri.detail', $kontenssm->subsubmateris_id) }}" class="d-none d-sm-inline-block btn btn-lg btn-success shadow-sm mr-2">
                <i class="fas fa-backward fa-sm text-white-50"></i> List Konten Subsubmateri
            </a>
            <a href="edit" class="d-none d-sm-inline-block btn btn-lg btn-warning shadow-sm mr-2">
                <i class="fas fa-edit fa-sm text-white-50"></i> Edit Konten Subsubmateri
            </a>
            <a href="{{ route('kontenssm.delete', $kontenssm->id) }}" class="d-none d-sm-inline-block btn btn-lg btn-danger shadow-sm">
                <i class="fas fa-trash fa-sm text-white-50"></i> Hapus Konten Subsubmateri
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
                            <td>{{ $kontenssm->judul }}</td>
                        </tr>
                        <tr>
                            <td>Photo 1</td>
                            <td>
                                @if($kontenssm->photo1 == null)
                                    Tidak ada.
                                @else
                                    <img src="{{ url($kontenssm->photo1 )}}" style="max-height: 100px;">
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Photo 2</td>
                            <td>
                                @if($kontenssm->photo2 == null)
                                    Tidak ada.
                                @else
                                    <img src="{{ url($kontenssm->photo2 )}}" style="max-height: 100px;">
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Photo 3</td>
                            <td>
                                @if($kontenssm->photo3 == null)
                                    Tidak ada.
                                @else
                                    <img src="{{ url($kontenssm->photo3 )}}" style="max-height: 100px;">
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Paragraf 1</td>
                            <td>{{ $kontenssm->paragraf1 }}</td>
                        </tr>
                        <tr>
                            <td>Paragraf 2</td>
                            <td>
                                @if($kontenssm->paragraf2 == null)
                                    Tidak ada.
                                @else
                                    {{ $kontenssm->paragraf2 }}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Paragraf 3</td>
                            <td>
                                @if($kontenssm->paragraf3 == null)
                                    Tidak ada.
                                @else
                                    {{ $kontenssm->paragraf3 }}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Paragraf 4</td>
                            <td>
                                @if($kontenssm->paragraf4 == null)
                                    Tidak ada.
                                @else
                                    {{ $kontenssm->paragraf4 }}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Judul Document 1</td>
                            <td>
                                @if($kontenssm->juduldoc1 == null)
                                    Tidak ada.
                                @else
                                    {{ $kontenssm->juduldoc1 }}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Document 1</td>
                            <td>
                                @if($kontenssm->doc1 == null)
                                    Tidak ada.
                                @else
                                    <a href="{{ url($kontenssm->doc1 )}}" class="d-none d-sm-inline-block btn btn-lg btn-primary shadow-sm mr-2" target="_blank">
                                        <i class="fas fa-file-pdf fa-sm text-white-50"></i> Lihat file
                                    </a>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Judul Document 2</td>
                            <td>
                                @if($kontenssm->juduldoc2 == null)
                                    Tidak ada.
                                @else
                                    {{ $kontenssm->juduldoc2 }}
                                @endif    
                            </td>
                        </tr>
                        <tr>
                            <td>Document 2</td>
                            <td>
                                @if($kontenssm->doc2 == null)
                                    Tidak ada.
                                @else
                                    <a href="{{ url($kontenssm->doc2 )}}" class="d-none d-sm-inline-block btn btn-lg btn-primary shadow-sm mr-2" target="_blank">
                                        <i class="fas fa-file-pdf fa-sm text-white-50"></i> Lihat file
                                    </a>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Judul Document 3</td>
                            <td>
                                @if($kontenssm->juduldoc3 == null)
                                    Tidak ada.
                                @else
                                    {{ $kontenssm->juduldoc3 }}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Document 3</td>
                            <td>
                                @if($kontenssm->doc3 == null)
                                    Tidak ada.
                                @else
                                    <a href="{{ url($kontenssm->doc3 )}}" class="d-none d-sm-inline-block btn btn-lg btn-primary shadow-sm mr-2" target="_blank">
                                        <i class="fas fa-file-pdf fa-sm text-white-50"></i> Lihat file
                                    </a>
                                @endif
                            </td>    
                        </tr>
                    </table>
                </div>
            </div>
        </div>

    </div>

@endsection