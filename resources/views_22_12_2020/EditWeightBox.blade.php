@extends('Main')
@section('content')
<div id="ribbon">
	<ol class="breadcrumb">
		<li><a href="{{ url('/home') }}">Home</a></li>
		<li>Edit Weight Box</li>
	</ol>
</div>
<div id="content">
	<!--section id="widget-grid" class=""-->
	<section>
		<div class="row">
			<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="product-content product-wrap clearfix product-deatil">
					<form id="SaveUser" name="frm" method="post" action="{{ url('UpdateWeightBox') }}">
						<input type="hidden" value="{{csrf_token()}}" name="_token" />
						<input type="hidden" name="RecId" value="{{ $MainData['WeightBox'][0]->RecId }}">
						<div class="col-lg-12">
							<div class="row top-menu-box">
								<b>Edit Weight Box</b>
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
										<label class="col-md-5 control-label form-lable"><b>Weight Box ID No:</b></label>
										<div class="col-md-7 input-area">
											<i class="icon-append fa fa-info"></i>
											<input type="text" name="WeightBoxId" class="form-input form-control WeightBoxId" autocomplete="off" value="{{ $MainData['WeightBox'][0]->WeightBoxId }}">
										</div>
									</div>
								</fieldset>
								<fieldset class="col-lg-6 mobile-mt20">
									<div class="row">
										<label class="col-md-5 control-label form-lable"><b>Weight Box Calibration On:</b></label>
										<div class="col-md-7 input-area">
											<input type="datetime-local" class="form-input form-control WeightBox_calibration_on" name="WeightBox_calibration_on" value="{{ strftime('%Y-%m-%dT%H:%M:%S',strtotime($MainData['WeightBox'][0]->WeightBox_calibration_on)) }}" >
										</div> 
									</div>
								</fieldset>
							</div>
							<div class="row">
								<fieldset class="col-lg-6 mobile-mt20">
									<div class="row">
										<label class="col-md-5 control-label form-lable"><b>Weight Box Next Calibration:</b></label>
										<div class="col-md-7 input-area">
											<input type="datetime-local" class="form-input form-control WeightBox_next_calibration" name="WeightBox_next_calibration" value="{{ strftime('%Y-%m-%dT%H:%M:%S',strtotime($MainData['WeightBox'][0]->WeightBox_next_calibration)) }}">
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
	$(".btnSaveForm").click(function(){
		$(".TableError").html('<label class="failed">&nbsp</label>');
		if($(".WeightBoxId").val()=='')
		{
			$(".WeightBoxId").parent("div").children(".tooltip").remove();
			$(".WeightBoxId").parent("div").append("<b class='tooltip tooltip-bottom-right'>Required field</b>",removetooltip('WeightBoxId'));
			$(".WeightBoxId").focus();
			return false;
		}
		if($(".WeightBox_calibration_on").val()=='')
		{
			$(".WeightBox_calibration_on").parent("div").children(".tooltip").remove();
			$(".WeightBox_calibration_on").parent("div").append("<b class='tooltip tooltip-bottom-right'>Required field</b>",removetooltip('WeightBox_calibration_on'));
			$(".WeightBox_calibration_on").focus();
			return false;
		}
		if($(".WeightBox_next_calibration").val()=='')
		{
			$(".WeightBox_next_calibration").parent("div").children(".tooltip").remove();
			$(".WeightBox_next_calibration").parent("div").append("<b class='tooltip tooltip-bottom-right'>Required field</b>",removetooltip('WeightBox_next_calibration'));
			$(".WeightBox_next_calibration").focus();
			return false;
		}
	});
</script>
@endsection