<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Models\Grade;
use App\Models\Section;
use App\Models\Transcode;
use Illuminate\Http\Request;
use DataTables;

class LevelController extends Controller
{


    public function store(Request $request)
    {
        $type = new Level();
        $type->Name_Class = $request->name;
        $type->grade_id   = $request->grade_id;
        $type->section_id = $request->section_id;
        $type->save();
        return response()->json(['err' => false, 'msg' => 'تم الحفظ بنجاح'], 200);
    }

    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = Level::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('grade_name', function ($row) {
                    $name = Grade::where('id',$row->grade_id)->first()->name  ?? 'تم حذفه';
                    return $name;
                })
                ->addColumn('section_name', function ($row) {
                    $name = Section::where('id',$row->section_id)->first()->Name_Section  ?? 'تم حذفه';
                    return $name;
                })
                ->addColumn('action', function ($row) {
                    $edit = route('level.edit', $row->id);
                    $actionBtn = '<a href=" ' . $edit . '" class="edit btn btn-success btn-sm m-1">Edit</a>';
                    $actionBtn .= '<a href="javascript:void(0)" value="' . $row->id . '" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->make(true);
        }
        return view('level.index');
    }

    public function edit($id)
    {
        $type = Level::find($id);
        return view('level.edit', compact('type'));
    }

    public function update(Request $request)
    {
        $type =  Level::find($request->id);
        $type->Name_Class = $request->name;
        $type->grade_id   = $request->grade_id;
        $type->section_id = $request->section_id;
        $type->save();
        return response()->json(['err' => false, 'msg' => ' تم تعديل الفصل بنجاح'], 200);
    }

    public function delete(Request $request)
    {
        $t = Level::find($request->id);
        $t->delete();
        return response()->json(['err' => false, 'msg', 'تم الحذف بنجاح'], 200);
    }

    public function fetch(Request $request)
    {
        $sections = Section::where('grad_id',1)->get();
        //dd($sections);
        return $sections;
    }
}
