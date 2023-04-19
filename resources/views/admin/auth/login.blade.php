@extends('cp.layouts.master')
@section('css')

{{-- <script type="text/javascript">
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
</script> --}}

<script type="text/javascript">
	var verifyCallback = function(response) {
	  alert(response);
	};
	var widgetId1;
	var widgetId2;
	var onloadCallback = function() {
	  // Renders the HTML element with id 'example1' as a reCAPTCHA widget.
	  // The id of the reCAPTCHA widget is assigned to 'widgetId1'.
	  widgetId1 = grecaptcha.render('example1', {
		'sitekey' : '6LemfEgkAAAAAFHDLx03grZMB2zbFStv-5D2BAgS',
		'theme' : 'light'
	  });
	  widgetId2 = grecaptcha.render(document.getElementById('example2'), {
		'sitekey' : 'your_site_key'
	  });
	  grecaptcha.render('example3', {
		'sitekey' : 'your_site_key',
		'callback' : verifyCallback,
		'theme' : 'dark'
	  });
	};
  </script>

<script src="https://www.google.com/recaptcha/api.js" async defer></script>

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
							<img src="{{asset('assets/images/logo.png')}}" 
							class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mx-auto" alt="logo">
							<!-- {{URL::asset('cp/assets/img/media/login.png')}} -->
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
										<div class="mb-5 d-flex"> <a href="{{ url('/' . $page='index') }}"><img src="{{asset('assets/images/logo.png')}}" class="sign-favicon ht-40" alt="logo"></a><h1 class="main-logo1 ml-1 mr-0 my-auto tx-28">Ji<span>wa</span>r</h1></div>
										<div class="card-sigin">
											<div class="main-signup-header">
												<h2> Admin</h2>
												<h5 class="font-weight-semibold mb-4">Please sign in to continue.</h5>
												<form action="{{ route('alogin') }}" method="POST">
                                                    @csrf
													<div id="example3"></div>
													<div class="g-recaptcha" data-sitekey="your_site_key"></div>
													<div class="form-group">
														<label>Email</label> <input name='email' class="form-control" placeholder="Enter your email" type="email">
													</div>
													<div class="form-group">
														<label>Password</label> <input name='password' class="form-control" placeholder="Enter your password" type="password">
														<div class="uk-width-expand@s">
															<p> Forget Password ? <a href="">Forget Password ?</a></p>
														</div>
													</div><button class="btn btn-main-primary btn-block">Sign In</button>
												</form>
			
<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
async
defer></script>
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
