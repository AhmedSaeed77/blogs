<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;

    use SoftDeletes ; 

    protected $table = 'posts';

    public $fillable = [ 'id' , 'title' , 'content' , 'auth','date','image' ,'pdf'];

    protected $cascadeDeletes = ['comments'];

    protected $dates = [ 'deleted_at' ];


    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    
}
