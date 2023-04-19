<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;
    protected $fillable=['Name_Class','section_id','grade_id'];
    protected $table = 'levels';
    public $timestamps = true;

    public function section()
    {
        return $this->belongsTo('App\Models\Section', 'section_id');
    }
}
