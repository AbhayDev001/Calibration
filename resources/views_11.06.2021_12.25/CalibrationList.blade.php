@extends('Main')
@section('content')
<div id="ribbon">
	<ol class="breadcrumb">
		<li><a href="{{ url('/home') }}">Home</a></li>
		<li>Calibration List</li>
	</ol>
</div>
<div id="content">
	<section>
		<div class="row">
			<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="product-content product-wrap clearfix product-deatil">
					<div class="col-lg-12">
						<div class="row top-menu-box">
							<ul class="top-box-menu-bar">
								@if(Session::get('LoginData')['Role']==2)
								<?php /*<li>
									<a href="{{ url('/AddCalibration') }}" class="addbtn"><i class="fa fa-lg fa-fw fa-plus"></i> <span class="area-text">Add</span></a>
									</li> */ ?>
									@endif
									<li>
										<a href="{{ url(Request::url()) }}" class="refreshbtn"><i class="fa fa-lg fa-fw fa-refresh"></i> <span class="area-text">Refresh</span></a>
									</li>
									<li>
										<button class="deletebtn"><i class="fa fa-md fa-fw fa-search"></i> <span class="area-text">Search</span></button>
									</li>
								</ul>
							</div>
						</div>
						<div class="col-lg-12 mt20">
							<form name="frm" method="post" action="<?php if(isset($MainData['FilterForm'])) { ?> {{ url($MainData['FilterForm'].'Filter') }} <?php } else{ ?> {{ url('CalibrationAnalysisFilter') }} <?php } ?>">
								<input type="hidden" value="{{csrf_token()}}" name="_token" />
								<div class="row">
									<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
										<div class="form-group">
											<label>From Date:</label>
											<input type="date" class="form-control FROMDATE" name="FROMDATE" autocomplete="off" value="<?php if(isset($_POST['FROMDATE'])) { echo $_POST['FROMDATE']; } else { echo date('Y-m-d', strtotime(date('Y-m-d') . ' -7 day')); } ?>">
										</div>
									</div>
									<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
										<div class="form-group">
											<label>To Date:</label>
											<input type="date" class="form-control TODATE" name="TODATE" autocomplete="off" value="<?php if(isset($_POST['TODATE'])) { echo $_POST['TODATE']; } else { echo date('Y-m-d', strtotime(date('Y-m-d') . ' +0 day')); } ?>">
										</div>
									</div>
									<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 mobileSearchbtn">
										<label style="width: 100%;">&nbsp;</label>
										<button type="submit" class="btn btn-info" name="BtnSearch"><i class="fa fa-search mr7"></i>Search</button>
									</div>
								</div>
							</form>
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
											<th><i class="fa fa-fw fa-phone text-muted hidden-md hidden-sm hidden-xs"></i> Instrument</th>
											<th><i class="fa fa-fw fa-user txt-color-blue hidden-md hidden-sm hidden-xs"></i> Device</th>
											<th><i class="fa fa-fw fa-user txt-color-blue hidden-md hidden-sm hidden-xs"></i> Make</th>
											<th><i class="fa fa-fw fa-user txt-color-blue hidden-md hidden-sm hidden-xs"></i> Model</th>
											<th><i class="fa fa-fw fa-user txt-color-blue hidden-md hidden-sm hidden-xs"></i> Perform By</th>
											<th><i class="fa fa-fw fa-user txt-color-blue hidden-md hidden-sm hidden-xs"></i> Perform Date</th>
											<th style="width: 120px;"><i class="fa fa-fw fa-user txt-color-blue hidden-md hidden-sm hidden-xs"></i> Status</th>
											<th style="width: 90px;">Action</th>
										</tr>
									</thead>
									<tbody>
										@foreach($MainData['CalData'] as $caldata)
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
											<td><span style="display:none;">{{ date("Ymd",strtotime($caldata->PerformDate)) }}</span>{{ date("d/m/Y",strtotime($caldata->PerformDate)) }}</td>
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
				"order": [[ 7, "desc" ]],
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
	@if(isset($MainData['SelectedStatus']))
	<script type="text/javascript">
		$(document).ready(function() {
			$(".FillterStatus").val("@php echo $MainData['SelectedStatus'] @endphp");
			$(".FillterStatus").change();
		});
	</script>
	@endif
	@endsection