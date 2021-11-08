<!DOCTYPE html>
<html lang="en-us" id="extr-page">
<head>
	<meta charset="utf-8">
	<title>Calibration - User Profile</title>
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<!-- #FAVICONS -->
	<link rel="shortcut icon" href="{{ asset('public/img/favicon/favicon.ico') }}" type="image/x-icon">
	<link rel="icon" href="{{ asset('public/img/favicon/favicon.ico') }}" type="image/x-icon">
	<!-- #CSS Links -->
	<!-- Basic Styles -->
	<link rel="stylesheet" type="text/css" media="screen" href="{{ asset('public/css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" media="screen" href="{{ asset('public/css/font-awesome.min.css') }}">
	<link rel="stylesheet" type="text/css" media="screen" href="{{ asset('public/css/smartadmin-production.min.css') }}">
	<link rel="stylesheet" type="text/css" media="screen" href="{{ asset('public/css/style.css') }}">
	<!-- #GOOGLE FONT -->
	<link rel="stylesheet" href="{{ asset('public/css/GoogleFont.css') }}">
	<link rel="apple-touch-icon" href="{{ asset('public/img/splash/sptouch-icon-iphone.png') }}">
	<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('public/img/splash/touch-icon-ipad.png') }}">
	<link rel="apple-touch-icon" sizes="120x120" href="{{ asset('public/img/splash/touch-icon-iphone-retina.png') }}">
	<link rel="apple-touch-icon" sizes="152x152" href="{{ asset('public/img/splash/touch-icon-ipad-retina.png') }}">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<!-- Startup image for web apps -->
	<link rel="apple-touch-startup-image" href="{{ asset('public/img/splash/ipad-landscape.png') }}" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape)">
	<link rel="apple-touch-startup-image" href="{{ asset('public/img/splash/ipad-portrait.png') }}" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait)">
	<link rel="apple-touch-startup-image" href="{{ asset('public/img/splash/iphone.png') }}" media="screen and (max-device-width: 320px)">
</head>
<body class="animated fadeInDown">
	<div class="main-area">
		<!-- MAIN CONTENT -->
		<div id="content" class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 login-form-data">
					<div class="text-center">
						@if(Session::has('failed'))
						<div class="alert alert-danger alert-dismissible myalert">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							{!! \Session::get('failed') !!}
						</div>
						@endif
						@if(Session::has('success'))
						<div class="alert alert-success alert-dismissible myalert">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							{!! \Session::get('success') !!}
						</div>
						@endif
					</div>
					<div class="well no-padding smart-form client-form">
						<header>
							<a href="{{ url('/') }}" class="login-logo">
								<!--h2 style="font-weight: bold;letter-spacing: 4px;">Calibration</h2-->
								<img src="{{ asset('public/img/logo.png') }}" alt="Calibration">
							</a>
						</header>
						<header style="text-align: center;"><b>Profile</b></header>
						<form name="frm" method="post" action="{{ url('UpdProfile') }}">
							<input type="hidden" value="{{csrf_token()}}" name="_token" />
							@foreach($UserData as $user)
							<fieldset>
								<section>
									<label class="label">
									Full Name</label>
									<label class="input">
										<i class="icon-append fa fa-user"></i>
										<input type="text" name="UserName" autocomplete="off" required="required" value="{{ $user['UserName'] }}">
										<b class="tooltip tooltip-top-right"><i class="fa fa-user txt-color-teal"></i>Please
										enter your full name</b>
									</label>
								</section>
								<section>
									<label class="label">
									Email</label>
									<label class="input">
										<i class="icon-append fa fa-envelope"></i>
										<input type="text" name="UserEmail" autocomplete="off" required="required" value="{{ $user['UserEmail'] }}">
										<b class="tooltip tooltip-top-right"><i class="fa fa-user txt-color-teal"></i>Please
										enter your email</b>
									</label>
								</section>
								<section>
									<label class="label">
									Contact No.</label>
									<label class="input">
										<i class="icon-append fa fa-phone"></i>
										<input type="text" name="ContactNum" autocomplete="off" required="required" value="{{ $user['ContactNum'] }}">
										<b class="tooltip tooltip-top-right"><i class="fa fa-user txt-color-teal"></i>Please
										enter your contact number</b>
									</label>
								</section>
								<section>
									<button type="Submit" name="btnLogin" class="btn btn-primary">
										Submit
									</button>
									<a href="{{ url('/home') }}" class="btn btn-primary pull-left">
										Cancel
									</a>
								</section>
							</fieldset>
							@endforeach
						</form>
						<footer>
							<p class="copy-right-grids">2020 Calibration. | Developed By :
								<a href="http://inboxtechs.com/" target="_blank">inboxtechs</a>
							</p>
						</footer>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
