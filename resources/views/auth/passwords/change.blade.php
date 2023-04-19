@extends('cp.layouts.master2')
@section('css')
<!-- Sidemenu-respoansive-tabs css -->
<link href="{{URL::asset('cp/assets/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css')}}" rel="stylesheet">



@endsection
@section('content')
		<div class="container-fluid">
			<div class="row no-gutter">
				<!-- The image half -->
				<div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-primary-transparent">
					<div class="row wd-100p mx-auto text-center">
						<div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto wd-100p">
							<img src="{{asset('cp/assets/images/logo11.jpg')}}" 
							class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mx-auto" alt="logo">
							{{-- {{asset('cp/assets/img/media/login.png')}} --}}
						</div>
					</div>
				</div>
				<!-- The content half -->
				<div class="col-md-6 col-lg-6 col-xl-5 bg-white">
					<div class="login d-flex align-items-center py-2">
						<!-- Demo content-->
						<div class="container p-0">
							<div class="row">
								<div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
									<div class="card-sigin">
										<div class="mb-5 d-flex"> <a ><img src="{{asset('cp/assets/images/logo11.jpg')}}" class="sign-favicon ht-40" alt="logo"></a><h1 class="main-logo1 ml-1 mr-0 my-auto tx-28">co<span>mp</span>any</h1></div>
										<div class="card-sigin">
											<div class="main-signup-header">
												<h2> Admin</h2>
												<h5 class="font-weight-semibold mb-4">change password.</h5>
												<form action="{{ route('student.password.changepass')}}" method="POST">
                                                    @csrf
													@include('include.msg')
													<div class="form-group">
                                                        <input class="form-control h-auto form-control-solid py-4 px-8" type="hidden" name="email" value="{{$email}}"  />
                                                        <input class="form-control h-auto form-control-solid py-4 px-8" type="hidden" name="token" value="{{$token}}"  />
														<label>Email</label> <input name='email' class="form-control" placeholder="Enter your email" type="email" required>
													</div>
                                                    <div class="form-group">
														<label>New Password</label> <input name='password' class="form-control" placeholder="Enter your new password" type="password" required>
													</div>
                                                    <div class="form-group">
														<label>Confirm</label> <input name='confirm' class="form-control" placeholder="Enter your confirm password" type="password" required>
													</div>
													
													{{-- </div><button type="submit" class="btn btn-main-primary btn-block">Sign In</button> --}}
													<button type="submit" id="sup"  class="btn btn-main-primary btn-block"> Save </button></div>
													
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div><!-- End -->
					</div>
				</div><!-- End -->
			</div>
		</div>
@endsection
@section('js')
@endsection
