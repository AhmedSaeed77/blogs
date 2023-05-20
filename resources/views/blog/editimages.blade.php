@extends('cp.layouts.master');

@section('content')
    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0"
        style="margin-top: -8px!important;
margin-bottom: 8px!important;">
        <!--begin::Svg Icon | path: /var/www/preview.keenthemes.com/kt-products/docs/metronic/html/releases/2022-11-24-050857/core/html/src/media/icons/duotune/art/art010.svg-->
        <span class="svg-icon svg-icon-muted svg-icon-2hx"><svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path opacity="0.3"
                    d="M22 4H5C4.4 4 4 4.4 4 5V22H13C13.6 22 14 21.6 14 21V18H17C17.6 18 18 17.6 18 17V14H21C21.6 14 22 13.6 22 13V4Z"
                    fill="currentColor" />
                <path
                    d="M13 18H10V15C10 14.4 10.4 14 11 14H14V17C14 17.6 13.6 18 13 18ZM3 18C2.4 18 2 18.4 2 19V21C2 21.6 2.4 22 3 22H9C9.6 22 10 21.6 10 21V18H3ZM18 13V10H15C14.4 10 14 10.4 14 11V14H17C17.6 14 18 13.6 18 13ZM21 2H19C18.4 2 18 2.4 18 3V10H21C21.6 10 22 9.6 22 9V3C22 2.4 21.6 2 21 2Z"
                    fill="currentColor" />
            </svg>المقالات
        </span>
    </h1>

    <div class="card" id="activty">
        <!--begin::Body-->
        
        <div class="card-body p-lg-20">
      
            

            <div class="card-body p-lg-20">
                <label class="form-label">  Blogs </label>
                <select v-model.number="activityId"  @change = "getimages" class="form-control form-control-solid" aria-label="Disabled select example">
                    <option selected disabled>Choose type</option>
                    @foreach (App\Models\Blog::all() as $type)
                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                </select>

               
                    <form id='newblog'>
                        @csrf
                        <div class="row m-3">
                            
                            <div class="col-12 col-md-4">
                                <label class="form-label">    Image  </label>
                                <input  class="form-control"  name="image" v-model="image"  type="file">
                            </div>
                        </div>
                            <button class="m-5 btn btn-primary" @click="savedata" type="button">  save </button>
                            <button class="m-5 btn btn-primary"  @click="getimages" type="button">   update Image   </button>
                    </form>
                

                <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
                    <!--begin::Col-->
                        <div class="col-sm-6 col-lg-4" v-for='image in images'>
                            <!--begin::Card widget 14-->
                            <div class="card card-flush h-xl-100">
                                <!--begin::Body-->
                                <div class="card-body text-center pb-5">
                                    <a class="d-block overlay" data-fslightbox="lightbox-hot-sales" :href="image.image" >
                                        <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded mb-7"
                                             style="height: 250px" v-bind:style="{ backgroundImage: 'url(' + image.image + ')' }" :value="image.image" >
                                            <img :src="image.image " style="height: 250px;width: 100%;"  alt="">
                                        </div>
                                        <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                            <i class="bi bi-eye-fill fs-2x text-white"></i>
                                        </div>
                                    </a>
                                   
                                </div>
                                <div class="card-footer d-flex flex-stack pt-0"> 
                                    <button type="button" @click="deleteFunction(image.id)" class="btn btn-sm btn-danger flex-shrink-0">Delete</button>
                                </div>
                            </div>
                        </div>
                </div>
            </div>

        </div>

    </div>
    
        @endsection
        @section('js')
        {{-- <script src="{{ URL::asset('cp/vendors/custom/datatables/datatables.bundle.js') }}" type="text/javascript"></script> --}}
        <script src="{{ URL::asset('cp/assets/js/sweetalert2@11.js') }}"></script>
        <script src="{{ URL::asset('cp/assets/js/sweetalert2.all.js') }}"></script>
        @include('vue')

        <script>
            app = new Vue({
                el:'#activty',
                data:{
                    activityId:'',
                    image : '',
                    images:[],
                    error:[],
                },
                methods:{

                    validation: function(el, msg) 
                    {
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
                    getimages:function()
                    {
                        console.log(this.activityId);
                        url='{{route('blog.getimagesvue',':id')}}';
                        url=url.replace(':id',this.activityId);
                        axios.get(url).then(response => {
                            console.log(response);
                            this.images=response.data.blogimages;

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
                    deleteFunction:function(id) 
                    {
                        const id1 = id;
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
                                        url: "{{ route('blog.deleteimage') }}",
                                        data: {
                                            '_token': "{{ csrf_token() }}",
                                            'id': id1,
                                        },
                                        success: (response) => {
                                            if (response) {
                                                Swal.fire({
                                                    position: 'top-center',
                                                    icon: 'success',
                                                    title: 'success deleted',
                                                    background: 'white',
                                                    showConfirmButton: false,
                                                    timer: 1500
                                                })
                                                this.getimages();
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
                savedata:function()
                {
                    this.error = []
                    this.validation(this.image , ' اختر الصوره  ')
                    this.validation(this.activityId , ' اختر المقال  ')
                    if (this.error.length !== 0) {
                            return false
                    }
                    Swal.showLoading()
                    let formData = new FormData(document.getElementById('newblog'));
                    formData.append('id', this.activityId)
                    axios.post('{{ route('blog.updateimage') }}', formData).then(response => {
                        if (response.data.err == true) 
                        {
                            Swal.fire({
                                        title: response.data.msg,
                                        type: 'warning',
                                        background: 'white',
                                        confirmButtonText: 'موافق',
                                    });
                        } 
                        else 
                        {
                            Swal.fire({
                                        title: 'تم الاضافه بنجاح',
                                        type: 'success',
                                        background: 'white',
                                        confirmButtonText: 'موافق',
                                    });
                            app.getimages();
                        }
                        app.getimages();
                    }).catch(response => {
                        console.log(response)
                    })
                }
                }
            }); 
            
        </script>
        @endsection
