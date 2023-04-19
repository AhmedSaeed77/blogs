@extends('cp.layouts.master')



@section('css')
    <!-- Internal Data table css -->
    <link href="{{ URL::asset('cp/assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('cp/assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('cp/assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('cp/assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('cp/assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('cp/assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">

    <script src="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone-min.js"></script>
<link href="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone.css" rel="stylesheet" type="text/css" />

@endsection


@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">  مقال </h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"></span>
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
                        <form class="needs-validation was-validated" id="createType">
                        <div class="card-body">
                            <div class="main-content-label mg-b-5">
                                إنشاء  مقال
                            </div>
                            <div class="row ">
                                <div class="col-lg">
                                    <label class="form-label">  Name  </label>
                                    <input  required="" class="form-control"  v-model='name' name="name" placeholder="...." type="text">
                                </div>
                                <div class="col-lg mg-t-10 mg-lg-t-0">
                                    <label class="form-label">  الصوره </label>
                                    <input required="" class="form-control"  v-model='image' name="image" placeholder=".... " type="file">
                                </div>
                                
                                <div class="col-lg mg-t-10 mg-lg-t-0">
                                    <label class="form-label"> الوصف </label>
                                    <textarea required="" class="form-control" v-model='desc' name="desc" placeholder=".... " ></textarea>
                                </div>
                                
                            </div>
                            
                            <button type="submit" @click="saveData" class="btn btn-primary mt-3 mb-0">حفظ</button>
                        </div>
                        </form>
                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header pb-0">
                            <div class="d-flex justify-content-between">
                                <i class="mdi mdi-dots-horizontal text-gray"></i>
                            </div>
                            <p class="tx-12 tx-gray-500 mb-2"> الوحدات  <a href=""></a></p>
                        </div>
                        <div class="card-body">
                            <div class="table">
                                <table class="table text-md-nowrap" id="type">
                                    <thead>
                                        <tr>
                                            <th class="wd-15 border-bottom-0">  # </th>
                                            <th class="wd-15 border-bottom-0">   الاسم </th>
                                            <th class="wd-15 border-bottom-0">  الوصف   </th>
                                            <th class="wd-15 border-bottom-0">  الاجراءات</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
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

    <script type="text/javascript">
        new Dropzone("#imgae_upload",{
            thumbnailWidth:200,
            maxFileSize:1,
            acceptedFiles:".jpeg,.png,.jpg",
        }) 
    </script>

    <!-- Internal Data tables -->
    <script src=" https://code.jquery.com/jquery-3.5.1.js"> </script>
    <script src="{{ URL::asset('cp/assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('cp/assets/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('cp/assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('cp/assets/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('cp/assets/js/table-data.js') }}"></script>
    <script src="{{ URL::asset('cp/assets/js/sweetalert2@11.js') }}"></script>
    <script src="{{ URL::asset('cp/assets/js/sweetalert2.all.js') }}"></script>
    {{-- <script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"> </script> --}}
    {{-- <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.colVis.min.js"> </script> --}}
    
{{-- <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"> </script> --}}

<script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"> </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"> </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"> </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"> </script>
<script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"> </script>
<script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.colVis.min.js"> </script>
    @include('vue')
    <script type="text/javascript">

        $(function() {
            var table = $('#type').DataTable({
                dom: 'Bfrtip',
                responsive: true,
                    processing: true,
                    serverSide: true,
                ajax: {
                    url:"{{ route('blog.index') }}",
                    data: function (d) {
                        }
                    },
                columns: [
                    // {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {
                        data: 'id',
                        name: 'id',
                    },
                    {
                        data: 'name',
                        name: 'name',
                    },
                    {
                        data: 'desc',
                        name: 'desc',
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: true,
                        searchable: true
                    },
                    
                ],
                buttons: [
                        {
                            extend: 'copyHtml5',
                            exportOptions: {
                                columns: [ 0, 1 ,2]
                            }
                        },
                        {
                            extend : "pdf",
                            text: 'PDF',
                            orientation : 'landscape',
                            exportOptions: {
                                                columns: [ 0, 1,2]
                                            }
                        },
                        {
                                        extend : "excel",
                                        text: 'Excel',
                                        orientation : 'landscape',
                                        exportOptions: {
                                                columns: [ 0, 1 ,2]
                                            }
                            },
                            {
                extend: 'colvis',
                exportOptions: {
                    columns: [ 0, 1,2]
                }
                            
            }
                            ],
           
            })

            $('#type tbody').on('click', '.delete', function() {
                    var value = $(this).attr("value");
                    Swal.fire({
                        title: ' هل انت متأكد من حذف ' ,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'متأكد !'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                type: 'post',
                                url: "{{ route('blog.delete') }}",
                                data: {
                                    '_token': "{{ csrf_token() }}",
                                    'id': value,
                                },
                                success: (response) => {
                                    if (response) {
                                        Swal.fire({
                                            position: 'top-center',
                                            icon: 'success',
                                            title: 'تم الحذف  بنجاح',
                                            showConfirmButton: false,
                                            timer: 1500
                                        })
                                        table.ajax.reload(null, false);
                                    }
                                },
                                error: function(reject) {
                                    console.log(reject)
                                }

                            })

                        }
                    })
                    // console.log($(this).attr("value"));
            });

            });
            
        content = new Vue({
            'el': '#types',
            data: {
                name:'',
                image:'',
                desc:'',
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
                saveData: function(e) {
                    e.preventDefault();
                        this.error = []
                        this.validation(this.desc , ' الوصف مطلوب ');
                        this.validation(this.image , ' الصوره مطلوبه ');
                        this.validation(this.name , ' الاسم مطلوب ');
                    if (this.error.length !== 0) {
                            return false
                        }
                    let formData = new FormData(document.getElementById('createType'));
                    this.load = true;
                    axios.post('{{ route('blog.store') }}', formData).then(response => {
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
                    window.location.href = '{{ route('blog.index' )}}';
                }
            }
        });
    </script>
@endsection
