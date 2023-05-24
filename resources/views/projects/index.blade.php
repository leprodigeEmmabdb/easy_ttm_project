@extends('layouts.app')

@section('content')
    <div class="content">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1></h1>
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
                <a class="btn btn-primary m-2 " href="{{ route('projects.create') }}"><b>+</b></a>
            </div>
            <div class="card">

                <div class="card-header">
                    <h3 class="card-title">Projets</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse"><i
                                class="fas fa-minus"></i></button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove"><i
                                class="fas fa-times"></i></button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped projects">
                        <thead>
                            <tr>
                                <th style="width: 1%">N°</th>
                                <th style="width: 20%">Nom</th>
                                <th style="width: 30%">Equipe</th>
                                <th>Progression</th>
                                <th style="width: 8%" class="text-center">Statut</th>
                                <th style="width: 20%"></th>
                            </tr>
                            @forelse ($project as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>
                                        <a href="#">{{ $item->name }}</a><br>
                                        <small>
                                            <b class="text-black-50">Du:</b> {{ $item->startDate }} - <b
                                                class="text-black-50">Au:</b> {{ $item->endDate }}
                                        </small>
                                    </td>
                                    <td>
                                        <ul class="list-inline">
                                            <li class="list-inline-item"><img alt="Avatar" class="table-avatar"
                                                    src="../../dist/img/avatar.png"></li>
                                            <li class="list-inline-item"><img alt="Avatar" class="table-avatar"
                                                    src="../../dist/img/avatar2.png"></li>
                                            <li class="list-inline-item"><img alt="Avatar" class="table-avatar"
                                                    src="../../dist/img/avatar3.png"></li>
                                            <li class="list-inline-item"><img alt="Avatar" class="table-avatar"
                                                    src="../../dist/img/avatar4.png"></li>
                                        </ul>
                                    </td>
                                    <td class="project_progress">
                                        <div class="progress progress-sm">
                                            <div class="progress-bar bg-green" role="progressbar" aria-valuenow="57"
                                                aria-valuemin="0" aria-valuemax="100" style="width: 57%"></div>
                                        </div>
                                        <small>57% Complete</small>
                                    </td>
                                    <td class="project-state">
                                        <span class="badge badge-success">Success</span>
                                    </td>
                                    <td class="project-actions text-right">
                                        <a class="btn btn-primary btn-sm" href="{{ route('projects.show', $item->id) }}"><i
                                                class="fas fa-folder"></i></a>
                                        <a class="btn btn-info btn-sm" href="{{ route('projects.edit', $item->id) }}"><i
                                                class="fas fa-pencil-alt"></i></a>
                                        <a class="btn btn-danger btn-sm" href="#"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                            @empty
                            @endforelse

                        </thead>
                    </table>
                </div>
            </div>
        </section>
    </div>
@endsection
