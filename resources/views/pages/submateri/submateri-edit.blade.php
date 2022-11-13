@extends('partials.master') 
@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit submateri {{ $submateri->judul }}</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-lg btn-success shadow-sm mr-2" onclick="history.back()">
            <i class="fas fa-backward fa-sm text-white-50"></i> Detail Submateri
        </a>
    </div>
    <div class="row">
        <div class="col-8">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <form action="update" method="POST" enctype="multipart/form-data">
                        @csrf
                        <p class="alert alert-warning">Judul, photo, dan paragraf 1 harus diisi.</p>
                        <p class="alert alert-warning">Photo yang diuploadkan harus berupa gambar dan berekstensi .jpg .png .jpeg .gif dan ukuran file maksimal 2 mb.</p>
                        
                        <div class="form-group">
                            <label>Judul Submateri</label>
                            <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" required value="{{ $submateri->judul }}">
                            @error('judul')
                                <div class="invalid-feedback" role="alert">
                                    Input judul minimal 5 karakter.
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Photo</label>
                            @if($submateri->photo)
                                <img src="{{ url($submateri->photo )}}" class="img-photo img-fluid mb-3 d-block" style="max-width: 500px;">
                            @endif
                            <input type="file" accept="image/*" class="form-control @error('photo') is-invalid @enderror" name="photo" id="image-photo" onchange="previewPhoto()">
                            @error('photo')
                                <div class="invalid-feedback" role="alert">
                                    File photo tidak sesuai ketentuan.
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Paragraf 1</label>
                            <textarea class="form-control " name="paragraf1" rows="7" required>{{ $submateri->paragraf1 }}</textarea>
                        </div>

                        <p class="alert alert-warning">Untuk Paragraf 2 boleh dikosongkan dan disii sesuai kebutuhan.</p>
                        <div class="form-group">
                            <label>Paragraf 2</label>
                            <textarea class="form-control" name="paragraf2" rows="7" >{{ $submateri->paragraf2 }}</textarea>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    
        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <h5>Panduan pengisian materi</h5>
                    <img src="{{ asset('keperluan/panduan-materi.png') }}" alt="" style="max-width: 480px">
                </div>
            </div>
        </div>
    </div>

    
</div>

<script>

    function previewPhoto() {
        const imagePhoto = document.querySelector('#image-photo');
        const imgPhoto = document.querySelector('.img-photo');

        imgPhoto.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(imagePhoto.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPhoto.src = oFREvent.target.result;
        }
    }
    
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@endsection
