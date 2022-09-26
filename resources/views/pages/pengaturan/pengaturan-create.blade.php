@extends('partials.master') 
@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Pengaturan</h1>
    </div>
    <div class="row">
        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <form action="/pengaturan" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <p class="alert alert-warning">Semua kolom input wajib diisi dengan benar.</p>
                        <p class="alert alert-warning">Pengaturan hanya boleh diinputkan sekali apabila ada kesalahan input bisa dengan menghapus pengaturan terdahulu lalu menginputkan kembali atau edit pengaturan yang ada.</p>
                        <p class="alert alert-warning">Logo splash screen dan header halaman utama yang diuploadkan harus berupa gambar dan berekstensi .jpg .png .jpeg .gif dan ukuran file maksimal 2 mb.</p>
                        
                        @error('status')
                            <p class="alert alert-danger">Pengaturan sudah tersedia, silahkan menghapus pengaturan terdahulu jika ingin meninputkan pengaturan yang baru.</p>
                        @enderror

                        <div class="form-group">
                            <label>Logo Splash Screen</label>
                            <img class="img-logo img-fluid mb-3" style="max-width: 500px;">
                            <input type="file" class="form-control @error('logo') is-invalid @enderror" name="logo" id="image-logo" onchange="previewlogo()" required>
                            @error('logo')
                                <div class="invalid-feedback">
                                    File logo tidak sesuai ketentuan.
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Tagline Splash Screen</label>
                            <input type="text" class="form-control @error('tagline') is-invalid @enderror" name="tagline" required>
                            @error('tagline')
                                <div class="invalid-feedback">
                                    Input tagline minimal 5 karakter.
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Header Halaman Utama</label>
                            <img class="img-header img-fluid mb-3" style="max-width: 500px;">
                            <input type="file" class="form-control @error('header') is-invalid @enderror" name="header" id="image-header" onchange="previewHeader()" required>
                            @error('header')
                                <div class="invalid-feedback">
                                    File header tidak sesuai ketentuan.
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Link Video Overview</label>
                            <input type="text" class="form-control @error('link') is-invalid @enderror" placeholder="contoh : https://www.youtube.com/watch?v=6TH6Dk8KySE" name="link" required>
                            @error('link')
                                <div class="invalid-feedback">
                                    Input harus berupa url, contoh : https://www.youtube.com/watch?v=6TH6Dk8KySE .
                                </div>
                            @enderror
                        </div>

                        <input type="hidden" name="status" value="1">

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
    
    function previewlogo() {
        const imagelogo = document.querySelector('#image-logo');
        const imglogo = document.querySelector('.img-logo');

        imglogo.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(imagelogo.files[0]);

        oFReader.onload = function(oFREvent) {
            imglogo.src = oFREvent.target.result;
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
