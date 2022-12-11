<?php

namespace Modules\Blog\Http\Controllers;
use Modules\Blog\Entities\Comment1Model;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment1Model::all();
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

        $comment = new Comment1Model();
        $comment->comment = $request->comment;
        $comment->user_id = $request->auth;
        $comment->comment_id = $request->content;
        $comment->date = $request->date;
        
        
        $comment->save();
        return redirect()->route('comment.comments');
    }

    public function edit($id)
    {
        $comment = Comment1Model::find($id);
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

        $comment = Comment1Model::find($id);
        $comment->comment = $request->comment;
        $comment->user_id = $request->auth;
        $comment->comment_id = $request->content;
        $comment->date = $request->date;
        
        
        $comment->save();
        return redirect()->route('post.posts');
    }

    public function delete(Request $request)
    {
        $comment = Comment1Model::findOrFail($request->id);
        $comment->delete();
        return redirect()->back();
    }
}
