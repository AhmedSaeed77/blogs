<?php

namespace App\Http\Controllers;
use App\Models\Video;
use App\Models\Country;
// use Debugbar;
use Illuminate\Support\Facades\Cache;
use App\Events\VideoViewer;
use Illuminate\Http\Request;

class YoutubeController extends Controller
{
    public function getVideo()
    {
        $video = Video::first();
        event(new VideoViewer($video));
        return view('youtube',['video'=>$video]);
    }

    public function index()
    {
        $videos = Cache::remember('users',20,function(){
            return Country::take(10000)->get(); 
        });
        return get_defined_vars();
    }
}
