@forelse ($demandes as $item)
<div class="col-12 my-4" id="accordion">
    <div class="card card-primary card-outline">
        <a class="d-block w-100" data-toggle="collapse" href="#collapseTwo{{$item->id}}">
            <div class="card-header">
                <h4 class="card-title w-100">
                    {{$item->title}}
                </h4>
            </div>
        </a>
        <div id="collapseTwo{{$item->id}}" class="collapse" data-parent="#accordion">
           
            <div class="card-body">
                <div>
                    {{$item->description}}
                </div>
                <div class="h-4 text-black-50 bold">
                    <b>
                        Délais:<span> {{$item->deadLine}}</span> jours
                    </b>
                </div>
                <div class="float-right">
                    Assigné à <span>{{$item->contributeur}}</span>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary float-right"  data-toggle="modal" data-target="#create_modal">
                    Envoyer</button>
                <a href="{{$item->pathTask}}" download type="reset" class="btn btn-default "><i class="fas fa-download"></i>Télécharger</a>
            </div>
        </div>
    </div>
</div>           
@empty
    <div class="container">
        <p class="h-3 text-gray">
            Aucune demande pour l'instant
        </p>
    </div>
@endforelse
@include('projects.claims.create')


