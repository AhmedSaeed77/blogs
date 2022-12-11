<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('posts.index',['posts'=>$posts]);
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
            'content'=>'required',
            'date'=>'required',
            'image'=>'required|mimes:jpg,png,webp|max:20000',
          ],[
             'title'=>' عنوان المقال مطلوب ',
             'auth'=>' مؤلف المقال مطلوب ',
             'content'=>'محتوى المقال مطلوب',
             'date'=>'تاريخ المقال مطلوب',
             'image'=>'صوره  المقال مطلوب  ', 
          ]);

        $post = new Post();
        $post->title = $request->title;
        $post->auth = $request->auth;
        $post->content = $request->content;
        $post->date = $request->date;

        $file = $request->file('image');
        $filename = $file->getClientOriginalName();
        $file->move('images/posts',$filename);
        $post->image = $filename;
        
        
        $post->save();
        return redirect()->route('index');
    }

    public function edit($id)
    {
        $post = Post::find($id);
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
             'content'=>'محتوى المقال مطلوب',
             'date'=>'تاريخ المقال مطلوب',
            // 'image'=>'صوره  المقال مطلوب  ', 
          ]);

        $post = Post::find($id);
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
        $post = Post::findOrFail($request->id);
        
        if (File::exists('images/posts/' .$post->image)) 
        {
            File::delete('images/posts/'.$post->image);
        }
        $post->comments()->delete();
        $post->delete();
        return redirect()->back();
    }
    public function show($id)
    {
        $post = Post::findOrFail($id);
        $comments = Comment::where('post_id',$id)->get();
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

        $comment = new Comment();
        $comment->comment = $request->comment;
        $comment->user_id = Auth::user()->id;
        $comment->post_id = $id;
        $comment->date = $request->date;
        
        
        $comment->save();
        return redirect()->back();
    }

}
