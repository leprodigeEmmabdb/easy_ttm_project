@extends('layouts.app')

@section('title')
    Livrable
@endsection
@section('content')
    <div class="content">
        <div class="text-right mx-4 col">
            <button class="btn btn-light mx-5" data-toggle="modal" data-target="#create_modal">
                <i class="fas fa-plus-circle"></i>
            </button>
        </div>
        <section class="content">
            <div class="col-md-12 px-5">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Liste</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
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
                                            {{ $item->user_id }}<br>
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
                                            <a class="btn btn-light btn-sm" href="#"><i
                                                    class="fas fa-eye"></i></a>
                                            <a class="btn btn-light btn-sm" href="#"><i
                                                    class="fas fa-pencil-alt" ></i></a>
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
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        <ul class="pagination pagination-xl m-0 float-right">
                            <li class="page-item m-2"><a class="page-link" href="{{ $members->previousPageUrl() }}">«</a></li>
                            <li class="page-item m-2"><a class="page-link" href="{{ $members->nextPageUrl() }}">»</a></li>
                        </ul>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </section>
        @include('projects.membres.create')
    </div>
@endsection
@section('scripts')
    <script src="{{ Vite::asset('resources/js/scripts.js') }}"></script>
@endsection
