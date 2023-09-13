<?php
namespace App;
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Countries extends Model
{
    use HasFactory;
    protected $table = 'countries';

    protected $fillable = ['name_en', 'name_ar', 'number_city'];

    
}
