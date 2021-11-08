@extends('Main')
@section('content')
<div id="ribbon">
	<ol class="breadcrumb">
		<li><a href="{{ url('/home') }}">Home</a></li>
		<li>Add Calibration</li>
	</ol>
</div>
<div id="content">
	<!--section id="widget-grid" class=""-->
	<section>
		<div class="row">
			<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="product-content product-wrap clearfix product-deatil">
					<div class="col-lg-12">
						<div class="row top-menu-box">
								<?php /*<ul class="top-box-menu-bar">
									<li>
										<a href="{{ url(Request::url()) }}" class="refreshbtn"><i class="fa fa-lg fa-fw fa-refresh"></i> <span class="area-text">Refresh</span></a>
									</li>
									<li>
										<button class="btnSaveFormData" type="submit"><i class="fa fa-lg fa-fw fa-save"></i> <span class="area-text">Save</span></button>
									</li>
									</ul> */ ?>
									<b>Monthly Calibration Details:</b>
									<div id="TimeLeft" class="pull-right ml10" style="font-weight: bold;color: #0090d5;">Auto Save : 30 : 00</div>
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
							<form id="SaveCalibration" name="frm" method="post" action="{{ url('SaveMonthlyCalibration') }}">
								<input type="hidden" value="{{csrf_token()}}" name="_token" />
								<div class="col-lg-12 pdtrb-20">
									<div class="row mt20">
										<fieldset class="col-lg-6 mobile-mt20">
											<div class="row">
												<label class="col-md-4 control-label form-lable"><b>Calibration Method:</b></label>
												<div class="col-md-8 input-area">
													<!-- <i class="icon-append fa fa-cog"></i> -->
													<select type="text" class="form-input form-control CalibrationMethod" name="CalibrationMethod">
														<option value="0">--Select--</option>
														@php
														$Calibration=DB::table('calibrationform')->where('IsActive',1)->where('CType',2)->get();
														@endphp
														@foreach($Calibration as $cali)
														<option value="{{ $cali->RecId }}">{{ $cali->Name }}</option>
														@endforeach
													</select>
												</div>
											</div>
										</fieldset>
										<fieldset class="col-lg-6 mobile-mt20">
											<div class="row">
												<label class="col-md-4 control-label form-lable"><b>Form ID:</b></label>
												<div class="col-md-8 input-area">
													<i class="icon-append fa fa-info"></i>
													@php
													$CalibrationFormId=0;
													$CalibrationFormId=DB::table('calibration')->count();
													@endphp
													<input type="text" readonly="readonly" name="FormId" value="" class="form-input form-control FormId">
												</div>
											</div>
										</fieldset>
                                    </div>
                                    <div class="row">
										<fieldset class="col-lg-6 mobile-mt20">
											<div class="row">
												<label class="col-md-6 control-label form-lable"><b><u><h6>Instrument Details:</h6></u></b></label>
											</div>
										</fieldset>
										<fieldset class="col-lg-6 mobile-mt20">
											<div class="row">
												<label class="col-md-6 control-label form-lable"><b><u><h6>Standard weight box details:</h6></u></b></label>
											</div>
										</fieldset>
									</div>
									<div class="row">
										<fieldset class="col-lg-6 mobile-mt20">
											<div class="row">
												<label class="col-md-4 control-label form-lable"><b>LAB ID:</b></label>
												<div class="col-md-8 input-area">
													<!-- <i class="icon-append fa fa-money"></i> -->
													<select type="text" class="form-input form-control InstrumentID" name="InstrumentID" disabled="disabled">
														<option value="0">--Select--</option>
													</select>
												</div>
											</div>
                                        </fieldset>
                                        <fieldset class="col-lg-6 mobile-mt20">
											<div class="row">
												<label class="col-md-4 control-label form-lable"><b>Weight box ID No:</b></label>
												<div class="col-md-8 input-area">
													<!-- <i class="icon-append fa fa-info"></i> -->
													<select type="text" class="form-input form-control WeightBoxId" name="WeightBoxId" disabled="disabled">
														<option value="">--Select--</option>
														@php
														$weightbox=DB::table('weightbox')->where('IsActive',1)->get();
														@endphp
														@foreach($weightbox as $box)
														<option data-value="{{ $box->RecId }}" value="{{ $box->WeightBoxId }}">{{ $box->WeightBoxId }}</option>
														@endforeach
														</select>
														<!--<input type="text" name="WeightBoxId" class="form-input form-control WeightBoxId"> dinesh change for dropdown -->
													</div>
											</div>
										</fieldset>
									</div>
									<div class="row">
                                        <fieldset class="col-lg-6 mobile-mt20">
											<div class="row">
												<label class="col-md-4 control-label form-lable"><b>Instrument ID No:</b></label>
												<div class="col-md-8 input-area">
													<!-- <i class="icon-append fa fa-money"></i> -->
													<select type="text" class="form-input form-control DeviceType" name="DeviceType" disabled="disabled">
														<option value="0">--Select--</option>
													</select>
												</div>
											</div>
										</fieldset>
                                        <fieldset class="col-lg-6 mt10 mobile-mt20">
											<div class="row">
												<label class="col-md-4 control-label form-lable"><b>Calibrated on:</b></label>
												<div class="col-md-8 input-area">
													<i class="icon-append fa fa-calendar"></i>
													<input type="text" class="form-input form-control CalibratedDate" name="CalibratedDate" readonly="readonly">
												</div>
											</div>
										</fieldset>
									</div>
									<div class="row">
                                        <fieldset class="col-lg-6 mt10 mobile-mt20">
											<div class="row">
												<label class="col-md-4 control-label form-lable"><b>Make:</b></label>
												<div class="col-md-8 input-area">
													<i class="icon-append fa fa-user"></i>
													<input type="text" class="form-input form-control Make" name="Make" readonly="readonly">
												</div>
											</div>
                                        </fieldset>
                                        <fieldset class="col-lg-6 mt10 mobile-mt20">
											<div class="row">
												<label class="col-md-4 control-label form-lable"><b>Next Calibration on:</b></label>
												<div class="col-md-8 input-area">
													<i class="icon-append fa fa-calendar"></i>
													<input type="text" class="form-input form-control NextCalibratedDate" name="NextCalibratedDate" readonly="readonly">
												</div>
											</div>
										</fieldset>
									</div>
									<div class="row">
                                        <fieldset class="col-lg-6 mt10 mobile-mt20">
											<div class="row">
												<label class="col-md-4 control-label form-lable"><b>Model:</b></label>
												<div class="col-md-8 input-area">
													<i class="icon-append fa fa-user"></i>
													<input type="text" class="form-input form-control Model" name="Model" readonly="readonly">
												</div>
											</div>
										</fieldset>
										<fieldset class="col-lg-6 mt10 mobile-mt20">
											<div class="row">
												<label class="col-md-4 control-label form-lable"><b>Next Calibration on:</b></label>
												<div class="col-md-8 input-area">
													<i class="icon-append fa fa-calendar"></i>
													<input type="datetime-local" class="form-input form-control NextCalibratedDate1" name="NextCalibratedDate1">
												</div>
											</div>
										</fieldset>
									</div>
								</div>
								<div class="col-lg-12">
									<div class="FileTable table-responsive" style="display: none;">
										<div class="error-msg TableError">
											<label class="failed">&nbsp;</label>
										</div>
										<b style="padding-bottom: 10px;display: inline-block;">Weighing method: Positive</b>
										<table class="PositiveTable table table-striped table-bordered table-hover" width="100%">
											<thead>
												<tr>
													<th>Sr. No</th>
													<th>Standard Weight(<span class="DeviceTypeText">gm</span>)</th>
													<th>Certified Weight(A)(<span class="DeviceTypeText">gm</span>)</th>
													<th>Displayed Weight(B)(<span class="DeviceTypeText">gm</span>)</th>
													<th>Difference Between A and B (A-B)(<span class="DeviceTypeText">gm</span>)</th>
													<th>Acceptance Criteria(<span class="DeviceTypeText">gm</span>) of Certified Weight</th>
													<th>Result (Passes / Fails)</th>
													<th style="width: 75px;"></th>
												</tr>
											</thead>
											<tbody>

											</tbody>
										</table>

										<b style="padding-bottom: 10px;display: inline-block;">Weighing method: Negative</b>
										<table class="NegativeTable table table-striped table-bordered table-hover" width="100%">
											<thead>
												<tr>
													<th>Sr. No</th>
													<th>Standard Weight(<span class="DeviceTypeText">gm</span>)</th>
													<th>Certified Weight(A)(<span class="DeviceTypeText">gm</span>)</th>
													<th>Displayed Weight(B)(<span class="DeviceTypeText">gm</span>)</th>
													<th>Difference Between A and B(A-B)(<span class="DeviceTypeText">gm</span>)</th>
													<th>Acceptance Criteria(<span class="DeviceTypeText">gm</span>) of Certified Weight</th>
													<th>Result (Passes / Fails)</th>
													<th style="width: 75px;"></th>
												</tr>
											</thead>
											<tbody>

											</tbody>
										</table>
									</div>
								</div>
								<div class="col-lg-12 CommentTable" style="display: none;">
									<div class="table-responsive">
										<table class="table table-striped table-bordered table-hover" width="100%">
											<thead>
												<tr>
													<th style="width: 55%;">Comment</th>
													<th>Commented Date</th>
													<th>Commented By</th>
													<th>Calibration Status</th>
												</tr>
											</thead>
											<tbody>

											</tbody>
										</table>
									</div>
								</div>
								<div class="col-lg-12 mtb20">
									<div class="row">
										<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
											<button class="btnSaveFormData btn btn-primary pull-right" type="submit"><i class="fa fa-lg fa-fw fa-save"></i> <span class="area-text">Save & Next</span></button>
										</div>
									</div>
								</div>
							</form>
						</div>
					</article>
				</div>
				<div class="modal fade" id="ShowFile" role="dialog">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Modal Header</h4>
							</div>
							<div class="modal-body">
								<img src="" class="img-responsive ShowImg" alt="Access Denied">
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div>

				<div class="modal fade" id="CommentModel" role="dialog">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">You need to comment before getting the file</h4>
							</div>
							<div class="modal-body">
								<div class="input-area">
									<input type="hidden" class="CalibrationLineRecId" value="0">
									<input type="hidden" class="MonthlyCalibration" value="0">
									<label>Comment:</label>
									<textarea class="LineComment form-control" style="resize: none;" rows="5"></textarea>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-info btnAddComment">Submit</button>
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
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
		<script type="text/javascript">
			$(document).ready(function () {
				$('.CalibrationMethod').on('change',function(e){
					$(".top-menu-box").find(".error-msg").html(' ');
					$('.InstrumentID').val(0);
					$('.InstrumentID').change();
					var cat_id = e.target.value;
					if(cat_id!=0 && cat_id!="")
					{
						$.get('AjaxGetInstrument/'+ cat_id,function(data){
							$('.InstrumentID').removeAttr("disabled");
							var subcat =  $('.InstrumentID').empty();
							subcat.append('<option value="0">--Select--</option>');
							$.each(data,function(key,val){
								subcat.append('<option value ="'+val['RecId']+'">'+val['Name']+'</option>');
							});
						});
					}
					else
					{
						var subcat =  $('.InstrumentID').empty();
						subcat.append('<option value="0">--Select--</option>');
						$('.InstrumentID').attr("disabled","disabled");
					}
				});

				$('.InstrumentID').on('change',function(e){
					$(".top-menu-box").find(".error-msg").html(' ');
					var cat_id = e.target.value;
					$('.DeviceType').val(0);
					$('.DeviceType').change();
					if(cat_id!=0 && cat_id!="")
					{
						$.get('AjaxGetDeviceType/'+ cat_id,function(data){
							$('.DeviceType').removeAttr("disabled");
							var subcat =  $('.DeviceType').empty();
							subcat.append('<option value="0">--Select--</option>');
							$.each(data,function(key,val){
								subcat.append('<option value ="'+val['RecId']+'">'+val['Name']+'</option>');
							});
						});
					}
					else
					{
						var subcat =  $('.DeviceType').empty();
						subcat.append('<option value="0">--Select--</option>');
						$('.DeviceType').attr("disabled","disabled");
					}
				});

				$('.DeviceType').on('change',function(e){

					var did = $(this).val();
					if(did>0)
					{
						$.get('AjaxGetDeviceTypeText/'+ did,function(data){
							$(".DeviceTypeText").text(data);
						});
					}

					if($(".DeviceType").val()!=0 && $(".DeviceType").val()!="")
					{
						var obj = {};
						obj.DeviceType=$(".DeviceType").val();
						obj.InstrumentID=$(".InstrumentID").val();
						obj.CalibrationMethod=$(".CalibrationMethod").val();

						$.get('CheckAvailableCalibration/'+ JSON.stringify(obj),function(data){
							$(".top-menu-box").find(".error-msg").html(' ');
							if(data!=1)
							{
								$(".DeviceType").val("0");
								setTimeout(function(){ $(".DeviceType").change(); }, 200);
								$(".top-menu-box").find(".error-msg").html('<label class="failed">'+data+'</label>');
								return false;
							}
							else
							{

								@php
								$CalibrationFormId=0;
								$CalibrationFormId=DB::table('calibration')->count();
								Session::put('CommentsData', []);
								@endphp
								
								var obj2 = {};
								obj2.DeviceType=$(".DeviceType").val();
								obj2.InstrumentID=$(".InstrumentID").val();
								obj2.CalibrationMethod=$(".CalibrationMethod").val();
								obj2.did = did;
								obj2.calibration_type = 'Monthly';

								$.get('AjaxGetDeviceTypeFormId/'+ JSON.stringify(obj2),function(data){
									$(".FormId").val(data);
								});
								//$(".FormId").val("BAL/AD/"+$('.DeviceType').val()+"/RP:<?php //echo $CalibrationFormId+1; ?>");

								$.get('AjaxGetDeviceValue/'+ JSON.stringify(obj),function(data){
									//$('.CalibratedDate').val("<?php //echo date("d-m-Y h:i A"); ?>");
									$('.Make').val(data['firstdata']['Make']);
									$('.Model').val(data['firstdata']['Model']);
									//console.log(data['firstdata']['DayAdd']);

									const now = (data['firstdata']['DayAdd'].toLocaleString("sv-SE") + '').replace(' ','T');
									//console.log(now);

									$('.NextCalibratedDate1').val(now);
									$('.FileTable').attr("data-FilePath",data['firstdata']['DeviceFilePath']);
									$(".FileTable").show();
									$(".CommentTable").show();
									$(".FileTable").find("tbody").html("");
									$.each(data['seconddata'],function(key,val){

										val['StWeight'] = Number(val['StWeight']).toFixed(data['Decimal'][0]['standard_weight']);
										val['CertWeight'] = Number(val['CertWeight']).toFixed(data['Decimal'][0]['certified_weight']);
										val['AccpWeight'] = Number(val['AccpWeight']).toFixed(data['Decimal'][0]['acceptance_weight']);

										$(".FileTable").find(".PositiveTable").find("tbody").append("<tr><td><input type='text' class='LineId LineId"+val['LineId']+" TabInput' readonly='readonly' name='LineId[]' value='"+val['LineId']+"' /></td><td><input type='text' class='StWeight TabInput' readonly='readonly' name='StWeight[]' value='"+val['StWeight']+"' /></td><td><input type='text' class='CertWeight TabInput' readonly='readonly' name='CertWeight[]' value='"+val['CertWeight']+"' /></td><td><input type='text' class='DispWeight TabInput' readonly='readonly' name='DispWeight[]' /></td><td><input type='text' class='DifferentAB TabInput' readonly='readonly' name='DifferentAB[]' /></td><td>± <input type='text' class='AccpWeight TabInput' readonly='readonly' name='AccpWeight[]' value='"+val['AccpWeight']+"' style='width:80%;'/></td><td><input type='text' class='Result TabInput' readonly='readonly' name='Result[]' /></td><td><button type='button' class='btn btn-xs btn-default btnGetFileData'><i class='fa fa-eye'></i></button><button type='button' class='btn btn-xs btn-default btnAttachment' disabled='disabled'><i class='fa fa-paperclip'></i></button></td><input type='hidden' class='Tfile' name='Tfile[]' value='' /><input type='hidden' class='Ifile' name='Ifile[]' value='' /></tr>");

										$(".FileTable").find(".NegativeTable").find("tbody").append("<tr><td><input type='text' class='NegativeLineId NegativeLineId"+val['LineId']+" TabInput' readonly='readonly' name='NegativeLineId[]' value='"+val['LineId']+"' /></td><td><input type='text' class='NegativeStWeight TabInput' readonly='readonly' name='NegativeStWeight[]' value='"+val['StWeight']+"' /></td><td><input type='text' class='NegativeCertWeight TabInput' readonly='readonly' name='NegativeCertWeight[]' value='"+val['CertWeight']+"' /></td><td><input type='text' class='NegativeDispWeight TabInput' readonly='readonly' name='NegativeDispWeight[]' /></td><td><input type='text' class='NegativeDifferentAB TabInput' readonly='readonly' name='NegativeDifferentAB[]' /></td><td>± <input type='text' class='NegativeAccpWeight TabInput' readonly='readonly' name='NegativeAccpWeight[]' value='"+val['AccpWeight']+"' style='width:80%;'/></td><td><input type='text' class='NegativeResult TabInput' readonly='readonly' name='NegativeResult[]' /></td><td><button type='button' class='btn btn-xs btn-default btnGetFileNegative'><i class='fa fa-eye'></i></button><button type='button' class='btn btn-xs btn-default btnAttachmentNegative' disabled='disabled'><i class='fa fa-paperclip'></i></button></td><input type='hidden' class='NegativeTfile' name='NegativeTfile[]' value='' /><input type='hidden' class='NegativeIfile' name='NegativeIfile[]' value='' /></tr>");
									});
								});
							}
						});
                        $('.WeightBoxId').prop("disabled",false);
					}
					else
					{
                        $('.WeightBoxId').prop("disabled",true);
						$(".FormId").val("");
						$('.Make').val("");
						$('.Make').attr("readonly","readonly");
						$('.CalibratedDate').val("");
						$('.CalibratedDate').attr("readonly","readonly");
						$('.Model').val("");
						$('.Model').attr("readonly","readonly");
						$('.NextCalibratedDate').val("");
						$('.NextCalibratedDate').attr("readonly","readonly");
						$(".FileTable").hide();
						$(".FileTable").find("tbody").html("");
						$(".CommentTable").hide();
						$(".CommentTable").find("tbody").html("");
						$('.FileTable').removeAttr("data-filepath");
					}
				});

$('.FileTable').on('click', '.btnGetFileData', function() {
	$(".TableError").html('<label class="failed">&nbsp</label>');
	if($(".NextCalibratedDate1").val()!='')
	{
		var ThisTr=$(this).parents("tr");
		ThisTr.find(".btnAttachment").removeAttr("disabled");
		if(ThisTr.find(".DispWeight").val()!="" && ThisTr.find(".DifferentAB").val()!="")
		{
			$('#CommentModel').find(".CalibrationLineRecId").val(0);
			$('#CommentModel').find(".LineComment").val("");
			$('#CommentModel').find(".MonthlyCalibration").val("0");
			$('#CommentModel').find(".CalibrationLineRecId").val(ThisTr.find("input[name='LineId[]']").val());
			$('#CommentModel').modal('show');
		}
		else
		{
			var DeviceFilePath=$(this).parents(".FileTable").attr("data-filepath");
			if(DeviceFilePath!='')
			{
				$.get('AjaxGetFileData/'+ DeviceFilePath,function(data){
					if(data['mg']!="")
					{
						ThisTr.find(".Tfile").val(data['Tfile']);
						ThisTr.find(".Ifile").val(data['Ifile']);
						ThisTr.find(".DispWeight").val(data['mg']);
						if(data['mg']<0)
						{
									//data['mg']=data['mg']*(-1);
									var DifferentAB=Number(ThisTr.find(".CertWeight").val())-Number(data['mg'])*(-1);
								}
								else
								{
									var DifferentAB=Number(ThisTr.find(".CertWeight").val())-Number(data['mg']);
								}
								ThisTr.find(".DifferentAB").val(DifferentAB.toFixed(5));
								if(Number(ThisTr.find(".DifferentAB").val())<=Number(ThisTr.find(".AccpWeight").val()) && Number(ThisTr.find(".DifferentAB").val())>=-Number(ThisTr.find(".AccpWeight").val()))
								{
									ThisTr.find(".Result").val("Passes");
								}
								else
								{
									ThisTr.find(".Result").val("Fails");
								}
							}
							else
							{
								$(".TableError").append('<label class="failed">File is empty</label>');
								setTimeout(function(){ $(".TableError").html('<label class="failed">&nbsp</label>'); }, 10000);
							}
						});
			}
		}
	}
	else
	{
		$(".TableError").append('<label class="failed">Please enter Next Calibration valid date and time.</label>');
		setTimeout(function(){ $(".TableError").html('<label class="failed">&nbsp</label>'); }, 10000);
	}
});

$('.FileTable').on('click', '.btnGetFileNegative', function() {
	$(".TableError").html('<label class="failed">&nbsp</label>');
	if($(".NextCalibratedDate1").val()!='')
	{
		var ThisTr=$(this).parents("tr");
		ThisTr.find(".btnAttachmentNegative").removeAttr("disabled");
		if(ThisTr.find(".NegativeDispWeight").val()!="" && ThisTr.find(".NegativeDifferentAB").val()!="")
		{
			$('#CommentModel').find(".CalibrationLineRecId").val(0);
			$('#CommentModel').find(".LineComment").val("");
			$('#CommentModel').find(".MonthlyCalibration").val("1");
			$('#CommentModel').find(".CalibrationLineRecId").val(ThisTr.find("input[name='NegativeLineId[]']").val());
			$('#CommentModel').modal('show');
		}
		else
		{
			var DeviceFilePath=$(this).parents(".FileTable").attr("data-filepath");
			if(DeviceFilePath!='')
			{
				$.get('AjaxGetFileData/'+ DeviceFilePath,function(data){
					if(data['mg']!="")
					{
						ThisTr.find(".NegativeTfile").val(data['Tfile']);
						ThisTr.find(".NegativeIfile").val(data['Ifile']);
						ThisTr.find(".NegativeDispWeight").val(data['mg']);
						if(data['mg']<0)
						{
							var DifferentAB=Number(ThisTr.find(".NegativeCertWeight").val())-Number(data['mg'])*(-1);
						}
						else
						{
							var DifferentAB=Number(ThisTr.find(".NegativeCertWeight").val())-Number(data['mg']);
						}
						ThisTr.find(".NegativeDifferentAB").val(DifferentAB.toFixed(5));
						if(Number(ThisTr.find(".NegativeDifferentAB").val())<=Number(ThisTr.find(".NegativeAccpWeight").val()) && Number(ThisTr.find(".NegativeDifferentAB").val())>=-Number(ThisTr.find(".NegativeAccpWeight").val()))
						{
							ThisTr.find(".NegativeResult").val("Passes");
						}
						else
						{
							ThisTr.find(".NegativeResult").val("Fails");
						}
					}
					else
					{
						$(".TableError").append('<label class="failed">File is empty</label>');
						setTimeout(function(){ $(".TableError").html('<label class="failed">&nbsp</label>'); }, 10000);
					}
				});
			}
		}
	}
	else
	{
		$(".TableError").append('<label class="failed">Please enter Next Calibration date.</label>');
		setTimeout(function(){ $(".TableError").html('<label class="failed">&nbsp</label>'); }, 10000);
	}
});

$(".btnAddComment").click(function(){
	if($("#CommentModel").find(".LineComment").val()!='')
	{
		if($('#CommentModel').find(".MonthlyCalibration").val()>0)
		{
			$(".TableError").html('<label class="failed">&nbsp</label>');
			var LineRecId=$('#CommentModel').find(".CalibrationLineRecId").val();
			var ThisTr=$('.FileTable').find(".NegativeLineId"+LineRecId).parents("tr");
			ThisTr.find(".btnAttachmentNegative").removeAttr("disabled");
			var DeviceFilePath=ThisTr.parents(".FileTable").attr("data-filepath");
			if(DeviceFilePath!='')
			{
				$.get('AjaxGetFileData/'+ DeviceFilePath,function(data){
					if(data['mg']!="")
					{
						ThisTr.find(".NegativeTfile").val(data['Tfile']);
						ThisTr.find(".NegativeIfile").val(data['Ifile']);
						ThisTr.find(".NegativeDispWeight").val(data['mg']);
						if(data['mg']<0)
						{
							var DifferentAB=Number(ThisTr.find(".NegativeCertWeight").val())-Number(data['mg'])*(-1);
						}
						else
						{
							var DifferentAB=Number(ThisTr.find(".NegativeCertWeight").val())-Number(data['mg']);
						}
						ThisTr.find(".NegativeDifferentAB").val(DifferentAB.toFixed(5));
						if(Number(ThisTr.find(".NegativeDifferentAB").val())<=Number(ThisTr.find(".NegativeAccpWeight").val()) && Number(ThisTr.find(".NegativeDifferentAB").val())>=-Number(ThisTr.find(".NegativeAccpWeight").val()))
						{
							ThisTr.find(".NegativeResult").val("Passes");
						}
						else
						{
							ThisTr.find(".NegativeResult").val("Fails");
						}

						var comment="Negative Line "+ThisTr.find(".NegativeLineId").val()+" : "+$("#CommentModel").find(".LineComment").val();
						var LineId=ThisTr.find(".NegativeLineId").val();
						var FormIdDS=$(".FormId").val().split("/");
						var FormIdD=FormIdDS.join("***");
						var Data='{"FormId":"'+FormIdD+'","Comments":"'+comment+'","LineId":"'+LineId+'","CreatedDate":"<?php echo now(); ?>"}';

						$.get('AjaxSaveCommentTemp/'+Data,function(data){
							$('#CommentModel').modal('hide');
							if(data=="")
							{
								alert("Unable to save comment");
							}
							else
							{
								LoadCommentTable(data);
							}
						});

					}
					else
					{
						$(".TableError").append('<label class="failed">File is empty</label>');
						setTimeout(function(){ $(".TableError").html('<label class="failed">&nbsp</label>'); }, 10000);
					}
				});
			}
		}
		else
		{
			$(".TableError").html('<label class="failed">&nbsp</label>');
			var LineRecId=$('#CommentModel').find(".CalibrationLineRecId").val();
			var ThisTr=$('.FileTable').find(".LineId"+LineRecId).parents("tr");
			ThisTr.find(".btnAttachment").removeAttr("disabled");
			var DeviceFilePath=ThisTr.parents(".FileTable").attr("data-filepath");
			if(DeviceFilePath!='')
			{
				$.get('AjaxGetFileData/'+ DeviceFilePath,function(data){
					if(data['mg']!="")
					{
						ThisTr.find(".Tfile").val(data['Tfile']);
						ThisTr.find(".Ifile").val(data['Ifile']);
						ThisTr.find(".DispWeight").val(data['mg']);
						if(data['mg']<0)
						{
							var DifferentAB=Number(ThisTr.find(".CertWeight").val())-Number(data['mg'])*(-1);
						}
						else
						{
							var DifferentAB=Number(ThisTr.find(".CertWeight").val())-Number(data['mg']);
						}
						ThisTr.find(".DifferentAB").val(DifferentAB.toFixed(5));
						if(Number(ThisTr.find(".DifferentAB").val())<=Number(ThisTr.find(".AccpWeight").val()) && Number(ThisTr.find(".DifferentAB").val())>=-Number(ThisTr.find(".AccpWeight").val()))
						{
							ThisTr.find(".Result").val("Passes");
						}
						else
						{
							ThisTr.find(".Result").val("Fails");
						}

						var comment="Positive Line "+ThisTr.find(".LineId").val()+" : "+$("#CommentModel").find(".LineComment").val();
						var LineId=ThisTr.find(".LineId").val();
						var FormIdDS=$(".FormId").val().split("/");
						var FormIdD=FormIdDS.join("***");
						var Data='{"FormId":"'+FormIdD+'","Comments":"'+comment+'","LineId":"'+LineId+'","CreatedDate":"<?php echo now(); ?>"}';

						$.get('AjaxSaveCommentTemp/'+Data,function(data){
							$('#CommentModel').modal('hide');
							if(data=="")
							{
								alert("Unable to save comment");
							}
							else
							{
								LoadCommentTable(data);
							}
						});

					}
					else
					{
						$(".TableError").append('<label class="failed">File is empty</label>');
						setTimeout(function(){ $(".TableError").html('<label class="failed">&nbsp</label>'); }, 10000);
					}
				});
			}
		}
	}
	else
	{
		$("#CommentModel").find(".LineComment").parent("div").children(".tooltip").remove();
		$("#CommentModel").find(".LineComment").parent("div").append("<b class='tooltip tooltip-bottom-right' style='opacity:1'>Required field</b>",removetooltip('LineComment'));
		$(".LineComment").focus();
		return false;
	}
});


$('.FileTable').on('click', '.btnAttachment', function() {
	var file=$(this).parents("tr").find(".Ifile").val();
	$('.modal-title').text(file);
	$('.ShowImg').attr("src","public/Doc/"+file);
	$('#ShowFile').modal('show');
});

$('.FileTable').on('click', '.btnAttachmentNegative', function() {
	var file=$(this).parents("tr").find(".NegativeIfile").val();
	$('.modal-title').text(file);
	$('.ShowImg').attr("src","public/Doc/"+file);
	$('#ShowFile').modal('show');
});

$(".btnSaveFormData").click(function(){
	if($(".CalibrationMethod").val()=='' || $(".CalibrationMethod").val()==0)
	{
		$(".CalibrationMethod").parent("div").children(".tooltip").remove();
		$(".CalibrationMethod").parent("div").append("<b class='tooltip tooltip-bottom-right'>Required field</b>",removetooltip('CalibrationMethod'));
		$(".CalibrationMethod").focus();
		return false;
	}
	if($(".InstrumentID").val()=='' || $(".InstrumentID").val()==0)
	{
		$(".InstrumentID").parent("div").children(".tooltip").remove();
		$(".InstrumentID").parent("div").append("<b class='tooltip tooltip-bottom-right'>Required field</b>",removetooltip('InstrumentID'));
		$(".InstrumentID").focus();
		return false;
	}
	if($(".DeviceType").val()=='' || $(".DeviceType").val()==0)
	{
		$(".DeviceType").parent("div").children(".tooltip").remove();
		$(".DeviceType").parent("div").append("<b class='tooltip tooltip-bottom-right'>Required field</b>",removetooltip('DeviceType'));
		$(".DeviceType").focus();
		return false;
	}
	if($(".WeightBoxId").val()=='')
	{
		$(".WeightBoxId").parent("div").children(".tooltip").remove();
		$(".WeightBoxId").parent("div").append("<b class='tooltip tooltip-bottom-right'>Required field</b>",removetooltip('WeightBoxId'));
		$(".WeightBoxId").focus();
		return false;
	}
	if($(".FormId").val()=='' || $(".FormId").val()==0)
	{
		$(".FormId").parent("div").children(".tooltip").remove();
		$(".FormId").parent("div").append("<b class='tooltip tooltip-bottom-right'>Required field</b>",removetooltip('FormId'));
		$(".FormId").focus();
		return false;
	}
	if($(".NextCalibratedDate1").val()=='')
	{
		$(".NextCalibratedDate1").parent("div").children(".tooltip").remove();
		$(".NextCalibratedDate1").parent("div").append("<b class='tooltip tooltip-bottom-right'>Please enter vslid date and time</b>",removetooltip('NextCalibratedDate1'));
		$(".NextCalibratedDate1").focus();
		return false;
	}

	var DispWeightValidate=false;
	$('.DispWeight').each(function(){
		if($(this).val()!='')
		{
			DispWeightValidate=true;
		}
	});
	var DifferentABValidate=false;
	$('.DifferentAB').each(function(){
		if($(this).val()!='')
		{
			DifferentABValidate=true;
		}
	});
	var ResultValidate=false;
	$('.Result').each(function(){
		if($(this).val()!='')
		{
			ResultValidate=true;
		}
	});
	$(".TableError").html('<label class="failed">&nbsp</label>');
	if(DispWeightValidate && DifferentABValidate && ResultValidate)
	{

	}
	else
	{
		$(".TableError").append('<label class="failed">Any One Line Required</label>');
		setTimeout(function(){ $(".TableError").html('<label class="failed">&nbsp</label>'); }, 10000);
		return false;
	}
});
});

function LoadCommentTable(data)
{
	//console.log(data);
	$(".CommentTable").find("tbody").html("");
	$.each(data,function(key,val){
		if(val['FormId']==$(".FormId").val())
		{
			$(".CommentTable").find("tbody").append("<tr><td>"+val['Comments']+"</td><td>"+val['CreatedDate']+"</td><td><?php echo Session::get('LoginData')['UserId']; ?></td><td>New</td></tr>");
		}
	});
}
</script>
<script type="text/javascript">
    $('.WeightBoxId').on('change',function(e){

        //var WeightBoxId = $(this).val();
        var WeightBoxId = $(this).find(':selected').attr('data-value');
        if(WeightBoxId != 0 && WeightBoxId !="")
        {
            var obj = {};
            obj.RecId=WeightBoxId;
            $.get('AjaxGetWeightBoxValue/'+ JSON.stringify(obj),function(data){
                //console.log(data['WeightBox_calibration_on']);
                //console.log(data['WeightBox_next_calibration']);
                $('.CalibratedDate').val(data['WeightBox_calibration_on']);
                $('.NextCalibratedDate').val(data['WeightBox_next_calibration']);
            });
        }
        else
        {
            $('.CalibratedDate').val("");
            $('.NextCalibratedDate').val("");
        }
    });
</script>
<script type="text/javascript">
	var countDownDate = new Date().getTime();
	var x = setInterval(function() {

		var now = new Date().getTime();

		var distance = (countDownDate+1200000) - now;
		//var distance = (countDownDate+2700000) - now;

		var days = Math.floor(distance / (1000 * 60 * 60 * 24));
		var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
		var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
		var seconds = Math.floor((distance % (1000 * 60)) / 1000);
		if(minutes<10)
		{
			minutes="0"+minutes;
		}
		if(seconds<10)
		{
			seconds="0"+seconds;
		}
		document.getElementById("TimeLeft").innerHTML = "Auto Save : "+ minutes + " : " + seconds;
		if (distance < 0) {
			clearInterval(x);
			document.getElementById("TimeLeft").innerHTML = "Auto Save : 00 : 00";
			//var checkedUserType = $(".BalanceChecked input[type=radio]:checked");
			//var checkedUserType1 = $(".InternalCalibration input[type=radio]:checked");
			if($(".CalibrationMethod").val()=='' || $(".CalibrationMethod").val()==0 || $(".InstrumentID").val()=='' || $(".InstrumentID").val()==0 || $(".DeviceType").val()=='' || $(".DeviceType").val()==0)
			{
				window.location="{{ url('/home') }}";
			}
			else
			{
				$("#SaveCalibration").submit();
			}
		}
	}, 500);

</script>
@endsection
