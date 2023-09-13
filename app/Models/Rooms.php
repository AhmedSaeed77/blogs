<?php
namespace App;
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rooms extends Model
{
    use HasFactory;
    protected $table = 'rooms';

    protected $fillable = ['name_en', 'name_ar', 'number_city'];

    
}
