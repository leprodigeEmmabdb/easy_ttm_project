@extends('layouts.app')

@section('content')
    <form action="{{ route('projects.update', $project->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="col-md-10 container my-4">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Création du projet</h3>
                </div>
                <div class="card-body p-0">
                    <div class="bs-stepper">
                        <div class="bs-stepper-header" role="tablist">
                            <!-- your steps here -->
                            <div class="step" data-target="#logins-part">
                                <button type="button" class="step-trigger" role="tab" aria-controls="logins-part"
                                    id="logins-part-trigger">
                                    <span class="bs-stepper-circle">1</span>
                                    <span class="bs-stepper-label">information1</span>
                                </button>
                            </div>
                            <div class="line"></div>
                            <div class="step" data-target="#information-part">
                                <button type="button" class="step-trigger" role="tab" aria-controls="information-part"
                                    id="information-part-trigger">
                                    <span class="bs-stepper-circle">2</span>
                                    <span class="bs-stepper-label">information2</span>
                                </button>
                            </div>

                        </div>
                        <div class="bs-stepper-content">
                            <!-- your steps content here -->
                            <div id="logins-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nom</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        placeholder="nom du projet" name="name" value="{{ $project->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Type</label>
                                    <select class="form-control select2" style="width: 100%;"
                                        aria-placeholder="type de projet" name="type">
                                        <option>Produit Offre ou Service</option>
                                        <option>Application Outil ou Infra</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Cible</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder=" cible"
                                        name="target" value="{{ $project->target }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Début</label>
                                    <input type="date" class="form-control" id="exampleInputEmail1" name="startDate"
                                        value="{{ $project->startDate }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Fin</label>
                                    <input type="date" class="form-control" id="exampleInputEmail1" name="endDate"
                                        value="{{ $project->endDate }}">
                                </div>
                                <a class="btn btn-primary" onclick="stepper.next()">Next</a>
                            </div>
                            {{-- fin de la partie 1 --}}

                            <div id="information-part" class="content" role="tabpanel"
                                aria-labelledby="information-part-trigger">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="exampleInputFile">Project Owner</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1"
                                            placeholder=" Project Owner" name="owner"
                                            value="{{ $project->projectOwner }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">Coût du projet</label>
                                        <input type="number" class="form-control" id="exampleInputEmail1"
                                            placeholder=" coût" name="coast" value="{{ $project->coast }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Descriptiion</label>
                                        <textarea class="form-control" rows="3" placeholder="Description" name="description">{{ $project->description }} </textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">Documents <span
                                                class="text-black-50">(optionel)</span></label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="customFile"
                                                name="file">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                                <a class="btn btn-primary" onclick="stepper.previous()">Previous</a>
                                <button class="btn btn-primary" id="test" type="submit">update</button>
                            </div>
                            {{-- fin de la partie 2 --}}


                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer text-black">
                    Orange Digital Center
                </div>

            </div>
            <!-- /.card -->
        </div>
    </form>
@endsection
@section('scripts')
    @vite(['node_modules/bs-stepper/dist/js/bs-stepper.min.js', 'node_modules/bs-stepper/dist/css/bs-stepper.min.css']);

    <script>
        document.querySelector('#test').addEventListener('click', (e) => {

            console.log(e);
        })
        // BS-Stepper Init
        document.addEventListener('DOMContentLoaded', function(e) {
            e.preventDefault();
            window.stepper = new Stepper(document.querySelector('.bs-stepper'))
        })
       
    </script>
@endsection
