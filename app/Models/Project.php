<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable=['name','status'];

    protected $table = 'projects';
    public $timestamps = true;

    public function types()
    {
        return $this->belongsToMany(Type::class, 'project_types');
    }

}
