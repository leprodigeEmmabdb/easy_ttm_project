<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectFile extends Model
{
    use HasFactory;
    protected $fillable=[
        'filePath'

    ];
    public function project() {
        return $this->belongsTo(Project::class);
     }
}
