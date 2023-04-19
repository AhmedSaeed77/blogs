<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $fillable=['name','permissions'];

    protected $table = 'roles';
    public $timestamps = true;

    public function getPermissionAttribute($permissions)
    {
        return json_decode($permissions,true);
    }

    public function admin()
    {
        return $this->hasMany('App\Models\Admin', 'role_id');
    }

}
