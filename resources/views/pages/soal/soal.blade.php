@extends('partials.master') 

@section('content')

    <div class="container-fluid">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800 flex-grow-1">Soal</h1>
            <a href="{{ route('quiz.detail', $soal->quizzes_id) }}" class="d-none d-sm-inline-block btn btn-lg btn-success shadow-sm mr-2">
                <i class="fas fa-backward fa-sm text-white-50"></i> List Soal
            </a>
            <a href="edit" class="d-none d-sm-inline-block btn btn-lg btn-warning shadow-sm mr-2">
                <i class="fas fa-edit fa-sm text-white-50"></i> Edit Soal
            </a>
            <a href="{{ route('soal.delete', $soal->id) }}" class="d-none d-sm-inline-block btn btn-lg btn-danger shadow-sm">
                <i class="fas fa-trash fa-sm text-white-50"></i> Hapus Soal
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
                            <td>Soal</td>
                            <td>{{ $soal->soal }}</td>
                        </tr>
                        <tr>
                            <td>Jawaban 1</td>
                            <td>{{ $soal->jawaban1 }}</td>
                        </tr>
                        <tr>
                            <td>Jawaban 2</td>
                            <td>{{ $soal->jawaban2 }}</td>
                        </tr>
                        <tr>
                            <td>Jawaban 3</td>
                            <td>{{ $soal->jawaban3 }}</td>
                        </tr>
                        <tr>
                            <td>Jawaban 4</td>
                            <td>{{ $soal->jawaban4 }}</td>
                        </tr>
                        <tr>
                            <td>Jawaban 5</td>
                            <td>{{ $soal->jawaban5 }}</td>
                        </tr>
                        <tr>
                            <td>Kunci Jawaban</td>
                            <td>{{ $soal->jawaban }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

    </div>

@endsection