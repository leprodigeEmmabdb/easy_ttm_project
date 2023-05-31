@extends('layouts.app')

@section('title')
    Livrable
@endsection

@section('content')
    <div class="col">
        <div class="text-right mx-4 col">
            <button class="btn btn-light m-2" data-toggle="modal" data-target="#create_modal">
                <i class="fas fa-plus-circle"></i>
            </button>
        </div>
        <div class="card tasks">
            <div class="card-header">
                <h3 class="card-title">Bordered Table</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body ">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 10px">No</th>
                            <th>Titre</th>
                            <th>Assigné à</th>
                            <th style="width: 100px">Délais</th>
                            <th style="width: 150px">Status</th>
                            <th style="width: 130px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($demandes as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>
                                    <a href="#" download="true">{{ $item->title }}</a>
                                </td>
                                <td>
                                    <div>
                                        <p>
                                            {{ $item->contributeur }}
                                        </p>
                                    </div>
                                </td>

                                <td><span>{{ $item->deadLine }} jours</span></td>
                                <td>
                                    {{ $item->status }}
                                </td>
                                <td class="project-actions text-right">
                                    <a class="btn btn-light btn-sm" href="{{route('demande.show',$item->id)}}"  data-toggle="modal" data-target="#single-modal"><i
                                            class="fas fa-eye"></i></a>
                                    <a class="btn btn-light btn-sm" data-toggle="modal" data-target="#edit_modal">
                                        <i class="fas fa-pencil-alt"></i></a>
                                    <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-default">

                                        <i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                            <div class="modal fade" id="modal-default">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Suppression</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Voulez-vous vraiment supprimer?</p>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <form action="{{ route('demande.destroy', $item->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-default"
                                                    data-dismiss="modal">Annuler</button>
                                                <button type="submit" class="btn btn-primary">Supprimer</button>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                        @empty
                            <tr class="col-lg-12  text-center text-black-50 h5">
                                <td colspan="6"> Aucune demande créée</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="card-footer clearfix">
                <ul class="pagination pagination-xl m-0 float-right">
                    <li class="page-item m-2"><a class="page-link" href="{{ $demandes->previousPageUrl() }}">«</a></li>
                    <li class="page-item m-2"><a class="page-link" href="{{ $demandes->nextPageUrl() }}">»</a></li>
                </ul>
            </div>
            <!-- /.card-body -->

        </div>
    </div>
    @include('tasks.create')
    </div>
@endsection
@section('scripts')
    <script src="{{ Vite::asset('resources/js/scripts.js') }}"></script>
@endsection
