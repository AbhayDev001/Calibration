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
									<div id="TimeLeft" class="pull-right ml10" style="font-weight: bold;color: #0090d5;">Auto Save : 60 : 00</div>
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
							<form id="SaveCalibration" name="frm" method="post" action="{{ url('SaveMGMonthlyCalibration') }}">
								<input type="hidden" value="{{csrf_token()}}" name="_token" />
								@php
														$microDisplayValue=DB::table('formula_setting')->get();
														@endphp
								<input type="hidden" readonly="readonly" name="Desired_Smallest" value="{{ $microDisplayValue[0]->microDisplayValue }}" class="form-input form-control Desired_Smallest">
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

									</div>
									<div class="row">
                                        <fieldset class="col-lg-6 mobile-mt20">
											<div class="row">
												<label class="col-md-4 control-label form-lable"><b>Instrument ID No</b></label>
												<div class="col-md-8 input-area">
													<!-- <i class="icon-append fa fa-money"></i> -->
													<select type="text" class="form-input form-control DeviceType" name="DeviceType" disabled="disabled">
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
													<input type="text" class="form-input form-control NextCalibratedDate" name="NextCalibratedDate" readonly="readonly">
												</div>
											</div>
										</fieldset>
										<fieldset class="col-lg-6 mt10 mobile-mt20">
											<div class="row">
												<label class="col-md-4 control-label form-lable"><b>Next Calibration on:</b></label>
												<div class="col-md-8 input-area">
													<i class="icon-append fa fa-calendar"></i>
													<input type="text" class="form-input form-control NextCalibratedDate1" name="NextCalibratedDate1" readonly>
												</div>
											</div>
										</fieldset>
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
					$.get('AjaxGetDeviceType1/'+ cat_id,function(data){
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
				// alert($(".CalibrationMethod").val());
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
							obj2.calibration_type = 'MonthlyMicro';

							$.get('AjaxGetDeviceTypeFormId/'+ JSON.stringify(obj2),function(data){
								$(".FormId").val(data);
							});
							//$(".FormId").val("BAL/AD/"+$('.DeviceType').val()+"/RP:<?php echo $CalibrationFormId+1; ?>");

							$.get('AjaxGetDeviceValue/'+ JSON.stringify(obj),function(data){
								//$('.CalibratedDate').val("<?php echo date("d-m-Y h:i A"); ?>");
								$('.Make').val(data['firstdata']['Make']);
								$('.Model').val(data['firstdata']['Model']);
								const now = (data['firstdata']['DayAdd'].toLocaleString("sv-SE") + '').replace(' ','T');
								//console.log(now);
								//alert(now);

// 								var x = 12; //or whatever offset
// var CurrentDate = new Date();
// var dateString = moment(CurrentDate).format('DD-MM-YYYY');
// console.log("Current date:", CurrentDate);
// CurrentDate.setMonth(CurrentDate.getMonth() + x);
// console.log("Date after " + x + " months:", CurrentDate);

									var dd = data['firstdata']['Master_Calibration_Date'];
									// alert(dd);
									var today = new Date();
									var currentday_from_currentdate = String(today.getDate()).padStart(2, '0');
									//alert(String(today.getDate()).padStart(2, '0'));

// if (currentday_from_currentdate >= dd-3 && currentday_from_currentdate <= dd+3) {
// //$(":submit").removeAttr("disabled");
// $('.btnSaveFormData').prop("disabled",false);
									if(today.getMonth()!=11){
										
										if(dd>currentday_from_currentdate){
										
											var nextdate =  String(dd).padStart(2, '0')  + "-" + String((today.getMonth() + 2)).padStart(2, '0')+ "-" + today.getFullYear();
											// alert('IF1');
										}
										if(dd<=currentday_from_currentdate){
											var nextdate =  String(dd).padStart(2, '0')  + "-" + String((today.getMonth() + 2)).padStart(2, '0')+ "-" + today.getFullYear();
											// alert('IF2');
										}
									}else{
										/*var nextdate =  String(dd).padStart(2, '0')  + "-" + String(01).padStart(2, '0') + "-" + (today.getFullYear()+1);
										alert('Else');*/

										if(dd>currentday_from_currentdate){
										
											var nextdate =  String(dd).padStart(2, '0')  + "-" + String((today.getMonth() + 2)).padStart(2, '0')+ "-" + today.getFullYear();
											// alert('IF3');
										}
										if(dd<=currentday_from_currentdate){
											var nextdate =  String(dd).padStart(2, '0')  + "-" + String((today.getMonth()-10)).padStart(2, '0')+ "-" + today.getFullYear();
											// alert('IF4');
										}
									}
/*}
else{
									$('.btnSaveFormData').prop("disabled",true);
									//$(':input[type="submit"]').prop('disabled', true);
									alert('Current date is not in the permitted date range.');
								}*/
								$('.NextCalibratedDate1').val(nextdate);

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
					//$('.CalibratedDate').val("");
					$('.CalibratedDate').attr("readonly","readonly");
					$('.Model').val("");
					$('.Model').attr("readonly","readonly");
					//$('.NextCalibratedDate').val("");
					$('.NextCalibratedDate').attr("readonly","readonly");
				}
			});
$(document).ready(function () {
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

		var distance = (countDownDate+3600000) - now;
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
			if($(".CalibrationMethod").val()=='' || $(".CalibrationMethod").val()==0 || $(".InstrumentID").val()=='' || $(".InstrumentID").val()==0 || $(".DeviceType").val()=='' || $(".DeviceType").val()==0 || $(".NextCalibratedDate1").val()=='' || $(".NextCalibratedDate1").val()==0 || $(".WeightBoxId").val()=='' || $(".WeightBoxId").val()==0 || $(".FormId").val()=='' || $(".FormId").val()==0)
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