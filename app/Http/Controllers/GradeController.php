<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Transcode;
use Illuminate\Http\Request;
use DataTables;

class GradeController extends Controller
{


    public function store(Request $request)
    {
        //dd($request);
        $type = new Grade();
        $type->name = $request->name;
        $type->notes = $request->desc;
        $type->save();
        return response()->json(['err' => false, 'msg' => 'تم الحفظ بنجاح'], 200);
    }

    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = Grade::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $edit = route('grade.edit', $row->id);
                    $actionBtn = '<a href=" ' . $edit . '" class="edit btn btn-success btn-sm m-1">Edit</a>';
                    // $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a>';
                    $actionBtn .= '<a href="javascript:void(0)" value="' . $row->id . '" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->make(true);
        }
        return view('grade.index');
    }

    public function edit($id)
    {
        $type = Grade::find($id);
        return view('grade.edit', compact('type'));
    }

    public function update(Request $request)
    {
        $type =  Grade::find($request->id);
        $type->name = $request->name;
        $type->notes = $request->desc;
        $type->save();
        return response()->json(['err' => false, 'msg' => ' تم تعديل المرحله بنجاح'], 200);
    }

    public function delete(Request $request)
    {
        $t = Grade::find($request->id);
        $t->delete();
        return response()->json(['err' => false, 'msg', 'تم الحذف بنجاح'], 200);
    }
}
