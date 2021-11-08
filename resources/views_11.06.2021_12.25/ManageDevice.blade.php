@extends('Main')
@section('content')
<div id="ribbon">
	<ol class="breadcrumb">
		<li><a href="{{ url('/home') }}">Home</a></li>
		<li>Manage Device</li>
	</ol>
</div>
<div id="content">
	<!--section id="widget-grid" class=""-->
	<section>
		<div class="row">
			<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12 mt20">
				<div class="product-content product-wrap clearfix product-deatil">
					<div class="col-lg-12">
						<div class="row top-menu-box">
							<b>Manage Device</b>
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
					<div class="col-lg-12">
						<div class="table-responsive">
							<table id="datatable_fixed_column" class="table table-striped table-bordered table-hover" width="100%">
								<thead> 
									<tr>
										<th>
											<input type="text" class="form-control FillterData" placeholder="Instrument" style="width: 100%;">
										</th>
										<th>
											<input type="text" class="form-control FillterData" placeholder="Lab" style="width: 100%;">
										</th>
										<th>
											<input type="text" class="form-control FillterData" placeholder="Make" style="width: 100%;">
										</th>
										<th>
											<input type="text" class="form-control FillterData" placeholder="Model" style="width: 100%;">
										</th>
										<th>
											<input type="text" class="form-control FillterData" placeholder="Created By" style="width: 100%;">
										</th>
										<th></th>
									</tr>    
									<tr>
										<th><i class="fa fa-fw fa-mobile text-muted hidden-md hidden-sm hidden-xs"></i> Instrument</th>
										<th><i class="fa fa-fw fa-wrench text-muted hidden-md hidden-sm hidden-xs"></i> Lab</th>
										<th><i class="fa fa-fw fa-wrench text-muted hidden-md hidden-sm hidden-xs"></i> Make</th>
										<th><i class="fa fa-fw fa-wrench text-muted hidden-md hidden-sm hidden-xs"></i> Model</th>
										<th><i class="fa fa-fw fa-user text-muted hidden-md hidden-sm hidden-xs"></i> Created By</th>
										<th style="width: 90px;">Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach($MainData['Device'] as $Device)
									<tr>
										<td>{{ $Device->Name }}</td>
										<td>
											@php
											$InstrumentName=DB::table('instrumentmaster')->where('RecId',$Device->InstrumentId)->first();
											echo $InstrumentName->Name;
											@endphp
										</td>
										<td>{{ $Device->Make }}</td>
										<td>{{ $Device->Model }}</td>
										<td>
										<?php $CreatedByName=DB::table('usermaster')->where('UserId',$Device->CreatedBy)->first(); 
									if(isset($CreatedByName->UserName)){
										echo $CreatedByName->UserName;
									}
									?>
											
										</td>
										<td>
											<a href="javascript:void(0)" data-RecId="{{ $Device->RecId }}" class="btn btn-xs btn-default btnEditForm"><i class="fa fa-pencil"></i></a>
											<form name="frm" method="post" action="{{ url('ActiveDeactiveDevice') }}" style="display: inline-block;"> 
												<input type="hidden" value="{{csrf_token()}}" name="_token" />
												<input type="hidden" value="{{ $Device->RecId }}" name="RecId" />
												<input type="hidden" value="{{ $Device->IsActive }}" name="IsActive" />
												@if($Device->IsActive==0)
												<button type="submit" title="Active Now" class="btn btn-xs btn-default"><i class="fa fa-check"></i></button>
												@else
												<button type="submit" title="Deactive Now" class="btn btn-xs btn-default"><i class="fa fa-close"></i></button>
												@endif
											</form>
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

		<div class="modal fade" id="EditFormType" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<form id="UpdUser" name="frm" method="post" action="{{ url('UpdDevice') }}">
						<input type="hidden" value="{{csrf_token()}}" name="_token" />
						<input type="hidden" value="0" name="RecId" class="UpdRecId" />
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Edit Device</h4>
						</div>
						<div class="modal-body">
							<div class="input-area">
								<div class="form-group">
									<label for="DeviceName">Instrument Name</label>
									<input type="text" class="form-control UpdDeviceName" id="DeviceName" name="DeviceName" autocomplete="off">
								</div>
							</div>

							<div class="input-area">
								<div class="form-group">
									<label for="DeviceName">Lab Name</label>
									<select type="text" class="form-control UpdInstrumentId" name="InstrumentId">
										<option value="0">--Select--</option>
										@php
										$InstrumentMaster=DB::table('instrumentmaster')->where('IsActive','1')->get();
										@endphp
										@foreach($InstrumentMaster as $Instrument)
										<option value="<?php echo $Instrument->RecId; ?>"><?php echo $Instrument->Name; ?></option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="input-area">
								<div class="form-group">
									<label for="Make">Make</label>
									<input type="text" class="form-control UpdMake" id="Make" name="Make" autocomplete="off">
								</div>
							</div>
							<div class="input-area">
								<div class="form-group">
									<label for="Model">Model</label>
									<input type="text" class="form-control UpdModel" id="Model" name="Model" autocomplete="off">
								</div>
							</div>
							<div class="input-area">
								<div class="form-group">
									<label for="SearialNo">Serial No</label>
									<input type="text" class="form-control UpdSearialNo" id="SearialNo" name="SearialNo" autocomplete="off">
								</div>
							</div>
							<div class="input-area">
								<div class="form-group">
									<label for="DirPath">Folder Path</label>
									<input type="text" class="form-control UpdDirPath" id="DirPath" name="DirPath" autocomplete="off">
								</div>
							</div>
							<div class="input-area">
								<div class="form-group">
									<label for="DirPath">Device Type</label>
									<select class="form-input form-control UpdDeviceType" name="DeviceType">
										<option value="1">Balance (gm)</option>
										<option value="2">Micro Balance (mg)</option>
									</select>
								</div>
							</div>
							<div class="input-area">
								<div class="form-group">
									<label><b>Instrument No:</b></label>
									<input type="text" class="form-control UpdInstrument_No" id="UpdInstrument_No" name="Instrument_No" autocomplete="off">
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-info btnUpdForm">Save</button>
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
					</form>
				</div>
			</div>
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
			"bSort": false,
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
<script type="text/javascript">
	$(".btnSaveForm").click(function(){
		if($(".DeviceName").val()=='')
		{
			$(".DeviceName").parent("div").children(".tooltip").remove();
			$(".DeviceName").parent("div").append("<b class='tooltip tooltip-bottom-right'>Required field</b>",removetooltip('DeviceName'));
			$(".DeviceName").focus();
			return false;
		}
		if($(".InstrumentId").val()=='' || $(".InstrumentId").val()=='0')
		{
			$(".InstrumentId").parent("div").children(".tooltip").remove();
			$(".InstrumentId").parent("div").append("<b class='tooltip tooltip-bottom-right'>Required field</b>",removetooltip('InstrumentId'));
			$(".InstrumentId").focus();
			return false;
		}
		if($(".Make").val()=='')
		{
			$(".Make").parent("div").children(".tooltip").remove();
			$(".Make").parent("div").append("<b class='tooltip tooltip-bottom-right'>Required field</b>",removetooltip('Make'));
			$(".Make").focus();
			return false;
		}
		if($(".Model").val()=='')
		{
			$(".Model").parent("div").children(".tooltip").remove();
			$(".Model").parent("div").append("<b class='tooltip tooltip-bottom-right'>Required field</b>",removetooltip('Model'));
			$(".Model").focus();
			return false;
		}
		if($(".SearialNo").val()=='')
		{
			$(".SearialNo").parent("div").children(".tooltip").remove();
			$(".SearialNo").parent("div").append("<b class='tooltip tooltip-bottom-right'>Required field</b>",removetooltip('SearialNo'));
			$(".SearialNo").focus();
			return false;
		}
		if($(".DirPath").val()=='')
		{
			$(".DirPath").parent("div").children(".tooltip").remove();
			$(".DirPath").parent("div").append("<b class='tooltip tooltip-bottom-right'>Required field</b>",removetooltip('DirPath'));
			$(".DirPath").focus();
			return false;
		}
	});

	$(".btnUpdForm").click(function(){
		if($(".UpdDeviceName").val()=='')
		{
			$(".UpdDeviceName").parent("div").children(".tooltip").remove();
			$(".UpdDeviceName").parent("div").append("<b class='tooltip tooltip-bottom-right' style='opacity:1;'>Required field</b>",removetooltip('UpdDeviceName'));
			$(".UpdDeviceName").focus();
			return false;
		}
		if($(".UpdInstrumentId").val()=='' || $(".UpdInstrumentId").val()=='0')
		{
			$(".UpdInstrumentId").parent("div").children(".tooltip").remove();
			$(".UpdInstrumentId").parent("div").append("<b class='tooltip tooltip-bottom-right' style='opacity:1;'>Required field</b>",removetooltip('UpdInstrumentId'));
			$(".UpdInstrumentId").focus();
			return false;
		}
		if($(".UpdMake").val()=='')
		{
			$(".UpdMake").parent("div").children(".tooltip").remove();
			$(".UpdMake").parent("div").append("<b class='tooltip tooltip-bottom-right' style='opacity:1;'>Required field</b>",removetooltip('UpdMake'));
			$(".UpdMake").focus();
			return false;
		}
		if($(".UpdModel").val()=='')
		{
			$(".UpdModel").parent("div").children(".tooltip").remove();
			$(".UpdModel").parent("div").append("<b class='tooltip tooltip-bottom-right' style='opacity:1;'>Required field</b>",removetooltip('UpdModel'));
			$(".UpdModel").focus();
			return false;
		}
		if($(".UpdSearialNo").val()=='')
		{
			$(".UpdSearialNo").parent("div").children(".tooltip").remove();
			$(".UpdSearialNo").parent("div").append("<b class='tooltip tooltip-bottom-right' style='opacity:1;'>Required field</b>",removetooltip('UpdSearialNo'));
			$(".UpdSearialNo").focus();
			return false;
		}
		if($(".UpdDirPath").val()=='')
		{
			$(".UpdDirPath").parent("div").children(".tooltip").remove();
			$(".UpdDirPath").parent("div").append("<b class='tooltip tooltip-bottom-right' style='opacity:1;'>Required field</b>",removetooltip('UpdDirPath'));
			$(".UpdDirPath").focus();
			return false;
		}
		if($(".UpdInstrument_No").val()=='')
		{
			$(".UpdInstrument_No").parent("div").children(".tooltip").remove();
			$(".UpdInstrument_No").parent("div").append("<b class='tooltip tooltip-bottom-right' style='opacity:1;'>Required field</b>",removetooltip('UpdInstrument_No'));
			$(".UpdInstrument_No").focus();
			return false;
		}
	});
</script>
<script type="text/javascript">
	$(".btnEditForm").click(function(){
		$.get('../AjaxGetDevice1/'+ $(this).attr("data-RecId"),function(data){
			if(data!='')
			{
				$(".UpdRecId").val(data['RecId']);
				$(".UpdDeviceName").val(data['Name']);
				$(".UpdInstrumentId").val(data['InstrumentId']);
				$(".UpdMake").val(data['Make']);
				$(".UpdModel").val(data['Model']);
				$(".UpdSearialNo").val(data['SearialNo']);
				$(".UpdDirPath").val(data['DirPath']);
				$(".UpdDeviceType").val(data['DeviceType']);
				$(".UpdInstrument_No").val(data['Instrument_No']);
				$('#EditFormType').modal('show');
			}
		});
	});
</script>
@endsection