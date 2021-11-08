@extends('Main')
@section('content')
<div id="ribbon">
	<ol class="breadcrumb">
		<li><a href="{{ url('/home') }}">Home</a></li>
		<li>Edit Device Weight</li>
	</ol>
</div>
<div id="content">
	<!--section id="widget-grid" class=""-->
	<section>
		<div class="row">
			<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="product-content product-wrap clearfix product-deatil">
					<form id="SaveUser" name="frm" method="post" action="{{ url('UpdDeviceWeight') }}">
						<input type="hidden" value="{{csrf_token()}}" name="_token" />
						<div class="col-lg-12">
							<div class="row top-menu-box">
								<b>Edit Device Weight</b>
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
										<label class="col-md-4 control-label form-lable"><b>Instrument:</b></label>
										<div class="col-md-8 input-area">
											<select type="text" class="form-input form-control InstrumentID" name="InstrumentIDOLD" disabled="disabled">
												@php
												$InstrumentMaster=DB::table('instrumentmaster')->where('RecId',$MainData['DeviceWeight'][0]->InstrumentId)->get();
												@endphp
												@foreach($InstrumentMaster as $Instrument)
												<option selected="selected" value="<?php echo $Instrument->RecId; ?>"><?php echo $Instrument->Name; ?></option>
												@endforeach
											</select>
										</div>
									</div>
								</fieldset>
								<fieldset class="col-lg-6 mobile-mt20">
									<div class="row">
										<label class="col-md-4 control-label form-lable"><b>Device:</b></label>
										<div class="col-md-8 input-area">
											<select type="text" class="form-input form-control DeviceId" name="DeviceIdOLD" disabled="disabled">
												@php
												$DeviceMaster=DB::table('devicemaster')->where('RecId',$MainData['DeviceWeight'][0]->DeviceId)->get();
												@endphp
												@foreach($DeviceMaster as $Device)
												<option selected="selected" value="<?php echo $Device->RecId; ?>"><?php echo $Device->Name; ?></option>
												@endforeach
											</select>
										</div> 
									</div>
								</fieldset>
							</div>
							<div class="row">
								<fieldset class="col-lg-6 mobile-mt20">
									<div class="row">
										<label class="col-md-4 control-label form-lable"><b>Calibration Type:</b></label>
										<div class="col-md-8 input-area">
											<select type="text" class="form-input form-control CalibrationFormType" name="CalibrationFormTypeOLD" disabled="disabled">
												@php
												$CalibrationFormType=DB::table('calibrationformtype')->where('RecId',$MainData['DeviceWeight'][0]->CalibrationTypeId)->get();
												@endphp
												@foreach($CalibrationFormType as $FormType)
												<option selected="selected" value="<?php echo $FormType->RecId; ?>"><?php echo $FormType->Name; ?></option>
												@endforeach
											</select>
										</div> 
									</div>
								</fieldset>
								<input type="hidden" name="InstrumentID" value="{{ $MainData['DeviceWeight'][0]->InstrumentId }}">
								<input type="hidden" name="DeviceId" value="{{ $MainData['DeviceWeight'][0]->DeviceId }}">
								<input type="hidden" name="CalibrationFormType" value="{{ $MainData['DeviceWeight'][0]->CalibrationTypeId }}">
							</div>
							<div class="row">
								<fieldset class="col-lg-4 mobile-mt20 pull-right">
									<div class="row">
										<label class="col-md-4 control-label form-lable"><b>Line:</b></label>
										<div class="col-md-3 input-area">
											<input type="number" class="form-input form-control NoOfLine" autocomplete="off" min="1" max="100" value="5">
										</div>
										<div class="col-md-3 input-area">
											<button class="btnAddLine Mobilemtb20 btn btn-primary" type="button"><i class="fa fa-lg fa-fw fa-plus"></i> <span class="area-text">Add</span></button>
										</div>
									</div>
								</fieldset>
							</div>
							<div class="table-responsive">
								<table class="table table-striped table-bordered table-hover DeviceWeightData" width="100%">
									<thead>
										<tr>
											<th>Line Id</th>
											<th>Standard Weight(<span class="DeviceTypeText">gm</span>)</th>
											<th>Certified Weight(A)(<span class="DeviceTypeText">gm</span>)</th>
											<th>Acceptance Criteria(<span class="DeviceTypeText">gm</span>) of Certified Weight</th>
											<th>Delete</th>
										</tr>
									</thead>
									<tbody>
										@foreach($MainData['DeviceWeight'] as  $key=>$data)
										<tr>
											<td>
												<input type="text" class="LineId numeric1 TabInput" name="LineId[]" value="{{ $data->LineId }}" readonly="readonly" />
											</td>
											<td>
												<input type="text" class="StWeight numeric1 form-control" name="StWeight[]" value="{{ $data->StWeight }}" style="width:100%;"/>
											</td>
											<td>
												<input type="text" class="CertWeight numeric1 form-control" name="CertWeight[]" value="{{ $data->CertWeight }}" style="width:100%;"/>
											</td>
											<td>
												<input type="text" class="AccpWeight numeric1 form-control" name="AccpWeight[]" value="{{ $data->AccpWeight }}" style="width:100%;"/>
											</td>
											<td>
												@if($key<1)

												@else
												<a href='javascript:void(0)' class='btn btn-xs btn-default btnDeleteRow'><i class='fa fa-trash'></i></a>
												@endif
											</td>
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>

							@if(isset($MainData['ObsMass']))
							<div class="row mt20">
								<fieldset class="col-lg-4 mobile-mt20 pull-right">
									<div class="row">
										<label class="col-md-4 control-label form-lable"><b>Line:</b></label>
										<div class="col-md-3 input-area">
											<input type="number" class="form-input form-control NoOfLine1" autocomplete="off" min="1" max="100" value="5">
										</div>
										<div class="col-md-3 input-area">
											<button class="btnAddLine1 Mobilemtb20 btn btn-primary" type="button"><i class="fa fa-lg fa-fw fa-plus"></i> <span class="area-text">Add</span></button>
										</div>
									</div>
								</fieldset>
							</div>
							<div class="table-responsive">
								<table class="table table-striped table-bordered table-hover DeviceWeightData1" width="100%">
									<thead>
										<tr>
											<th>Sr. No.</th>
											<th>Standard Weight(<span class="DeviceTypeText">gm</span>)</th>
											<th>Delete</th>
										</tr>
									</thead>
									<tbody>
										@foreach($MainData['ObsMass'] as  $key=>$data)
										<tr>
											<td>
												<input type="text" class="DLineId numeric1 TabInput" name="DLineId[]" value="{{ $data->LineId }}" readonly="readonly" />
											</td>
											<td>
												<input type="text" class="DStWeight numeric1 form-control" name="DStWeight[]" value="{{ $data->StWeight }}" style="width:100%;"/>
											</td>
											<td>
												@if($key<1)

												@else
												<a href='javascript:void(0)' class='btn btn-xs btn-default btnDeleteRow1'><i class='fa fa-trash'></i></a>
												@endif
											</td>
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
							@endif

							@if(isset($MainData['DevicePositionWeight']))
							<div class="row mt20">
								<fieldset class="col-lg-4 mobile-mt20 pull-right">
									<div class="row">
										<label class="col-md-4 control-label form-lable"><b>Line:</b></label>
										<div class="col-md-3 input-area">
											<input type="number" class="form-input form-control NoOfLine2" autocomplete="off" min="1" max="100" value="5">
										</div>
										<div class="col-md-3 input-area">
											<button class="btnAddLine2 Mobilemtb20 btn btn-primary" type="button"><i class="fa fa-lg fa-fw fa-plus"></i> <span class="area-text">Add</span></button>
										</div>
									</div>
								</fieldset>
							</div>
							<div class="table-responsive">
								<table class="table table-striped table-bordered table-hover DeviceWeightData2" width="100%">
									<thead>
										<tr>
											<th>Sr. No.</th>
											<th>Position of weight on the pan</th>
											<th>Standard Weight</th>
											<th>Delete</th>
										</tr>
									</thead>
									<tbody>
										@foreach($MainData['DevicePositionWeight'] as  $key=>$data)
										<tr>
											<td>
												<input type="text" class="DLineId1 numeric1 TabInput" name="DLineId1[]" value="{{ $data->LineId }}" readonly="readonly" />
											</td>
											<td>
												<input type="text" class="DPWeight form-control" name="DPWeight[]" value="{{ $data->PositionWeight }}" style="width:100%;"/>
											</td>
											<td>
												<input type="text" class="DStWeight1 numeric1 form-control" name="DStWeight1[]" value="{{ $data->StWeight }}" style="width:100%;">
											</td>
											<td>
												@if($key<1)

												@else
												<a href='javascript:void(0)' class='btn btn-xs btn-default btnDeleteRow2'><i class='fa fa-trash'></i></a>
												@endif
											</td>
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
							@endif

							<div class="row mtb20">
								<fieldset class="col-lg-12 mobile-mt20">
									<div class="row">
										<div class="col-lg-10">
											<div class="error-msg TableError">
												<label class="failed">&nbsp;</label>
											</div>
										</div>
										<div class="col-lg-2">
											<button class="btnSaveForm btn btn-primary pull-right" type="submit"><i class="fa fa-lg fa-fw fa-save"></i> <span class="area-text">Save</span></button>
										</div>
									</div>
								</fieldset>
							</div>
						</div>
					</form>
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
		$(".TableError").html('<label class="failed">&nbsp</label>');
		if($(".InstrumentID").val()=='' || $(".InstrumentID").val()=='0')
		{
			$(".InstrumentID").parent("div").children(".tooltip").remove();
			$(".InstrumentID").parent("div").append("<b class='tooltip tooltip-bottom-right'>Required field</b>",removetooltip('InstrumentID'));
			$(".InstrumentID").focus();
			return false;
		}
		if($(".DeviceId").val()=='' || $(".DeviceId").val()=='0')
		{
			$(".DeviceId").parent("div").children(".tooltip").remove();
			$(".DeviceId").parent("div").append("<b class='tooltip tooltip-bottom-right'>Required field</b>",removetooltip('DeviceId'));
			$(".DeviceId").focus();
			return false;
		}
		if($(".CalibrationFormType").val()=='' || $(".CalibrationFormType").val()=='0')
		{
			$(".CalibrationFormType").parent("div").children(".tooltip").remove();
			$(".CalibrationFormType").parent("div").append("<b class='tooltip tooltip-bottom-right'>Required field</b>",removetooltip('CalibrationFormType'));
			$(".CalibrationFormType").focus();
			return false;
		}
		var StWeightValidate=false;
		$('.StWeight').each(function(){
			if($(this).val()!='')
			{
				StWeightValidate=true;
			}
		});
		var CertWeightValidate=false;
		$('.CertWeight').each(function(){
			if($(this).val()!='')
			{
				CertWeightValidate=true;
			}
		});
		var AccpWeightValidate=false;
		$('.AccpWeight').each(function(){
			if($(this).val()!='')
			{
				AccpWeightValidate=true;
			}
		});

		if(StWeightValidate && CertWeightValidate && AccpWeightValidate)
		{

		}
		else
		{
			$(".TableError").append('<label class="failed">Standard Weight, Certified Weight(A), Acceptance Criteria Weight, One Line Required</label>');
			setTimeout(function(){ $(".TableError").html('<label class="failed">&nbsp</label>'); }, 10000);
			return false;
		}

		if($(".CalibrationFormType").val()==2)
		{
			var DStWeightValidate1=false;
			$('.DStWeight').each(function(){
				if($(this).val()!='')
				{
					DStWeightValidate1=true;
				}
			});

			if(DStWeightValidate1)
			{

			}
			else
			{
				$(".TableError").append('<label class="failed">Standard Weight One Line Required</label>');
				setTimeout(function(){ $(".TableError").html('<label class="failed">&nbsp</label>'); }, 10000);
				return false;
			}

			var PositionWeightValidate=false;
			$('.DPWeight').each(function(){
				if($(this).val()!='')
				{
					PositionWeightValidate=true;
				}
			});

			if(PositionWeightValidate)
			{

			}
			else
			{
				$(".TableError").append('<label class="failed">Position of weight on the pan One Line Required</label>');
				setTimeout(function(){ $(".TableError").html('<label class="failed">&nbsp</label>'); }, 10000);
				return false;
			}
		}
	});

	$(".btnAddLine").click(function(){
		if($(".NoOfLine").val()>0)
		{
			var CurrentRow=$(".DeviceWeightData tbody tr").length;
			//alert(CurrentRow);
			var NewRow=$(".NoOfLine").val();
			for(var i=CurrentRow; i<(Number(CurrentRow)+Number(NewRow)); i++)
			{
				var LineNo=i+1;
				$(".DeviceWeightData").find("tbody").append("<tr><td><input type='text' class='LineId numeric1 TabInput' name='LineId[]' value='"+LineNo+"' readonly='readonly' /></td><td><input type='text' class='StWeight numeric1 form-control' name='StWeight[]' style='width:100%;'/></td><td><input type='text' class='CertWeight numeric1 form-control' name='CertWeight[]' style='width:100%;'/></td><td><input type='text' class='AccpWeight numeric1 form-control' name='AccpWeight[]' style='width:100%;'/></td><td><a href='javascript:void(0)' class='btn btn-xs btn-default btnDeleteRow'><i class='fa fa-trash'></i></a></td></tr>");
			}	
		}
	});

	$(".btnAddLine1").click(function(){
		if($(".NoOfLine1").val()>0)
		{
			var CurrentRow=$(".DeviceWeightData1 tbody tr").length;
			//alert(CurrentRow);
			var NewRow=$(".NoOfLine1").val();
			for(var i=CurrentRow; i<(Number(CurrentRow)+Number(NewRow)); i++)
			{
				var LineNo=i+1;
				$(".DeviceWeightData1").find("tbody").append("<tr><td><input type='text' class='DLineId numeric1 TabInput' name='DLineId[]' value='"+LineNo+"' readonly='readonly' /></td><td><input type='text' class='DStWeight numeric1 form-control' name='DStWeight[]' style='width:100%;'/></td><td><a href='javascript:void(0)' class='btn btn-xs btn-default btnDeleteRow1'><i class='fa fa-trash'></i></a></td></tr>");
			}	
		}
	});
	$(".btnAddLine2").click(function(){
		if($(".NoOfLine2").val()>0)
		{
			var CurrentRow=$(".DeviceWeightData2 tbody tr").length;
			//alert(CurrentRow);
			var NewRow=$(".NoOfLine2").val();
			for(var i=CurrentRow; i<(Number(CurrentRow)+Number(NewRow)); i++)
			{
				var LineNo=i+1;
				$(".DeviceWeightData2").find("tbody").append("<tr><td><input type='text' class='DLineId1 numeric1 TabInput' name='DLineId1[]' value='"+LineNo+"' readonly='readonly' /></td><td><input type='text' class='DPWeight form-control' name='DPWeight[]' style='width:100%;'/></td><td><input type='text' class='DStWeight1 numeric1 form-control' name='DStWeight1[]' style='width:100%;'></td><td><a href='javascript:void(0)' class='btn btn-xs btn-default btnDeleteRow2'><i class='fa fa-trash'></i></a></td></tr>");
			}	
		}
	});

	$('.DeviceWeightData').on('click', '.btnDeleteRow', function() {
		$(this).parents("tr").remove();
		var i=1;
		$(".LineId").each(function(){
			$(this).val(i++);
		});
	});

	$('.DeviceWeightData1').on('click', '.btnDeleteRow1', function() {
		$(this).parents("tr").remove();
		var i=1;
		$(".DLineId").each(function(){
			$(this).val(i++);
		});
	});
	$('.DeviceWeightData2').on('click', '.btnDeleteRow2', function() {
		$(this).parents("tr").remove();
		var i=1;
		$(".DLineId1").each(function(){
			$(this).val(i++);
		});
	});
</script>
<script type="text/javascript">
	$('.InstrumentID').on('change',function(e){
		var cat_id = e.target.value;
		$('.DeviceId').val(0);
		$('.DeviceId').change();
		if(cat_id!=0 && cat_id!="")
		{
			$.get('AjaxGetDeviceType/'+ cat_id,function(data){
				$('.DeviceId').removeAttr("disabled");
				var subcat =  $('.DeviceId').empty();
				subcat.append('<option value="0">--Select--</option>');
				$.each(data,function(key,val){
					subcat.append('<option value ="'+val['RecId']+'">'+val['Name']+'</option>');
				});
			});
		}
		else
		{
			var subcat =  $('.DeviceId').empty();
			subcat.append('<option value="0">--Select--</option>');
			$('.DeviceId').attr("disabled","disabled");
		}
	});

	$(".CalibrationFormType").change(function(){
		if($(".CalibrationFormType").val()==1)
		{
			$(".CalibrationWeight1").show();
		}
		else
		{
			$(".CalibrationWeight1").hide();
		}
	});

	$('.DeviceId').on('change',function(e){
		$('.CalibrationFormType').change();
		var did = $(this).val();
		if(did>0)
		{
			$.get('AjaxGetDeviceTypeText/'+ did,function(data){
				$(".DeviceTypeText").text(data);
			});
		}
	});
	$('.DeviceId').change();
</script>
@endsection