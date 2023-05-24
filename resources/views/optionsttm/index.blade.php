@extends('layouts.app')

@section('content')
    <div class="col-sm-6">
        <h1 class="m-0 pt-4 pl-4">Option Ttm</h1>
    </div>
    @foreach ($errors->all() as $error)
        <ul>
            <li style="color: red">{{ $error }}</li>
        </ul>
    @endforeach
    <div class="col-lg-12 text-right">
        <button type="button" class="btn btn-warning mx-5 my-3 rounded-circle " data-toggle="modal"
            data-target="#modal-default">
            <p class="m-3"><i class="nav-icon fa fa-plus"></i>
            </p>
        </button>
    </div>
    <div class="card mx-3">
        <div class="card-body table-responsive p-0">
            <table class="table table-striped table-valign-middle">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Compléxité</th>
                        <th>Edit</th>
                        <th>Supprimer</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($optionTtms as $optionTtm)
                        <tr>
                            <td>
                                {{ $optionTtm->nom }}
                            </td>
                            <td>
                                <p>Comprise entre {{ $optionTtm->minComplexite }} et {{ $optionTtm->maxComplexite }}</p>
                            </td>
                            <td>
                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#">
                                    <i class="fas fa-pencil-alt"></i>
                                </button>
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                    data-target="#modal-danger">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card card-warning">
                        <div class="card-header">
                            <h3 class="card-title  text-white">Ajout Option Ttm</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form method="POST" action="{{ route('optionsttm.store')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Nom <span class="text-red">*</span></label>
                                            <input type="text" class="form-control" placeholder="Nom de l'option Ttm"
                                                name="nom">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <!-- textarea -->
                                        <div class="form-group">
                                            <label>Min compléxité <span class="text-red">*</span></label>
                                            <input class="form-control" type="number" min="0" name="minComplexite" id="min"
                                                placeholder="Entrer un nombre ...">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Max complexité <span class="text-red">*</span></label>
                                            <input class="form-control" name="maxComplexite" id="max" type="number"
                                                min="updateMin()" placeholder="Entrer un nombre ...">
                                        </div>
                                    </div>
                                    <div id="erreur" class="text-red"></div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" onclick="validateInputs(event)" class="btn btn-warning float-right text-white">Ajouter</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script>
    function validateInputs(event) {
        var input1 = document.getElementById("min").value;
        var input2 = document.getElementById("max").value;
        var erreur = document.getElementById("erreur");

        if (parseInt(input2) <= parseInt(input1)) {
            erreur.innerHTML = "La valeur de max compléxité doit être supérieure à celle de min Compléxité.";
            event.preventDefault()
            return false;
        }else {
            erreur.innerHTML = "";
        }
        return false;
    }
</script>
@endsection
