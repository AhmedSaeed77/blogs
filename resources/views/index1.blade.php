@extends('cp.layouts.master')
@section('css')
<!--  Owl-carousel css-->
<link href="{{asset('cp/assets/plugins/owl-carousel/owl.carousel.css')}}" rel="stylesheet" />
<!-- Maps css -->
<link href="{{asset('cp/assets/plugins/jqvmap/jqvmap.min.css')}}" rel="stylesheet">
@endsection

@section('content')
    <!-- row -->
	<div >

	</div>
    <div  id='blogId'>
        <div>
            <!-- row -->
            <div class="row">
                <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
                    <!--div-->
                    <form id='newblog'>
                        <div class="card">
                            <div class="card-body">
                                <div class="main-content-label mg-b-5">
                                    اضافة مقالة جديدة
                                </div>
                                <div class="row row-sm">
                                    <div class="col-lg-4">
                                        <label class="form-label"> العنوان بالانجليزية</label>
                                        <input required="" class="form-control" v-model='name_en' name="title" placeholder="...."
                                            type="text">
                                    </div>
                                    <div class="col-lg-4">
                                        <label class="form-label"> العنوان بالعربية </label>
                                        <input required=""  v-model='name_ar'  class="form-control" name="title_ar" placeholder="...."
                                            type="text">
                                    </div>
                                    <div class="col-lg-4">
                                        <label class="form-label"> العنوان بالفرنسية</label>
                                        <input required=""  v-model='name_fr'  class="form-control" name="title_fr" placeholder="...."
                                            type="text">
                                    </div>


                                </div>
                                <div class='row'>
                                    <div class="col-lg">

                                        <label class="form-label"> المقال بالانجليزية</label>
                                        <textarea required=""  v-model='art_en'  name="article" i style="height: 200px" class="form-control"
                                            placeholder="...." rows="3"></textarea>
                                    </div>
                                    <div class="col-lg">

                                        <label class="form-label">المقال بالعربيه</label>

                                        <textarea required=""   v-model='art_ar' class="form-control"  style="height: 200px" name="article_ar"
                                            placeholder="...." rows="3"></textarea>
                                    </div>
                                    <div class="col-lg">

                                        <label class="form-label">المقال بالفرنسيه</label>
                                        <textarea required=""   v-model='article_fr' class="form-control"  style="height: 200px" name="article_fr"
                                            placeholder="...." rows="3"></textarea>

                                    </div>
                                </div>
                                <div class="col-lg-12 mt-5">
                                    <label class="form-label"> صور المقال</label>
                                    <input @change="fileChange1" ref="image" name='image' multiple class="form-control"
                                        required="" type="file">
                                </div>
                                <button type="submit" @click="saveData" class="btn btn-primary mt-3 mb-0"> حفظ </button>

                            </div>
                            {{-- <input class="form-control pe-7"  id='showpass' name="password" type="password" placeholder="Password" value="44" required/> --}}
                           
                            {{-- <div class="mb-3 filled form-group tooltip-end-top">
                                <i data-cs-icon="lock-off"></i>
                                <input class="form-control pe-7"  id='showpass' name="password" type="password" placeholder="Password" required/>
                                <!--<span class="eye-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M15 12c0 1.654-1.346 3-3 3s-3-1.346-3-3 1.346-3 3-3 3 1.346 3 3zm9-.449s-4.252 8.449-11.985 8.449c-7.18 0-12.015-8.449-12.015-8.449s4.446-7.551 12.015-7.551c7.694 0 11.985 7.551 11.985 7.551zm-7 .449c0-2.757-2.243-5-5-5s-5 2.243-5 5 2.243 5 5 5 5-2.243 5-5z"/></svg></span>-->

                                <a class="text-small position-absolute t-2 e-2" style="cursor: pointer;" onclick="showpasss()"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M15 12c0 1.654-1.346 3-3 3s-3-1.346-3-3 1.346-3 3-3 3 1.346 3 3zm9-.449s-4.252 8.449-11.985 8.449c-7.18 0-12.015-8.449-12.015-8.449s4.446-7.551 12.015-7.551c7.694 0 11.985 7.551 11.985 7.551zm-7 .449c0-2.757-2.243-5-5-5s-5 2.243-5 5 2.243 5 5 5 5-2.243 5-5z"/></svg></a>
                            </div> --}}

                        </div>
                        

                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header pb-0">
                            <div class="d-flex justify-content-between">
                                <h4 class="card-title mg-b-0"> المقالات </h4>
                                <i class="mdi mdi-dots-horizontal text-gray"></i>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table text-md-nowrap" id="type">
                                    <thead>
                                        <tr>
                                            <th class="wd-15p border-bottom-0"> id</th>
                                            <th class="wd-15p border-bottom-0"> العنوان </th>
                                            <th class="wd-15p border-bottom-0"> الاجراءات</th>
                                            <th class="wd-15p border-bottom-0"> تاريخ النشر  </th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- row closed -->
        </div>
        <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection

@section('js')
<!--Internal  Chart.bundle js -->
<script src="{{asset('cp/assets/plugins/chart.js/Chart.bundle.min.js')}}"></script>
<!-- Moment js -->
<script src="{{asset('cp/assets/plugins/raphael/raphael.min.js')}}"></script>
<!--Internal  Flot js-->
<script src="{{asset('cp/assets/plugins/jquery.flot/jquery.flot.js')}}"></script>
<script src="{{asset('cp/assets/plugins/jquery.flot/jquery.flot.pie.js')}}"></script>
<script src="{{asset('cp/assets/plugins/jquery.flot/jquery.flot.resize.js')}}"></script>
<script src="{{asset('cp/assets/plugins/jquery.flot/jquery.flot.categories.js')}}"></script>
<script src="{{asset('cp/assets/js/dashboard.sampledata.js')}}"></script>
<script src="{{asset('cp/assets/js/chart.flot.sampledata.js')}}"></script>
<!--Internal Apexchart js-->
<script src="{{asset('cp/assets/js/apexcharts.js')}}"></script>
<!-- Internal Map -->
<script src="{{asset('cp/assets/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('cp/assets/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<script src="{{asset('cp/assets/js/modal-popup.js')}}"></script>
<!--Internal  index js -->
<script src="{{asset('cp/assets/js/index.js')}}"></script>
<script src="{{asset('cp/assets/js/jquery.vmap.sampledata.js')}}"></script>	

<script>
    function showpasss() {
  var x = document.getElementById("showpass");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>

@include('vue')
    <script>
        $(function() {
            var table = $('#type').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('post1.index') }}",
                    data: function(d) {}
                },
                columns: [
                    // {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {
                        data: 'id',
                        name: 'id',
                    },
                    {
                        data: 'title',
                        name: 'title',
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: 'created_at',
                        name: 'created_at',
                    }
                ]
            })

            $('#type tbody').on('click', '.delete', function() {
                var value = $(this).attr("value");
                Swal.fire({
                    title: ' هل انت متأكد من حذف ',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'متأكد !'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: 'post',
                            url: "",
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
            'el': '#blogId',
            data: {
                load: false,
                name_ar: '',
                name_en: '',
                name_fr: '',
                art_ar: '',
                art_en: '',
                article_fr: '',
                file1: '',
                Count: 0,
                error: []
            },
            methods: {
                validation: function(el, msg) {
                    if (el == '') {
                        this.error.push({
                            'err': 'err'
                        });
                        swal({
                            title: msg,
                            type: 'warning',
                            confirmButtonText: 'موافق',
                        });
                        return 0;
                    }
                },
                fileChange1(event) {
                    this.file1 = this.$refs.image.files.length;
                },
                saveData: function(e) {
                    e.preventDefault();
                    this.error = []
                    this.validation(this.name_ar , 'لا يمكن ترك العنوان باللغه العربيه فارغا')
                    this.validation(this.name_en , 'لا يمكن ترك العنوان باللغه الانجليزيه فارغا')
                    this.validation(this.name_fr , 'لا يمكن ترك العنوان باللغه الفرنسيه فارغا')
                    this.validation(this.art_ar , 'لا يمكن ترك المقال باللغه العربيه فارغا')
                    this.validation(this.art_en , 'لا يمكن ترك المقال باللغه الانجليزيه فارغا')
                    this.validation(this.article_fr , 'لا يمكن ترك المقال   فارغا')
                    this.validation(this.file1 , ' الصوره مطلوبه')
                    if (this.error.length !== 0) {
                            return false
                    }
                    Swal.showLoading()
                    let formData = new FormData(document.getElementById('newblog'));
                    axios.post('', formData).then(response => {
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
                            $('#type').DataTable().draw()
                        }
                    }).catch(response => {
                        console.log(response)
                        // var response = $.parseJSON(reject.responseText);

                        // $.each(response.errors, function(name, msg) {
                        //     swal({
                        //         title: msg[0],
                        //         type: 'warning',
                        //         confirmButtonText: 'ok',
                        //     });
                        //     return 0
                        // });
                    })
                }
            }
        });
    </script>

@endsection