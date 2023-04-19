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
                <h4 class="content-title mb-0 my-auto"> نوع الصفحة </h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">
                    </span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection



@section('content')
    <!-- row -->
    <div id='types'>
        <div>
            <div class="row">
                <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
                    <!--div-->
                    <div class="card">
                        <form class="needs-validation was-validated" id="edittype">
                        <div class="card-body">
                            <div class="main-content-label mg-b-5">
                                إنشاء  جديد
                            </div>
                            <div class="row ">
                                <div class="col-lg">
                                    <label class="form-label">  الاسم  </label>
                                    <input  required="" class="form-control"  v-model='name' name="name" value= "{{ $type->Name_Class }}" type="text">
                                </div>
                                <div class="col-lg mg-t-10 mg-lg-t-0">
                                    <label class="form-label">  ألمرحله</label>
                                    <select v-model="grade_id" name="grade_id"  @change ="getsection" class="form-control form-control-solid" aria-label="Disabled select example">
                                        <option selected disabled>Choose place</option>
                                        @foreach (App\Models\Grade::all() as $grade)
                                            <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg mg-t-10 mg-lg-t-0">
                                    <label class="form-label">  الصف</label>
                                    <select v-model="section_id" name="section_id"   class="form-control form-control-solid" aria-label="Disabled select example">
                                        <option selected disabled>Choose place</option>
                                        <option v-for="i in images" :value="i.id">@{{ i.Name_Section }}</option>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" @click="saveData" class="btn btn-primary mt-3 mb-0">تعديل</button>
                        </div>
                        </form>
                    </div>
                </div>

                <!--/div-->
            </div>
            <!-- Container closed -->
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
        content = new Vue({
            'el': '#types',
            data: {
            name :"{{ $type->Name_Class }}",
            grade_id :"{{ $type->grade_id }}",
            section_id :"{{ $type->section_id }}",
            images:[],
            error :[]
            },
            mounted(){
                    this.getsection1();
                },
            methods: {
                validation:function(el , msg){
                    if(el == ''){
                        this.error.push({
                            'err' : 'err'
                        });
                        swal({
                                title:  msg,
                                type: 'warning',
                                confirmButtonText: 'موافق',
                            });
                        return 0;
                    }
                },
                saveData: function(e) {
                    e.preventDefault();
                    this.error = []
                    this.validation(this.section_id , '  الصف   مطلوب ');
                    this.validation(this.grade_id , '  المرحله   مطلوب ');
                    this.validation(this.name , '  الاسلم باللغه العربيه مطلوب ');
                    if (this.error.length !== 0) {
                            return false
                        }
                    Swal.showLoading()
                    let formData = new FormData(document.getElementById('edittype'));
                        formData.append('id',{!! $type->id !!})
                    axios.post('{{ route('level.update') }}', formData).then(response => {
                        console.log(response);
                        if (response.data.err == true) {
                            swal({
                                title: response.data.msg,
                                type: 'warning',
                                confirmButtonText: 'موافق',
                            });
                        } else {
                            swal({
                                title: response.data.msg,
                                type: 'success',
                                confirmButtonText: 'موافق',
                            });
                            window.location.href = '{{ route('level.index' )}}';
                        }
                    }).catch(response => {
                        console.log(response);
                    })
                },
                getsection:function()
                    {
                        console.log(this.grade_id);
                        url='{{route('section.getlevel',':id')}}';
                        url=url.replace(':id',this.grade_id);
                        axios.get(url).then(response => {
                            console.log(response);
                            this.images=response.data;
                            console.log(this.images);
                        }).catch(reject => {
                        var response = $.parseJSON(reject.responseText);
                        $.each(response.errors, function(name, msg) {
                            swal({
                                title: msg[0],
                                type: 'warning',
                                confirmButtonText: 'ok',
                            });
                            return 0
                        });
                    })
                    },
                    getsection1:function()
                    {
                        console.log(this.grade_id);
                        url='{{route('section.getlevel',':id')}}';
                        url=url.replace(':id',this.grade_id);
                        axios.get(url).then(response => {
                            console.log(response);
                            this.images=response.data;
                            console.log(this.images);
                        }).catch(reject => {
                        var response = $.parseJSON(reject.responseText);
                        $.each(response.errors, function(name, msg) {
                            swal({
                                title: msg[0],
                                type: 'warning',
                                confirmButtonText: 'ok',
                            });
                            return 0
                        });
                    })
                    },
                // getcourse:async function()
                // {
                //     this.images = await this.fetchsection(this.grade_id);
                //     //console.log(this.images);
                // },
                // fetchsection:function(section)
                // {
                //     $.ajaxSetup({
                //         headers: {
                //             'X-CSRF-TOKEN': '{{csrf_token()}}'
                //         }
                //     });
                //     return $.ajax ({
                //         type: 'get',
                //         url: '{{ route('level.fetch') }}'  ,
                //         data: {
                //             section:'',
                //         },
                        
                //     });
                // }
            }
        });
    </script>
@endsection
