@extends('Main')
@section('content')
<div id="ribbon">
	<ol class="breadcrumb">
		<li><a href="{{ url('/home') }}">Home</a></li>
		<li>Backup & Restore</li>
	</ol>
</div>
<div id="content">
	<section>
		<div class="row">
			<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="product-content product-wrap clearfix product-deatil">
					<div class="col-lg-12">
						<div class="row top-menu-box">
							<b>Backup & Restore</b>
							<div class="error-msg pull-right">
									@if(Session::has('failed'))
									<label class="failed">{!! \Session::get('failed') !!}</label>
									@endif
									@if(Session::has('success'))
									<label class="success">{!! \Session::get('success') !!}</label>
									@endif
								</div>
						</div>
					</div>
					@php
					$UserMaster=DB::table('usermaster')->where('IsActive',1)->select("UserId","UserName","UserEmail")->get();
					@endphp
					<div class="col-lg-12 mt20">
						<form name="frm" method="post" action="{{ url('/BackupData') }}">
							<input type="hidden" value="{{csrf_token()}}" name="_token" />
							<div class="row">
								<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
									<div class="form-group">
										<label>Date of Form Creation:</label>
										<div class="row">
											<div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
												<input type="date" name="FromCreatedDate" class="form-control" value='@if(isset($MainData["FromCreatedDate"])){{ $MainData["FromCreatedDate"]}}@endif'>
											</div>
											<div class="col-lg-1 col-md-1 col-sm-12 col-xs-12">
												<b>TO</b>
											</div>
											<div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
												<input type="date" name="ToCreatedDate" class="form-control" value='@if(isset($MainData["ToCreatedDate"])){{ $MainData["ToCreatedDate"]}}@endif'>
											</div>
										</div>
									</div>
								</div>
								<!--
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
								-->
								<!--
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
								-->
								<!--
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
								-->
								<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12" style="margin:20px 0;">
									
									<button type="submit" class="btn btn-info" name="BtnSearch"><i class="fa fa-search mr7"></i>Search</button>&nbsp;

									<button type="submit" class="btn btn-info" name="BtnBackup">Backup</button>&nbsp;

									<button type="submit" class="btn btn-info" name="BtnRestore">Restore</button>&nbsp;

									<button type="submit" class="btn btn-info" name="BtnTicketZip">Ticket ZIP</button>&nbsp;
									
									<!-- <a href="{{ url('/TicketZip/') }}"  class="btn btn-info">Ticket ZIP</a> -->
								</div>
							</div>
						</form>
					</div>
				</div>
			</article>
		</div>
		@if(isset($MainData["Calibration"]))
		<div class="row">
			<div class="col-sm-12">
				<div class="table-responsive">
					<table id="datatable_fixed_column" class="table table-striped table-bordered table-hover" width="100%">
						<thead>
							<tr>
								<th>
									<input type="text" class="form-control FillterData" placeholder="FormID" style="width: 100%;">
								</th>
								<th>
									<input type="text" class="form-control FillterData" placeholder="Calibrated" style="width: 100%;">
								</th>
								<th>
									<input type="text" class="form-control FillterData" placeholder="Instrument" style="width: 100%;">
								</th>
								<th>
									<input type="text" class="form-control FillterData" placeholder="Device" style="width: 100%;">
								</th>
								<th>
									<input type="text" class="form-control numeric FillterData" placeholder="Make" style="width: 100%;">
								</th>
								<th>
									<input type="text" class="form-control FillterData" placeholder="Model" style="width: 100%;">
								</th>
								<th>
									<input type="text" class="form-control FillterData" placeholder="Perform By" style="width: 100%;">
								</th>
								<th>
									<input type="text" class="form-control FillterData datepicker" data-dateformat="dd/mm/yy" placeholder="Perform Date" style="width: 100%;">
								</th>
								<th style="width: 100px;">
									<select class="form-control FillterData FillterStatus" style="width: 100%;">
										<option value="">All</option>
										@php
										$StatusMaster=DB::table('statusmaster')->where('IsActive','1')->get();
										@endphp
										@foreach($StatusMaster as $status)
										<option><?php echo $status->Name; ?></option>
										@endforeach
									</select>
								</th>
								<th></th>
							</tr>
							<tr>
								<th><i class="fa fa-fw fa-user text-muted hidden-md hidden-sm hidden-xs"></i> FormID</th>
								<th><i class="fa fa-fw fa-user text-muted hidden-md hidden-sm hidden-xs"></i> Calibrated</th>
								<th><i class="fa fa-fw fa-phone text-muted hidden-md hidden-sm hidden-xs"></i> LAB</th>
								<th><i class="fa fa-fw fa-user txt-color-blue hidden-md hidden-sm hidden-xs"></i> Instrument</th>
								<th><i class="fa fa-fw fa-user txt-color-blue hidden-md hidden-sm hidden-xs"></i> Make</th>
								<th><i class="fa fa-fw fa-user txt-color-blue hidden-md hidden-sm hidden-xs"></i> Model</th>
								<th><i class="fa fa-fw fa-user txt-color-blue hidden-md hidden-sm hidden-xs"></i> Perform By</th>
								<th><i class="fa fa-fw fa-user txt-color-blue hidden-md hidden-sm hidden-xs"></i> Perform Date</th>
								<th style="width: 120px;"><i class="fa fa-fw fa-user txt-color-blue hidden-md hidden-sm hidden-xs"></i> Status</th>
								<th style="width: 90px;">Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($MainData['Calibration'] as $caldata)
							<tr>
								<td>{{ $caldata->FormId }}</td>
								<td>{{ $caldata->CalibrationName }}</td>
								<td>{{ $caldata->InstrumentName }}</td>
								<td>{{ $caldata->DeviceName }}</td>
								<td>{{ $caldata->Make }}</td>
								<td>{{ $caldata->Model }}</td>
								<td>
									@php
									$PerformedByName=DB::table('usermaster')->where('UserId',$caldata->PerformedBy)->get();
									echo $PerformedByName[0]->UserName;
									@endphp
								</td>
								<td data-sort="{{ date('Ymd',strtotime($caldata->PerformDate)) }}">{{ date("d/m/Y",strtotime($caldata->PerformDate)) }}</td>
								<td>
									@php
									$StatusMaster=DB::table('statusmaster')->where('RecId',$caldata->Status)->first();
									echo $StatusMaster->Name;
									@endphp
								</td>
								<td>
									@if($caldata->CType==2)
									@if($caldata->DeviceType==1)
									<a href="{{ url('/ViewMonthlyCalibration/'.$caldata->RecId) }}" class="btn btn-xs btn-default"><i class="fa fa-eye"></i></a>
									@if(($caldata->Status==10 && $caldata->PerformedBy==Session::get('LoginData')['UserId'] && Session::get('LoginData')['Role']==2))
									<a href="{{ url('/EditMonthlyCalibration/'.$caldata->RecId) }}" class="btn btn-xs btn-default"><i class="fa fa-pencil"></i></a>
									@endif
									<a href="{{ url('/PrintMonthlyCalibration/'.$caldata->RecId) }}" target="_blank" class="btn btn-xs btn-default"><i class="fa fa-print"></i></a>
									@else
									<a href="{{ url('/ViewMonthlyCalibrationMG/'.$caldata->RecId) }}" class="btn btn-xs btn-default"><i class="fa fa-eye"></i></a>
									@if(($caldata->Status==10 && $caldata->PerformedBy==Session::get('LoginData')['UserId'] && Session::get('LoginData')['Role']==2))
									<a href="{{ url('/EditMonthlyCalibrationMG/'.$caldata->RecId) }}" class="btn btn-xs btn-default"><i class="fa fa-pencil"></i></a>
									@endif
									<a href="{{ url('/PrintMonthlyCalibrationMG/'.$caldata->RecId) }}" target="_blank" class="btn btn-xs btn-default"><i class="fa fa-print"></i></a>
									@endif
									@else
									<a href="{{ url('/ViewCalibration/'.$caldata->RecId) }}" class="btn btn-xs btn-default"><i class="fa fa-eye"></i></a>
									@if(($caldata->Status==10 && $caldata->PerformedBy==Session::get('LoginData')['UserId'] && Session::get('LoginData')['Role']==2))
									<a href="{{ url('/EditCalibration/'.$caldata->RecId) }}" class="btn btn-xs btn-default"><i class="fa fa-pencil"></i></a>
									@endif
									<a href="{{ url('/PrintCalibration/'.$caldata->RecId) }}" target="_blank" class="btn btn-xs btn-default"><i class="fa fa-print"></i></a>
									@endif
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
		@endif
	</section>
</div>
@endsection

@section('JSscript')
<script src="{{ asset('public/js/plugin/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('public/js/plugin/datatables/dataTables.colVis.min.js') }}"></script>
<script src="{{ asset('public/js/plugin/datatables/dataTables.tableTools.min.js') }}"></script>
<script src="{{ asset('public/js/plugin/datatables/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('public/js/plugin/datatable-responsive/datatables.responsive.min.js') }}"></script>
<script type="text/javascript">
	$(document).ready(function() {
		var responsiveHelper_datatable_fixed_column = undefined;
		var breakpointDefinition = {
			tablet : 1024,
			phone : 480
		};

		var table = $('#datatable_fixed_column').DataTable({
			"bFilter": true,
			"bInfo": true,
			"bLengthChange": true,
			"bAutoWidth": true,
			"bPaginate": true,
			"bSort": true,
			"bStateSave": false,
			"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-12 hidden-xs'l>r>" +
			"t" +
			"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
			"autoWidth": true,
			"oLanguage": {
				"sSearch": '<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>'
			},
			"preDrawCallback": function () {
				if (!responsiveHelper_datatable_fixed_column) {
					responsiveHelper_datatable_fixed_column = new ResponsiveDatatablesHelper($('#datatable_fixed_column'), breakpointDefinition);
				}
			},
			"rowCallback": function (nRow) {
				responsiveHelper_datatable_fixed_column.createExpandIcon(nRow);
			},
			"drawCallback": function (oSettings) {
				responsiveHelper_datatable_fixed_column.respond();
			}
		});

		$(".dataTables_filter").hide();
		$("#datatable_fixed_column thead th .FillterData").on( 'keyup change', function () {
			table.column( $(this).parent().index()+':visible' ).search( this.value ).draw();

		});
	});
</script>
@endsection