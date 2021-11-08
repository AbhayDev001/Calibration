@extends('Main')
@section('content')
<div id="ribbon">
	<ol class="breadcrumb">
		<li><a href="{{ url('/home') }}">Home</a></li>
		<li>Re-Perform Request List</li>
	</ol>
</div>
<div id="content">
	<section>
		<div class="row">
			<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="product-content product-wrap clearfix product-deatil">
					<div class="col-lg-12">
						<div class="row top-menu-box">
							<b>Calibration request List</b>
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
					<div class="col-lg-12 mt20">
						<div class="table-responsive">
							<table id="datatable_fixed_column" class="table table-striped table-bordered table-hover" width="100%">
								<thead> 
									<tr>
										<th>
											<input type="text" class="form-control FillterData" placeholder="Form ID" style="width: 100%;">
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
											<input type="text" class="form-control FillterData datepicker" data-dateformat="dd/mm/yy" placeholder="Request Date" style="width: 100%;">
										</th>
										<th style="width: 100px;">
											<select class="form-control FillterData FillterStatus" style="width: 100%;">
												<option value="">All</option>
												<option>New</option>
												<option>Accepted</option>
												<option>Rejected</option>
											</select>
										</th>
										<th></th>
									</tr>    
									<tr>
										<th><i class="fa fa-fw fa-user text-muted hidden-md hidden-sm hidden-xs"></i> Form ID</th>
										<th><i class="fa fa-fw fa-user text-muted hidden-md hidden-sm hidden-xs"></i> Calibrated</th>
										<th><i class="fa fa-fw fa-phone text-muted hidden-md hidden-sm hidden-xs"></i> Instrument</th>
										<th><i class="fa fa-fw fa-user txt-color-blue hidden-md hidden-sm hidden-xs"></i> Device</th>
										<th><i class="fa fa-fw fa-user txt-color-blue hidden-md hidden-sm hidden-xs"></i> Request Date</th>
										<th style="width: 120px;"><i class="fa fa-fw fa-user txt-color-blue hidden-md hidden-sm hidden-xs"></i>Status</th>
										<th style="width:100px;">Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach($MainData['ReqList'] as $caldata)
									<tr>
										<td>{{ $caldata->FormId }}</td>
										<td>{{ $caldata->CalibrationName }}</td>
										<td>{{ $caldata->InstrumentName }}</td>
										<td>{{ $caldata->DeviceName }}</td>
										<td>{{ date("d/m/Y",strtotime($caldata->CreatedDate)) }}</td>
										<td>
											@if($caldata->ReqStatus==10)
											{{ "New" }}
											@elseif($caldata->ReqStatus==20)
											{{ "Accepted" }}
											@elseif($caldata->ReqStatus==30)
											{{ "Rejected" }}
											@else
											{{ "" }}
											@endif
										</td>
										<td>
											@if($caldata->ReqStatus==10)
											<form name="frm" method="post" action="{{ url('UpdReqStatus') }}" style="display: inline-block;">
												<input type="hidden" value="{{csrf_token()}}" name="_token" />
												<input type="hidden" value="{{ $caldata->RecId }}" name="CalRecId" />
												<input type="hidden" value="{{ $caldata->ReqRecId }}" name="ReqRecId" />
												<input type="hidden" value="20" name="ReqStatus" />
												<button type="submit" class="btn btn-xs btn-default"><i class="fa fa-check"></i></button>
											</form>
											<form name="frm" method="post" action="{{ url('UpdReqStatus') }}" style="display: inline-block;">
												<input type="hidden" value="{{csrf_token()}}" name="_token" />
												<input type="hidden" value="{{ $caldata->RecId }}" name="CalRecId" />
												<input type="hidden" value="{{ $caldata->ReqRecId }}" name="ReqRecId" />
												<input type="hidden" value="30" name="ReqStatus" />
												<button type="submit" class="btn btn-xs btn-default"><i class="fa fa-times"></i></button>
											</form>
											@endif
											<a href="{{ url('/ViewCalibration/'.$caldata->RecId) }}" class="btn btn-xs btn-default"><i class="fa fa-eye"></i></a>
											<a href="{{ url('/PrintCalibration/'.$caldata->RecId) }}" target="_blank" class="btn btn-xs btn-default"><i class="fa fa-print"></i></a>
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