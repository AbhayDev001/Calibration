@extends('Main')
@section('content')
<div id="ribbon">
	<ol class="breadcrumb">
		<li><a href="{{ url('/home') }}">Home</a></li>
		<li>Log</li>
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
								<li>
									<a href="{{ url(Request::url()) }}" class="refreshbtn"><i class="fa fa-lg fa-fw fa-refresh"></i> <span class="area-text">Refresh</span></a>
								</li>
							</ul>
						</div>
					</div>
					<div class="col-lg-12 mt20">
						<form name="frm" method="post" action="{{ url('/LogFilterData') }}">
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
								<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
									<div class="form-group">
										<label>Log Type:</label>
										<select class="form-control FillterLogType" name="FillterLogType" style="width: 100%;">
											<option value="1">Login Log</option>
											<option value="2">Event Log</option>
										</select>
									</div>
								</div>
								<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 mobileSearchbtn">
									<label style="width: 100%;">&nbsp;</label>
									<button type="submit" class="btn btn-info" name="BtnSearch"><i class="fa fa-search mr7"></i>Search</button>
								</div>
							</div>
						</form>
					</div>
					<div class="col-lg-12 ">
						@if(isset($MainData['LogData']))
						@if($MainData['FillterLogType']==1)
						<div class="table-responsive">
							<table id="datatable_fixed_column" class="table table-striped table-bordered table-hover" width="100%">
								<thead> 
									<tr>
										<th>
											<input type="text" class="form-control FillterData" placeholder="UserId" style="width: 100%;">
										</th>
										<th>
											<input type="text" class="form-control FillterData" placeholder="User Name" style="width: 100%;">
										</th>
										<th>
											<input type="text" class="form-control FillterData datepicker" data-dateformat="dd/mm/yy" placeholder="Login Date" style="width: 100%;">
										</th>
										<th>
											<select class="form-control FillterData FillterStatus" style="width: 100%;">
												<option value="">All</option>
												<option>Login Successfully</option>
												<option>Login Failed</option>
											</select>
										</th>
									</tr>    
									<tr>
										<th><i class="fa fa-fw fa-user text-muted hidden-md hidden-sm hidden-xs"></i> UserId</th>
										<th><i class="fa fa-fw fa-user text-muted hidden-md hidden-sm hidden-xs"></i> User Name</th>
										<th><i class="fa fa-fw fa-phone text-muted hidden-md hidden-sm hidden-xs"></i> Login Date</th>
										<th><i class="fa fa-fw fa-user txt-color-blue hidden-md hidden-sm hidden-xs"></i> Login Status</th>
									</tr>
								</thead>
								<tbody>
									@foreach($MainData['LogData'] as $Log)
									<tr>
										<td>{{ $Log['UserId'] }}</td>
										<td>{{ $Log['UserName'] }}</td>
										<td>{{ date("d/m/Y h:i A",strtotime($Log['LoginDate'])) }}</td>
										<td>@if($Log['Status']==1) {{"Login Successfully"}} @elseif($Log['Status']==0) {{"Login Failed"}} @endif</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
						@endif
						@if($MainData['FillterLogType']==2)
						<div class="table-responsive">
							<table id="datatable_fixed_column" class="table table-striped table-bordered table-hover" width="100%">
								<thead> 
									<tr>
										<th>
											<input type="text" class="form-control FillterData" placeholder="Form Id" style="width: 100%;">
										</th>
										<th>
											<input type="text" class="form-control FillterData" placeholder="Status" style="width: 100%;">
										</th>
										<th>
											<input type="text" class="form-control FillterData" placeholder="Comments" style="width: 100%;">
										</th>
										<th>
											<input type="text" class="form-control FillterData" placeholder="Created By" style="width: 100%;">
										</th>
										<th>
											<input type="text" class="form-control FillterData datepicker" data-dateformat="dd/mm/yy" placeholder="Perform Date" style="width: 100%;">
										</th>
									</tr>    
									<tr>
										<th><i class="fa fa-fw fa-user text-muted hidden-md hidden-sm hidden-xs"></i> Calibration Form Id</th>
										<th><i class="fa fa-fw fa-user text-muted hidden-md hidden-sm hidden-xs"></i> Calibration Status</th>
										<th><i class="fa fa-fw fa-phone text-muted hidden-md hidden-sm hidden-xs"></i> Comments</th>
										<th><i class="fa fa-fw fa-user txt-color-blue hidden-md hidden-sm hidden-xs"></i> Created By</th>
										<th><i class="fa fa-fw fa-user txt-color-blue hidden-md hidden-sm hidden-xs"></i> Created Date</th>
									</tr>
								</thead>
								<tbody>
									@foreach($MainData['LogData'] as $Log)
									<tr>
										<td>{{ $Log->FormId }}</td>
										<td>{{ $Log->Name }}</td>
										<td>{{ $Log->Comments }}</td>
										<td>{{ $Log->UserName }}</td>
										<td>{{ date("d/m/Y h:i A",strtotime($Log['CreatedDate'])) }}</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
						@endif
						@endif
					</div>
				</div>
			</article>
		</div>
		<div class="row">
			<div class="col-sm-12">
			</div>
		</div>
	</section>
</div>
@endsection

@section('JSscript')
@if(isset($_POST['BtnSearch']))
<script type="text/javascript">
	$(document).ready(function() {
		$(".FillterLogType").val("@php echo $_POST['FillterLogType']; @endphp");
	});
</script>
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
			"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6 ToolBarButton'f><'col-sm-6 col-xs-12 hidden-xs'l>r>" +
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
		@php 
			$Formaction=url("/PrintLogFilterData");
		@endphp
		$(".ToolBarButton").append('<form name="frm" method="post" action="<?php echo $Formaction; ?>" target="_BLANK"><input type="hidden" value="{{csrf_token()}}" name="_token" /><input type="hidden" name="FROMDATE" value="'+$(".FROMDATE").val()+'" /><input type="hidden" name="TODATE" value="'+$(".TODATE").val()+'" /><input type="hidden" name="FillterLogType" value="'+$(".FillterLogType").val()+'" /><button type="submit" class="btn btn-info" name="BtnPrint"><i class="fa fa-print mr7"></i>Print</button><button type="submit" class="btn btn-info	ml10" name="BtnExcelExport"><i class="fa fa-print mr7"></i>Export to excel</button></form>')
	});
</script>
@endif
@endsection