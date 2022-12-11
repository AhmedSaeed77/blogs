<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory;
    use SoftDeletes ; 

    protected $table = 'comments';

    public $fillable = [ 'id' , 'comment' , 'post_id' , 'user_id','date' ];

    protected $cascadeDeletes = ['post'];

    protected $dates = [ 'deleted_at' ];


    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function user()
    {
        return $this->belongsTo(Post::class);
    }
}
