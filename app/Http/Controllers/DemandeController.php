<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Demande;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDemandeRequest;
use App\Http\Requests\UpdateDemandeRequest;

class DemandeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users=User::all();
        $demandes = Demande::orderBy('id', 'desc')->paginate(5);
        return view('tasks.index', compact('demandes','users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        // $request->validate([
        //     'model' => ['required', 'string', 'max:255'],
        //     'description' => ['required', 'string', 'min:10'],
        //     'user' => ['required', 'string', 'max:255'],
        //     'delais' => 'required', 
        // ]);
        if($request->hasFile('file')){
            $namefile=date('ymdhis').'.'.$request->file->extension();
            $fichier=$request->file->storeAs('demandes',$namefile,'public');

        }else{
            $fichier=null;
        }
        
        $demande= Demande::create([
            'title'=>$request->title,
            'description' =>$request->description,
            'pathTask'=>$request->file,
            'contributeur' =>$request->contributeur,
            'deadLine' =>$request->deadLine,
            'status'=>'non soumis',
            'jalon'=>$request->jalon
        ]);
      
        return redirect()->back()->with('success', 'Point de complexité modifié avec succes');
    }

    /**
     * Display the specified resource.
     */
    public function show(Demande $demande)
    {
        //        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Demande $demande)
    {
        $users=User::all();
        return view('projects.tasks.edit', compact('demande','users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDemandeRequest $request, Demande $demande)
    {
        $demande= Demande::update([
            'model'=>$request->model,
            'delais' =>$request->delais,
            'description'=>$request->description,
            'contributeur' =>$request->contributeur,
            'status' =>'non soumis',
        ]);
        return redirect()->back()->with('success', 'Point de complexité modifié avec succes');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $demande)
    {
        $demande = Demande::findOrFail($demande);
        $demande->delete();

        return redirect()->route('demande.index');
    }
}
