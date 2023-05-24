<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Cache;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function index()
    {
        Cache::put('key','this should be a cache keey',now()->addDay());
        dd(Cache::get('key'));
    }
}
