@extends('Main')
@section('content')
<div id="ribbon">
	<ol class="breadcrumb">
		<li><a href="{{ url('/home') }}">Home</a></li>
		<li>Manage LAB</li>
	</ol>
</div>
<div id="content">
	<!--section id="widget-grid" class=""-->
	<section>
		<div class="row">
			<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="product-content product-wrap clearfix product-deatil">
					<form id="SaveUser" name="frm" method="post" action="{{ url('SaveInstrument') }}">
						<input type="hidden" value="{{csrf_token()}}" name="_token" />
						<div class="col-lg-12">
							<div class="row top-menu-box">
								<b>Add LAB</b>
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
								<fieldset class="col-lg-8 mobile-mt20">
									<div class="row">
										<label class="col-md-6 control-label form-lable"><b>LAB Name:</b></label>
										<div class="col-md-6 input-area">
											<i class="icon-append fa fa-wrench"></i>
											<input type="text" name="InstrumentName" class="form-input form-control InstrumentName" autocomplete="off">
										</div>
									</div>
								</fieldset>
								<fieldset class="col-lg-2 mobile-mt20">
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
			<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12 mt20">
				<div class="product-content product-wrap clearfix product-deatil">
					<div class="table-responsive">
						<table id="datatable_fixed_column" class="table table-striped table-bordered table-hover" width="100%">
							<thead>
								<tr>
									<th>
										<input type="text" class="form-control FillterData" placeholder="Name" style="width: 100%;">
									</th>
									<th>
										<input type="text" class="form-control FillterData" placeholder="Created By" style="width: 100%;">
									</th>
									<th></th>
								</tr>
								<tr>
									<th><i class="fa fa-fw fa-user text-muted hidden-md hidden-sm hidden-xs"></i> Lab</th>
									<th><i class="fa fa-fw fa-user text-muted hidden-md hidden-sm hidden-xs"></i> Created By</th>
									<th style="width: 90px;">Action</th>
								</tr>
							</thead>
							<tbody>
								@php
								$InstrumentMaster=DB::table('instrumentmaster')->orderBy('CreatedDate', 'desc')->get();
								@endphp
								@foreach($InstrumentMaster as $Instrument)
								<tr>
									<td>{{ $Instrument->Name }}</td>
									<td>
									<?php $CreatedByName=DB::table('usermaster')->where('UserId',$Instrument->CreatedBy)->first(); 
									if(isset($CreatedByName->UserName)){
										echo $CreatedByName->UserName;
									}
									?>
										
									</td>
									<td>
										<a href="javascript:void(0)" data-RecId="{{ $Instrument->RecId }}" class="btn btn-xs btn-default btnEditForm"><i class="fa fa-pencil"></i></a>
										<form name="frm" method="post" action="{{ url('ActiveDeactiveInstrument') }}" style="display: inline-block;">
											<input type="hidden" value="{{csrf_token()}}" name="_token" />
											<input type="hidden" value="{{ $Instrument->RecId }}" name="RecId" />
											<input type="hidden" value="{{ $Instrument->IsActive }}" name="IsActive" />
											@if($Instrument->IsActive==0)
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
			</article>
		</div>

		<div class="modal fade" id="EditFormType" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<form id="UpdUser" name="frm" method="post" action="{{ url('UpdInstrument') }}">
						<input type="hidden" value="{{csrf_token()}}" name="_token" />
						<input type="hidden" value="0" name="RecId" class="UpdRecId" />
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Edit LAB</h4>
						</div>
						<div class="modal-body">
							<div class="input-area">
								<div class="form-group">
									<label for="InstrumentName">LAB Name</label>
									<input type="text" class="form-control UpdInstrumentName" id="InstrumentName" name="InstrumentName" autocomplete="off">
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
		if($(".InstrumentName").val()=='')
		{
			$(".InstrumentName").parent("div").children(".tooltip").remove();
			$(".InstrumentName").parent("div").append("<b class='tooltip tooltip-bottom-right'>Required field</b>",removetooltip('InstrumentName'));
			$(".InstrumentName").focus();
			return false;
		}
	});

	$(".btnUpdForm").click(function(){
		if($(".UpdInstrumentName").val()=='')
		{
			$(".UpdInstrumentName").parent("div").children(".tooltip").remove();
			$(".UpdInstrumentName").parent("div").append("<b class='tooltip tooltip-bottom-right' style='opacity:1;'>Required field</b>",removetooltip('UpdInstrumentName'));
			$(".UpdInstrumentName").focus();
			return false;
		}
	});
</script>
<script type="text/javascript">
	$(".btnEditForm").click(function(){
		$.get('AjaxGetInstrument1/'+ $(this).attr("data-RecId"),function(data){
			if(data!='')
			{
				$(".UpdRecId").val(data['RecId']);
				$(".UpdInstrumentName").val(data['Name']);

				$('#EditFormType').modal('show');
			}
		});
	});
</script>
@endsection
