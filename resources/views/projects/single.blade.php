@extends('layouts.app')
@section('title')
    {{ $project->name }}
@endsection
@section('content')
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h3 class="card-title my-2">
                <i class="fas fa-edit"></i>
                {{ $project->name }}
            </h3>
        </div>
        <div class="card-body">
            <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="custom-content-below-home-tab" data-toggle="pill"
                        href="#custom-content-below-home" role="tab" aria-controls="custom-content-below-home"
                        aria-selected="true">Détails</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " id="custom-content-below-task-tab" data-toggle="pill"
                        href="#custom-content-below-task" role="tab" aria-controls="custom-content-below-task"
                        aria-selected="false">Démandes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-content-below-profile-tab" data-toggle="pill"
                        href="#custom-content-below-profile" role="tab" aria-controls="custom-content-below-profile"
                        aria-selected="false">Activités</a>
                </li>
                <li class="nav-item">
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-content-below-settings-tab" data-toggle="pill"
                        href="#custom-content-below-settings" role="tab" aria-controls="custom-content-below-settings"
                        aria-selected="false">Gantt</a>
                </li>
            </ul>
            <div class="tab-content" id="custom-content-below-tabContent">
                <div class="tab-pane fade show active" id="custom-content-below-home" role="tabpanel"
                    aria-labelledby="custom-content-below-home-tab">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                                <div class="row">
                                    <div class="col-12 col-sm-4">
                                        <div class="info-box bg-light">
                                            <div class="info-box-content">
                                                <span class="info-box-text text-center text-muted">Coût</span>
                                                <span
                                                    class="info-box-number text-center text-muted mb-0">{{ $project->coast }}
                                                    FC</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="info-box bg-light">
                                            <div class="info-box-content">
                                                <span class="info-box-text text-center text-muted">Date du début</span>
                                                <span
                                                    class="info-box-number text-center text-muted mb-0">{{ $project->startDate }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="info-box bg-light">
                                            <div class="info-box-content">
                                                <span class="info-box-text text-center text-muted">Date de la fin</span>
                                                <span
                                                    class="info-box-number text-center text-muted mb-0">{{ $project->endDate }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <h4>Activités récentes</h4>
                                    </div>
                                    <div class="post clearfix">
                                        <div class="user-block">
                                            <img class="img-circle img-bordered-sm" src="{{Vite::asset('resources/images/logo.svg')}}" 
                                                alt="User Image">
                                            <span class="username"><a href="#">{{ $project->projectOwner }}
                                                </a></span>
                                            <span class="description">envoyé depuis {{ $project->created_at }} </span>

                                        </div>
                                        <p>description sur le livrable</p>
                                        <p><a href="#" class="link-black text-sm"><i class="fas fa-link mr-1"></i>
                                                livrable</a></p>
                                    </div>
                                </div>
                            </div>
                            <div class="ol-12 col-md-12 col-lg-4 order-1 order-md-2">
                                <h3 class="text-primary"><i class="fas fa-paint-brush"></i> {{ $project->name }}</h3>
                                <p class="text-muted">{{ $project->description }}</p><br>
                                <div class="text-muted">
                                    <p class="text-sm">Type de projet<b class="d-block">{{ $project->type }}</b></p>
                                    <p class="text-sm">ProjectOwner<b class="d-block">{{ $project->projectOwner }}</b></p>
                                </div>
                                <h5 class="mt-5 text-muted">Project files</h5>
                                <ul class="list-unstyled">
                                    @forelse ($file as $item)
                                        <li><a href="{{ $item->filePath }}" download class="btn-link text-secondary"><i
                                                    class="far fa-fw fa-file-word"></i>{{ $item->filePath }}</a></li>
                                    @empty
                                        <li><a href="#" class="btn-link text-secondary"><i
                                                    class="far fa-fw fa-file-pdf"></i> Aucun fichier Uploader</a></li>
                                    @endforelse

                                </ul>
                                <div class="text-center mt-5 mb-3 row">
                                    <div class=" col-lg-5 nav-item dropdown">
                                        <a class=" btn btn-sm btn-primary nav-link"
                                            href="{{ route('membres.index', $project->id) }}">Membres</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="tab-pane fade row" id="custom-content-below-task" role="tabpanel"aria-labelledby="custom-content-below-task-tab">
                    <div class="row">
                        @include('projects.claims.index')
                    </div>
                </div>
                <div class="tab-pane fade" id="custom-content-below-profile" role="tabpanel"aria-labelledby="custom-content-below-profile-tab">
                    pas dispo

                </div> 
                <div class="tab-pane fade" id="custom-content-below-settings" role="tabpanel"
                    aria-labelledby="custom-content-below-settings-tab">
                    <p class="text-center text-black-50 my-2"> N'est pas disponible</p>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')

<script>
    var tasks=document.querySelector('.tasks')  
   function handleButtomClick(event){
        event.preventDefault();
        tasks.style.width="100px"
        tasks.style.transition="all 2s"
    console.log(tasks)
   }

    
  </script>
@endsection
