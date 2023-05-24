<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description', 
        'target',  
        'type',
        'startDate',
        'endDate',
        'coast',
        'projectOwner',
     
    ];
    
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
    public function projectFile() {
        return $this->hasMany(ProjectFile::class);
     }
    public function projectComplexityTargets(){
        return $this->hasMany(ProjectComplexityTarget::class);
    }
}
