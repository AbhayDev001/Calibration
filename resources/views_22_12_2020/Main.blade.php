<!DOCTYPE html>
<html lang="en-us">
<head>
	<meta charset="utf-8">
	<title>Calibration</title>
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<link rel="shortcut icon" href="{{ asset('public/img/favicon/favicon.ico') }}" type="image/x-icon">
	<link rel="icon" href="{{ asset('public/img/favicon/favicon.ico') }}" type="image/x-icon">
	<link rel="stylesheet" type="text/css" media="screen" href="{{ asset('public/css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" media="screen" href="{{ asset('public/css/font-awesome.min.css') }}">

	<link rel="stylesheet" type="text/css" media="screen" href="{{ asset('public/css/smartadmin-production.min.css') }}">

	<link rel="stylesheet" type="text/css" media="screen" href="{{ asset('public/css/smartadmin-skins.min.css') }}">

	<link rel="stylesheet" type="text/css" media="screen" href="{{ asset('public/css/smartadmin-production-plugins.min.css') }}">
	<!-- <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('public/css/smartadmin-production.min.css') }}">

	<link rel="stylesheet" type="text/css" media="screen" href="{{ asset('public/css/smartadmin-skins.min.css') }}"> -->
	<link rel="stylesheet" type="text/css" media="screen" href="{{ asset('public/css/demo.min.css') }}">
	<link rel="stylesheet" type="text/css" media="screen" href="{{ asset('public/css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('public/css/GoogleFont.css') }}">
	<link rel="apple-touch-icon" href="{{ asset('public/img/splash/sptouch-icon-iphone.png') }}">
	<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('public/img/splash/touch-icon-ipad.png') }}">
	<link rel="apple-touch-icon" sizes="120x120" href="{{ asset('public/img/splash/touch-icon-iphone-retina.png') }}">
	<link rel="apple-touch-icon" sizes="152x152" href="{{ asset('public/img/splash/touch-icon-ipad-retina.png') }}">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<link rel="apple-touch-startup-image" href="{{ asset('public/img/splash/ipad-landscape.png') }}" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape)">
	<link rel="apple-touch-startup-image" href="{{ asset('public/img/splash/ipad-portrait.png') }}" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait)">
	<link rel="apple-touch-startup-image" href="{{ asset('public/img/splash/iphone.png') }}" media="screen and (max-device-width: 320px)">
	<style type="text/css">
.fc-agenda-slots td {
    border-width: 1px 0 0;
    background: 0 0;
}
.fc-event-time, .fc-event-title {
    padding: 3px 0 2px 3px;
    display: inline-block;
    line-height: 16px;
    font-weight: 700;
    font-size: 11px;
    box-sizing: border-box;
}
.fc-corner-right .fc-event-inner {
    padding-left: 2px;
}
.fc-corner-right {
    margin-right: 1px;
}
.fc-corner-left {
    margin-left: 1px;
}
.fc-event-hori {
    margin-bottom: 1px;
}
.fc-event-hori .ui-resizable-e {
    top: 0!important;
    right: -3px!important;
    width: 7px!important;
    height: 100%!important;
    cursor: e-resize;
}
.fc .ui-resizable-handle {
    display: block;
    position: absolute;
    z-index: 99999;
    overflow: hidden;
    font-size: 300%;
    line-height: 50%;
}
.fc-grid .fc-day-number {
    text-align: right;
    padding: 0px 2px;
}
.jarviswidget .fc-header-title h2 {
    text-shadow: 0 1px 0 #fff;
    margin-top: -12px;
    margin-left: 10px;
    font-size: 14px;
    font-weight: 700;
    margin-bottom: 0;
}
.fc-border-separate thead tr th {
    padding: 4px;
    line-height: 1.428571429;
}
.fc-border-separate thead tr, .table thead tr {
    background-color: #eee;
    background-image: -webkit-gradient(linear,0 0,0 100%,from(#f2f2f2),to(#fafafa));
    background-image: -webkit-linear-gradient(top,#f2f2f2 0,#fafafa 100%);
    background-image: -moz-linear-gradient(top,#f2f2f2 0,#fafafa 100%);
    background-image: -ms-linear-gradient(top,#f2f2f2 0,#fafafa 100%);
    background-image: -o-linear-gradient(top,#f2f2f2 0,#fafafa 100%);
    background-image: -linear-gradient(top,#f2f2f2 0,#fafafa 100%);
    font-size: 12px;
}
.fc-header td {
    white-space: nowrap;
}

.fc td, .fc th {
    padding: 0;
    vertical-align: top;
}
.fc-header-left {
    width: 25%;
    text-align: left;
}
.fc-border-separate tbody tr.fc-first td, .fc-border-separate tbody tr.fc-first th {
    border-top-width: 0;
}
/*.fc-border-separate td, .fc-border-separate th {
    border-width: 1px 0 0 1px;
}*/
table.fc-border-separate{
	border-collapse: separate;
}
.fc-widget-content, .fc-widget-header{
	border-right: none;
}
.fc-widget-content, .fc-widget-header {
    border: 1px solid #ccc;
}
.jarviswidget tbody tr:last-child td{
	border-top: none;
	border-right: none;
}
.fc-border-separate tr.fc-last td, .fc-border-separate tr.fc-last th{
	border-bottom-width:1px;
}
.fc-state-highlight {
    background: #ffc;
}
.fc-grid .fc-other-month .fc-day-number{
	opacity: .3;
}
.fc-agenda .fc-agenda-axis {
    width: 50px;
    padding: 0 4px;
    vertical-align: middle;
    text-align: right;
    white-space: nowrap;
    font-weight: 400;
}
.fc-agenda-slots th {
    border-width: 1px 1px 0;
}
.fc-widget-header .fc-agenda-divider-inner {
    background: #eee;
}
.fc-agenda-divider-inner {
    height: 2px;
    overflow: hidden;
}
/*.fc-agenda table {
    border-collapse: separate;
}*/
.fc-agenda-slots tr.fc-minor td, .fc-agenda-slots tr.fc-minor th {
    border-top-style: dotted;
}

.fc-agenda-slots td div {
    height: 20px;
}
.fc-agenda-allday th {
    border-width: 0 1px;
}
.fc-agenda-days .fc-col0 {
    border-left-width: 0;
}
.fc-agenda-allday .fc-day-content {
    min-height: 34px;
    _height: 34px;
}
.fc-agenda .fc-day-content {
    padding: 2px 2px 1px;
}
.jarviswidget td:first-child, .jarviswidget th:first-child{
	border-left: none;
}
</style>
</head>
<body class="desktop-detected pace-done">
	<header id="header" >
		<div id="logo-group">
			<a href="{{ url('/home') }}" id="logo">
				<!--h2 style="font-weight: bold;letter-spacing: 4px;margin: 0;">Calibration</h2-->
				<img src="{{ asset('public/img/logo.png') }}" alt="Calibration">
			</a>
		</div>
		<div class="pull-right">
			<div id="hide-menu" class="btn-header pull-right hidden-lg hidden-md">
				<span> <a href="javascript:void(0);" data-action="toggleMenu" title="Collapse Menu"><i class="fa fa-reorder"></i></a> </span>
			</div>
			@php
			$CalibrationCount=0;
			$CalibrationData=[];
			if(Session::get('LoginData')['Role']==2 || Session::get('LoginData')['Role']==1)
			{

				$CalData=DB::select("select Cal.CalibrationId,Cal.FormId,mcal.CType,dm.DeviceType,mcal.Name as 'CalibrationName',im.Name as 'InstrumentName',dm.Name as 'DeviceName',Cal.Make,Cal.Model,Cal.PerformedBy,Cal.PerformDate,Cal.AproovelDate,Cal.VerifiedDate,Cal.Status,Cal.RecId,Cal.VerifiedBy,Cal.AproovelBy from `calibration` as `Cal` inner join `calibrationform` as `mcal` on `Cal`.`CalibrationId` = `mcal`.`RecId` inner join `instrumentmaster` as `im` on `Cal`.`InstrumentId` = `im`.`RecId` inner join `devicemaster` as `dm` on `Cal`.`DeviceId` = `dm`.`RecId` where date(`Cal`.`CalibrationNextDate`) = '".date('Y-m-d')."' and `Cal`.`CalibrationId` not in (select `CalibrationId` from `calibration` as `bcal` where date(`bcal`.`CalibrationDate`) = '".date('Y-m-d')."' and  `Cal`.`InstrumentId`= `bcal`.`InstrumentId` and  `Cal`.`DeviceId`= `bcal`.`DeviceId` and date(`bcal`.`CalibrationDate`) = '".date('Y-m-d')."')");

				$CalibrationCount=count($CalData);
				$CalibrationData=$CalData;

			}
			if(Session::get('LoginData')['Role']==3)
			{
				$CalData=DB::table('calibration as Cal')->join('calibrationform as mcal', 'Cal.CalibrationId', '=', 'mcal.RecId')->join('instrumentmaster as im', 'Cal.InstrumentId', '=', 'im.RecId')->join('devicemaster as dm', 'Cal.DeviceId', '=', 'dm.RecId')->select("mcal.CType","dm.DeviceType","Cal.CalibrationId","Cal.FormId","mcal.Name as CalibrationName","im.Name as InstrumentName","dm.Name as DeviceName","Cal.Make","Cal.Model","Cal.PerformedBy","Cal.PerformDate","Cal.AproovelDate","Cal.VerifiedDate","Cal.Status","Cal.RecId","Cal.VerifiedBy","Cal.AproovelBy")->whereIn('Status',[10]);

				$CalibrationCount=$CalData->count();
				$CalibrationData=$CalData->get();
			}
			if(Session::get('LoginData')['Role']==4)
			{
				$CalData=DB::table('calibration as Cal')->join('calibrationform as mcal', 'Cal.CalibrationId', '=', 'mcal.RecId')->join('instrumentmaster as im', 'Cal.InstrumentId', '=', 'im.RecId')->join('devicemaster as dm', 'Cal.DeviceId', '=', 'dm.RecId')->select("mcal.CType","dm.DeviceType","Cal.CalibrationId","Cal.FormId","mcal.Name as CalibrationName","im.Name as InstrumentName","dm.Name as DeviceName","Cal.Make","Cal.Model","Cal.PerformedBy","Cal.PerformDate","Cal.AproovelDate","Cal.VerifiedDate","Cal.Status","Cal.RecId","Cal.VerifiedBy","Cal.AproovelBy")->whereIn('Status',[20]);

				$CalibrationCount=$CalData->count();
				$CalibrationData=$CalData->get();
			}
			@endphp
			<span id="activity" class="activity-dropdown"> <img src="{{ asset('public/img/notification.png') }}" class="img-responsive">
				<b class="badge"> {{ $CalibrationCount }} </b>
			</span>
			<div class="ajax-dropdown" style="height:auto;">
				<div class="ajax-notifications custom-scroll">
					<ul class="notification-body">
						@if($CalibrationCount>0)
						@foreach($CalibrationData as $cal)
						<?php
						if($cal->CType==2)
						{
							if($cal->DeviceType==1)
							{
								$view="ViewMonthlyCalibration";
							}
							else
							{
								$view="ViewMonthlyCalibrationMG";
							}
						}
						else
						{
							$view="ViewCalibration";
						}
						?>
						<li>
							<span class="unread">
								<a href="{{ url('/'.$view.'/'.$cal->RecId) }}" class="msg">
									<span class="from">Form ID : {{ $cal->FormId }}</span>
									<time>{{  date("d/m/Y h:i A",strtotime($cal->PerformDate)) }}</time>
									<span class="subject">Calibration : {{ $cal->CalibrationName }}</span>
									<span class="subject">Instrument : {{ $cal->InstrumentName }}</span>
									<span class="subject">Device : {{ $cal->DeviceName }}</span>
								</a>
							</span>
						</li>
						@endforeach
						@else
						<li>
							<span class="unread">
								{{ "data not found" }}
							</span>
						</li>
						@endif
					</ul>
				</div>
			</div>
			<ul id="mobile-profile-img" class="header-dropdown-list padding-5">
				<li class="">
				</li>
				<li class="">
					<a href="#" class="dropdown-toggle no-margin userdropdown" data-toggle="dropdown" aria-expanded="false">
						<img src="{{ asset('public/img/avatars/sunny.png') }}" alt="User Name" class="online">
					</a>
					<ul class="dropdown-menu pull-right">
						<li>
							<a href="{{ url('/UserProfile') }}" class="padding-10 padding-top-0 padding-bottom-0"> <i class="fa fa-user"></i> <u>P</u>rofile</a>
						</li>
						<li class="divider"></li>
						<li>
							<a href="{{ url('/ClearCache') }}" class="padding-10 padding-top-0 padding-bottom-0"> <i class="fa fa-eraser"></i> <u>C</u>lear Cache</a>
						</li>
						@if(Session::get('LoginData')['Role']==1)
						<li class="divider"></li>
						<li>
							<a href="{{ url('/SetLdapConfiguration') }}" class="padding-10 padding-top-5 padding-bottom-5"><i class="fa fa-cog fa-lg"></i> <strong><u>L</u>dap Setting</strong></a>
						</li>
						@endif
						<li class="divider"></li>
						<li>
							<a href="{{ url('/Logout') }}" class="padding-10 padding-top-5 padding-bottom-5"><i class="fa fa-sign-out fa-lg"></i> <strong><u>L</u>ogout</strong></a>
						</li>
					</ul>
				</li>
			</ul>
		</div>
		@php
		$Role=Session::get('LoginData')['Role'];
		$RoleMaster=DB::table('rolemaster')->where('RecId',$Role)->first();
		$UserName=Session::get('LoginData')['UserName'];
		@endphp
		<div class="pull-right">
			<label class="UserName-UserType">{{ $UserName }} - {{ $RoleMaster->Role }}</label>
		</div>
	</header>
	<aside id="left-panel">
		<nav>
			<ul>
				<li>
					<a href="{{ url('/home') }}" title="Dashboard"><i class="fa fa-lg fa-fw fa-home"></i> <span class="menu-item-parent">Dashboard</span></a>
				</li>
				<li>
					<a href="#"><i class="fa fa-lg fa-fw fa-cube"></i> <span class="menu-item-parent">Calibration Form</span></a>
					<ul>
						@if(Session::get('LoginData')['Role']==1)
						<li>
							<a href="{{ url('/CalibrationAnalysis') }}">Analysis</a>
						</li>
						<li>
							<a href="{{ url('/CalibrationVerify') }}">Verify</a>
						</li>
						<li>
							<a href="{{ url('/CalibrationApprovel') }}">Approvel</a>
						</li>
						@endif
						@if(Session::get('LoginData')['Role']==2)
						<li>
							<a href="{{ url('/AddCalibration') }}">Add Daily Calibration</a>
						</li>
						<li>
							<a href="{{ url('/AddMonthlyCalibration') }}">Add Monthly Calibration (Balance)</a>
						</li>
						<li>
							<a href="{{ url('/AddMGMonthlyCalibration') }}">Add Monthly Calibration (Micro Balance)</a>
						</li>
						<li>
							<a href="{{ url('/CalibrationAnalysis') }}">Analysis</a>
						</li>
						@endif
						@if(Session::get('LoginData')['Role']==3)
						<li>
							<a href="{{ url('/CalibrationVerify') }}">Verify</a>
						</li>
						@endif
						@if(Session::get('LoginData')['Role']==4)
						<li>
							<a href="{{ url('/CalibrationApprovel') }}">Approvel</a>
						</li>
						@endif
						@if(Session::get('LoginData')['Role']==1 || Session::get('LoginData')['Role']==3 || Session::get('LoginData')['Role']==4)
						<li>
							<a href="{{ url('/RePerformRequestList') }}">Re-Perform Request</a>
						</li>
						@endif
					</ul>
				</li>
				@if(Session::get('LoginData')['Role']==1)
				<li>
					<a href="#"><i class="fa fa-lg fa-fw fa-desktop"></i> <span class="menu-item-parent">Users</span></a>
					<ul>
						<li>
							<a href="{{ url('/AddUser') }}">Add</a>
						</li>
						<li>
							<a href="{{ url('/ManageUser/ActiveUser') }}">Active User List</a>
						</li>
						<li>
							<a href="{{ url('/ManageUser/DeactiveUser') }}">Deactive User List</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="{{ url('/ManageLog') }}" title="Dashboard"><i class="fa fa-lg fa-fw fa-history"></i> <span class="menu-item-parent">Log Data</span></a>
				</li>
				<li>
					<a href="{{ url('/ManageCalibrationFormType') }}" title="Dashboard"><i class="fa fa-lg fa-fw fa-cube"></i> <span class="menu-item-parent">Calibration Form Type</span></a>
				</li>
				<li>
					<a href="{{ url('/ManageCalibrationFormData') }}" title="Dashboard"><i class="fa fa-lg fa-fw fa-cube"></i> <span class="menu-item-parent">Calibration Form</span></a>
				</li>
				<li>
					<a href="{{ url('/ManageInstrument') }}" title="Dashboard"><i class="fa fa-lg fa-fw fa-flask"></i> <span class="menu-item-parent">Labs</span></a>
				</li>
				<li>
					<a href="#"><i class="fa fa-lg fa-fw fa-desktop"></i> <span class="menu-item-parent">Instruments</span></a>
					<ul>
						<li>
							<a href="{{ url('/AddDevices') }}">Add</a>
						</li>
						<li>
							<a href="{{ url('/ManageDevice/ActiveDevices') }}">Active Instrument List</a>
						</li>
						<li>
							<a href="{{ url('/ManageDevice/DeactiveDevices') }}">Deactive Instrument List</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="#"><i class="fa fa-lg fa-fw fa-desktop"></i> <span class="menu-item-parent">Instrument Weight</span></a>
					<ul>
						<li>
							<a href="{{ url('/AddDeviceWeight') }}">Add</a>
						</li>
						<li>
							<a href="{{ url('/DeviceWeightList') }}">List</a>
						</li>
					</ul>
				</li>
				@endif

				@if(Session::get('LoginData')['Role']==1 || Session::get('LoginData')['Role']==4)
				<li>
					<a href="#"><i class="fa fa-lg fa-fw fa-balance-scale"></i> <span class="menu-item-parent">Weight Box</span></a>
					<ul>
						<li>
							<a href="{{ url('/AddWeightBox') }}">Add</a>
						</li>
						<li>
							<a href="{{ url('/WeightBoxList') }}">List</a>
						</li>
					</ul>
				</li>
				@endif
				@if(Session::get('LoginData')['Role']==4)
				<li>
					<a href="#"><i class="fa fa-lg fa-fw fa-desktop"></i> <span class="menu-item-parent">Devices Weight</span></a>
					<ul>
						<li>
							<a href="{{ url('/AddDeviceWeight') }}">Add</a>
						</li>
						<li>
							<a href="{{ url('/DeviceWeightList') }}">List</a>
						</li>
					</ul>
				</li>
				@endif
				<li>
					<a href="#"><i class="fa fa-lg fa-fw fa-bar-chart"></i> <span class="menu-item-parent">Reports</span></a>
					<ul>
						<li>
							<a href="{{ url('/SummaryReport') }}">Summary</a>
						</li>
						<li>
							<a href="{{ url('/DetailsReport') }}">Details</a>
						</li>
					</ul>
				</li>
				@if(Session::get('LoginData')['Role']==1)
				<!-- <li>
				<a href="{{ url('/ManageCalibrationSettings') }}" title="Settings"><i class="fa fa-lg fa-fw fa-gear"></i> <span class="menu-item-parent">Settings</span></a>
				</li> -->
				<li>
					<a href="#"><i class="fa fa-lg fa-fw fa-gear"></i> <span class="menu-item-parent">Settings</span></a>
					<ul>
						<li>
							<a href="{{ url('/ManageCalibrationSettings') }}">Form Settings</a>
						</li>
						<li>
							<a href="{{ url('/ManageDecimalSettings') }}">Decimal Settings</a>
						</li>
					</ul>
				</li>
				@endif
			</ul>
		</nav>
		<span class="minifyme" data-action="minifyMenu">
			<i class="fa fa-arrow-circle-left hit"></i>
		</span>
	</aside>
	<div id="main" role="main">
		@yield('content')
	</div>
	<div class="page-footer">
		<div class="row">
			<div class="col-xs-12 col-sm-12">
				<p class="copy-right-grids txt-color-white">2020 Calibration. | Developed By :
					<a href="http://inboxtechs.com/" target="_blank" style="color: #ffffff;font-weight: bold;">Inbox Infotech Pvt. Ltd.</a>
				</p>
			</div>
		</div>
	</div>

	<script src="{{ asset('public/js/libs/jquery-2.1.1.min.js') }}"></script>
	<script src="{{ asset('public/js/libs/jquery-ui-1.10.3.min.js') }}"></script>
	<script type="text/javascript">
		$( document ).ready(function() {
			var str=location.href.toLowerCase();
			$("#left-panel>nav li a").each(function() {
				if (str.indexOf($(this).attr("href").toLowerCase()) > -1) {
					$("#left-panel>nav>li").removeClass("active");
					$(this).parents("li").addClass("active");
				}
			});
		});
	</script>
	<script src="{{ asset('public/js/app.config.js') }}"></script>
	<script src="{{ asset('public/js/plugin/jquery-touch/jquery.ui.touch-punch.min.js') }}"></script>
	<script src="{{ asset('public/js/bootstrap/bootstrap.min.js') }}"></script>
	<script src="{{ asset('public/js/notification/SmartNotification.min.js') }}"></script>
	<script src="{{ asset('public/js/smartwidgets/jarvis.widget.min.js') }}"></script>
	<script src="{{ asset('public/js/plugin/sparkline/jquery.sparkline.min.js') }}"></script>
	<script src="{{ asset('public/js/plugin/masked-input/jquery.maskedinput.min.js') }}"></script>
	<script src="{{ asset('public/js/plugin/select2/select2.min.js') }}"></script>
	<script src="{{ asset('public/js/plugin/msie-fix/jquery.mb.browser.min.js') }}"></script>
	<script src="{{ asset('public/js/plugin/fastclick/fastclick.min.js') }}"></script>
	<script src="{{ asset('public/js/app.min.js') }}"></script>
	<script>
		$(document).ready(function() {
			pageSetUp();
			$(".js-status-update a").click(function() {
				var selText = $(this).text();
				var $this = $(this);
				$this.parents('.btn-group').find('.dropdown-toggle').html(selText + ' <span class="caret"></span>');
				$this.parents('.dropdown-menu').find('li').removeClass('active');
				$this.parent().addClass('active');
			});

			$('.todo .checkbox > input[type="checkbox"]').click(function() {
				var $this = $(this).parent().parent().parent();

				if ($(this).prop('checked')) {
					$this.addClass("complete");
					$(this).parent().hide();
					$this.slideUp(500, function() {
						$this.clone().prependTo("#sortable3").effect("highlight", {}, 800);
						$this.remove();
						countTasks();
					});
				} else {

				}

			})

			function countTasks() {

				$('.todo-group-title').each(function() {
					var $this = $(this);
					$this.find(".num-of-tasks").text($this.next().find("li").size());
				});

			}


			$('.fc-toolbar .fc-right, .fc-toolbar .fc-center').hide();
		});
		function removetooltip(ele)
		{
			setTimeout(function(){ $("."+ele).parent("div").children(".tooltip").remove(); }, 3000)
		}

		$(".numeric").keydown(function (e) {
			if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110]) !== -1 ||
				(e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
				(e.keyCode >= 35 && e.keyCode <= 40)) {
				return;
		}
		if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
			e.preventDefault();
		}
	});
		$('body').on('keydown', '.numeric1', function(e) {
			if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110]) !== -1 ||
				(e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
				(e.keyCode >= 35 && e.keyCode <= 40)) {
				return;
		}
		if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
			e.preventDefault();
		}
	});
</script>

<!-- SD-->
<script src="{{ asset('public/js/sd.js') }}"></script>
@yield('JSscript')
</body>
</html>
