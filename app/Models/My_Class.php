<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class My_Class extends Model
{
    use HasFactory;
    
    //protected $fillable=['Name_Section','Grade_id','Class_id'];

    protected $table = 'myclasses';
    public $timestamps = true;

    public function grade()
    {
        return $this->belongsTo('App\Models\Section', 'section_id');
    }
}
