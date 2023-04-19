<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogImage;
use Illuminate\Http\Request;
use DataTables;

class BlogController extends Controller
{
    public function store(Request $request)
    {
       
        $blog = new Blog();
        $blog->name = $request->name;
        $blog->desc = $request->desc;

        $filename = $request->file('image');
        $path = 'images/blogs';

        $blog->image = uploadMedia($filename,$path);
        $blog->save();


        return response()->json(['err' => false, 'msg' => 'تم الحفظ بنجاح'], 200);
    }

    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = Blog::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $edit = route('blog.edit', $row->id);
                    $actionBtn = '<a href=" ' . $edit . '" class="edit btn btn-success btn-sm m-1">Edit</a>';
                    // $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a>';
                    $actionBtn .= '<a href="javascript:void(0)" value="' . $row->id . '" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->make(true);
        }
        return view('blog.index');
    }

    public function edit($id)
    {
        $type = Blog::find($id);
        return view('blog.edit', compact('type'));
    }

    public function update(Request $request)
    {
        $type =  Blog::find($request->id);
        $type->name = $request->name;
        $type->desc = $request->desc;
        if($request->file('image'))
        {
            $filename = $request->file('image');
            $path = 'images/blogs';
            $type->image = uploadMedia($filename,$path);
        }
        $type->save();
        return response()->json(['err' => false, 'msg' => ' تم تعديل النوع بنجاح'], 200);
    }

    public function delete(Request $request)
    {
        $t = Blog::find($request->id);
        $t->delete();
        return response()->json(['err' => false, 'msg', 'تم الحذف بنجاح'], 200);
    }

    public function showform()
    {
        return view('blog.storeimages');
    }

    public function storimages(Request $request)
    {
        if($request->file('images'))
        {
            foreach($request->file('images') as $image)
            {
                $newimage = new  BlogImage();
                $newimage->blog_id = $request->blog_id;

                $file = $image;
                // $path = 'images/blogs';
                // $newimage->image = uploadMedia($file,$path);
                $filename = $file->getClientOriginalName();
                $filename = str_replace(" ","",$filename);
                $file->move('images/blogs', $filename);
                $newimage->image = $filename;
                $newimage->save(); 
            }
        }
        return redirect()->route('blog.index');
    }

    public function editimage()
    {
        return view('blog.editimages');
    }

    public function getimagesvue($id)
    {
        $blog = Blog::findorfail($id);
        $blogimages =  $blog->images;
        foreach($blogimages as $a)
        {
            $a->image = url('images/blogs/'.$a->image);
        }
        return response()->json(['blogimages' => $blogimages], 200); 
    }

    public function deleteimage(Request $request)
    {
        $blog = BlogImage::findorfail($request->id);
        $blog->delete();
        return response()->json(['err' => false, 'msg' => 'تم الحذف بنجاح'], 200);
    }

    public function updateimage(Request $request)
    {
        $blog = new BlogImage();
        $blog->blog_id = $request->id;
        // if ($request->hasFile('image')) 
        // {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $file->move('images/blogs/', $filename);
            $blog->image = $filename;
        // }
        $blog->save();
        return response()->json(['err' => false, 'msg' => 'تم الحفظ بنجاح'], 200);
    }
}
