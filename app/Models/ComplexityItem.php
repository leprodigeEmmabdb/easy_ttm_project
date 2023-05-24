<?php

namespace App\Models;

use App\Models\ComplexityTarget;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ComplexityItem extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['name','description',];

    public function complexityTargets()
    {
        return $this->hasMany(ComplexityTarget::class);
    }
}
