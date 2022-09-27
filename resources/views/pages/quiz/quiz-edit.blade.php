@extends('partials.master') 
@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Quiz {{ $quiz->judul }}</h1>
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
                        <p class="alert alert-warning">Icon, header, dan judul harus diisi.</p>
                        <p class="alert alert-warning">Icon dan header yang diuploadkan harus berupa gambar dan berekstensi .jpg .png .jpeg .gif dan ukuran file maksimal 2 mb.</p>
                        <div class="form-group">
                            <label>Icon/logo Quiz</label>
                            @if($quiz->icon)
                                <img src="{{ asset('storage/quiz/'. $quiz->icon) }}" class="img-icon img-fluid mb-3 d-block" style="max-height: 150px;">
                            @endif
                            <input type="file" class="form-control @error('icon') is-invalid @enderror" name="icon" id="image-icon" onchange="previewIcon()">
                            @error('icon')
                                <div class="invalid-feedback" role="alert">
                                    File icon tidak sesuai ketentuan.
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Header</label>
                            @if($quiz->header)
                                <img src="{{ asset('storage/quiz/'. $quiz->header) }}" class="img-header img-fluid mb-3 d-block" style="max-width: 500px;">
                            @endif
                            <input type="file" class="form-control @error('header') is-invalid @enderror" name="header" id="image-header" onchange="previewHeader()">
                            @error('header')
                                <div class="invalid-feedback" role="alert">
                                    File header tidak sesuai ketentuan.
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Judul Quiz</label>
                            <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" required value="{{ $quiz->judul }}">
                            @error('judul')
                                <div class="invalid-feedback" role="alert">
                                    Input judul minimal 5 karakter.
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

<script>
    function previewIcon() {
        const imageIcon = document.querySelector('#image-icon');
        const imgIcon = document.querySelector('.img-icon');

        imgIcon.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(imageIcon.files[0]);

        oFReader.onload = function(oFREvent) {
            imgIcon.src = oFREvent.target.result;
        }
    }

    function previewHeader() {
        const imageHeader = document.querySelector('#image-header');
        const imgHeader = document.querySelector('.img-header');

        imgHeader.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(imageHeader.files[0]);

        oFReader.onload = function(oFREvent) {
            imgHeader.src = oFREvent.target.result;
        }
    }
    
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@endsection
