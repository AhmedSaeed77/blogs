<?php

namespace Modules\Blog\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Illuminate\Routing\Controller;
use Modules\Blog\Entities\Post1Model;
//use Modules\Blog\Entities\Comment1Model;
use Modules\Blog\Entities\Comment1Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;

class PostController extends Controller
{
    public function getlivewire()
    {
        $posts = Post1Model::all();
        return view('livewire',['posts'=>$posts]);
    }

    public function  livewire()
    {

    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $posts = Post1Model::all();

        $car = Carbon::now()->toDateString();
        $arr = [];
        foreach($posts as $post)
        {
            if($car == $post->created_at->toDateString())
            {
                $arr[] = $post->created_at->toDateString();
            } 
        }
        $count = count($arr);
        
        return view('posts.index',['posts'=>$posts,'count'=>$count]);
    }

    public function add()
    {
        return view('posts.add');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required|unique:posts|string',
            'auth'=>'required',
            'content'=>'required|max:20',
            'date'=>'required',
            'image'=>'required|mimes:jpg,png,webp|max:20000',
            //'pdf' => 'required'
          ],[
             'title'=>' عنوان المقال مطلوب ',
             'auth'=>' مؤلف المقال مطلوب ',
             'content'=>'محتوى المقال اكثر من 20 حرف',
             'date'=>'تاريخ المقال مطلوب',
             'image'=>'صوره  المقال مطلوب  ', 
             //'pdf'=>'مقال مطلوبه اقصى حجم 2 ميجا  ',
          ]);

        $post = new Post1Model();
        $post->title = $request->title;
        $post->auth = $request->auth;
        $post->content = $request->content;
        $post->date = $request->date;

        $filename = $request->file('image');
        $path = 'images/posts';
        $post->image = uploadMedia($filename,$path);


        // $file = $request->file('pdf');
        // $filename = $file->getClientOriginalName();
        // $file->move('images/posts/pdf',$filename);
        // $post->pdf = $filename;
        
        $post->save();
        return redirect()->route('index');
    }

    public function edit($id)
    {
        $post = Post1Model::find($id);
        
        return view('posts.edit', ['post'=>$post]);
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'title'=>'required|string',
            'auth'=>'required',
            'content'=>'required|min:20',
            'date'=>'required',
            //'image'=>'required|mimes:jpg,png,webp',
          ],[
             'title'=>' عنوان المقال مطلوب ',
             'auth'=>' مؤلف المقال مطلوب ',
             //'content'=>'محتوى المقال مطلوب',
             'content'=>'محتوى المقال اكثر من 20 حرف',
             'date'=>'تاريخ المقال مطلوب',
            // 'image'=>'صوره  المقال مطلوب  ', 
          ]);

        $post = Post1Model::find($id);
        $post->title = $request->title;
        $post->auth = $request->auth;
        $post->content = $request->content;
        $post->date = $request->date;
        
        $path = 'images/posts';

        if($request->file('image'))
        {
            $post->image = saveimage($request->file('image'),$path);
        }
        
        
        $post->save();
        return redirect()->route('index');
    }

    public function delete(Request $request)
    {
        $post = Post1Model::findOrFail($request->id);
        
        if (File::exists('images/posts/' .$post->image)) 
        {
            File::delete('images/posts/'.$post->image);
        }
        //$post->comments()->delete();
        $post->delete();
        return redirect()->back();
    }
    public function show($id)
    {
        $post = Post1Model::findOrFail($id);
        $comments = Comment1Model::where('post_id',$id)->get();
        return view('comments.show', ['comments'=>$comments,'post'=>$post]);
    }
    public function add_comment(Request $request,$id)
    {
        $request->validate([
            'comment'=>'required|string|min:20',
            'date'=>'required',
          ],[
             'comment'=>' محتوى المقال مطلوب ',
             'date'=>'تاريخ المقال مطلوب',
          ]);

        $comment = new Comment1Model();
        $comment->comment = $request->comment;
        $comment->user_id = Auth::user()->id;
        $comment->post_id = $id;
        $comment->date = $request->date;
        $comment->save();
        return redirect()->back();
    }

    public function download($id)
    {
        $post = Post1Model::findOrFail($id);
        $f = $post->pdf ;
        $file_path = 'images/posts/pdf/'.$f;
        return response()->download( $file_path);
    }

}
