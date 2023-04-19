<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    //public $translatable = ['Name_Section'];
    protected $fillable=['Name_Section','grad_id'];

    protected $table = 'sections';
    public $timestamps = true;


    public function grade()
    {
        return $this->belongsTo('App\Models\Grade', 'grad_id');
    }


    public function level()
    {
        return $this->hasMany('App\Models\Level', 'section_id');
    }
}
