@extends('partials.master') 
@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Soal</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-lg btn-success shadow-sm mr-2" onclick="history.back()">
            <i class="fas fa-backward fa-sm text-white-50"></i> Detail Quiz
        </a>
    </div>
    <div class="row">
        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <form action="update" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label>Soal</label>
                            <textarea class="form-control " name="soal" rows="5" required>{{ $soal->soal }}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Jawaban 1</label>
                            <textarea class="form-control" name="jawaban1" rows="5" required>{{ $soal->jawaban1 }}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Jawaban 2</label>
                            <textarea class="form-control" name="jawaban2" rows="5" required>{{ $soal->jawaban2 }}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Jawaban 3</label>
                            <textarea class="form-control" name="jawaban3" rows="5" required>{{ $soal->jawaban3 }}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Jawaban 4</label>
                            <textarea class="form-control" name="jawaban4" rows="5" required>{{ $soal->jawaban4 }}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Jawaban 5</label>
                            <textarea class="form-control" name="jawaban5" rows="5" required>{{ $soal->jawaban5 }}</textarea>
                        </div>

                        <p class="alert alert-warning">Isikan kolom input kunci jawaban dengan angka 1 - 5 sesuai dengan kunci jawaban yang sudah ditentukan, contohnya jika jawaban soal yang sedang diinputkan adalah jawaban 1 maka isi di kolom input kunci jawaban dengan angka "1" dsb.</p>
                        <div class="form-group">
                            <label>Kunci Jawaban</label>
                            <input type="text" class="form-control @error('jawaban') is-invalid @enderror" name="jawaban" required value="{{ $soal->jawaban }}">
                            @error('jawaban')
                            <div class="invalid-feedback">
                                Input kunci jawaban harus berupa angka 1 - 5.
                            </div>
                            @enderror
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@endsection
