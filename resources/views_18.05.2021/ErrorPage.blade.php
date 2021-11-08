<!DOCTYPE html>
<html lang="en-us" id="extr-page">
<head>
	<meta charset="utf-8">
	<title>Calibration - Page not found</title>
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
	<style type="text/css">
		html,body{
			height: 100%;
		}
	</style>
</head>
<body class="animated fadeInDown">
	<div class="main-area">
		<!-- MAIN CONTENT -->
		<div id="content" class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 login-form-data">
					<div class="well no-padding smart-form client-form">
						<header>
							<a href="{{ url('/') }}" class="login-logo">
								<img src="{{ asset('public/img/logo.png') }}" alt="Calibration">
							</a>
						</header>
						<header style="text-align: center;padding: 81px 0;color:red;">
							@if($ErrorType==404)
							<b>Error Code : 404 </b>
							<br /><br />
							<b>Error Message : Page not found</b>
							@elseif($ErrorType==403)
							<b>Error Code : 403 </b>
							<br /><br />
							<b>Error Message : Forbidden Error</b>
							@elseif($ErrorType==500)
							<b>Error Code : 500 </b>
							<br /><br />
							<b>Error Message : Internal server error</b>
							@endif
						</header>
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
