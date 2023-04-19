<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    public $table = 'type';

    public $fillable = ['type','type_fr','type_en'];

    public function projects()
    {
        return $this->belongsToMany(Project::class, 'project_types');
    }
    
}
