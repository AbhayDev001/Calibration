@extends('Main')
@section('content')
<div id="ribbon">
	<ol class="breadcrumb">
		<li>Home</li>
	</ol>
</div>
<div id="content">
	<section>
		<div class="row">
			<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="product-content product-wrap clearfix product-deatil" style="padding: 25px 5px;background: #ecf0f5;">
					<div class="col-lg-12">
						<div class="row">
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
						<div class="row mt10">
							<div class="col-md-3 col-sm-6 col-xs-12">
								<div class="info-box">
									<span class="info-box-icon bg-aqua"><i class="fa fa-lg fa-fw fa-cube"></i></span>
									<div class="info-box-content">
										<span class="info-box-text">Total Calibration</span>
										<span class="info-box-number">{{ $MainData['totcal'] }}</span>
									</div>
								</div>
							</div>
							<div class="col-md-3 col-sm-6 col-xs-12">
								<div class="info-box">
									<span class="info-box-icon bg-aqua"><i class="fa fa-lg fa-fw fa-cube"></i></span>
									<div class="info-box-content">
										<span class="info-box-text">New Calibration</span>
										<span class="info-box-number">{{ $MainData['newcal'] }}</span>
									</div>
								</div>
							</div>
							<div class="col-md-3 col-sm-6 col-xs-12">
								<div class="info-box">
									<span class="info-box-icon bg-green"><i class="fa fa-lg fa-fw fa-cube"></i></span>

									<div class="info-box-content">
										<span class="info-box-text">Verified Calibration</span>
										<span class="info-box-number">{{ $MainData['verifiedcal'] }}</span>
									</div>
								</div>
							</div>
							<div class="col-md-3 col-sm-6 col-xs-12">
								<div class="info-box">
									<span class="info-box-icon bg-yellow"><i class="fa fa-lg fa-fw fa-cube"></i></span>

									<div class="info-box-content">
										<span class="info-box-text">Approved Calibration</span>
										<span class="info-box-number">{{ $MainData['approvedcal'] }}</span>
									</div>
								</div>
							</div>
						</div>
						<div class="row mt10">
							<div class="col-md-3 col-sm-6 col-xs-12">
								<div class="info-box">
									<span class="info-box-icon bg-red"><i class="fa fa-lg fa-fw fa-cube"></i></span>
									<div class="info-box-content">
										<span class="info-box-text">Declined Calibration</span>
										<span class="info-box-number">{{ $MainData['declinedcal'] }}</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</article>
		</div>


		<div class="row">
			<div class="col-sm-12">
				<!-- your contents here -->
			</div>
		</div>
	</section>
</div>
@endsection

@section('JSscript')						

@endsection