@extends('partials.master') 
@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Berita {{ $berita->judul }}</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-lg btn-success shadow-sm mr-2" onclick="history.back()">
            <i class="fas fa-backward fa-sm text-white-50"></i> Detail Berita
        </a>
    </div>
    <div class="row">
        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <form action="update" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <p class="alert alert-warning">Judul, photo 1, dan paragraf 1 harus diisi.</p>
                        <p class="alert alert-warning">Photo 1, 2, dan 3 yang diuploadkan harus berupa gambar dan berekstensi .jpg .png .jpeg .gif dan ukuran file maksimal 2 mb.</p>
                       
                        <div class="form-group">
                            <label>Judul Berita</label>
                            <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" required value="{{ $berita->judul }}">
                            @error('judul')
                                <div class="invalid-feedback" role="alert">
                                    Input judul minimal 5 karakter.
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Photo 1</label>
                            @if($berita->photo1)
                                <img src="{{ url($berita->photo1)}}" class="img-photo1 img-fluid mb-3 d-block" style="max-width: 500px;">
                            @endif
                            <input type="file" accept="image/*" class="form-control @error('photo1') is-invalid @enderror" name="photo1" id="image-photo1" onchange="previewPhoto1()">
                            @error('photo1')
                                <div class="invalid-feedback" role="alert">
                                    File photo 1 tidak sesuai ketentuan.
                                </div>
                            @enderror
                        </div>

                        <p class="alert alert-warning">Untuk photo 2 dan 3 boleh dikosongkan dan disii sesuai kebutuhan.</p>
                        <div class="form-group">
                            <label>Photo 2</label>
                            @if($berita->photo2)
                                <img src="{{ url($berita->photo2)}}" class="img-photo2 img-fluid mb-3 d-block" style="max-width: 500px;">
                            @endif
                            <input type="file" accept="image/*" class="form-control @error('photo2') is-invalid @enderror" name="photo2" id="image-photo2" onchange="previewPhoto2()">
                            @error('photo2')
                                <div class="invalid-feedback" role="alert">
                                    File photo 2 tidak sesuai ketentuan.
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Photo 3</label>
                            @if($berita->photo3)
                                <img src="{{ url($berita->photo3)}}" class="img-photo3 img-fluid mb-3 d-block" style="max-width: 500px;">
                            @endif
                            <input type="file" accept="image/*" class="form-control @error('photo3') is-invalid @enderror" name="photo3" id="image-photo3" onchange="previewPhoto3()">
                            @error('photo3')
                                <div class="invalid-feedback" role="alert">
                                    File photo 3 tidak sesuai ketentuan.
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Paragraf 1</label>
                            <textarea class="form-control" name="paragraf1" rows="7" required>{{ $berita->paragraf1 }}</textarea>
                        </div>

                        <p class="alert alert-warning">Untuk paragraf 2, 3, 4 boleh dikosongkan dan disii sesuai kebutuhan.</p>
                        <div class="form-group">
                            <label>Paragraf 2</label>
                            <textarea class="form-control" name="paragraf2" rows="7" >{{ $berita->paragraf2 }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Paragraf 3</label>
                            <textarea class="form-control" name="paragraf3" rows="7" >{{ $berita->paragraf3 }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Paragraf 4</label>
                            <textarea class="form-control" name="paragraf4" rows="7" >{{ $berita->paragraf4 }}</textarea>
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
    
    function previewPhoto1() {
        const imagePhoto1 = document.querySelector('#image-photo1');
        const imgPhoto1 = document.querySelector('.img-photo1');

        imgPhoto1.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(imagePhoto1.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPhoto1.src = oFREvent.target.result;
        }
    }

    function previewPhoto2() {
        const imagePhoto2 = document.querySelector('#image-photo2');
        const imgPhoto2 = document.querySelector('.img-photo2');

        imgPhoto2.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(imagePhoto2.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPhoto2.src = oFREvent.target.result;
        }
    }

    function previewPhoto3() {
        const imagePhoto3 = document.querySelector('#image-photo3');
        const imgPhoto3 = document.querySelector('.img-photo3');

        imgPhoto3.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(imagePhoto3.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPhoto3.src = oFREvent.target.result;
        }
    }
    
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@endsection
