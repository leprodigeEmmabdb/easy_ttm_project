<div>
    @extends('layouts.modal')

    @section('id_modal')
        id="create_modal"
    @endsection

    @section('modal-title')
        <h4 class="modal-title">Créer une Demande</h4>
    @endsection
    @section('modal-content')
        <form class="form-horizontal" action="{{ route('demande.store') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="col-xm-6">
                    <div class="form-group">
                        <label for="name">Titre de la demande <span class="text-danger">*</span></label>
                        <input type="text" name="title" class="form-control"  required>
                    </div>
                </div>
                <div class="col-xm-6">
                    <div class="form-group">
                        <label for="name">Délais <span class="text-danger">*</span></label>
                        <input type="number" name="deadLine" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Modèle </label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile"
                            name="file">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-form-label">Contributeur</label>
                    <select class="form-control select2 col-sm-9" style="width: 100%;"
                        aria-placeholder="type de projet" name="contributeur">
            
                        @forelse ($users as $item)
                            <option value="{{ $item->name }}">{{ $item->name }}</option>
                        @empty
                            <option>Aucune suggestion</option>
                        @endforelse

                    </select>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-form-label">Contributeur</label>
                    <select class="form-control select2 col-sm-9" style="width: 100%;"
                        aria-placeholder="type de projet" name="jalon">
                        <option>T0</option>
                        <option>T1</option>
                        <option>T3</option>

                    </select>
                </div>
                <div class="col-xm-6">
                    <div class="form-group">
                        <label for="description">Description  <span class="text-danger">*</span></label>
                        <textarea class="form-control" name="description" rows="5" placeholder="Enter ..."></textarea>
                    </div>
                </div>
                
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Enregistrer</button>
                <button type="reset" class="btn btn-secondary float-right">Cancel</button>
            </div>
        </form>
    @endsection
</div>