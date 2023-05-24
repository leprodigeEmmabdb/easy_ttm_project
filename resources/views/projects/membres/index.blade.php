@extends('layouts.app')
@section('content')
    <div class="content">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Membres</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Projets</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content">
            <div class="text-right mx-4">
                <a class="btn btn-primary m-2 " href="{{ route('membres.create', $project->id) }}"><b>+</b></a>
            </div>
            <div class="card">

                <div class="card-body p-0">
                    <table class="table table-striped projects">
                        <thead>
                            <tr>
                                <th>N°</th>
                                <th>Nom & Prénom</th>
                                <th class="text-center">Contribution</th>
                                <th class="text-center">Rôle</th>
                                <th class="text-center">Statut</th>
                                <th class="text-center">Action</th>

                            </tr>
                            @forelse ($members as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>
                                        <a href="#">{{ $item->user_id }}</a><br>
                                        <small>
                                            <b class="text-black-50">Masculin</b>
                                        </small>
                                    </td>

                                    <td class="project_progress ">
                                        <div class="progress progress-sm">
                                            <div class="progress-bar bg-red" role="progressbar" aria-valuenow="57"
                                                aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
                                        </div>
                                        <small>loading...</small>
                                    </td>
                                    <td class="project-state ">
                                        {{ $item->role }}
                                    </td>
                                    <td class="project-state">
                                        <span class="badge badge-success p-2">{{ $item->status }}</span>
                                    </td>
                                    <td class="project-actions text-center">
                                        <a class="btn btn-primary btn-sm" href="#"><i class="fas fa-folder"></i></a>
                                        <a class="btn btn-info btn-sm" href="#"><i class="fas fa-pencil-alt"></i></a>
                                        <a class="btn btn-danger btn-sm" href="#"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                            @empty
                                <tr class="col-lg-12  text-center text-black-50 h5">
                                    <td colspan="6">Aucun membre</td>
                                </tr>
                            @endforelse
                        </thead>
                    </table>
                </div>
            </div>
        </section>
    </div>
@endsection
