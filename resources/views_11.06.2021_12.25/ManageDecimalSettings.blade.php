@extends('Main')
@section('content')
<div id="ribbon">
	<ol class="breadcrumb">
		<li><a href="{{ url('/home') }}">Home</a></li>
		<li>Manage Calibration Decimal Settings</li>
	</ol>
</div>
<div id="content">
	<!--section id="widget-grid" class=""-->
	<section>
		<div class="row">
			<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="product-content product-wrap clearfix product-deatil">
					<form id="SaveUser" name="frm" method="post" action="{{ url('SaveDecimalSettings') }}">
						<input type="hidden" value="{{csrf_token()}}" name="_token" />
						<div class="col-lg-12">
							<div class="row top-menu-box">
								<b>Update Calibration Decimal Settings</b>
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
										<label class="col-md-6 control-label form-lable"><b>Standard Weight:</b></label>
										<div class="col-md-6 input-area">
											<input type="number" class="form-input form-control standard_weight" name="standard_weight" min="1" max="10" step="1" id="standard_weight" value="{{ $MainData->standard_weight }}">
										</div> 
									</div>
								</fieldset>
								<fieldset class="col-lg-6 mobile-mt20">
									<div class="row">
										<label class="col-md-6 control-label form-lable"><b>Certified Weight(A):</b></label>
										<div class="col-md-6 input-area">
											<input type="number" class="form-input form-control certified_weight" name="certified_weight" min="1" max="10" step="1" id="certified_weight" value="{{ $MainData->certified_weight }}">
										</div> 
									</div>
								</fieldset>
							</div>
							<div class="row">
								<fieldset class="col-lg-6 mobile-mt20">
									<div class="row">
										<label class="col-md-6 control-label form-lable"><b>Displayed Weight(B):</b></label>
										<div class="col-md-6 input-area">
											<input type="number" class="form-input form-control displayed_weight" name="displayed_weight" min="1" max="10" step="1" id="displayed_weight" value="{{ $MainData->displayed_weight }}">
										</div> 
									</div>
								</fieldset>
								<fieldset class="col-lg-6 mobile-mt20">
									<div class="row">
										<label class="col-md-6 control-label form-lable"><b>Difference Between A and B(A-B):</b></label>
										<div class="col-md-6 input-area">
											<input type="number" class="form-input form-control difference_between_A_B" name="difference_between_A_B" min="1" max="10" step="1" id="difference_between_A_B" value="{{ $MainData->difference_between_A_B }}">
										</div> 
									</div>
								</fieldset>
							</div>
							<div class="row">
								<fieldset class="col-lg-6 mobile-mt20">
									<div class="row">
										<label class="col-md-6 control-label form-lable"><b>Acceptance Criteria of Certified Weight:</b></label>
										<div class="col-md-6 input-area">
											<input type="number" class="form-input form-control acceptance_weight" name="acceptance_weight" min="1" max="10" step="1" id="acceptance_weight" value="{{ $MainData->acceptance_weight }}">
										</div> 
									</div>
								</fieldset>
								<fieldset class="col-lg-6 mobile-mt20">
									<div class="row">
										<label class="col-md-6 control-label form-lable"><b>Observed Mass:</b></label>
										<div class="col-md-6 input-area">
											<input type="number" class="form-input form-control observed_mass" name="observed_mass" min="1" max="10" step="1" id="observed_mass" value="{{ $MainData->observed_mass }}">
										</div> 
									</div>
								</fieldset>
							</div>
							<div class="row">
								<fieldset class="col-lg-6 mobile-mt20">
									<div class="row">
										<label class="col-md-6 control-label form-lable"><b>Actual Mass:</b></label>
										<div class="col-md-6 input-area">
											<input type="number" class="form-input form-control actual_mass" name="actual_mass" min="1" max="10" step="1" id="actual_mass" value="{{ $MainData->actual_mass }}">
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
		if($("#standard_weight").val()=='' || $("#standard_weight").val()=='0')
		{
			$("#standard_weight").parent("div").children(".tooltip").remove();
			$("#standard_weight").parent("div").append("<b class='tooltip tooltip-bottom-right'>Required field</b>",removetooltip('standard_weight'));
			$("#standard_weight").focus();
			return false;
		}
		if($("#certified_weight").val()=='' || $("#certified_weight").val()=='0')
		{
			$("#certified_weight").parent("div").children(".tooltip").remove();
			$("#certified_weight").parent("div").append("<b class='tooltip tooltip-bottom-right'>Required field</b>",removetooltip('certified_weight'));
			$("#certified_weight").focus();
			return false;
		}
		if($("#displayed_weight").val()=='' || $("#displayed_weight").val()=='0')
		{
			$("#displayed_weight").parent("div").children(".tooltip").remove();
			$("#displayed_weight").parent("div").append("<b class='tooltip tooltip-bottom-right'>Required field</b>",removetooltip('displayed_weight'));
			$("#displayed_weight").focus();
			return false;
		}
		if($("#difference_between_A_B").val()=='' || $("#difference_between_A_B").val()=='0')
		{
			$("#difference_between_A_B").parent("div").children(".tooltip").remove();
			$("#difference_between_A_B").parent("div").append("<b class='tooltip tooltip-bottom-right'>Required field</b>",removetooltip('difference_between_A_B'));
			$("#difference_between_A_B").focus();
			return false;
		}
		if($("#acceptance_weight").val()=='' || $("#acceptance_weight").val()=='0')
		{
			$("#acceptance_weight").parent("div").children(".tooltip").remove();
			$("#acceptance_weight").parent("div").append("<b class='tooltip tooltip-bottom-right'>Required field</b>",removetooltip('acceptance_weight'));
			$("#acceptance_weight").focus();
			return false;
		}
	});
</script>
@endsection