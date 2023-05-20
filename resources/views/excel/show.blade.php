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

<br><br>
<div class="table-responsive">
    @if (\Session::has('success'))
                            <div class="alert alert-success">
                                <ul>
                                    <li>{!! \Session::get('success') !!}</li>
                                </ul>
                            </div>
                        @endif
    <form  action="{{route('excel.store')}}" method="POST" class="needs-validation was-validated"  id="createType" enctype="multipart/form-data">
        @csrf
        <div class="row d-flex justify-content-between">
            <div class="col-6">
                <label for="exampleFormControlTextarea1">excel:</label><br>
                <input type="file"  name="excel" required><br>  
            </div>
            <div>
                <button type="submit" class="btn btn-success">save</button>
            </div>
        </div>     
    </form>
</div>
    
@endsection
