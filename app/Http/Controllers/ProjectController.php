<?php

namespace App\Http\Controllers;

use App\Models\ComplexityItem;
use App\Models\Project;
use App\Models\ProjectFile;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(){
        $project = Project::orderBy('id', 'desc')->paginate(10);
        return view('projects.index', compact('project'));
    }

    
    // cette methode permet d'afficher un projet en particulier et de l'injeter dans la vue single
    public function show(Project $project)
    {
       // Récuperation des documents du projets
        $file = ProjectFile::all()->where('project_id',$project->id);
        return view('projects.single', compact('project','file'));
    }

    //cette methode permet la rediction au formulaire de création projet
    public function create(){
        $complexity_items = ComplexityItem::all();
        return view('projects.create', compact('complexity_items'));
    }

    //cette methode permet la création du projet dans la base des données
    public function store(Request $request){
      
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'min:10'],
            'target' => ['required', 'string', 'max:255'],
            'type' => 'required', 
            'startDate' =>'required',
            'endDate' =>'required',
            'coast' =>['required'],
            'owner' =>['required', 'string', 'max:255'],
        ]);
       
        if($request->hasFile('file')){
            $namefile=date('ymdhis').'.'.$request->file->extension();
            $fichier=$request->file->storeAs('documents',$namefile,'public');

        }else{
            $fichier=null;
        }
        $project= Project::create([
            'name'=>$request->name,
            'description'=>$request->description,
            'target' =>$request->target,
            'type' =>$request->type,
            'startDate' =>$request->startDate,
            'endDate' =>$request->endDate,
            'coast' =>$request->coast,
            'projectOwner' =>$request->owner,
        ]);
        
       
        $project->projectFile()->create([
           'filePath'=>$fichier
         ]);

        // Get all items in the project
        $items = ComplexityItem::all();

        foreach($items as $item):
            //dd($request->{$item->name});
            $project->projectComplexityTargets()->create([
                "complexity_target_id" => $request->{$item->name},
            ]);
        endforeach;
        
        
        
        return redirect()->route('projects.index');
    }
    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'min:10'],
            'target' => ['required', 'string', 'max:255'],
            'type' => 'required', 
            'startDate' =>'required',
            'endDate' =>'required',
            'coast' =>['required'],
            'owner' =>['required', 'string', 'max:255'],
        ]);

        $project->update([
            'name'=>$request->name,
            'description'=>$request->description,
            'target' =>$request->target,
            'type' =>$request->type,
            'startDate' =>$request->startDate,
            'endDate' =>$request->endDate,
            'coast' =>$request->coast,
            'projectOwner' =>$request->owner,
        ]);
        if($request->hasFile('file')){
            $namefile=date('ymdhis').'.'.$request->file->extension();
            $fichier=$request->file->storeAs('documents',$namefile,'public');

        }else{
            $fichier=null;
        }
        $project->projectFile()->create([
            'filePath'=>$fichier
          ]);
          
        return redirect()->route('projects.index');
    }
    
}
