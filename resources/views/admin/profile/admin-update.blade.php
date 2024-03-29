@extends('cp.layouts.master')
@section('css')
    <!-- Internal Data table css -->
    <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">  الاعدادت </h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">
                    </span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
        <div id='blogId'>
        <div>

            <!-- row -->
            <div class="row">
                <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
                    <!--div-->
                    {{-- <form id='newblog'> --}}
                        <div class="card">
                            <div class="card-body">
                                <div class="main-content-label mg-b-5">
                                         تعديل الملف الشخصى للادمن
                                </div>
                                {{-- <div class="row">
                                    <div class="col-4">

                                    </div>
                                     <div class="col-2">
                                        <button  onclick="location.href='{{route('setting.lang','ar') }}'"  class="btn btn-primary mt-3 mb-0">  عربي</a>
                                    </div>
                                     <div class="col-2">
                                    <button type="button"  onclick="location.href='{{route('setting.lang','en') }}'" class="btn btn-primary mt-3 mb-0"> English </button>
                                    </div>
                                     <div class="col-2">
                                    <button type="button" onclick="location.href='{{route('setting.lang','fr') }}'" class="btn btn-primary mt-3 mb-0"> frensh </button>

                                    </div>
                                </div> --}}
                                {{-- @foreach (\App\Models\Setting::whereIn('id',[1,2,3,4,5,6,7,8,9,10,11,12,13])->get(); as  $st) --}}
                                <br> <hr> <br>
                                    <h6> {{ $admin->key }} </h6>
                                    <form action="{{route('profile.updateprofile')}}" method="POST" id="kt_project_settings_form" class="form" enctype="multipart/form-data">
                                        @csrf
                                    <div class='row'>
                                        
                                    <div class="col-4  ">
                                        <label class="form-label"> Name  </label>
                                        <input type="text" vrequired="" class="form-control" name="name" value="{{ $admin->name }} " rows="3"> 
                                    </div>
                                    <div class=" col-4 ">
                                        <label class="form-label"> Email  </label>
                                        <input type="email" required="" class="form-control" name="email" value="{{ $admin->email }} " rows="3">
                                    </div>
                                    <div class=" col-3 ">
                                        <label class="form-label"> Whatsapp </label>
                                        <input type="text" required="" class="form-control" name="whatsapp" value="{{ $admin->whatsapp }} " rows="3">
                                    </div> 

                                    {{-- <button type="button" onclick="updateSetting({{$admin->id}})" class="btn btn-primary mt-3 mb-0"> حفظ</button> --}}
                                    </div>
                                    <div class='row'>
                                        
                                    <div class="col-4  ">
                                        <label class="form-label"> Password  </label>
                                        <input type="password" required="" class="form-control" name="password"  rows="3">
                                    </div>
                                    <div class=" col-4 ">
                                        <label class="form-label"> Confirm  </label>
                                        <input type="password" required="" class="form-control" name="password"  rows="3">
                                    </div>
                                    

                                    
                                    </div>
                                    <button type="submit"  class="btn btn-primary mt-3 mb-0"> حفظ</button>
                                    </form>
                                {{-- @endforeach --}}

                            </div>
                        </div>

                </div>
            </div>

            {{-- <div class="row">
                <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
                    <!--div-->
                    <form id='newblog'>
                        <div class="card">
                            <div class="card-body">
                                <div class="main-content-label mg-b-5">
                                    معلومات الاتصال
                                </div>
                                <div class="row row-sm">
                                    <div class="col-lg-4">
                                        <label class="form-label">phone </label>
                                        <input required="" class="form-control" name="phone" type="number">
                                    </div>
                                    <div class="col-lg-4">
                                        <label class="form-label">address</label>
                                        <input required="" class="form-control" name="address" type="text">
                                    </div>
                                    <div class="col-lg-4">
                                        <label class="form-label">email </label>
                                        <input required="" class="form-control" name="email"  type="text">
                                    </div>
                                    <div class="col-lg-4">
                                        <label class="form-label">instgram </label>
                                        <input required="" class="form-control" name="insts"  type="text">
                                    </div>
                                    <div class="col-lg-4">
                                        <label class="form-label">facebook </label>
                                        <input required="" class="form-control" name="facebook"  type="text">
                                    </div>
                                    <div class="col-lg-4">
                                        <label class="form-label">linkedin </label>
                                        <input required="" class="form-control" name="linkedin"  type="text">
                                    </div>
                                      <div class="col-lg-4">
                                        <label class="form-label">site </label>
                                        <input required="" class="form-control" name="site"  type="text">
                                    </div>
                                      <div class="col-lg-4">
                                        <label class="form-label">whatsapp </label>
                                        <input required="" class="form-control" name="whatsapp"  type="text">
                                    </div>
                                    <div class="col-lg-4">
                                        <label class="form-label">logo </label>
                                        <input name='logo' multiple class="form-control" required="" type="file">
                                </div>
                                </div>
                            <button type="submit" @click="saveData" class="btn btn-primary mt-3 mb-0">حفظ</button>

                            </div>
                        </div>
                    </form>
                </div>
            </div> --}}
        </div>
        </div>
    <!-- main-content closed -->
@endsection

@section('js')
    <!-- Internal Data tables -->
    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/table-data.js') }}"></script>
    <script src="{{ URL::asset('js/sweetalert2@11.js') }}"></script>
    <script src="{{ URL::asset('js/sweetalert2.all.js') }}"></script>
    @include('vue')
        <script>
        function updateSetting(id) {
            let formData = new FormData(document.getElementById(id));
            axios.post("{{route('setting.update')}}", formData).then(response => {
                //    $('#loading').hide();
                        swal({
                            title: 'تم التعديل بنجاح',
                            type: 'success',
                            confirmButtonText: 'موافق',
                        });
                    }).catch(response => {
                        swal({
                            title: response.response.message,
                            type: 'warning',
                            confirmButtonText: 'موافق',
                        });
                    });
            };


</script>
@endsection
