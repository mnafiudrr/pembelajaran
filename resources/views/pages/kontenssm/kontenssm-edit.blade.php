@extends('partials.master') 
@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Konten Subsubmateri {{ $kontenssm->judul }}</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-lg btn-success shadow-sm mr-2" onclick="history.back()">
            <i class="fas fa-backward fa-sm text-white-50"></i> Detail Konten Submateri
        </a>
    </div>
    <div class="row">
        <div class="col-8">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <form action="update" method="POST" enctype="multipart/form-data">
                        @csrf
                        <p class="alert alert-warning">Judul dan paragraf 1 harus diisi.</p>
                        <p class="alert alert-warning">Photo 1, photo 2, dan photo 3 yang diuploadkan harus berupa gambar dan berekstensi .jpg .png .jpeg .gif dan ukuran file maksimal 2 mb.</p>
                        <p class="alert alert-warning">Document 1, 2, dan 3 yang diuploadkan harus berupa file document dan berekstensi .pdf dan ukuran file maksimal 2 mb.</p>

                        <div class="form-group">
                            <label>Judul konten subsubmateri</label>
                            <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" required value="{{ $kontenssm->judul }}">
                            @error('judul')
                                <div class="invalid-feedback">
                                    Input judul minimal 5 karakter.
                                </div>
                            @enderror
                        </div>

                        <p class="alert alert-warning">Untuk photo 1, 2, dan 3 boleh dikosongkan dan disii sesuai kebutuhan.</p>
                        <div class="form-group">
                            <label>Photo 1</label>
                            @if($kontenssm->photo1)
                                <img src="{{ url($kontenssm->photo1 )}}" class="img-photo1 img-fluid mb-3 d-block" style="max-width: 500px;">
                            @endif
                            <input type="file" accept="image/*" class="form-control @error('photo1') is-invalid @enderror" name="photo1" id="image-photo1" onchange="previewPhoto1()">
                            @error('photo1')
                                <div class="invalid-feedback">
                                    File photo 1 tidak sesuai ketentuan.
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Photo 2</label>
                            @if($kontenssm->photo2)
                                <img src="{{ url($kontenssm->photo2 )}}" class="img-photo2 img-fluid mb-3 d-block" style="max-width: 500px;">
                            @endif
                            <input type="file" accept="image/*" class="form-control @error('photo2') is-invalid @enderror" name="photo2" id="image-photo2" onchange="previewPhoto2()">
                            @error('photo2')
                                <div class="invalid-feedback">
                                    File photo 2 tidak sesuai ketentuan.
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Photo 3</label>
                            @if($kontenssm->photo3)
                                <img src="{{ url($kontenssm->photo3 )}}" class="img-photo3 img-fluid mb-3 d-block" style="max-width: 500px;">
                            @endif
                            <input type="file" accept="image/*" class="form-control @error('photo3') is-invalid @enderror" name="photo3" id="image-photo3" onchange="previewPhoto3()">
                            @error('photo3')
                                <div class="invalid-feedback">
                                    File photo 3 tidak sesuai ketentuan.
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Paragraf 1</label>
                            <textarea class="form-control " name="paragraf1" rows="7" required>{{ $kontenssm->paragraf1 }}</textarea>
                        </div>

                        <p class="alert alert-warning">Untuk paragraf 2, 3, dan 4 boleh dikosongkan dan disii sesuai kebutuhan.</p>
                        <div class="form-group">
                            <label>Paragraf 2</label>
                            <textarea class="form-control" name="paragraf2" rows="7">{{ $kontenssm->paragraf2 }}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Paragraf 3</label>
                            <textarea class="form-control " name="paragraf3" rows="7">{{ $kontenssm->paragraf3 }}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Paragraf 4</label>
                            <textarea class="form-control" name="paragraf4" rows="7">{{ $kontenssm->paragraf4 }}</textarea>
                        </div>

                        <p class="alert alert-warning">Untuk document 1, 2, dan 3 boleh dikosongkan dan disii sesuai kebutuhan.</p>
                        <p class="alert alert-warning">Jika menguploadkan document harus mengisikan judul.</p>
                        <div class="form-group">
                            <label>Judul document 1</label>
                            <input type="text" class="form-control @error('juduldoc1') is-invalid @enderror" name="juduldoc1" value="{{ $kontenssm->juduldoc1 }}">
                            @error('juduldoc1')
                                <div class="invalid-feedback">
                                    Input judul document minimal 5 karakter.
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Document 1</label>
                            @if($kontenssm->doc1 == null)
                                
                            @else
                                <br>
                                <a href="{{ url($kontenssm->doc1 )}}" class="d-none d-sm-inline-block btn btn-lg btn-primary shadow-sm mb-3" target="_blank">
                                    <i class="fas fa-file-pdf fa-sm text-white-50"></i> Lihat file
                                </a>
                            @endif    
                            <input type="file" class="form-control @error('doc1') is-invalid @enderror" name="doc1">
                            @error('doc1')
                                <div class="invalid-feedback">
                                    File document 1 tidak sesuai ketentuan.
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Judul document 2</label>
                            <input type="text" class="form-control @error('juduldoc2') is-invalid @enderror" name="juduldoc2" value="{{ $kontenssm->juduldoc2 }}">
                            @error('juduldoc2')
                                <div class="invalid-feedback">
                                    Input judul document 2 minimal 5 karakter.
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Document 2</label>
                            @if($kontenssm->doc2 == null)
                                
                            @else
                                <br>
                                <a href="{{ url($kontenssm->doc2 )}}" class="d-none d-sm-inline-block btn btn-lg btn-primary shadow-sm mb-3" target="_blank">
                                    <i class="fas fa-file-pdf fa-sm text-white-50"></i> Lihat file
                                </a>
                            @endif    
                            <input type="file" class="form-control @error('doc2') is-invalid @enderror" name="doc2">
                            @error('doc2')
                                <div class="invalid-feedback">
                                    File document 2 tidak sesuai ketentuan.
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Judul document 3</label>
                            <input type="text" class="form-control @error('juduldoc3') is-invalid @enderror" name="juduldoc3" value="{{ $kontenssm->juduldoc3 }}">
                            @error('juduldoc3')
                                <div class="invalid-feedback">
                                    Input judul document 3 minimal 5 karakter.
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Document 3</label>
                            @if($kontenssm->doc3 == null)
                                
                            @else
                                <br>
                                <a href="{{ url($kontenssm->doc3 )}}" class="d-none d-sm-inline-block btn btn-lg btn-primary shadow-sm mb-3" target="_blank">
                                    <i class="fas fa-file-pdf fa-sm text-white-50"></i> Lihat file
                                </a>
                            @endif    
                            <input type="file" class="form-control @error('doc3') is-invalid @enderror" name="doc3">
                            @error('doc3')
                                <div class="invalid-feedback">
                                    File document 3 tidak sesuai ketentuan.
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
    
        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <h5>Panduan pengisian subsubmateri</h5>
                    <img src="{{ asset('keperluan/panduan-kontenssm.png') }}" style="max-width: 480px">
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
