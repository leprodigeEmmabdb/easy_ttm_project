<div>
    @extends('layouts.modal')

    @section('id_modal')
        id="create_modal"
    @endsection

    @section('modal-title')
        <h4 class="modal-title">Déposer le Livrable</h4>
    @endsection
    @section('modal-content')
        <form class="form-horizontal" action="#" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputFile">Document <span class="text-danger">*</span></label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile"
                            name="fileclaim" required>
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                </div>
                <div class="form-group">
                    <label>Observetion <span class="text-danger">*</span></label>
                    <textarea class="form-control" rows="3" placeholder="Description" name="description"></textarea>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary float-right">Envoyer</button>
                <button type="reset" class="btn btn-secondary ">Annuler</button>
            </div>
        </form>
    @endsection
</div>