<?php

namespace Modules\Blog\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment1Model extends Model
{
    use HasFactory;

    //protected $fillable = [];
    
    protected static function newFactory()
    {
        return \Modules\Blog\Database\factories\Comment1ModelFactory::new();
    }
    use SoftDeletes ; 

    protected $table = 'comment1_models';

    public $fillable = [ 'id' , 'comment' , 'post_id' , 'user_id','date' ];

    protected $cascadeDeletes = ['post'];

    protected $dates = [ 'deleted_at' ];


    public function post()
    {
        return $this->belongsTo(Post1Model::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
