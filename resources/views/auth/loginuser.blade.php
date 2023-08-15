@extends('cp.layouts.master2')
@section('css')
<!-- Sidemenu-respoansive-tabs css -->
<link href="{{URL::asset('cp/assets/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css')}}" rel="stylesheet">

<script type="text/javascript">
	var verifyCallback = function (response) {
		document.getElementById("sup").disabled = false;
		// alert(response);
	};
	var widgetId1;
	var widgetId2;
	var onloadCallback = function () {
		// Renders the HTML element with id 'example1' as a reCAPTCHA widget.
		// The id of the reCAPTCHA widget is assigned to 'widgetId1'.

		grecaptcha.render('example3', {
			'sitekey': '6Lci90ckAAAAAP4ajLEtqK4ehKvl_RLlPiyFda0B',
			'callback': verifyCallback,
		 
		});
	};
</script>

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

					<div class="dropdown" style="margin-right: 100px;margin-top: 20px;">
						<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Users</button>
						<div class="dropdown-menu" aria-labelledby="dropdownMenu2">
							<a href="{{ route('login') }}" class="btn btn-button dropdown-item" type="button">Login Admin</a>
							<a href="{{ route('loginuser') }}" class="btn btn-button dropdown-item" type="button">Login User</a>
							<a href="{{ route('registeruser') }}" class="btn btn-button dropdown-item" type="button">Register User</a>
						</div>
					</div>
					<div class="login d-flex align-items-center py-2">
						<!-- Demo content-->
						<div class="container p-0">
							<div class="row">
								<div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
									<div class="card-sigin">
										<div class="mb-5 d-flex"> <a ><img src="{{asset('cp/assets/images/logo11.jpg')}}" class="sign-favicon ht-40" alt="logo"></a><h1 class="main-logo1 ml-1 mr-0 my-auto tx-28">co<span>mp</span>any</h1></div>
										<div class="card-sigin">
											<div class="main-signup-header">
												<h2> User</h2>
												<h5 class="font-weight-semibold mb-4">Please sign in to continue.</h5>
												<form action="{{ route('checkuserlogin')}}" method="POST">
                                                    @csrf
													<div class="form-group">
														<label>Email</label> <input name='email' class="form-control" placeholder="Enter your email" type="email" required>
													</div>
													<div class="form-group">
														<label>Password</label> <input name='password' class="form-control" placeholder="Enter your password" type="password" required>
														<br>
														<div class="uk-width-expand@s">
															<p>  <a href="{{ route('student.password.request') }}">هل نسيت كلمه المرور ؟</a></p>
														</div>
														<div class="d-flex justify-content-between">
															<p>  <a href="{{ url('/login/facebook') }}">login facebook </a></p>
															<p>  <a href="{{ url('/login/google') }}">login google </a></p>
														</div>
													<button type="submit" id="sup"  class="btn btn-main-primary btn-block"> دخول </button></div>
													
												</form>

												<form class="dropdown-menu p-4">
													<div class="form-group">
													  <label for="exampleDropdownFormEmail2">Email address</label>
													  <input type="email" class="form-control" id="exampleDropdownFormEmail2" placeholder="email@example.com">
													</div>
													<div class="form-group">
													  <label for="exampleDropdownFormPassword2">Password</label>
													  <input type="password" class="form-control" id="exampleDropdownFormPassword2" placeholder="Password">
													</div>
													<div class="form-check">
													  <input type="checkbox" class="form-check-input" id="dropdownCheck2">
													  <label class="form-check-label" for="dropdownCheck2">
														Remember me
													  </label>
													</div>
													<button type="submit" class="btn btn-primary">Sign in</button>
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
