<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;
    // protected $fillable=['photoable_type','photoable_id','image'];
    protected $fillable=['image'];
    protected $table = 'photos';
    public $timestamps = true;

    public function photoable()
    {
        return $this->morphTo();
    }
}
