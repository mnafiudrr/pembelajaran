@extends('partials.master') 

@section('content')

    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Pengaturan</h1>
            <a href="/pengaturan/create" class="d-none d-sm-inline-block btn btn-lg btn-primary shadow-sm">
                <i class="fas fa-cog fa-sm text-white-50"></i> Pengaturan
            </a>
        </div>

        @if(session('sukses'))
            <div class="alert alert-success" role="alert">
                {{ session('sukses') }}
            </div>
        @elseif(session('hapus'))
            <div class="alert alert-danger" role="alert">
                {{ session('hapus') }}
            </div>
        @elseif(session('edit'))
            <div class="alert alert-warning" role="alert">
                {{ session('edit') }}
            </div>
        @endif

        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <tbody>
                            @foreach($pengaturan as $pengaturan)
                                <tr>
                                    <td>
                                        Aksi
                                    </td>
                                    <td>
                                        <a href="{{ route('pengaturan.edit', $pengaturan->id) }}" class="d-none d-sm-inline-block shadow-sm btn-warning btn-lg"><i class="fas fa-edit fa-sm text-white-50"> Edit</a>
                                        <a href="{{ route('pengaturan.delete', $pengaturan->id) }}" class="d-none d-sm-inline-block shadow-sm btn-danger btn-lg"><i class="fas fa-trash fa-sm text-white-50"> Hapus</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Logo</td>
                                    <td>
                                        <img src="{{ asset('storage/pengaturan/'. $pengaturan->logo)}}" style="max-height: 150px;">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Tagline</td>
                                    <td>{{ $pengaturan->tagline }}</td>
                                </tr>
                                <tr>
                                    <td>Header</td>
                                    <td>
                                        <img src="{{ asset('storage/pengaturan/'. $pengaturan->header)}}" style="max-height: 150px;">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Link</td>
                                    <td>
                                        <a href="{{ $pengaturan->link }}" target="_blank">{{ $pengaturan->link }}</a>
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