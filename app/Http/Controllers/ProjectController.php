<?php

namespace App\Http\Controllers;
use App\Models\Project;
use App\Models\ProjectType;
use App\Models\Photo;
use App\Http\Resources\ProjectResource;
use Illuminate\Http\Request;
use DataTables;
use PDF;
use Illuminate\Support\Facades\File;

class ProjectController extends Controller
{
    
    public function store(Request $request)
    {
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
        if($request->image)
        {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $file->move('images/project',$filename);
            
            $photo = Photo::make([
                'image'=>$filename,
            ]);
            $project->photos()->save($photo);
        }
        
        toastr()->success('تم الحفظ بنجاح');
        return redirect()->route('project.index');
    }

    public function showresource($id)
    {
        $project = Project::findOrFail($id);
        return new ProjectResource($project);
    }

    public function photo()
    {
        $projects = Project::get();
        foreach($projects as $project)
        {
            foreach($project->photos as $photo)
            {
                $photo->image = url('images/project'.$photo->image);
            }
        }
        return $projects;
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
        if($request->image)
        {
            foreach($project->photos as $photo)
            {
                if (File::exists('images/project/'.$photo->image)) 
                {
                    File::delete('images/project/'.$photo->image);
                }
            }
            
            $project->photos()->delete(); 
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $file->move('images/project',$filename);
            
            $photo = Photo::make([
                'image'=>$filename,
            ]);
            $project->photos()->save($photo);
        }
        toastr()->success('تم التعديل بنجاح');
        return redirect()->route('project.index');
    }

    public function delete(Request $request)
    {
        $project = Project::find($request->id);
        $projecttype = ProjectType::where('project_id',$project->id)->delete();
        foreach($project->photos as $photo)
        {
            if (File::exists('images/project/'.$photo->image)) 
            {
                File::delete('images/project/'.$photo->image);
            }
        }
        $project->photos()->delete();
        $project->delete();
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
