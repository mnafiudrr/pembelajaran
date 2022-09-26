@extends('partials.master') 

@section('content')

    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Profil {{ auth()->user()->name }}</h1>
        </div>

        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <tbody>
                            <tr>
                                <td>Nama</td>
                                <td>{{ auth()->user()->name }}</td>
                            </tr>
                            <tr>
                                <td>Username</td>
                                <td>{{ auth()->user()->username }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="edit" class="btn btn-primary btn-lg">Edit</a>
                </div>
            </div>
        </div>
    </div>

@endsection