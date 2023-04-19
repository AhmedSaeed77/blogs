<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use  HasFactory;

    protected $table = 'admins';


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
        return $this->belongsTo('App\Models\Role', 'role_id');
    }

    public function hasAbility($permissions)
    {
        $role = $this->role;
        if(!$role)
        {
            return false;
        }

        foreach(json_decode($role->permissions) as $permission)
        {
            if(is_array($permissions) && in_array($permission,$permissions))
            {
                return true;
            }
            else if(is_string($permission) && strcmp($permissions,$permission) == 0)
            {
                return true;
            }
        }
        return false;
    }
}
