@extends('cp.layouts.master')



@section('css')
    <!-- Internal Data table css -->
    <link href="{{ URL::asset('cp/assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('cp/assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('cp/assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('cp/assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('cp/assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('cp/assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
@endsection


@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto"> نوع الصفحة </h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"></span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection



@section('content')
   
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">اضافه مشروع جديد</button>
<a  href="javascript:void(0)" class="btn btn-outline-danger"  onclick="printPdf('{{ route('project.exportprint') }}')">  Print </a>
<a  class="btn btn-outline-dark"  href="{{ route('project.exportpdf') }}">  PDF</a>
<br><br>

<div class="table-responsive">
    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
        style="text-align: center">
        <thead>
            <tr>
                <th>#</th>
                <th>الاسم</th>
                <th> الحاله</th>
                <th>العمليات</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 0; ?>
            @foreach ($projects as $project)
                <tr>
                    <?php $i++; ?>
                    <td>{{ $i }}</td>
                    <td>{{ $project->name }}</td>
                    <td>{{ $project->status }}</td>
                    <td>
                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                            data-target="#edit{{ $project->id }}"
                            title="تعديل مشروع"><i class="fa fa-edit"></i></button>
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                            data-target="#delete{{ $project->id }}"
                            title="حذف مشروع"><i
                                class="fa fa-trash"></i></button>
                    </td>
                </tr>

                <!-- edit_modal_Grade -->
                <div class="modal fade" id="edit{{ $project->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                    id="exampleModalLabel">
                                   تعديل مشروع
                                </h5>
                                <button type="button" class="close" data-dismiss="modal"
                                    aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                @php
                                    $arr = [] ;
                                    // foreach(\App\Models\ProjectType::where('project_id',$project->id)->get() as $type)
                                    foreach($project->types as $type)
                                    {
                                        $arr[] = $type->id; 
                                    }
                                @endphp
                                <!-- add_form -->
                                <form action="{{ route('project.update', 'test') }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col">
                                            <input id="id" type="hidden" name="id" class="form-control"value="{{ $project->id }}">
                                            <label for="Name" class="mr-sm-2">الاسم:</label>
                                            <input  class="form-control"  name="name" value="{{ $project->name }}" type="text" >
                                        </div>
                                        <div class="col">
                                            <label for="exampleFormControlTextarea1">الحاله:</label><br>
                                            <input type="checkbox" name="status" @if($project->status == 'on') checked @endif>
                                        </div>
                                        <div class="col">
                                            <label for="exampleFormControlTextarea1">ألنوع:</label><br>
                                            @foreach(\App\Models\Type::all() as $type)
                                                <label for="exampleFormControlTextarea1">{{ $type->type }}</label>
                                                <input type="checkbox"  name="type[]" value="{{ $type->id }}" {{is_array($arr) && in_array($type->id, $arr) ? 'checked' : '' }}><br>
                                            @endforeach    
                                        </div>
                                    </div>
                                    
                                    <br><br>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">اغلاق</button>
                                        <button type="submit"
                                            class="btn btn-success">تعديل</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- delete_modal_Grade -->
                <div class="modal fade" id="delete{{ $project->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                    id="exampleModalLabel">
                                    حذف مشروع
                                </h5>
                                <button type="button" class="close" data-dismiss="modal"
                                    aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('project.delete', 'test') }}" method="post">
                                    @csrf
                                    هل تريد حذف المشروع   {{ $project->name }} ؟؟
                                    <input id="id" type="hidden" name="id" class="form-control"
                                        value="{{ $project->id }}">
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">اغلاق</button>
                                        <button type="submit"
                                            class="btn btn-danger">حذف</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">اضافه مشروع جديد</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <form  action="{{route('project.store')}}" method="POST" class="needs-validation was-validated"  id="createType">
                                    @csrf
                                    <div class="row">
                                        <div class="col">
                                            <label for="Name" class="mr-sm-2">الاسم:</label>
                                            <input  class="form-control" v-model='name' name="name" placeholder="...." type="text" >
                                        </div>
                                        <div class="col">
                                            <label for="exampleFormControlTextarea1">الحاله:</label><br>
                                            <input type="checkbox"  name="status" >
                                        </div>
                                        <div class="col">
                                            <label for="exampleFormControlTextarea1">ألنوع:</label><br>
                                            @foreach(\App\Models\Type::all() as $type)
                                                <label for="exampleFormControlTextarea1">{{ $type->type }}</label>
                                                <input type="checkbox"  name="type[]" value="{{ $type->id }}"><br>
                                            @endforeach    
                                        </div>
                                    </div>
                                    <br>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                                        <button type="submit" class="btn btn-success">حفظ</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            @endforeach
    </table>
</div>
    
@endsection




@section('js')
<script>
    function printPdf(link) 
    {
        var iframe = document.createElement('iframe');
        iframe.style.display = "none";
        iframe.src = link;
        document.body.appendChild(iframe);
        iframe.contentWindow.focus();
        iframe.contentWindow.print();
    }
</script>
@endsection
