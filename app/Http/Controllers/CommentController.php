<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\comment;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::all();
        return view('comments.index',['comments'=>$comments]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'comment'=>'required|string||min:20',
            'date'=>'required',
          ],[
             'comment'=>' محتوى المقال مطلوب ',
             'date'=>'تاريخ المقال مطلوب',
          ]);

        $comment = new Comment();
        $comment->comment = $request->comment;
        $comment->user_id = $request->auth;
        $comment->comment_id = $request->content;
        $comment->date = $request->date;
        
        
        $comment->save();
        return redirect()->route('comment.comments');
    }

    public function edit($id)
    {
        $comment = Comment::find($id);
        return view('commentts.edit', ['comment'=>$comment]);
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'comment'=>'required|string||min:20',
            'date'=>'required',
          ],[
             'comment'=>' محتوى المقال مطلوب ',
             'date'=>'تاريخ المقال مطلوب',
          ]);

        $comment = Comment::find($id);
        $comment->comment = $request->comment;
        $comment->user_id = $request->auth;
        $comment->comment_id = $request->content;
        $comment->date = $request->date;
        
        
        $comment->save();
        return redirect()->route('post.posts');
    }

    public function delete(Request $request)
    {
        $comment = Comment::findOrFail($request->id);
        $comment->delete();
        return redirect()->back();
    }
}
