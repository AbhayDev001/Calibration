@extends('Main')
@section('content')
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
					<form id="SaveCalibration" name="frm" method="post" action="{{ url('SaveMonthlyCalibrationP4') }}">
						<input type="hidden" value="{{csrf_token()}}" name="_token" />
						<div class="col-lg-12">
							<div class="row top-menu-box">
								<b>Calibration Details:</b>
                                <div id="TimeLeft" class="pull-right ml10" style="font-weight: bold;color: #0090d5;">Auto Save : 10 : 00</div>
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
						@endphp
						<input type="hidden" value="{{ $caldata->RecId }}" name="cid" />
                        <div class="col-lg-12 pdtrb-15">
                            <div class="row mt20">
                                {{-- <fieldset class="col-lg-1 mobile-mt20"></fieldset> --}}
                                <fieldset class="col-lg-6 mobile-mt20">
                                    <div class="row ">
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
                                <fieldset class="col-lg-6  mobile-mt20">
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
                                        <label class="col-md-4 control-label form-lable"><b>LAB ID NO:</b></label>
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
						<div class="col-lg-12 filedata" data-filepath="{{ $DevicePath }}">
							<div class="row">
								<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 mt10">
									<b class="myquestion">Measurement of Sensitivity: </b>
								</div>
								<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 mt10">
									<b class="myquestion">Displayed weight of 200 gm weight(A): </b>
									<input type="text" name="DisplayWeightA" class="form-control DisplayWeightA numeric1" style="width: 160px;float: left;" readonly="readonly">
									<input type='hidden' class='TfileA' name="TfileA" />
									<input type='hidden' class='IfileA' name="IfileA" />
									<div style="display: inline-block;margin-left: 20px;margin-top: 5px;">
										<button type='button' class='btn btn-xs btn-default btnGetFileDataA'><i class='fa fa-eye'></i></button>
										<button type='button' class='btn btn-xs btn-default btnAttachmentA' disabled='disabled'><i class='fa fa-paperclip'></i></button>
									</div>
								</div>
								<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 mt10">
									<b class="myquestion">Displayed weight of empty pan(B): </b>
									<input type="text" name="DisplayWeightB" class="form-control DisplayWeightB numeric1" style="width: 160px;float: left;" readonly="readonly">
									<input type='hidden' class='TfileB' name="TfileB" />
									<input type='hidden' class='IfileB' name="IfileB" />
									<div style="display: inline-block;margin-left: 20px;margin-top: 5px;">
										<button type='button' class='btn btn-xs btn-default btnGetFileDataB'><i class='fa fa-eye'></i></button>
										<button type='button' class='btn btn-xs btn-default btnAttachmentB' disabled='disabled'><i class='fa fa-paperclip'></i></button>
									</div>
								</div>
								<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 mt10">
									<b class="myquestion">Sensitivity test passes/fails: </b>
									<input type="text" name="Sensitivity" class="form-control Sensitivity" style="width: 160px;float: left;" readonly="readonly">
								</div>
								<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 mt10">
									<b>Acceptance Criteria:</b>
									<div class="form-group">
										<div class="row">
											<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
												<textarea class="form-control TabInput" name="AcceptanceCriteriaDetail" style="resize: none;margin-top: 5px;width: 100%;pointer-events: none;">The weight displayed after taking out 200g weight should not be more than 0.1g.</textarea>
											</div>
										</div>
									</div>
								</div>
								<div class="col-lg-12 CommentTable" >
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
							</div>
						</div>

						<div class="col-lg-12 mtb20">
							<div class="row">
								<div class="col-lg-8 col-md-8 col-xs-12 col-sm-12">
									<label class="failed">&nbsp;</label>
								</div>
								<div class="col-lg-4 col-md-4 col-xs-12 col-sm-12">
									<button class="btnSaveFormData btn btn-primary pull-right" type="submit"><i class="fa fa-lg fa-fw fa-save"></i> <span class="area-text">Save & Next</span></button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</article>
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
							<input type="hidden" class="CalibrationType" value="0">
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

		$('.filedata').on('click', '.btnGetFileDataA', function() {
			if($(".DisplayWeightA").val()!='')
			{
				$('#CommentModel').find(".LineComment").val("");
				$('#CommentModel').find(".CalibrationType").val(1);
				$('#CommentModel').modal('show');
			}
			else
			{
				$(".TableError").html('<label class="failed">&nbsp</label>');
				$(".btnAttachmentA").removeAttr("disabled");
				var DeviceFilePath=$(this).parents(".filedata").attr("data-filepath");
				if(DeviceFilePath!='')
				{
					$.get('../AjaxGetFileData/'+ DeviceFilePath,function(data){
						if(data['mg']!="")
						{
							//data['mg'] = data['mg']/1000;
							data['mg'] = data['mg'];
							$(".DisplayWeightA").val(data['mg']);
							$(".IfileA").val(data['Ifile']);
							$(".TfileA").val(data['Tfile']);
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

		$('.filedata').on('click', '.btnAttachmentA', function() {
			var file=$(this).parents(".filedata").find(".IfileA").val();
			$('.modal-title').text(file);
			$('.ShowImg').attr("src","../public/Doc/"+file);
			$('#ShowFile').modal('show');
		});

		$('.filedata').on('click', '.btnGetFileDataB', function() {
			if($(".DisplayWeightB").val()!='')
			{
				$('#CommentModel').find(".LineComment").val("");
				$('#CommentModel').find(".CalibrationType").val(2);
				$('#CommentModel').modal('show');
			}
			else
			{
				$(".TableError").html('<label class="failed">&nbsp</label>');
				$(".btnAttachmentB").removeAttr("disabled");
				var DeviceFilePath=$(this).parents(".filedata").attr("data-filepath");
				if(DeviceFilePath!='')
				{
					$.get('../AjaxGetFileData/'+ DeviceFilePath,function(data){
						if(data['mg']!="")
						{
							data['mg'] = data['mg']/1000;
							$(".DisplayWeightB").val(data['mg']);
							$(".IfileB").val(data['Ifile']);
							$(".TfileB").val(data['Tfile']);
							if(data['mg']>0.1)
							{
								$(".Sensitivity").val("FAILS");
							}
							else
							{
								$(".Sensitivity").val("PASSES");
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
		});

		$('.filedata').on('click', '.btnAttachmentB', function() {
			var file=$(this).parents(".filedata").find(".IfileB").val();
			$('.modal-title').text(file);
			$('.ShowImg').attr("src","../public/Doc/"+file);
			$('#ShowFile').modal('show');
		});

		$(".btnAddComment").click(function(){
			if($("#CommentModel").find(".LineComment").val()!='')
			{
				$(".TableError").html('<label class="failed">&nbsp</label>');
				$(".btnAttachmentA").removeAttr("disabled");
				var DeviceFilePath=$(".btnAttachmentA").parents(".filedata").attr("data-filepath");
				if(DeviceFilePath!='')
				{
					$.get('../AjaxGetFileData/'+ DeviceFilePath,function(data){
						if(data['mg']!="")
						{
							data['mg'] = data['mg']/1000;
							if($(".CalibrationType").val()==1)
							{
								$(".DisplayWeightA").val(data['mg']);
								$(".IfileA").val(data['Ifile']);
								$(".TfileA").val(data['Tfile']);

								var comment="Displayed weight(A): "+$("#CommentModel").find(".LineComment").val();
							}
							else
							{
								$(".DisplayWeightB").val(data['mg']);
								$(".IfileB").val(data['Ifile']);
								$(".TfileB").val(data['Tfile']);
								if(data['mg']>0.1)
								{
									$(".Sensitivity").val("FAILS");
								}
								else
								{
									$(".Sensitivity").val("PASSES");
								}

								var comment="Displayed weight(B): "+$("#CommentModel").find(".LineComment").val();
							}
							var FormIdDS=$(".FormId").val().split("/");
							var FormIdD=FormIdDS.join("***");
							var Data='{"FormId":"'+FormIdD+'","Comments":"'+comment+'","LineId":"0","CreatedDate":"<?php echo now(); ?>"}';

							$.get('../AjaxSaveCommentTemp/'+Data,function(data){
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
				$("#CommentModel").find(".LineComment").parent("div").children(".tooltip").remove();
				$("#CommentModel").find(".LineComment").parent("div").append("<b class='tooltip tooltip-bottom-right' style='opacity:1'>Required field</b>",removetooltip('LineComment'));
				$(".LineComment").focus();
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
@endif
<script type="text/javascript">
    var countDownDate = new Date().getTime();
    var x = setInterval(function() {

        var now = new Date().getTime();

        var distance = (countDownDate+600000) - now;
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
            if($(".Sensitivity").val() == '')
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
