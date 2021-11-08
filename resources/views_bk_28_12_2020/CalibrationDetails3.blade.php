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
					<form id="SaveCalibration" name="frm" method="post" action="{{ url('SaveMonthlyCalibrationP5') }}">
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
						<div class="col-lg-12">
							<div class="FileTable table-responsive" data-filepath="{{ $DevicePath }}">
								<div class="error-msg TableError">
									<label class="failed">&nbsp;</label>
								</div>
								<b style="padding-bottom: 10px;display: inline-block;">Weighing method: Positive</b>
								<table class="table table-striped table-bordered table-hover" width="100%">
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
										@foreach($MainData['DeviceWeightLine'] as $calData)
										<tr>
											<td>
												<input type='text' class="LineId LineId{{ $calData->LineId }} TabInput" readonly='readonly' name='LineId[]' value="{{ $calData->LineId }}" />
											</td>
											<td>
												<input type='text' class='StWeight TabInput' readonly='readonly' name='StWeight[]' value="{{ $calData->StWeight }}"/>
											</td>
											<td>
												<input type='text' class='CertWeight TabInput' readonly='readonly' name='CertWeight[]' value="{{ $calData->CertWeight }}" />
											</td>
											<td>
												<input type='text' class='DispWeight TabInput' readonly='readonly' name='DispWeight[]' />
											</td>
											<td>
												<input type='text' class='DifferentAB TabInput' readonly='readonly' name='DifferentAB[]' />
											</td>
											<td>
												± <input type='text' class='AccpWeight TabInput' readonly='readonly' name='AccpWeight[]' value="{{ $calData->AccpWeight }}" style='width:80%;'/>
											</td>
											<td>
												<input type='text' class='Result TabInput' readonly='readonly' name='Result[]' />
											</td>
											<td>
												<button type='button' class='btn btn-xs btn-default btnGetFileData'><i class='fa fa-eye'></i></button>
												<button type='button' class='btn btn-xs btn-default btnAttachment' disabled='disabled'><i class='fa fa-paperclip'></i></button>
											</td>
											<input type='hidden' class='Tfile' name='Tfile[]' value='' />
											<input type='hidden' class='Ifile' name='Ifile[]' value='' />
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
						<div class="col-lg-12 CommentTable mt20">
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

	});

	$('.FileTable').on('click', '.btnGetFileData', function() {
		$(".TableError").html('<label class="failed">&nbsp</label>');

		var ThisTr=$(this).parents("tr");
		ThisTr.find(".btnAttachment").removeAttr("disabled");
		if(ThisTr.find(".DispWeight").val()!="" && ThisTr.find(".DifferentAB").val()!="")
		{
			$('#CommentModel').find(".CalibrationLineRecId").val(0);
			$('#CommentModel').find(".LineComment").val("");
			$('#CommentModel').find(".CalibrationLineRecId").val(ThisTr.find("input[name='LineId[]']").val());
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
	});

	$(".btnAddComment").click(function(){
		if($("#CommentModel").find(".LineComment").val()!='')
		{
			$(".TableError").html('<label class="failed">&nbsp</label>');
			var LineRecId=$('#CommentModel').find(".CalibrationLineRecId").val();
			var ThisTr=$('.FileTable').find(".LineId"+LineRecId).parents("tr");
			ThisTr.find(".btnAttachment").removeAttr("disabled");
			var DeviceFilePath=ThisTr.parents(".FileTable").attr("data-filepath");
			if(DeviceFilePath!='')
			{
				$.get('../AjaxGetFileData/'+ DeviceFilePath,function(data){
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

						var comment="Line "+ThisTr.find(".LineId").val()+" : "+$("#CommentModel").find(".LineComment").val();
						var LineId=ThisTr.find(".LineId").val();
						var FormIdDS=$(".FormId").val().split("/");
						var FormIdD=FormIdDS.join("***");
						var Data='{"FormId":"'+FormIdD+'","Comments":"'+comment+'","LineId":"'+LineId+'","CreatedDate":"<?php echo now(); ?>"}';

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

	$('.FileTable').on('click', '.btnAttachment', function() {
		var file=$(this).parents("tr").find(".Ifile").val();
		$('.modal-title').text(file);
			//var filepath=$(".FileTable").attr("data-filepath").toString();
			$('.ShowImg').attr("src","../public/Doc/"+file);
			$('#ShowFile').modal('show');
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

	var did = @php echo $MainData['CalData'][0]['DeviceId']; @endphp;
	if(did>0)
	{
		$.get('../AjaxGetDeviceTypeText/'+ did,function(data){
			$(".DeviceTypeText").text(data);
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
            
            var $nonempty = $('.Result').filter(function() {
		     return this.value != ''
		    });

		    if ($nonempty.length == 0)
            //if($(".Result"). == '')
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
