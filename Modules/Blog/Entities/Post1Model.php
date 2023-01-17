<?php

namespace Modules\Blog\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post1Model extends Model
{
    use HasFactory;

    //protected $fillable = [];
    
    protected static function newFactory()
    {
        return \Modules\Blog\Database\factories\Post1ModelFactory::new();
    }
    use SoftDeletes ; 

    protected $table = 'post1_models';

    public $fillable = [ 'id' , 'title' , 'content' , 'auth','date','image','pdf' ];

    protected $cascadeDeletes = ['comments'];

    protected $dates = [ 'deleted_at' ];


    public function comments()
    {
        return $this->hasMany(Comment1Model::class);
    }

}
