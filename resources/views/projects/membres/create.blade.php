@extends('layouts.modal')

@section('id_modal')
    id="create_modal"
@endsection

@section('modal-title')
    <h4 class="modal-title">Créer un Contributeur</h4>
@endsection
@section('modal-content')
        <div class="card">
            <form class="form-horizontal " action="{{ route('membres.store', $project->id) }}" method="POST">
                @csrf
                <div class="container row">
                    <div class="col-lg-10">
                        <div class="form-group ">
                            <label for="inputEmail3" class="col-sm-5 col-form-label">Nom</label>
                            <select class="form-control select2 col-sm-9" style="width: 100%;"
                                aria-placeholder="type de projet" name="user">
                                @forelse ($users as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @empty
                                    <option>Aucune suggestion</option>
                                @endforelse

                            </select>
                        </div>
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="inputEmail3" value="{{ $project->id }}"
                                placeholder="email" name="project">
                        </div>
                        <div class="form-group ">
                            <label for="inputEmail3" class="col-sm-5 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="inputEmail3" placeholder="email"
                                    name="email">
                            </div>
                        </div>

                        <div class="form-group ">
                            <label for="inputEmail3" class="col-sm-5 col-form-label">Tél.</label>
                            <div class="col-sm-10">
                                <input type="tel" class="form-control" id="inputEmail3" placeholder="tel..."
                                    name="phone">
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="inputEmail3" class="col-sm-5 col-form-label">Rôle</label>
                            <select class="form-control select2 col-sm-9" style="width: 100%;"
                                aria-placeholder="type de projet" name="role">
                                <option value="Contributeurs">Contributeurs</option>
                                <option value="Steam">Steam</option>
                                <option value="Validateur">Validateur</option>
                            </select>
                        </div>
                    </div>
                    <div class=" col-lg-10">
                        <div class="form-group ">
                            <label for="inputEmail3" class="col-sm-5 col-form-label">Manager</label>
                            <div class="col-sm-10">
                                <input type="tel" class="form-control" id="inputEmail3"
                                    placeholder="manager...">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                    <button type="reset" class="btn btn-default float-right">Cancel</button>
                </div>
                <!-- /.card-footer -->
      

            </form>
        </div>

@endsection
