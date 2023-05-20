<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\Grade;
use App\Models\Type;
use App\Models\Transcode;
use Illuminate\Http\Request;
use DataTables;

class SectionController extends Controller
{


    public function store(Request $request)
    {
        //dd($request);
        $type = new Section();
        $type->Name_Section = $request->name;
        $type->grad_id	= $request->grade_id;
        $type->save();
        return response()->json(['err' => false, 'msg' => 'تم الحفظ بنجاح'], 200);
    }

    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = Section::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('grade_name', function ($row) {
                    $name = Grade::where('id',$row->grad_id)->first()->name  ?? 'تم حذفه';
                    return $name;
                })
                ->addColumn('action', function ($row) {
                    $edit = route('section.edit', $row->id);
                    $actionBtn = '<a href=" ' . $edit . '" class="edit btn btn-success btn-sm m-1">Edit</a>';
                    // $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a>';
                    $actionBtn .= '<a href="javascript:void(0)" value="' . $row->id . '" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->make(true);
        }
        return view('section.index');
    }

    public function edit($id)
    {
        $type = Section::find($id);
        // $type_ar = Transcode::where('row_', $type->id  && 'table_','type' )->get();
        // $type_fr = Transcode::where('row_', $type->id  && 'table_','type' )->get();
        return view('section.edit', compact('type'));
    }

    public function update(Request $request)
    {
        $type =  Section::find($request->id);
        $type->Name_Section = $request->name;
        $type->grad_id	= $request->grade_id;
        $type->save();
        return response()->json(['err' => false, 'msg' => ' تم تعديل ألصف بنجاح'], 200);
    }

    public function delete(Request $request)
    {
        $t = Section::find($request->id);
        $t->delete();
        return response()->json(['err' => false, 'msg', 'تم الحذف بنجاح'], 200);
    }

    public function getlevel($id)
    {
        $sections = Section::where('grad_id',$id)->get();
        return $sections;
    }
}
