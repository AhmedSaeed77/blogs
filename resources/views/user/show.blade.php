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
   
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal1">اضافه مستخدم جديد</button>
<br><br>

<div class="table-responsive">
    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
        style="text-align: center">
        <thead>
            <tr>
                <th>#</th>
                <th>الاسم</th>
                <th> الايميل</th>
                <th>الصلاحيه</th>
                <th>العمليات</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 0; ?>
            @foreach ($users as $user)
                <tr>
                    <?php $i++; ?>
                    <td>{{ $i }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role->name }}</td>
                    <td>
                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                            data-target="#edit{{ $user->id }}"
                            title="تعديل مشروع"><i class="fa fa-edit"></i></button>
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                            data-target="#delete{{ $user->id }}"
                            title="حذف مشروع"><i
                                class="fa fa-trash"></i></button>
                    </td>
                </tr>

                <!-- edit_modal_Grade -->
                <div class="modal fade" id="edit{{ $user->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                    id="exampleModalLabel">
                                   تعديل ألمستخدم
                                </h5>
                                <button type="button" class="close" data-dismiss="modal"
                                    aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- add_form -->
                                <form action="{{ route('users.update', 'test') }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col">
                                            <input id="id" type="hidden" name="id" class="form-control"value="{{ $user->id }}">
                                            <label for="Name" class="mr-sm-2">الاسم:</label>
                                            <input  class="form-control"  name="name" value="{{ $user->name }}" type="text" >
                                        </div>
                                        
                                        <div class="col">
                                            <label for="Name" class="mr-sm-2">الايميل:</label>
                                            <input  class="form-control"  name="email" value="{{ $user->email }}" type="email" >
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label for="Name" class="mr-sm-2">كلمه المرور:</label>
                                            <input  class="form-control"  name="password"  type="password" >
                                        </div>
                                        
                                        <div class="col">
                                            <label for="Name" class="mr-sm-2">تاكيد كلمه المرور:</label>
                                            <input  class="form-control"  name="confirm"  type="password" >
                                        </div>
                                        <div class="col">
                                            <label for="Name" class="mr-sm-2">الصلاحيات:</label>
                                            <select v-model="grade_id" name="role_id"  class="form-control form-control-solid" aria-label="Disabled select example">
                                                <option selected disabled>Choose role</option>
                                                @foreach (App\Models\Role::all() as $role)
                                                    <option @if($user->role_id == $role->id) selected @endif value="{{ $role->id }}" >{{ $role->name }}</option>
                                                @endforeach
                                            </select>  
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
                <div class="modal fade" id="delete{{ $user->id }}" tabindex="-1" role="dialog"
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
                                <form action="{{ route('role.delete', 'test') }}" method="post">
                                    @csrf
                                    هل تريد حذف الصلاحيه   {{ $user->name }} ؟؟
                                    <input id="id" type="hidden" name="id" class="form-control"
                                        value="{{ $user->id }}">
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

               

            @endforeach
    </table>

    <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">اضافه مستخدم جديد</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form  action="{{route('users.store')}}" method="POST" class="needs-validation was-validated"  id="createType">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <label for="Name" class="mr-sm-2">الاسم:</label>
                                <input  class="form-control"  name="name" placeholder="...." type="text" >
                            </div>
                            
                            <div class="col">
                                <label for="Name" class="mr-sm-2">الايميل:</label>
                                <input  class="form-control"  name="email" placeholder="...." type="email" >
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="Name" class="mr-sm-2">كلمه المرور:</label>
                                <input  class="form-control"  name="password" placeholder="...." type="password" >
                            </div>
                            
                            <div class="col">
                                <label for="Name" class="mr-sm-2">تاكيد كلمه المرور:</label>
                                <input  class="form-control"  name="confirm" placeholder="...." type="password" >
                            </div>
                            <div class="col">
                                <label for="Name" class="mr-sm-2">الصلاحيات:</label>
                                <select v-model="grade_id" name="role_id"  class="form-control form-control-solid" aria-label="Disabled select example">
                                    <option selected disabled>Choose role</option>
                                    @foreach (App\Models\Role::all() as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>  
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
</div>
    
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
    @include('vue')
    <script type="text/javascript">

        $(function() {
            var table = $('#type').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: {
                    url:"{{ route('project.index') }}",
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
                        data: 'status',
                        name: 'status',
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: true,
                        searchable: true
                    },
                    
                ]
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
                                url: "{{ route('project.delete') }}",
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
                status:'',
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
                        this.validation(this.name , '  الاسلم باللغه العربيه مطلوب ');
                    if (this.error.length !== 0) {
                            return false
                        }
                    let formData = new FormData(document.getElementById('createType'));
                    this.load = true;
                    axios.post('{{ route('project.store') }}', formData).then(response => {
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
                    window.location.href = '{{ route('project.index' )}}';
                }
            }
        });
    </script>
@endsection
