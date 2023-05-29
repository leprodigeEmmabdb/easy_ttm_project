<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class ProjectUserController extends Controller
{
    public function index($id){
        $project=Project::find($id);
        $users=User::all();
        $members = DB::table('project_users')->where('project_id',$id)->orderBy('id', 'desc')->paginate(5);
        return view('projects.membres.index',compact('members','project','users'));
    }

    public function create($id){
        $project=Project::find($id);
        $users=User::all();
        return view('projects.membres.create',compact('project','users'));
    }
    public function store(Request $request)
    
    {   
        DB::table('project_users')->insert([
                'user_id' => $request->user,
                'project_id' => $request->project,
                'role' => $request->role,
            ]);
        return redirect()->route('membres.index',$request->project);
    
    }
    public function edit(Project $project, $id)
    {
        return view('projects.membres.create', compact('project','id'));
    }
    public function update(Request $request, Project $project)
    {
        DB::table('project_users')->update([
            'user_id' => $request->user,
            'project_id' => $request->project,
            'role' => $request->role,
        ]);

        
        return redirect()->route('membres.index');
    }
    
}
