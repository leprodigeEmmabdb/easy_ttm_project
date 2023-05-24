@extends('layouts.app')

@section('content')
    <form action="{{ route('projects.store') }}" method="post" enctype="multipart/form-data">
        @csrf
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
                                    <span class="bs-stepper-label">Information</span>
                                </button>
                            </div>
                            <div class="line"></div>

                            <div class="step" data-target="#information-part">
                                <button type="button" class="step-trigger" role="tab" aria-controls="information-part"
                                    id="information-part-trigger">
                                    <span class="bs-stepper-circle">2</span>
                                    <span class="bs-stepper-label">Description</span>
                                </button>
                            </div>
                            <div class="line"></div>

                            <div class="step" data-target="#complexity-part">
                                <button type="button" class="step-trigger" role="tab" aria-controls="complexity-part"
                                    id="complexity-part-trigger">
                                    <span class="bs-stepper-circle">3</span>
                                    <span class="bs-stepper-label">Complexité</span>
                                </button>
                            </div>
                        </div>
                        <div class="bs-stepper-content">
                            <!-- your steps content here -->
                            <div id="logins-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nom <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        placeholder="nom du projet" name="name" @required(true)>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Type <span class="text-danger">*</span></label>
                                    <select class="form-control select2" style="width: 100%;"
                                        aria-placeholder="type de projet" name="type">
                                        <option>Produit Offre ou Service</option>
                                        <option>Application Outil ou Infra</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Cible <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder=" cible"
                                        name="target" @required(true)>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputFile">Début <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" id="exampleInputEmail1" name="startDate"
                                        @required(true)>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Fin <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" id="exampleInputEmail1" name="endDate"
                                        @required(true)>
                                </div>
                                <a class="btn btn-primary" onclick="stepper.next()">Suivant</a>
                            </div>
                            {{-- fin de la partie 1 --}}

                            <div id="information-part" class="content" role="tabpanel"
                                aria-labelledby="information-part-trigger">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="exampleInputFile">Project Owner <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="exampleInputEmail1"
                                            placeholder=" Project Owner" name="owner" @required(true)>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">Coût du projet <span
                                                class="text-danger">*</span></label>
                                        <input type="number" class="form-control" id="exampleInputEmail1"
                                            placeholder=" coût" name="coast" @required(true)>
                                    </div>
                                    <div class="form-group">
                                        <label>Descriptiion <span class="text-danger">*</span></label>
                                        <textarea class="form-control" rows="3" placeholder="Description" name="description"></textarea>
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
                                <a class="btn btn-primary" onclick="stepper.previous()">Précedent</a>
                                <a class="btn btn-primary" onclick="stepper.next()">Suivant</a>

                            </div>
                            {{-- fin de la partie 2 --}}
                            <div id="complexity-part" class="content" role="tabpanel"
                                aria-labelledby="complexity-part-trigger">
                                @foreach ($complexity_items as $item)
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label>{{ $item->name }}</label>
                                            <select class="form-control select2bs4 select2-hidden-accessible"
                                                name="{{ $item->name }}" required>
                                                <option disabled selected>null</option>
                                                @foreach ($item->complexityTargets as $target)
                                                    <option value="{{ $target->id }}">{{ $target->value }} -
                                                        {{ $target->name }}</option>
                                                @endforeach

                                            </select>
                                            <span
                                                class="select2 select2-container select2-container--bootstrap4 select2-container--below"
                                                dir="ltr" style="width: 100%;">
                                                <span class="dropdown-wrapper" aria-hidden="true"></span>
                                            </span>
                                        </div>
                                    </div>
                                @endforeach

                                <a class="btn btn-primary" onclick="stepper.previous()">Précedent</a>
                                <button class="btn btn-primary" id="test" type="submit">Submit</button>
                            </div>




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
    @vite('node_modules/bs-stepper/dist/js/bs-stepper.min.js');
    @vite('node_modules/bs-stepper/dist/css/bs-stepper.min.css');

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
