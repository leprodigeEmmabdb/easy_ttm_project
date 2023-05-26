
   <section class="content">
    <div class="col-md-12 px-5">
        <div class="card card-primary collapsed-card">
          <div class="card-header">
            <h3 class="card-title">Formulaire</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-plus"></i>
              </button>
            </div>
          </div>
          <div class="card-body" style="display: none;">
                <form class="form-horizontal " action="{{ route('membres.store', $project->id) }}" method="POST">
                    @csrf
                    <div class="card-body row">
                        <div class="col-lg-4">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Nom</label>
                                <select class="form-control select2 col-sm-9" style="width: 100%;"
                                    aria-placeholder="type de projet" name="user">
                                    @forelse ($users as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @empty
                                        <option>Aucune suggestion</option>
                                    @endforelse

                                </select>
                            </div>
                            <div class="col-sm-10">
                                <input type="hidden" class="form-control" id="inputEmail3" value="{{ $project->id }}"
                                    placeholder="email" name="project">
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="inputEmail3" placeholder="email"
                                        name="email">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Tél.</label>
                                <div class="col-sm-10">
                                    <input type="tel" class="form-control" id="inputEmail3" placeholder="tel..."
                                        name="phone">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Rôle</label>
                                <select class="form-control select2 col-sm-9" style="width: 100%;"
                                    aria-placeholder="type de projet" name="role">
                                    <option value="Contributeurs">Contributeurs</option>
                                    <option value="Steam">Steam</option>
                                    <option value="Validateur">Validateur</option>
                                </select>
                            </div>
                        </div>
                        <div class="offset-1 col-lg-7">

                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Direction</label>
                                <div class="col-sm-10">
                                    <input type="tel" class="form-control" id="inputEmail3"
                                        placeholder="direction...">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Manager</label>
                                <div class="col-sm-10">
                                    <input type="tel" class="form-control" id="inputEmail3"
                                        placeholder="manager...">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-2 col-form-label">Métier</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputPassword3" placeholder="métier">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="offset-sm-2 col-sm-10">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck2">
                                        <label class="form-check-label" for="exampleCheck2">le notifier</label>
                                    </div>
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
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
   </section>

