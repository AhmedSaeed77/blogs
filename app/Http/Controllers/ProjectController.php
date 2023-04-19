<?php

namespace App\Http\Controllers;
use App\Models\Project;
use App\Models\ProjectType;
use Illuminate\Http\Request;
use DataTables;
use PDF;

class ProjectController extends Controller
{
    
    public function store(Request $request)
    {
        //dd($request);
        $request->validate([
                                'name'=>'required'
                            ],
                            [
                                'name'=>' عنوان المشروع مطلوب ',
                            ]);
        $project = new Project();
        $project->name = $request->name;
        if($request->status)
        {
            $project->status   = $request->status;
        }
        else
        {
            $project->status   = 'off';
        }
        $project->save();

        if($request->type)
        {
            foreach($request->type as $type)
            {
                $projecttype = new ProjectType();
                $projecttype->project_id = $project->id;
                $projecttype->type_id = $type;
                $projecttype->save();
            }
        }
        
        toastr()->success('تم الحفظ بنجاح');
        return redirect()->route('project.index');
    }

    public function index(Request $request)
    {
        $projects = Project::all();
        return view('project.show',compact('projects'));
    }

    public function update(Request $request)
    {
        $project = Project::find($request->id);
        $project->name = $request->name;
        if($request->status)
        {
            $project->status   = $request->status;
        }
        else
        {
            $project->status   = 'off';
        }
        $project->save();
        if($request->type)
        {
            $projecttype = ProjectType::where('project_id',$project->id)->delete();
            foreach($request->type as $type)
            {
                $projecttype = new ProjectType();
                $projecttype->project_id = $project->id;
                $projecttype->type_id = $type;
                $projecttype->save();
            }
        }
        toastr()->success('تم التعديل بنجاح');
        return redirect()->route('project.index');
    }

    public function delete(Request $request)
    {
        $t = Project::find($request->id);
        $projecttype = ProjectType::where('project_id',$t->id)->delete();
        $t->delete();
        toastr()->error('تم الحذف بنجاح');
        return redirect()->route('project.index');
    }

    public function exportprint()
    {
        $projects = Project::get();
        return view('project.s' , ['projects'=>$projects]);
    }

    public function exportpdf()
    {
        $projects = Project::get();
        $pdf = PDF::loadView('project.s',compact('projects'),[ 'title' => 'Certificate', 'format' => 'A4-L','orientation' => 'L']);
        return $pdf->download('Certificate.pdf');
    }

}
