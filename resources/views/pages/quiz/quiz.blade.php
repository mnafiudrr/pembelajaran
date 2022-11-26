@extends('partials.master') 

@section('content')

    <div class="container-fluid">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800 flex-grow-1">Quiz {{ $quiz->judul }}</h1>
            <a href="/quiz" class="d-none d-sm-inline-block btn btn-lg btn-success shadow-sm mr-2">
                <i class="fas fa-backward fa-sm text-white-50"></i> List Quiz
            </a>
            <a href="edit" class="d-none d-sm-inline-block btn btn-lg btn-warning shadow-sm mr-2">
                <i class="fas fa-edit fa-sm text-white-50"></i> Edit Quiz
            </a>
            <a href="{{ route('quiz.delete', $quiz->id) }}" class="d-none d-sm-inline-block btn btn-lg btn-danger shadow-sm">
                <i class="fas fa-trash fa-sm text-white-50"></i> Hapus Quiz
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
                                <img src="{{ url($quiz->icon)}}" style="max-height: 100px;">
                            </td>
                        </tr>
                        <tr>
                            <td>Header</td>
                            <td>
                                <img src="{{ url($quiz->header)}}" style="max-height: 100px;">
                            </td>
                        </tr>
                        <tr>
                            <td>Judul</td>
                            <td>{{ $quiz->judul }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">List soal</h1>
            <a href="/soal/create?quizId={{$quiz->id}}" class="d-none d-sm-inline-block btn btn-lg btn-primary shadow-sm">
                <i class="fas fa-plus fa-lg text-white-50"></i> Tambah Soal
            </a>
        </div>

        @if(session('sukses-soal'))
            <div class="alert alert-success" role="alert">
                {{ session('sukses-soal') }}
            </div>
        @elseif(session('hapus-soal'))
            <div class="alert alert-danger" role="alert">
                {{ session('hapus-soal') }}
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
                            @foreach($soal as $soal)
                                <tr>
                                    <td style="
                                        white-space: nowrap;
                                            overflow: hidden;
                                            text-overflow: ellipsis;
                                        max-width: 50ch;
                                    ">
                                        {{$soal->soal}}
                                    </td>
                                    <td>
                                        {{$soal->created_at}}
                                    </td>
                                    <td>
                                        <a href="{{ route('soal.detail', $soal->id) }}" class="d-none d-sm-inline-block shadow-sm btn-success btn-lg"><i class="fas fa-info-circle fa-sm text-white-50"> Detail</a>
                                        <a href="{{ route('soal.delete', $soal->id) }}" class="d-none d-sm-inline-block shadow-sm btn-danger btn-lg"><i class="fas fa-trash fa-sm text-white-50"> Hapus</a>
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