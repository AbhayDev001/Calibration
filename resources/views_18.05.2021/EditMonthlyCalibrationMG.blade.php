@extends('Main')
@section('content')
@php
Session::put('CommentsData', []);
@endphp
<div id="ribbon">
	<ol class="breadcrumb">
		<li><a href="{{ url('/home') }}">Home</a></li>
		<li>Add Calibration</li>
	</ol>
</div>
<div id="content">
	<section>
		<div class="row">
			<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="product-content product-wrap clearfix product-deatil">
					<form id="SaveCalibration" name="frm" method="post" action="{{ url('UpdMonthlyCalibrationP2MG') }}">
						<input type="hidden" value="{{csrf_token()}}" name="_token" />
						<div class="col-lg-12">
							<div class="row top-menu-box">
								<b>Calibration Details:</b>
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
						$DevicePath="";
						@endphp
						@foreach($MainData['CalData'] as $caldata)
						@php
						$DeviceId=$caldata->DeviceId;
						$Device=DB::table('devicemaster')->where('RecId',$DeviceId)->get();
						$DevicePath=str_replace('\\',"*",$Device[0]->DirPath);

						$Criteria1=DB::table('Criteria')->where('RecId',1)->first();

						@endphp
						<input type="hidden" value="{{ $caldata->RecId }}" name="cid" />
						<input type="hidden" class="FormRecId" name="RecId" value="{{ $caldata->RecId }}" />
						<input type="hidden" class="CalibrationStatus" name="Status" value="{{ $caldata->Status }}" />
						<div class="col-lg-12 pdtrb-15">
							<div class="row mt20">
								{{-- <fieldset class="col-lg-1 mobile-mt20"></fieldset> --}}
								<fieldset class="col-lg-6 mobile-mt20">
									<div class="row">
										<label class="col-md-4 control-label form-lable"><b>Calibration Method:</b></label>
										<div class="col-md-8 input-area">
											<i class="icon-append fa fa-cog"></i>
											<select type="text" class="form-input form-control CalibrationMethod" name="CalibrationMethod" disabled="disabled">
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
								</fieldset>
								<fieldset class="col-lg-6 col-md-6 mobile-mt20">
									<label class="col-md-4 control-label form-lable"><b>Form ID:</b></label>
									<div class="col-md-8 input-area">
										<i class="icon-append fa fa-info"></i>
										<input type="text" readonly="readonly" name="FormId" value="{{ $caldata->FormId }}" class="form-input numeric form-control FormId">
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
										<label class="col-md-4 control-label form-lable"><b>Lab ID NO:</b></label>
										<div class="col-md-8 input-area">
											<i class="icon-append fa fa-money"></i>
											<select type="text" class="form-input form-control InstrumentID" name="InstrumentID" disabled="disabled">
												<option value="0">--Select--</option>
												@php
												$Calibration=DB::table('instrumentmaster')->where('IsActive',1)->get();
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
										<label class="col-md-4 control-label form-lable"><b>Weight box ID No:</b></label>
										<div class="col-md-8 input-area">
											<i class="icon-append fa fa-info"></i>
											<input type="text" name="WeightBoxId" class="form-input form-control WeightBoxId" value="{{ $caldata->WeightBoxId }}" readonly="readonly">
										</div>
									</div>
								</fieldset>
							</div>
							<div class="row">
                                <fieldset class="col-lg-6 mobile-mt20">
									<div class="row">
										<label class="col-md-4 control-label form-lable"><b>Instrument ID No:</b></label>
										<div class="col-md-8 input-area">
											<i class="icon-append fa fa-money"></i>
											<select type="text" class="form-input form-control DeviceType" name="DeviceType" disabled="disabled">
												<option value="0">--Select--</option>
												@php
												$Calibration=DB::table('devicemaster')->where('IsActive',1)->where('InstrumentId',$caldata->InstrumentId)->get();
												@endphp
												@foreach($Calibration as $cali)
												<option value="{{ $cali->RecId }}">{{ $cali->Name }}</option>
												@endforeach
											</select>
										</div>
									</div>
                                </fieldset>
                                <fieldset class="col-lg-6 mt10 mobile-mt20">
									<div class="row">
										<label class="col-md-4 control-label form-lable"><b>Calibrated on:</b></label>
										<div class="col-md-8 input-area">
											<i class="icon-append fa fa-calendar"></i>
											<input type="text" class="form-input form-control CalibratedDate" name="CalibratedDate" readonly="readonly" value="{{ date('d-m-Y h:i A',strtotime($caldata->CalibrationDate)) }}">
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
											<input type="text" class="form-input form-control Make" name="Make" readonly="readonly" value="{{ $caldata->Make }}">
										</div>
									</div>
                                </fieldset>
                                <fieldset class="col-lg-6 mt10 mobile-mt20">
									<div class="row">
										<label class="col-md-4 control-label form-lable"><b>Next Calibration on:</b></label>
										<div class="col-md-8 input-area">
											<i class="icon-append fa fa-calendar"></i>
											<input type="text" class="form-input form-control NextCalibratedDate" name="NextCalibratedDate" readonly="readonly" value="{{ date('d-m-Y h:i A',strtotime($caldata->CalibrationNextDate)) }}">
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
											<input type="text" class="form-input form-control Model" name="Model" readonly="readonly" value="{{ $caldata->Model }}">
										</div>
									</div>
								</fieldset>
                            </div>
						 <div class="row">
								<fieldset class="col-lg-6 mt10 mobile-mt20">
									<div class="row">
										<label class="col-md-4 control-label form-lable"><b>Next Calibration on:</b></label>
										<div class="col-md-8 input-area">
											<i class="icon-append fa fa-calendar"></i>
											<input type="text" class="form-input form-control NextCalibratedDate" name="NextCalibratedDate" readonly="readonly" value="{{ date('d-m-Y h:i A',strtotime($caldata->CalibrationNextDate1)) }}">
										</div>
									</div>
								</fieldset>
                         </div>
						</div>
						@endforeach
						<div class="col-lg-12">
							<div class="FileTable table-responsive" data-filepath="{{ $DevicePath }}">
								<div class="error-msg TableError">
									<label class="failed">&nbsp;</label>
								</div>
								<table class="table table-striped table-bordered table-hover" width="100%">
									<thead>
										<tr>
											<th>Sr. No</th>
											<th>Standard Weight (<span class="DeviceTypeText">gm</span>)</th>
											<th>Observed Mass (<span class="DeviceTypeText">gm</span>)</th>
											<th></th>
										</tr>
									</thead>
									<tbody>
										<?php
										$in=1;
										$firstmg="";
										?>
										@foreach($MainData['DeviceWeightObsMass'] as $key=>$val)
										<?php
										if($in==1)
										{
											$firstmg=$val->StWeight." mg";
											$in=$in+1;
										}
										?>
										<tr>
											<td>
												<input type='text' class='LineId LineId{{ $val->LineId }} TabInput' readonly='readonly' name='LineId[]' value="{{ $val->LineId }}" />
											</td>
											<td>
												<input type='text' class='StWeight TabInput' readonly='readonly' name='StWeight[]' value='{{ number_format((float)$val->StWeight, $MainData['Decimal'][0]->standard_weight, '.', '') }}'/>
											</td>
											<td>
												<input type='text' class='ObsMass TabInput numeric1' autocomplete="off" style="width: 100%;" name='ObsMass[]' readonly="readonly" value="{{ number_format((float)$val->ObsMass, $MainData['Decimal'][0]->observed_mass, '.', '') }}" />
											</td>
											<td>
												<button type='button' class='btn btn-xs btn-default btnGetFileData'><i class='fa fa-eye'></i></button>
												<button type='button' class='btn btn-xs btn-default btnAttachment'><i class='fa fa-paperclip'></i></button>
											</td>
											<input type='hidden' class='Tfile' name='Tfile[]' value="{{ $val->Tfile }}"  />
											<input type='hidden' class='Ifile' name='Ifile[]' value="{{ $val->Ifile }}"  />
											<input type="hidden" class="LineRecId<?php echo $val->RecId; ?>" name="LineRecId[]" value="<?php echo $val->RecId; ?>" />
										</tr>
										@endforeach
										<tr>
											<th colspan="2">Average Mass</th>
											<td><input type="text" name="AverageMass" class="AverageMass TabInput" readonly="readonly" /></td>
											<th></th>
										</tr>
										<tr>
											<th colspan="2">Standard deviation(SD)</th>
											<td><input type="text" name="StandardMass" class="StandardMass TabInput" readonly="readonly"></td>
											<th></th>
										</tr>
									</tbody>
								</table>
							</div>
							<div class="table-responsive CommentTable mt20 mb10">
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
											@foreach($MainData['CalCommentData'] as $comment)
											<tr>
												<td>{{ $comment->Comments }}</td>
												<td>{{ date("d/m/Y h:i A",strtotime($comment->CreatedDate)) }}</td>
												<td>
													@php
													$CreatedByName=DB::table('usermaster')->where('UserId',$comment->CreatedBy)->get();
													echo $CreatedByName[0]->UserName;
													@endphp
												</td>
												<td>
													@php
													$StatusMaster=DB::table('statusmaster')->where('RecId',$comment->CalibrationStatus)->get();
													echo $StatusMaster[0]->Name;
													@endphp
												</td>
											</tr>
											@endforeach
										</tbody>
									</table>
								</div>
							</div>
							<div class="table-responsive mt20">
								<table class="table table-striped table-bordered table-hover" width="100%">
									<tbody>
										<tr>
											<th class="text-center" style="width: 50%;">
												<p>2 X SD X 100</p>
												<p style="border-top: 1px dotted #111;">Desired smallest net weight(g)</p>
											</th>
											<td class="text-center" colspan="2">
												<p>2 X <span class="StandardMassText">0</span> X 100</p>
												<p style="border-top: 1px dotted #111;">1.002</p> <!-- chang by dinesh 0.02 to 1.002 13-05-2021-->
											</td>
										</tr>
										<tr>
											<th>SD (Standard Deviation or 0.41d [ d=0.00001 or 0.0001] whichever is greater)</th>
											<td colspan="2">
												<input type='text' class='TabInput StandardDeviation' name="StandardDeviation" readonly='readonly' />
											</td>
										</tr>
										<tr>
											<th>{{ $Criteria1->Data }}</th>
											<td>{{ $firstmg }}</td>
											<td >
												<input type='text' class='TabInput AcceptanceCriteria' name="AcceptanceCriteria" value="{{ $Criteria1->DisplayValue }}" readonly='readonly' />
											</td>
										</tr>
										<tr>
											<th>Complies with the Acceptance Criteria</th>
											<td colspan="2">
												<div class="inline-group RdoComplies" style="pointer-events: none;">
													<label class="radiobtn">
														<input type="radio" class="RdoYes" name="RdoComplies"  value="1">
														<i></i>Yes
													</label>
													<label class="radiobtn">
														<input type="radio" class="RdoNo" name="RdoComplies" value="2" >
														<i></i>No
													</label>
												</div>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>

						<div class="col-lg-12 mtb20">
							<div class="row">
								<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
									<button class="btnSaveFormData btn btn-primary pull-right" type="submit"><i class="fa fa-lg fa-fw fa-save"></i> <span class="area-text">Submit</span></button>
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
	</section>
</div>
@endsection

@section('JSscript')
@if(isset($MainData['CalData']))
<script type="text/javascript">
	$(document).ready(function() {
		$(".CalibrationMethod").val("@php echo $MainData['CalData'][0]['CalibrationId']; @endphp");
		$(".InstrumentID").val("@php echo $MainData['CalData'][0]['InstrumentId']; @endphp");
		$(".DeviceType").val("@php echo $MainData['CalData'][0]['DeviceId']; @endphp");

		$('.FileTable').on('click', '.btnGetFileData', function() {
			$(".TableError").html('<label class="failed">&nbsp</label>');

			var ThisTr=$(this).parents("tr");
			ThisTr.find(".btnAttachment").removeAttr("disabled");
			if(ThisTr.find(".StWeight").val()!="" && ThisTr.find(".ObsMass").val()!="")
			{
				$('#CommentModel').find(".CalibrationLineRecId").val(0);
				$('#CommentModel').find(".LineComment").val("");
				$('#CommentModel').find(".CalibrationLineRecId").val(ThisTr.find("input[name='LineRecId[]']").val());
				$('#CommentModel').modal('show');
			}
			else
			{
				var DeviceFilePath=$(this).parents(".FileTable").attr("data-filepath");
				if(DeviceFilePath!='')
				{
					$.get('../AjaxGetFileData/'+ DeviceFilePath,function(data){
						if(data['mg']!="")
						{
							ThisTr.find(".Tfile").val(data['Tfile']);
							ThisTr.find(".Ifile").val(data['Ifile']);
							ThisTr.find(".ObsMass").val(data['mg']);
							GetAvg();
						}
						else
						{
							$(".TableError").append('<label class="failed">File is empty</label>');
							setTimeout(function(){ $(".TableError").html('<label class="failed">&nbsp</label>'); }, 10000);
						}
					});
				}
			}
		});

		$(".btnAddComment").click(function(){
			if($("#CommentModel").find(".LineComment").val()!='')
			{
				$(".TableError").html('<label class="failed">&nbsp</label>');
				var LineRecId=$('#CommentModel').find(".CalibrationLineRecId").val();
				var ThisTr=$('.FileTable').find(".LineRecId"+LineRecId).parents("tr");
				ThisTr.find(".btnAttachment").removeAttr("disabled");
				var DeviceFilePath=ThisTr.parents(".FileTable").attr("data-filepath");
				if(DeviceFilePath!='')
				{
					$.get('../AjaxGetFileData/'+ DeviceFilePath,function(data){
						if(data['mg']!="")
						{
							ThisTr.find(".Tfile").val(data['Tfile']);
							ThisTr.find(".Ifile").val(data['Ifile']);
							ThisTr.find(".ObsMass").val(data['mg']);
							GetAvg();

							var comment="Line "+ThisTr.find(".LineId").val()+" : "+$("#CommentModel").find(".LineComment").val();
							var LineId=ThisTr.find(".LineId").val();
							var FormIdDS=$(".FormId").val().split("/");
							var FormIdD=FormIdDS.join("***");
							var StWeight=ThisTr.find(".StWeight").val();
							var ObsMass=ThisTr.find(".ObsMass").val();

							var Tfile=ThisTr.find(".Tfile").val();
							var Ifile=ThisTr.find(".Ifile").val();

							var Data='{"Comments":"'+comment+'","CalibrationLineRecId":"'+LineRecId+'","LineId":"'+LineId+'","StWeight":"'+StWeight+'","ObsMass":"'+ObsMass+'","Tfile":"'+Tfile+'","Ifile":"'+Ifile+'","CalibrationStatus":"'+$(".CalibrationStatus").val()+'","RefRecId":"'+$(".FormRecId").val()+'","Type":"4"}';

							$.get('../AjaxSaveCommentWithUpdateLine1/'+Data,function(data){
								$('#CommentModel').modal('hide');
								if(data!=100)
								{
									alert("Unable to save data");
									window.location="{{ url(Request::url()) }}";
								}
								else
								{
									LoadCommentTable();
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
				$("#CommentModel").find(".LineComment").parent("div").children(".tooltip").remove();
				$("#CommentModel").find(".LineComment").parent("div").append("<b class='tooltip tooltip-bottom-right' style='opacity:1'>Required field</b>",removetooltip('LineComment'));
				$(".LineComment").focus();
				return false;
			}
		});

		$('.FileTable').on('click', '.btnAttachment', function() {
			var file=$(this).parents("tr").find(".Ifile").val();
			$('.modal-title').text(file);
			//var filepath=$(".FileTable").attr("data-filepath").toString();
			$('.ShowImg').attr("src","../public/Doc/"+file);
			$('#ShowFile').modal('show');
		});

		function LoadCommentTable()
		{
			var Data='{"FormRecId":"'+$(".FormRecId").val()+'","Type":"4"}';
			$.get('../AjaxGetComment/'+ Data,function(data){
				$(".CommentTable").find("tbody").html(" ");
				$.each(data,function(key,val){
					$(".CommentTable").find("tbody").append("<tr><td>"+val['Comments']+"</td><td>"+val['CreatedDate']+"</td><td>"+val['CreatedBy']+"</td><td>"+val['CalibrationStatus']+"</td></tr>")
				});
			});
		}
	});

function GetAvg(){
	var AverageMass=0;
	var StandardMass=0;
	var line=0;
	var totMass=0;
	var MassArr="";
	$(".ObsMass").each(function( index ) {
		line=line+1;
		totMass=totMass+Number($(this).val());
		if(index==0)
		{
			MassArr=Number($(this).val());
		}
		else
		{
			MassArr=MassArr+","+Number($(this).val());
		}
	});
	AverageMass=totMass/line;
	StandardMass=totMass/line;
	$(".AverageMass").val(AverageMass.toFixed(5));
	var SDMass=GetStandardDeviation(MassArr);
	// rhl 14-12-2020 //
	var SDMass2 = SDMass.toFixed(8);
	var DefaultSD = 0.41*0.00001;             // chang by dinesh 0.0001 to 0.00001 13-05-2021
	if(SDMass2 < DefaultSD){
		SDMass2 = DefaultSD;
	}
	$(".StandardMass").val(SDMass.toFixed(8));
	$(".StandardMassText").text(SDMass2);
	var RealSD=(2*SDMass2*100)/1.002;         //chang by dinesh 0.02 to 1.002 13-05-2021-->
	// end rhl 14-12-2020 //
	$(".StandardDeviation").val(RealSD.toFixed(5));
	var RealValue=Number("<?php echo $Criteria1->RealValue; ?>").toFixed(2);

	if(RealValue<Number($(".StandardDeviation").val()))
	{
		$(".RdoComplies").find(".RdoNo").prop("checked", true);
	}
	else
	{
		$(".RdoComplies").find(".RdoYes").prop("checked", true);
	}
}

function GetStandardDeviation(data) {
	var str = ""+data+"";
	if(str.indexOf(','))
	{
		var temp = data.split(",");
	}
	else
	{
		var temp= [];
		temp[0]=data;
	}
	var answer=d3.deviation(temp);
	return answer;
}

var did = @php echo $MainData['CalData'][0]['DeviceId']; @endphp;
if(did>0)
{
	$.get('../AjaxGetDeviceTypeText/'+ did,function(data){
		$(".DeviceTypeText").text(data);
	});
}

GetAvg();
</script>
@endif
@endsection
