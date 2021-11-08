@extends('Main')
@section('content')
<div id="ribbon">
	<ol class="breadcrumb">
		<li><a href="{{ url('/home') }}">Home</a></li>
		<li>Calibration Details</li>
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
							<ul class="top-box-menu-bar">
								<li>
									<a href="{{ url('/PrintMonthlyCalibration/'.$MainData['CID']) }}" target="_blank" class="btn btn-xs btn-default"><i class="fa fa-print"></i> Print Calibration Details</a>
								</li>
							</ul>
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
					$Criteria2=DB::table('Criteria')->where('RecId',2)->first();

					@endphp
					<input type="hidden" class="FormRecId" name="RecId" value="{{ $caldata->RecId }}" />
					<input type="hidden" class="CalibrationStatus" name="Status" value="{{ $caldata->Status }}" />
					<div class="col-lg-12 pdtrb-20">
						<div class="row mt20">
							<fieldset class="col-lg-6 col-md-6 col-sm-12 mobile-mt20">
								<div class="row">
									<label class="col-md-4 control-label form-lable"><b>Calibration Method:</b></label>
									<div class="col-md-8 input-area">
										<i class="icon-append fa fa-cog"></i>
										<select type="text" class="form-input form-control CalibrationMethod" name="CalibrationMethod" disabled="disabled">
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
							<fieldset class="col-lg-6 col-md-6 col-sm-12 mobile-mt20">
								<div class="row">
									<label class="col-md-4 control-label form-lable"><b>Form ID:</b></label>
									<div class="col-md-8 input-area">
										<i class="icon-append fa fa-info"></i>
										@php
										$CalibrationFormId=0;
										$CalibrationFormId=DB::table('calibration')->count();
										@endphp
										<input type="text" readonly="readonly" name="FormId" value="{{ $caldata->FormId }}" class="form-input form-control FormId">
									</div>
								</div>
							</fieldset>
						</div>
						<div class="row">
							<fieldset class="col-lg-6 col-md-6 col-sm-12 mt10 mobile-mt20">
								<div class="row">
									<label class="col-md-6 control-label form-lable"><b><h6><u>Instrument Details:</u></b></h6></label>
								</div>
							</fieldset>
							<fieldset class="col-lg-6 col-md-6 col-sm-12 mt10 mobile-mt20">
								<div class="row">
									<label class="col-md-6 control-label form-lable"><b><h6><u>Standard Weight Box Details:</u></h6></b></label>
								</div>
							</fieldset>
						</div>

						<div class="row">
							<fieldset class="col-lg-6 col-md-6 col-sm-12 mt10 mobile-mt20">
								<div class="row">
									<label class="col-md-4 control-label form-lable"><b>LAB ID No:</b></label>
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
							<fieldset class="col-lg-6 mt10  mobile-mt20">
								<div class="row">
									<label class="col-md-4 control-label form-lable"><b>Weight box ID No:</b></label>
									<div class="col-md-8 input-area">
										<i class="icon-append fa fa-info"></i>
										<input type="text" name="WeightBoxId" class="form-input form-control WeightBoxId" readonly="readonly" value="{{ $caldata->WeightBoxId }}">
									</div>
								</div>
							</fieldset>
<!-- 							<fieldset class="col-lg-6 col-md-6 col-sm-12 mt10 mobile-mt20">
								<div class="row">
									<label class="col-md-4 control-label form-lable"><b>Device:</b></label>
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
                        -->
                        </div>
						<div class="row">
                            <fieldset class="col-lg-6 col-md-6 col-sm-12 mt10 mobile-mt20">
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
										<input type="text" class="form-input form-control CalibratedDate" name="CalibratedDate" readonly="readonly" value="{{ date('d-m-Y H:i A',strtotime($caldata->CalibrationDate)) }}">
									</div>
								</div>
							</fieldset>
						</div>
						<div class="row">
                            <fieldset class="col-lg-6 col-md-6 col-sm-12 mt10 mobile-mt20">
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
										<input type="text" class="form-input form-control NextCalibratedDate" name="NextCalibratedDate" readonly="readonly" value="{{ date('d-m-Y H:i A',strtotime($caldata->CalibrationNextDate)) }}">
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
										<input type="text" class="form-input form-control NextCalibratedDate1" name="NextCalibratedDate1" value="{{ date('d-m-Y H:i A',strtotime($caldata->CalibrationNextDate1)) }}" readonly="readonly">
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
									@foreach($MainData['PLineData'] as $calline)
									<tr>
										<td>
											<input type="text" class="LineId LineId{{ $calline->LineId }} TabInput" readonly="readonly" name="LineId[]" value="{{ $calline->LineId }}" />
										</td>
										<td>
											<input type="text" class="StWeight TabInput" readonly="readonly" name="StWeight[]" value="{{ number_format((float)$calline->StWeight, $MainData['Decimal'][0]->standard_weight, '.', '') }}" />
										</td>
										<td>
											<input type="text" class="CertWeight TabInput" readonly="readonly" name="CertWeight[]" value="{{ number_format((float)$calline->CertWeight, $MainData['Decimal'][0]->certified_weight, '.', '') }}" />
										</td>
										<td>
											<input type="text" class="DispWeight TabInput" readonly="readonly" name="DispWeight[]" value="{{ number_format((float)$calline->DispWeight, $MainData['Decimal'][0]->displayed_weight, '.', '') }}" />
										</td>
										<td>
											<input type="text" class="DifferentAB TabInput" readonly="readonly" name="DifferentAB[]" value="{{ number_format((float)$calline->DiffWeight, $MainData['Decimal'][0]->difference_between_A_B, '.', '') }}" />
										</td>
										<td>
											± <input type="text" class="AccpWeight TabInput" readonly="readonly" name="AccpWeight[]" value="{{ number_format((float)$calline->AccpWeight, $MainData['Decimal'][0]->acceptance_weight, '.', '') }}" style="width:80%;"/>
										</td>
										<td>
											<input type="text" class="Result TabInput" readonly="readonly" name="Result[]" value="@if($calline->Result==1){{'Passes'}}@elseif($calline->Result==2){{'Fails'}}@else{{''}} @endif" />
										</td>
										<td>
											<button type="button" class="btn btn-xs btn-default btnAttachment"><i class="fa fa-paperclip"></i></button>
										</td>
										<input type="hidden" class="Tfile" name="Tfile[]" value="{{ $calline->Tfile }}" />
										<input type="hidden" class="Ifile" name="Ifile[]" value="{{ $calline->Ifile }}" />
										<input type="hidden" class="LineRecId<?php echo $calline->RecId; ?>" name="LineRecId[]" value="<?php echo $calline->RecId; ?>" />
									</tr>
									@endforeach
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
										<th>Difference Between A and B (A-B) (<span class="DeviceTypeText">gm</span>)</th>
										<th>Acceptance Criteria(<span class="DeviceTypeText">gm</span>) of Certified Weight</th>
										<th>Result (Passes / Fails)</th>
										<th style="width: 75px;"></th>
									</tr>
								</thead>
								<tbody>
									@foreach($MainData['NLineData'] as $calline)
									<tr>
										<td>
											<input type="text" class="NegativeLineId NegativeLineId{{ $calline->LineId }} TabInput" readonly="readonly" name="NegativeLineId[]" value="{{ $calline->LineId }}" />
										</td>
										<td>
											<input type="text" class="NegativeStWeight TabInput" readonly="readonly" name="NegativeStWeight[]" value="{{ number_format((float)$calline->StWeight, $MainData['Decimal'][0]->standard_weight, '.', '') }}"/>
										</td>
										<td>
											<input type="text" class="NegativeCertWeight TabInput" readonly="readonly" name="NegativeCertWeight[]" value="{{ number_format((float)$calline->CertWeight, $MainData['Decimal'][0]->certified_weight, '.', '') }}" />
										</td>
										<td>
											<input type="text" class="NegativeDispWeight TabInput" readonly="readonly" name="NegativeDispWeight[]" value="{{ number_format((float)$calline->DispWeight, $MainData['Decimal'][0]->displayed_weight, '.', '') }}" />
										</td>
										<td>
											<input type="text" class="NegativeDifferentAB TabInput" readonly="readonly" name="NegativeDifferentAB[]" value="{{ number_format((float)$calline->DiffWeight, $MainData['Decimal'][0]->difference_between_A_B, '.', '') }}" />
										</td>
										<td>
											± <input type="text" class="NegativeAccpWeight TabInput" readonly="readonly" name="NegativeAccpWeight[]" value="{{ number_format((float)$calline->AccpWeight, $MainData['Decimal'][0]->acceptance_weight, '.', '') }}" style='width:80%;'/>
										</td>
										<td>
											<input type="text" class="NegativeResult TabInput" readonly="readonly" name="NegativeResult[]" value="@if($calline->Result==1){{'Passes'}}@elseif($calline->Result==2){{'Fails'}}@else{{''}} @endif" />
										</td>
										<td>
											<button type="button" class="btn btn-xs btn-default btnAttachment" ><i class='fa fa-paperclip'></i></button>
										</td>
										<input type="hidden" class="Tfile" name="Tfile[]" value="{{ $calline->Tfile }}" />
										<input type="hidden" class="Ifile" name="Ifile[]" value="{{ $calline->Ifile }}" />
										<input type="hidden" class="LineRecId<?php echo $calline->RecId; ?>" name="NegativeLineRecId[]" value="<?php echo $calline->RecId; ?>" />
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>

					<form name="frm" method="post" action="{{ url('SaveCalibrationComment') }}">
						<input type="hidden" value="{{csrf_token()}}" name="_token" />
						<div class="col-lg-12 mtb20">
							<div class="row">
								<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
									<div class="input-area">
										<input type="hidden" class="CalibrationLineRecId" value="1">
										<label>Comment:</label>
										<textarea class="txtComment form-control" style="resize: none;" rows="5"></textarea>
									</div>
								</div>
								<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
									<label style="width: 100%;">&nbsp;</label>
									<button type="button" class="btn btn-info btnAddComment1">Submit</button>
								</div>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="table-responsive">
								<table class="CommentTable MyCommentTable table table-striped table-bordered table-hover" width="100%">
									<thead>
										<tr>
											<th>Comment</th>
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
					</form>

					@foreach($MainData['CalData1'] as $caldata1)
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
									@foreach($MainData['DeviceWeightObsMass'] as $key=>$val)
									<tr>
										<td>
											<input type='text' class='LineId LineId{{ $val->LineId }} TabInput' readonly='readonly' name='LineId[]' value="{{ $val->LineId }}" />
										</td>
										<td>
											<input type='text' class='StWeight TabInput' readonly='readonly' name='StWeight[]' value="{{ number_format((float)$val->StWeight, $MainData['Decimal'][0]->standard_weight, '.', '') }}"/>
										</td>
										<td>
											<input type='text' class='ObsMass TabInput numeric1' autocomplete="off" style="width: 100%;" name='ObsMass[]' readonly="readonly" value="{{ number_format((float)$val->ObsMass, $MainData['Decimal'][0]->observed_mass, '.', '') }}" />
										</td>
										<td>
											<button type='button' class='btn btn-xs btn-default btnAttachment'><i class='fa fa-paperclip'></i></button>
										</td>
										<input type='hidden' class='Tfile' name='Tfile[]' value="{{ $val->Tfile }}"  />
										<input type='hidden' class='Ifile' name='Ifile[]' value="{{ $val->Ifile }}"  />
										<input type="hidden" class="LineRecId<?php echo $val->RecId; ?>" name="LineRecId[]" value="<?php echo $val->RecId; ?>" />
									</tr>
									@endforeach
									<tr>
										<th colspan="2">Average Mass</th>
										<td><input type="text" name="AverageMass" class="AverageMass TabInput" value="{{ number_format((float)$caldata1->AverageMass, $MainData['Decimal'][0]->observed_mass, '.', '') }}" readonly="readonly" /></td>
										<th></th>
									</tr>
									<tr>
										<th colspan="2">Standard deviation(SD)</th>
										<td><input type="text" name="StandardMass" class="StandardMass TabInput" value="{{ $caldata1->SD2 }}" readonly="readonly"></td>
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
										@foreach($MainData['CalCommentData1'] as $comment)
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
										<td class="text-center">
											<p>2 X {{ $caldata1->SD2 }} X 100</p>
											<p style="border-top: 1px dotted #111;">0.02</p>
										</td>
									</tr>
									<tr>
										<th>SD (Standard Deviation or 0.41d [ d=0.00001 or 0.0001] whichever is greater)</th>
										<td>
											<input type='text' class='TabInput StandardDeviation' value="{{ $caldata1->SD1 }}" name="StandardDeviation" readonly='readonly' />
										</td>
									</tr>
									<tr>
										<th>{{ $Criteria1->Data }}</th>
										<td>
											<input type='text' class='TabInput AcceptanceCriteria' name="AcceptanceCriteria" value="{{ $Criteria1->DisplayValue }}" readonly='readonly' />
										</td>
									</tr>
									<tr>
										<th>Complies with the Acceptance Criteria</th>
										<td>
											<div class="inline-group RdoComplies" style="pointer-events: none;">
												<label class="radiobtn">
													<input type="radio" class="RdoYes" name="RdoComplies"  value="1" <?php if($caldata1->CompliesAcceptanceCriteria==1) { ?> checked="checked" <?php } ?>>
													<i></i>Yes
												</label>
												<label class="radiobtn">
													<input type="radio" class="RdoNo" name="RdoComplies" value="2" <?php if($caldata1->CompliesAcceptanceCriteria==2) { ?> checked="checked" <?php } ?>>
													<i></i>No
												</label>
											</div>
										</td>
									</tr>
								</tbody>
							</table>
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
										<th>Position of weight on the pan</th>
										<th>Standard Weight</th>
										<th>Actual Mass</th>
										<th>Observer Mass</th>
										<th></th>
									</tr>
								</thead>
								<tbody>
									@foreach($MainData['DeviceWeightPosition'] as $key=>$val)
									<tr>
										<td>
											<input type='text' class='LineId LineId{{ $val->LineId }} TabInput' readonly='readonly' name='LineId[]' value="{{ $val->LineId }}" />
										</td>
										<td>
											<input type='text' class='PositionWeight TabInput' readonly='readonly' name='PositionWeight[]' value='{{ $val->PositionWeight }}' />
										</td>
										<td>
											<input type='text' class='StandardWeight TabInput numeric1' readonly="readonly" autocomplete="off" style="width: 100%;" name='StandardWeight[]' value="{{ number_format((float)$val->StWeight, $MainData['Decimal'][0]->standard_weight, '.', '') }}" />
										</td>
										<td>
											<input type='text' class='ActualMass TabInput numeric1' readonly="readonly" autocomplete="off" style="width: 100%;" name='ActualMass[]' value="{{ number_format((float)$calline->ActualMass, $MainData['Decimal'][0]->actual_mass, '.', '') }}" />
										</td>
										<td>
											<input type='text' class='ObserverMass TabInput numeric1' readonly="readonly" autocomplete="off" style="width: 100%;" name='ObserverMass[]' value="{{ number_format((float)$val->ObsMass, $MainData['Decimal'][0]->observed_mass, '.', '') }}" />
										</td>
										<td>
											<button type='button' class='btn btn-xs btn-default btnAttachment' ><i class='fa fa-paperclip'></i></button>
										</td>
										<input type='hidden' class='Tfile' name='Tfile[]' value="{{ $val->Tfile }}"  />
										<input type='hidden' class='Ifile' name='Ifile[]' value="{{ $val->Ifile }}"  />
										<input type="hidden" class="LineRecId<?php echo $val->RecId; ?>" name="LineRecId[]" value="<?php echo $val->RecId; ?>" />
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>

						<div class="row">
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
											@foreach($MainData['CalCommentData2'] as $comment)
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
						</div>

						<div class="row">
							<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 mt10">
								<b class="myquestion">{{ $Criteria2->Data }} </b>
								<input type="text" name="DiffAcceptanceCriteria" class="form-control" readonly="readonly" value="{{ $Criteria2->DisplayValue }}" style="width: 160px;">
							</div>
							<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 mt10">
								<b class="myquestion">Complies with the acceptance criteria: </b>
								<div class="inline-group RdoYesNo" style="pointer-events: none;margin-top: 7px;">
									<label class="radiobtn">
										<input type="radio" class="RdoYes" name="CompliesAcceptanceCriteria2" value="1">
										<i></i>Yes
									</label>
									<label class="radiobtn">
										<input type="radio" class="RdoNo" name="CompliesAcceptanceCriteria2" value="2">
										<i></i>No
									</label>
								</div>
							</div>
							@foreach($MainData['CalData1'] as $caldata)
							<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 mt20" style="pointer-events: none;">
								<div class="row">
									<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
										<div class="col-lg-12">
											<label class="radiobtn">
												<input type="radio" name="CompliesAcceptanceCriteria3" value="1" <?php if($caldata->CompliesAcceptanceCriteria3==1) { ?> checked="checked" <?php } ?>>
												<i></i>For Rectangular/Square Pan:
											</label>
										</div>
										<div class="col-lg-12 mt10">
											<img src="{{ asset('public/img/RecPan.png') }}">
										</div>
									</div>
									<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
										<div class="col-lg-12">
											<label class="radiobtn">
												<input type="radio" name="CompliesAcceptanceCriteria3" value="2" <?php if($caldata->CompliesAcceptanceCriteria3==2) { ?> checked="checked" <?php } ?>>
												<i></i>For Circular Pan
											</label>
										</div>
										<div class="col-lg-12 mt10">
											<img src="{{ asset('public/img/CirclePan.png') }}">
										</div>
									</div>
									<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
										<div class="col-lg-12">
											<label class="radiobtn">
												<input type="radio" name="CompliesAcceptanceCriteria3" value="3" <?php if($caldata->CompliesAcceptanceCriteria3==3) { ?> checked="checked" <?php } ?>>
												<i></i>For Triangular Pan
											</label>
										</div>
										<div class="col-lg-12 mt10">
											<img src="{{ asset('public/img/TriPan.png') }}">
										</div>
									</div>
								</div>
							</div>
							@endforeach
						</div>
					</div>

					@foreach($MainData['CalData1'] as $caldata)
					<div class="col-lg-12">
						<div class="row">
							<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 mt10">
								<b class="myquestion">Measurement of Sensitivity: </b>
							</div>
							<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 mt10">
								<b class="myquestion">Displayed weight of 200 gm weight(A): </b>
								<input type="text" name="DisplayWeightA" class="form-control numeric1" value="{{ $caldata->DisplayWeightA }}" readonly="readonly" style="width: 160px;">
							</div>
							<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 mt10">
								<b class="myquestion">Displayed weight of empty pan(B): </b>
								<input type="text" name="DisplayWeightB" class="form-control numeric1" value="{{ $caldata->DisplayWeightB }}" readonly="readonly" style="width: 160px;">
							</div>
							<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 mt10">
								<b class="myquestion">Sensitivity test passes/fails: </b>
								<input type="text" name="Sensitivity" class="form-control " style="width: 160px;" value="{{ $caldata->Sensitivity }}" readonly="readonly">
							</div>
							<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 mt10">
								<b>Acceptance Criteria:</b>
								<div class="form-group">
									<div class="row">
										<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
											<textarea class="form-control TabInput" name="AcceptanceCriteriaDetail" style="resize: none;margin-top: 5px;width: 100%;pointer-events: none;">@if($caldata->AcceptanceCriteriaDetail!='') {{ $caldata->AcceptanceCriteriaDetail }} @else {{ "The weight displayed after taking out 200g weight should not be more than 0.1g." }} @endif</textarea>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-12">
						<div class="table-responsive">
							<table class="CommentTable table table-striped table-bordered table-hover" width="100%">
								<thead>
									<tr>
										<th>Comment</th>
										<th>Commented Date</th>
										<th>Commented By</th>
										<th>Calibration Status</th>
									</tr>
								</thead>
								<tbody>
									@foreach($MainData['CalCommentData4'] as $comment4)
									<tr>
										<td>{{ $comment4->Comments }}</td>
										<td>{{ date("d/m/Y h:i A",strtotime($comment4->CreatedDate)) }}</td>
										<td>
											@php
											$CreatedByName=DB::table('usermaster')->where('UserId',$comment4->CreatedBy)->get();
											echo $CreatedByName[0]->UserName;
											@endphp
										</td>
										<td>
											@php
											$StatusMaster=DB::table('statusmaster')->where('RecId',$comment4->CalibrationStatus)->get();
											echo $StatusMaster[0]->Name;
											@endphp
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
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
										<th>Standard Weight(<span class="DeviceTypeText">gm</span>)</th>
										<th>Certified Weight(A)(<span class="DeviceTypeText">gm</span>)</th>
										<th>Displayed Weight(B)(<span class="DeviceTypeText">gm</span>)</th>
										<th>Difference Between A and B(A-B) (<span class="DeviceTypeText">gm</span>)</th>
										<th>Acceptance Criteria(<span class="DeviceTypeText">gm</span>) of Certified Weight</th>
										<th>Result (Passes / Fails)</th>
										<th style="width: 75px;"></th>
									</tr>
								</thead>
								<tbody>
									@foreach($MainData['LineData'] as $calline)
									<tr>
										<td>
											<input type="text" class="LineId LineId{{ $calline->LineId }} TabInput" readonly="readonly" name="LineId[]" value="{{ $calline->LineId }}" />
										</td>
										<td>
											<input type="text" class="StWeight TabInput" readonly="readonly" name="StWeight[]" value="{{ number_format((float)$calline->StWeight, $MainData['Decimal'][0]->standard_weight, '.', '') }}" />
										</td>
										<td>
											<input type="text" class="CertWeight TabInput" readonly="readonly" name="CertWeight[]" value="{{ number_format((float)$calline->CertWeight, $MainData['Decimal'][0]->certified_weight, '.', '') }}" />
										</td>
										<td>
											<input type="text" class="DispWeight TabInput" readonly="readonly" name="DispWeight[]" value="{{ number_format((float)$calline->DispWeight, $MainData['Decimal'][0]->displayed_weight, '.', '') }}" />
										</td>
										<td>
											<input type="text" class="DifferentAB TabInput" readonly="readonly" name="DifferentAB[]" value="{{ number_format((float)$calline->DiffWeight, $MainData['Decimal'][0]->difference_between_A_B, '.', '') }}" />
										</td>
										<td>
											± <input type="text" class="AccpWeight TabInput" readonly="readonly" name="AccpWeight[]" value="{{ number_format((float)$calline->AccpWeight, $MainData['Decimal'][0]->acceptance_weight, '.', '') }}" style="width:80%;"/>
										</td>
										<td>
											<input type="text" class="Result TabInput" readonly="readonly" name="Result[]" value="@if($calline->Result==1){{'Passes'}}@elseif($calline->Result==2){{'Fails'}}@else{{''}} @endif" />
										</td>
										<td>
											<button type="button" class="btn btn-xs btn-default btnAttachment"><i class="fa fa-paperclip"></i></button>
										</td>
										<input type="hidden" class="Tfile" name="Tfile[]" value="{{ $calline->Tfile }}" />
										<input type="hidden" class="Ifile" name="Ifile[]" value="{{ $calline->Ifile }}" />
										<input type="hidden" class="LineRecId<?php echo $calline->RecId; ?>" name="LineRecId[]" value="<?php echo $calline->RecId; ?>" />
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
									@foreach($MainData['CalCommentData3'] as $comment)
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


					<div class="col-lg-12 mtb20">
						<div class="row">
							<div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
							</div>
							<div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
								@if(Session::get('LoginData')['Role']==3 && $MainData['CalData'][0]->Status==10)
								<form name="frm" method="post" action="{{ url('VerifyMonthlyCalibration') }}">
									<input type="hidden" value="{{csrf_token()}}" name="_token" />
									<input type="hidden" name="Status" value="25" />
									<input type="hidden" name="CalibrationType" value="1" />
									<input type="hidden" name="RecId" value="{{ $MainData['CalData'][0]['RecId'] }}" />
									<button class="btn btn-danger pull-right ml10" type="submit"><i class="fa fa-lg fa-fw fa-close"></i> <span class="area-text">Decline by Verify</span></button>
								</form>
								<form name="frm" method="post" action="{{ url('VerifyMonthlyCalibration') }}">
									<input type="hidden" value="{{csrf_token()}}" name="_token" />
									<input type="hidden" name="Status" value="20" />
									<input type="hidden" name="CalibrationType" value="1" />
									<input type="hidden" name="RecId" value="{{ $MainData['CalData'][0]['RecId'] }}" />
									<button class="btn btn-primary pull-right ml10" type="submit"><i class="fa fa-lg fa-fw fa-check"></i> <span class="area-text">Submit by Verify</span></button>
								</form>
								@endif

								@if(Session::get('LoginData')['Role']==4 && ($MainData['CalData'][0]->Status==20 || $MainData['CalData'][0]->Status==30))
								<form name="frm" method="post" action="{{ url('ApproveMonthlyCalibration') }}">
									<input type="hidden" value="{{csrf_token()}}" name="_token" />
									<input type="hidden" name="RecId" value="{{ $MainData['CalData'][0]['RecId'] }}" />
									<input type="hidden" name="Status" value="40" />
									<input type="hidden" name="CalibrationType" value="1" />
									<button type="submit" class="btn btn-danger pull-right ml10"><i class="fa fa-lg fa-fw fa-close"></i> <span class="area-text">Decline by Approver</span></button>
								</form>
								@endif
								@if(Session::get('LoginData')['Role']==4 && ($MainData['CalData'][0]->Status==20 || $MainData['CalData'][0]->Status==40))
								<form name="frm" method="post" action="{{ url('ApproveMonthlyCalibration') }}">
									<input type="hidden" value="{{csrf_token()}}" name="_token" />
									<input type="hidden" name="RecId" value="{{ $MainData['CalData'][0]['RecId'] }}" />
									<input type="hidden" name="Status" value="30" />
									<input type="hidden" name="CalibrationType" value="1" />
									<button type="submit" class="btn btn-primary pull-right ml10"><i class="fa fa-lg fa-fw fa-check"></i> <span class="area-text">Approve by Approver</span></button>
								</form>
								@endif
							</div>
						</div>
					</div>
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
	</section>
</div>
@endsection

@section('JSscript')
<script type="text/javascript">
	$(document).ready(function (){

		$(".btnAddComment1").click(function(){
			if($(".txtComment").val()!='')
			{
				var LineRecId=0;
				var comment=$(".txtComment").val();

				var Data='{"Comments":"'+comment+'","CalibrationLineRecId":"'+LineRecId+'","CalibrationStatus":"'+$(".CalibrationStatus").val()+'","RefRecId":"'+$(".FormRecId").val()+'","Type":"2"}';

				$.get('../AjaxSaveComment/'+Data,function(data){
					if(data!=100)
					{
						alert("Unable to save data");
						LoadCommentTable();
					}
					else
					{
						$(".txtComment").val("");
						LoadCommentTable();
					}
				});
			}
			else
			{
				$(".txtComment").parent("div").children(".tooltip").remove();
				$(".txtComment").parent("div").append("<b class='tooltip tooltip-bottom-right' style='opacity:1'>Required field</b>",removetooltip('txtComment'));
				$(".txtComment").focus();
				return false;
			}
		});

		$('.FileTable').on('click', '.btnAttachment', function() {
			var file=$(this).parents("tr").find(".Ifile").val();
			$('.modal-title').text(file);
			$('.ShowImg').attr("src","../public/Doc/"+file);
			$('#ShowFile').modal('show');
		});
	});

	function LoadCommentTable()
	{
		var Data='{"FormRecId":"'+$(".FormRecId").val()+'","Type":"2"}';
		$.get('../AjaxGetComment/'+ Data,function(data){
			$(".MyCommentTable").find("tbody").html(" ");
			$.each(data,function(key,val){
				$(".MyCommentTable").find("tbody").append("<tr><td>"+val['Comments']+"</td><td>"+val['CreatedDate']+"</td><td>"+val['CreatedBy']+"</td><td>"+val['CalibrationStatus']+"</td></tr>")
			});
		});
	}


	function GetVal(){
		var ac=1;
		var RealValue=Number("<?php echo $Criteria2->RealValue; ?>").toFixed(2);
		$('.ObserverMass').each(function(){
			if(RealValue<Number($(this).val()))
			{
				ac=2;
			}
		});

		if(ac==1)
		{
			$(".RdoYesNo").find(".RdoYes").prop("checked", true);
		}

		if(ac==2)
		{
			$(".RdoYesNo").find(".RdoNo").prop("checked", true);
		}
	}
</script>
@if(isset($MainData['CalData']))
<script type="text/javascript">
	$(document).ready(function() {
		$(".CalibrationMethod").val("@php echo $MainData['CalData'][0]['CalibrationId']; @endphp");
		$(".InstrumentID").val("@php echo $MainData['CalData'][0]['InstrumentId']; @endphp");
		$(".DeviceType").val("@php echo $MainData['CalData'][0]['DeviceId']; @endphp");
		//$(".CalibrationMethod").change();
	});

	var did = @php echo $MainData['CalData'][0]['DeviceId']; @endphp;
	if(did>0)
	{
		$.get('../AjaxGetDeviceTypeText/'+ did,function(data){
			$(".DeviceTypeText").text(data);
		});
	}
</script>
@endif
@endsection
