<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectType extends Model
{
    use HasFactory;
    protected $fillable=['project_id','type_id'];

    protected $table = 'project_types';
    public $timestamps = true;
}
