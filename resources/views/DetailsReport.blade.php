@extends('Main')
@section('content')
<div id="ribbon">
	<ol class="breadcrumb">
		<li><a href="{{ url('/home') }}">Home</a></li>
		<li>Details Report</li>
	</ol>
</div>
<div id="content">
	<section>
		<div class="row">
			<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="product-content product-wrap clearfix product-deatil">
					<div class="col-lg-12">
						<div class="row top-menu-box">
							<b>Details Report</b>
						</div>
					</div>
					@php
					$UserMaster=DB::table('usermaster')->where('IsActive',1)->select("UserId","UserName","UserEmail")->get();
					@endphp
					<div class="col-lg-12 mt20">
						<form name="frm" method="post" action="{{ url('/DetailsReportData') }}" target="_BLANK">
							<input type="hidden" value="{{csrf_token()}}" name="_token" />
							<div class="row">
								<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
									<div class="form-group">
										<label>Calibration Method:</label>
										<select name="CalibrationId" class="form-control select2">
											<option value="0">--Select--</option>

											@php
											$Calibration=DB::table('calibrationform')->where('IsActive',1)->get();
											@endphp
											@foreach($Calibration as $cali)
											<option value="{{ $cali->RecId }}">{{ $cali->Name }}</option>
											@endforeach

										</select>
									</div>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
									<div class="form-group">
										<label>Created By:</label>
										<select name="CreatedBy" class="form-control select2">
											<option value="0">--Select--</option>
											@foreach($UserMaster as $user)
											<option value="{{ $user->UserId }}">{{ $user->UserName }}</option>
											@endforeach

										</select>
									</div>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
									<div class="form-group">
										<label>Approved By:</label>
										<select name="ApprovedBy" class="form-control select2">
											<option value="0">--Select--</option>
											@foreach($UserMaster as $user)
											<option value="{{ $user->UserId }}">{{ $user->UserName }}</option>
											@endforeach

										</select>
									</div>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
									<div class="form-group">
										<label>Declined By:</label>
										<select name="DeclinedBy" class="form-control select2">
											<option value="0">--Select--</option>
											@foreach($UserMaster as $user)
											<option value="{{ $user->UserId }}">{{ $user->UserName }}</option>
											@endforeach

										</select>
									</div>
								</div>
								<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
									<div class="form-group">
										<label>Date of Form Creation:</label>
										<div class="row">
											<div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
												<input type="date" name="FromCreatedDate" class="form-control">
											</div>
											<div class="col-lg-1 col-md-1 col-sm-12 col-xs-12">
												<b>TO</b>
											</div>
											<div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
												<input type="date" name="ToCreatedDate" class="form-control">
											</div>
										</div>
									</div>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
									<div class="form-group">
										<label>Status:</label>
										<select name="Status" class="form-control select2">
											<option value="0">--Select--</option>

											@php
											$StatusMaster=DB::table('statusmaster')->where('IsActive',1)->get();
											@endphp
											@foreach($StatusMaster as $Status)
											<option value="{{ $Status->RecId }}">{{ $Status->Name }}</option>
											@endforeach

										</select>
									</div>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
									<div class="form-group">
										<label>Submitted By:</label>
										<select name="SubmittedBy" class="form-control select2">
											<option value="0">--Select--</option>
											@foreach($UserMaster as $user)
											<option value="{{ $user->UserId }}">{{ $user->UserName }}</option>
											@endforeach

										</select>
									</div>
								</div>
								<!--div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
									<div class="form-group">
										<label>Finalized By:</label>
										<select name="FinalizedBy" class="form-control select2">
											<option value="0">--Select--</option>
											@foreach($UserMaster as $user)
											<option value="{{ $user->UserId }}">{{ $user->UserName }}</option>
											@endforeach

										</select>
									</div>
								</div-->
								<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
									<div class="form-group">
										<label>Date of form finalization:</label>
										<div class="row">
											<div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
												<input type="date" name="FromfinalizationDate" class="form-control">
											</div>
											<div class="col-lg-1 col-md-1 col-sm-12 col-xs-12">
												<b>TO</b>
											</div>
											<div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
												<input type="date" name="TofinalizationDate" class="form-control">
											</div>
										</div>
									</div>
								</div>
								<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
									<div class="form-group">
										<label>Calibration Date:</label>
										<div class="row">
											<div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
												<input type="date" name="FromCalibrationDate" class="form-control">
											</div>
											<div class="col-lg-1 col-md-1 col-sm-12 col-xs-12">
												<b>TO</b>
											</div>
											<div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
												<input type="date" name="ToCalibrationDate" class="form-control">
											</div>
										</div>
									</div>
								</div>
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin: 20px 0;">
									<button type="submit" class="btn btn-info pull-right" name="BtnSearch"><i class="fa fa-search mr7"></i>Search</button>
								</div>
							</div>
						</form>
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