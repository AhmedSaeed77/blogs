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
                <h4 class="content-title mb-0 my-auto"> مرحله  </h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"></span>
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
                        <form class="needs-validation was-validated" id="addkey">
                        <div class="card-body">
                            <div class="main-content-label mg-b-5">
                                إنشاء  جديد
                            </div>
                            <div class="row ">
                                <div class="col-lg-4">
                                    <label class="form-label">  key  </label>
                                    <input  required="" class="form-control" v-model="key" name="key" value="" placeholder="...." type="text">
                                </div>
                            </div>
                            <button type="submit" @click="saveData" class="btn btn-primary mt-3 mb-0">حفظ</button>
                        </div>
                        </form>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover table-checkable" id="kt_datatable1" style="margin-top: 13px !important">
                        <thead>
                            <tr>
                                <th class="wd-15p border-bottom-0"> id</th>
                                <th class="wd-15p border-bottom-0"> المفتاح </th>
                                <th class="wd-15p border-bottom-0"> الترجمة </th>
                                <th class="wd-15p border-bottom-0">  عمليات </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($lang_data as $count=>$language)
                                    <tr id="lang-{{$language['key']}}">
                                        <td>{{$count+1}}</td>
                                        <td>
                                            <input type="text" name="key[]" value="{{$language['key']}}" hidden>
                                            <label>{{$language['key']}}</label>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="value[]"
                                                id="value-{{$count+1}}"
                                                value="{{$language['value']}}">
                                        </td>
                                        <td style="width: 100px">
                                            <button type="submit" onclick="update_lang('{{$language['key']}}',$('#value-{{$count+1}}').val())"
                                                    class="btn btn-primary"> update
                                            </button>
                                            <button type="submit" @click="deleteFunction('{{$language['key']}}',2)" class="btn btn-danger"> Delete </button>
                                        </td>
                                    </tr>
                            @endforeach
                        </tbody>
                    </table>
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
    <script src="{{ URL::asset('cp/assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('cp/assets/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('cp/assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('cp/assets/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('cp/assets/js/table-data.js') }}"></script>
    <script src="{{ URL::asset('cp/assets/js/sweetalert2@11.js') }}"></script>
    <script src="{{ URL::asset('cp/assets/js/sweetalert2.all.js') }}"></script>
    <script src="{{ asset('tinymce/tinymce.min.js') }}"></script>
    @include('vue')
    <script type="text/javascript">

            function update_lang(key, value) 
            {
                data =  {
                        key: key,
                        value: value
                    },
                axios.post("{{route('languages.translate_submit',[$lang])}}", data).then(response => {
                    $('#loading').hide();
                                swal({
                                    title: response.data.msg,
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
            // function delete_word(key, value) 
            // {
            //     data =  {
            //             key: key,
            //             value: value
            //         },
            //     axios.post("{{route('languages.delete',[$lang])}}", data).then(response => {
            //         $('#loading').hide();
            //                     swal({
            //                         title: response.data.msg,
            //                         type: 'success',
            //                         confirmButtonText: 'موافق',
            //                     });
            //             }).catch(response => {
            //                 swal({
            //                     title: response.response.message,
            //                     type: 'warning',
            //                     confirmButtonText: 'موافق',
            //                 });
            //             });
            // };

        content = new Vue({
            'el': '#types',
            data: {
                key:'',
                error:[]
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
                deleteFunction:function(key, value) 
                    {
                        //const id1 = id;
                        Swal.fire({
                            title: 'Are you sure?',
                            text: "You won't be able to revert this!",
                            icon: 'warning',
                            background: 'white',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#DD6B55',
                            confirmButtonText: 'Yes, delete it!'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                    $.ajax({
                                        type: 'post',
                                        url: "{{ route('languages.delete',[$lang]) }}",
                                        data: {
                                            '_token': "{{ csrf_token() }}",
                                            'key': key,
                                        },
                                        success: (response) => {
                                            if (response) {
                                                Swal.fire({
                                                    position: 'top-center',
                                                    icon: 'success',
                                                    title: response.data.msg,
                                                    background: 'white',
                                                    showConfirmButton: false,
                                                    timer: 1500
                                                })
                                                
                                            }
                                        },
                                        error: function(reject) {
                                            console.log(reject)
                                        }
                                    })
                                Swal.fire(
                                    'Deleted!',
                                    'Your file has been deleted.',
                                    'success'
                                )
                                }
                            })
                    },
                saveData: function(e) {
                    e.preventDefault();
                        this.error = []
                        this.validation(this.key , '    المفتاح مطلوب ');
                        
                    if (this.error.length !== 0) {
                            return false
                        }
                    let formData = new FormData(document.getElementById('addkey'));
                    this.load = true;
                    axios.post('{{ route('languages.translate_add') }}', formData).then(response => {
                        console.log(response)
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
                            this.load = false;
                        }
                    }).catch(response => {
                        swal({
                            title: response.response.message,
                            type: 'warning',
                            confirmButtonText: 'موافق',
                        });
                    })
                    window.location.href = '{{ route('languages.lang',LaravelLocalization::setLocale() )}}';
                }
            }
            }); 
    </script>

@endsection
