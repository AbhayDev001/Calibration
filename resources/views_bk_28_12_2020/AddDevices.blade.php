@extends('Main')
@section('content')
<div id="ribbon">
	<ol class="breadcrumb">
		<li><a href="{{ url('/home') }}">Home</a></li>
		<li>Manage Instrument</li>
	</ol>
</div>
<div id="content">
	<!--section id="widget-grid" class=""-->
	<section>
		<div class="row">
			<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="product-content product-wrap clearfix product-deatil">
					<form id="SaveUser" name="frm" method="post" action="{{ url('SaveDevice') }}">
						<input type="hidden" value="{{csrf_token()}}" name="_token" />
						<div class="col-lg-12">
							<div class="row top-menu-box">
								<b>Add Instrument</b>
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
							<div class="row mt20">
								<fieldset class="col-lg-6 mobile-mt20">
									<div class="row">
										<label class="col-md-4 control-label form-lable"><b>Instrument Name:</b></label>
										<div class="col-md-8 input-area">
											<i class="icon-append fa fa-mobile"></i>
											<input type="text" name="DeviceName" class="form-input form-control DeviceName" autocomplete="off">
										</div>
									</div>
								</fieldset>
								<fieldset class="col-lg-6 mobile-mt20">
									<div class="row">
										<label class="col-md-4 control-label form-lable"><b>Lab Name:</b></label>
										<div class="col-md-8 input-area">
											<select type="text" class="form-input form-control InstrumentId" name="InstrumentId">
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
								</fieldset>
							</div>
							<div class="row">
								<fieldset class="col-lg-6 mobile-mt20">
									<div class="row">
										<label class="col-md-4 control-label form-lable"><b>Make:</b></label>
										<div class="col-md-8 input-area">
											<i class="icon-append fa fa-wrench"></i>
											<input type="text" name="Make" class="form-input form-control Make" autocomplete="off">
										</div>
									</div>
								</fieldset>
								<fieldset class="col-lg-6 mobile-mt20">
									<div class="row">
										<label class="col-md-4 control-label form-lable"><b>Model:</b></label>
										<div class="col-md-8 input-area">
											<i class="icon-append fa fa-wrench"></i>
											<input type="text" name="Model" class="form-input form-control Model" autocomplete="off">
										</div>
									</div>
								</fieldset>
							</div>
							<div class="row mt20">
								<fieldset class="col-lg-6 mobile-mt20">
									<div class="row">
										<label class="col-md-4 control-label form-lable"><b>Serial No:</b></label>
										<div class="col-md-8 input-area">
											<i class="icon-append fa fa-key"></i>
											<input type="text" name="SearialNo" class="form-input form-control SearialNo" autocomplete="off">
										</div>
									</div>
								</fieldset>
								<fieldset class="col-lg-6 mobile-mt20">
									<div class="row">
										<label class="col-md-4 control-label form-lable"><b>Folder Path:</b></label>
										<div class="col-md-8 input-area">
											<i class="icon-append fa fa-folder"></i>
											<input type="text" name="DirPath" class="form-input form-control DirPath" autocomplete="off">
										</div>
									</div>
								</fieldset>
							</div>
							<div class="row mtb20">
								<fieldset class="col-lg-6 mobile-mt20">
									<div class="row">
										<label class="col-md-4 control-label form-lable"><b>Instrument Type:</b></label>
										<div class="col-md-8 input-area">
											<select class="form-input form-control DeviceType" name="DeviceType">
												<option value="1">Balance (gm)</option>
												<option value="2">Micro Balance (mg)</option>

											</select>
										</div>
									</div>
								</fieldset>
								<fieldset class="col-lg-6 mobile-mt20">
									<div class="row">
										<label class="col-md-4 control-label form-lable"><b>Instrument No:</b></label>
										<div class="col-md-8 input-area">
											<i class="icon-append fa fa-mobile"></i>
											<input type="text" name="Instrument_No" class="form-input form-control Instrument_No" autocomplete="off">
										</div>
									</div>
								</fieldset>
							</div>
							<div class="row mtb20">
								<fieldset class="col-lg-6 mobile-mt20">
									<div class="row">
										
									</div>
								</fieldset>
								<fieldset class="col-lg-6 mobile-mt20">
									<div class="row">
										<div class="col-lg-12">
											<button class="btnSaveForm Mobilemtb20 btn btn-primary pull-right" type="submit"><i class="fa fa-lg fa-fw fa-save"></i> <span class="area-text">Save</span></button>
										</div>
									</div>
								</fieldset>
							</div>
						</div>
					</form>
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
		if($(".Instrument_No").val()=='')
		{
			$(".Instrument_No").parent("div").children(".tooltip").remove();
			$(".Instrument_No").parent("div").append("<b class='tooltip tooltip-bottom-right'>Required field</b>",removetooltip('Instrument_No'));
			$(".Instrument_No").focus();
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
	});
</script>
<script type="text/javascript">
	$(".btnEditForm").click(function(){
		$.get('AjaxGetDevice1/'+ $(this).attr("data-RecId"),function(data){
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

				$('#EditFormType').modal('show');
			}
		});
	});
</script>
@endsection
