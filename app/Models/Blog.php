<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable=['name','desc','image'];
    protected $table = 'blogs';
    public $timestamps = true;

    public function images()
    {
        return $this->hasMany('App\Models\BlogImage', 'blog_id');
    }

}
