<?php

namespace App\Http\Livewire;
use Modules\Blog\Entities\Post1Model;
use Livewire\Component;
use Carbon\Carbon;
use Illuminate\Http\Request;

class Counter extends Component
{
    public $count = 0;
    public $comment = "";
    public $newComment;
    
    public function render()
    {
        return view('livewire.counter',['count'=>$this->count,'comment'=>$this->comment]);
    }

    public function increment()
    {
        $this->count +=1; 
    }

    public function decrement()
    {
        $this->count -=1; 
    }

    public function addComment()
    {
        $post = new Post1Model();
        $post->title = $this->newComment;
        $post->auth = "asd";
        $post->content = "asd";
        $post->date = Carbon::now();
        $post->save();
        $this->comment ="ahmed"; 
    }
}
