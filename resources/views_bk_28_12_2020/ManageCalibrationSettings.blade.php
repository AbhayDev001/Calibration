@extends('Main')
@section('content')
<div id="ribbon">
	<ol class="breadcrumb">
		<li><a href="{{ url('/home') }}">Home</a></li>
		<li>Manage Calibration Form Settings</li>
	</ol>
</div>
<div id="content">
	<style>
		.type1, .type2, .type3, .type4{
			display: none;
		}
	</style>
	<!--section id="widget-grid" class=""-->
	<section>
		<div class="row">
			<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="product-content product-wrap clearfix product-deatil">
					<form  id="SaveUser" name="frm" method="post" action="{{ url('SaveFormSettings') }}">
						<input type="hidden" value="{{csrf_token()}}" name="_token" />
						<div class="col-lg-12">
							<div class="row top-menu-box">
								<b>Update Calibration Form Settings</b>
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
										<label class="col-md-5 control-label form-lable"><b>Calibration Type</b></label>
										<div class="col-md-7 input-area">
											<select class="form-input form-control" id="calibration_type" name="calibration_type" required>
												<option value="0">--Select--</option>
												<option value="1">Daily</option>
												<option value="2">Daily (Micro Balance)</option>
												<option value="3">Monthly(Balance)</option>
												<option value="4">Monthly(Micro Balance)</option>
											</select>
										</div>
									</div>
								</fieldset>
								<fieldset class="col-lg-6 mobile-mt20 type1">
									<div class="row">
										<label class="col-md-5 control-label form-lable"><b>Form ID for Daily:</b></label>
										<div class="col-md-7 input-area">
											<input type="text" class="form-input form-control" name="form_id1" id="form_id1">
										</div> 
									</div>
								</fieldset>
								<fieldset class="col-lg-6 mobile-mt20 type4">
									<div class="row">
										<label class="col-md-5 control-label form-lable"><b>Form ID for Daily(Micro):</b></label>
										<div class="col-md-7 input-area">
											<input type="text" class="form-input form-control" name="form_id4" id="form_id4">
										</div> 
									</div>
								</fieldset>
								<fieldset class="col-lg-6 mobile-mt20 type2">
									<div class="row">
										<label class="col-md-5 control-label form-lable"><b>Form ID for Monthly(Balance):</b></label>
										<div class="col-md-7 input-area">
											<input type="text" class="form-input form-control" name="form_id2" id="form_id2">
										</div> 
									</div>
								</fieldset>
								<fieldset class="col-lg-6 mobile-mt20 type3">
									<div class="row">
										<label class="col-md-5 control-label form-lable"><b>Form ID for Monthly(Micro):</b></label>
										<div class="col-md-7 input-area">
											<input type="text" class="form-input form-control" name="form_id3" id="form_id3">
										</div> 
									</div>
								</fieldset>
							</div>
							<div class="row type1 type2 type3 type4">
								<fieldset class="col-lg-6 mobile-mt20">
									<div class="row">
										<label class="col-md-5 control-label form-lable"><b>SOP No. for Page 1:</b></label>
										<div class="col-md-7 input-area">
											<input type="text" class="form-input form-control" name="sop1" id="sop1">
										</div> 
									</div>
								</fieldset>
								<fieldset class="col-lg-6 mobile-mt20">
									<div class="row">
										<label class="col-md-5 control-label form-lable"><b>Format No. for Page 1:</b></label>
										<div class="col-md-7 input-area">
											<input type="text" class="form-input form-control" name="format_no1" id="format_no1">
										</div> 
									</div>
								</fieldset>
							</div>
							<div class="row type2 type3">
								<fieldset class="col-lg-6 mobile-mt20">
									<div class="row">
										<label class="col-md-5 control-label form-lable"><b>SOP No. for Page 2:</b></label>
										<div class="col-md-7 input-area">
											<input type="text" class="form-input form-control" name="sop2" id="sop2">
										</div> 
									</div>
								</fieldset>
								<fieldset class="col-lg-6 mobile-mt20">
									<div class="row">
										<label class="col-md-5 control-label form-lable"><b>Format No. for Page 2:</b></label>
										<div class="col-md-7 input-area">
											<input type="text" class="form-input form-control" name="format_no2" id="format_no2">
										</div> 
									</div>
								</fieldset>
							</div>
							<div class="row type2">
								<fieldset class="col-lg-6 mobile-mt20">
									<div class="row">
										<label class="col-md-5 control-label form-lable"><b>SOP No. for Page 3:</b></label>
										<div class="col-md-7 input-area">
											<input type="text" class="form-input form-control" name="sop3" id="sop3">
										</div> 
									</div>
								</fieldset>
								<fieldset class="col-lg-6 mobile-mt20">
									<div class="row">
										<label class="col-md-5 control-label form-lable"><b>Format No. for Page 3:</b></label>
										<div class="col-md-7 input-area">
											<input type="text" class="form-input form-control" name="format_no3" id="format_no3">
										</div> 
									</div>
								</fieldset>
							</div>
							<div class="row type2">
								<fieldset class="col-lg-6 mobile-mt20">
									<div class="row">
										<label class="col-md-5 control-label form-lable"><b>SOP No. for Page 4:</b></label>
										<div class="col-md-7 input-area">
											<input type="text" class="form-input form-control" name="sop4" id="sop4">
										</div> 
									</div>
								</fieldset>
								<fieldset class="col-lg-6 mobile-mt20">
									<div class="row">
										<label class="col-md-5 control-label form-lable"><b>Format No. for Page 4:</b></label>
										<div class="col-md-7 input-area">
											<input type="text" class="form-input form-control" name="format_no4" id="format_no4">
										</div> 
									</div>
								</fieldset>
							</div>
							<div class="row type2">
								<fieldset class="col-lg-6 mobile-mt20">
									<div class="row">
										<label class="col-md-5 control-label form-lable"><b>SOP No. for Page 5:</b></label>
										<div class="col-md-7 input-area">
											<input type="text" class="form-input form-control" name="sop5" id="sop5">
										</div> 
									</div>
								</fieldset>
								<fieldset class="col-lg-6 mobile-mt20">
									<div class="row">
										<label class="col-md-5 control-label form-lable"><b>Format No. for Page 5:</b></label>
										<div class="col-md-7 input-area">
											<input type="text" class="form-input form-control" name="format_no5" id="format_no5">
										</div> 
									</div>
								</fieldset>
							</div>
							<div class="row type2">
								<fieldset class="col-lg-6 mobile-mt20">
									<div class="row">
										<label class="col-md-5 control-label form-lable"><b>SOP No. for Page 6:</b></label>
										<div class="col-md-7 input-area">
											<input type="text" class="form-input form-control" name="sop6" id="sop6">
										</div> 
									</div>
								</fieldset>
								<fieldset class="col-lg-6 mobile-mt20">
									<div class="row">
										<label class="col-md-5 control-label form-lable"><b>Format No. for Page 6:</b></label>
										<div class="col-md-7 input-area">
											<input type="text" class="form-input form-control" name="format_no6" id="format_no6">
										</div> 
									</div>
								</fieldset>
							</div>
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
	</section>
</div>
@endsection

@section('JSscript')
<script type="text/javascript">
	$(".btnSaveForm").click(function(){
		$(".TableError").html('<label class="failed">&nbsp</label>');
		if($("#calibration_type").val()=='' || $("#calibration_type").val()=='0')
		{
			$("#calibration_type").parent("div").children(".tooltip").remove();
			$("#calibration_type").parent("div").append("<b class='tooltip tooltip-bottom-right'>Required field</b>",removetooltip('WeightBoxId'));
			$("#calibration_type").focus();
			return false;
		}
		// if($(".WeightBox_calibration_on").val()=='')
		// {
		// 	$(".WeightBox_calibration_on").parent("div").children(".tooltip").remove();
		// 	$(".WeightBox_calibration_on").parent("div").append("<b class='tooltip tooltip-bottom-right'>Required field</b>",removetooltip('WeightBox_calibration_on'));
		// 	$(".WeightBox_calibration_on").focus();
		// 	return false;
		// }
		// if($(".WeightBox_next_calibration").val()=='')
		// {
		// 	$(".WeightBox_next_calibration").parent("div").children(".tooltip").remove();
		// 	$(".WeightBox_next_calibration").parent("div").append("<b class='tooltip tooltip-bottom-right'>Required field</b>",removetooltip('WeightBox_next_calibration'));
		// 	$(".WeightBox_next_calibration").focus();
		// 	return false;
		// }
	});

	$('#calibration_type').on('change',function(e){
		$('.type1,.type2,.type3').find('input').val('');
		var calibration_type = $(this).val();
		if(calibration_type == 1)
		{
			$('.type2,.type3,.type4').hide();
			$('.type1').show();
		}
		else if(calibration_type == 2)
		{
			$('.type1,.type2,.type3').hide();
			$('.type4').show();
		}
		else if(calibration_type == 3)
		{
			$('.type1,.type3,.type4').hide();
			$('.type2').show();
		}
		else if(calibration_type == 4)
		{
			$('.type1,.type2,.type4').hide();
			$('.type3').show();
		}
		else
		{
			$('.type1,.type2,.type3,.type4').hide();
		}

		if(calibration_type != 0 && calibration_type !="")
		{
			var obj = {};
			obj.RecId=calibration_type;
			$.get('AjaxGetFormSettings/'+ JSON.stringify(obj),function(data){
				console.log(data);
				$('#form_id1').val(data['form_id1']);
				$('#form_id2').val(data['form_id2']);
				$('#form_id3').val(data['form_id3']);
				$('#form_id4').val(data['form_id4']);
				$('#sop1').val(data['sop1']);
				$('#sop2').val(data['sop2']);
				$('#sop3').val(data['sop3']);
				$('#sop4').val(data['sop4']);
				$('#sop5').val(data['sop5']);
				$('#sop6').val(data['sop6']);
				$('#format_no1').val(data['format_no1']);
				$('#format_no2').val(data['format_no2']);
				$('#format_no3').val(data['format_no3']);
				$('#format_no4').val(data['format_no4']);
				$('#format_no5').val(data['format_no5']);
				$('#format_no6').val(data['format_no6']);
			});
		}else{

		}
	});
</script>
@endsection