<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

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

    public function setImageAttribute(UploadedFile $file)
    {
        $filename = $file->hashName();
        $file->move('images/blogs',$filename);
        $this->attributes['image'] = $filename;
    }

    public function getImageAttribute()
    {
        if ($this->attributes['image']) 
        {
            return asset('images/blogs/' . $this->attributes['image']);
        }
        return null;
    }

}
