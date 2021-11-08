@extends('Main')
@section('content')
<div id="ribbon">
	<ol class="breadcrumb">
		<li><a href="{{ url('/home') }}">Home</a></li>
		<li>Manage Calibration Formula Settings</li>
	</ol>
</div>
<div id="content">
	<!--section id="widget-grid" class=""-->
	<section>
		<div class="row">
			<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="product-content product-wrap clearfix product-deatil">
					<form id="SaveUser" name="frm" method="post" action="{{ url('SaveFormulaSettings') }}">
						<input type="hidden" value="{{csrf_token()}}" name="_token" />
						<div class="col-lg-12">
							<div class="row top-menu-box">
								<b>Update Calibration Formula Settings</b>
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
										<label class="col-md-6 control-label form-lable"><b>Type:</b></label>
										<div class="col-md-6 input-area">
											<input type="text" class="form-input form-control monthlytype" name="monthlytype" id="monthlytype" value="{{ $MainData->monthlytype }}" readonly>
										</div> 
									</div>
								</fieldset>
								<fieldset class="col-lg-6 mobile-mt20">
									<div class="row">
										<label class="col-md-6 control-label form-lable"><b>Desired smallest net weight(g):</b></label>
										<div class="col-md-6 input-area">
											<input type="text" class="form-input form-control MonthlyDisplayValue" name="MonthlyDisplayValue" min="1" max="10" step="1" id="MonthlyDisplayValue" value="{{ $MainData->MonthlyDisplayValue }}">
										</div> 
									</div>
								</fieldset>
							</div>
							<div class="row">
								<fieldset class="col-lg-6 mobile-mt20">
									<div class="row">
										<label class="col-md-6 control-label form-lable"><b>Type</b></label>
										<div class="col-md-6 input-area">
											<input type="text" class="form-input form-control microtype" name="microtype" id="microtype" value="{{ $MainData->microtype }}" readonly>
										</div> 
									</div>
								</fieldset>
								<fieldset class="col-lg-6 mobile-mt20">
									<div class="row">
										<label class="col-md-6 control-label form-lable"><b>Desired smallest net weight(mg):</b></label>
										<div class="col-md-6 input-area">
											<input type="text" class="form-input form-control microDisplayValue" name="microDisplayValue" min="1" max="10" step="1" id="microDisplayValue" value="{{ $MainData->microDisplayValue }}">
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
		if($("#MonthlyDisplayValue").val()=='' || $("#MonthlyDisplayValue").val()=='0')
		{
			$("#MonthlyDisplayValue").parent("div").children(".tooltip").remove();
			$("#MonthlyDisplayValue").parent("div").append("<b class='tooltip tooltip-bottom-right'>Required field</b>",removetooltip('MonthlyDisplayValue'));
			$("#MonthlyDisplayValue").focus();
			return false;
		}
		if($("#microDisplayValue").val()=='' || $("#microDisplayValue").val()=='0')
		{
			$("#microDisplayValue").parent("div").children(".tooltip").remove();
			$("#microDisplayValue").parent("div").append("<b class='tooltip tooltip-bottom-right'>Required field</b>",removetooltip('microDisplayValue'));
			$("#microDisplayValue").focus();
			return false;
		}
		
	});
</script>
@endsection