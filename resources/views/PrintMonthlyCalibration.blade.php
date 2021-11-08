<!DOCTYPE html>
<html lang="en-us">
<head>
	<meta charset="utf-8">
	<title>Monthly Calibration Print</title>
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<link rel="shortcut icon" href="{{ asset('public/img/favicon/favicon.ico') }}" type="image/x-icon">
	<link rel="icon" href="{{ asset('public/img/favicon/favicon.ico') }}" type="image/x-icon">
    <style type="text/css">
        body{
            font-size: 14px !important;
        }
		.table-bordered {
			border: 1px solid #000;
		}
		.table {
			width: 100%;
			max-width: 100%;
			margin: 5px 0;
		}
		.mt10
		{
			margin-top: 10px!important;
		}
		.mb10
		{
			margin-bottom: 20px!important;
		}
		.tablefontsize
		{
			font-size: 12px;
		}
		table {
			border-collapse: collapse;
			border-spacing: 0;
		}
		.table>caption+thead>tr:first-child>td, .table>caption+thead>tr:first-child>th, .table>colgroup+thead>tr:first-child>td, .table>colgroup+thead>tr:first-child>th, .table>thead:first-child>tr:first-child>td, .table>thead:first-child>tr:first-child>th {
			border-top: 0;
		}
		.table-bordered>thead>tr>td, .table-bordered>thead>tr>th {
			border-bottom-width: 2px;
		}
		.table-bordered>tbody>tr>td, .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>td, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>thead>tr>th {
			border: 1px solid #000;
		}
		.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
			padding: 5px 8px;
			line-height: 1.42857143;
			vertical-align: top;
			border-top: 1px solid #000;
		}
		.mytable{
			width: 100%;
			max-width: 100%;
			/*font-size: 18px;*/
		}
		.mytable tr td, .mytable tr th{
			padding: 5px 8px;
			line-height: 1.42857143;
			vertical-align: top;
		}
		.mytable tr .UnderLine{
			padding-bottom: 3px;
			border-bottom: 2px solid #BDBDBD;
			font-weight: bold;
		}
		.headertable
		{
			width: 100%;
		}
		.headertable .title
		{
			margin:0;
			padding: 3px 0;
			text-align: center;
		}
		.headertable .headerlogo
		{
			text-align: center;
			vertical-align: middle;
		}
		.AnswerPart
		{
			width: calc(100% / 3 - 2%);
			margin-right:2%;
			float: left;
		}
		.AnswerPart img
		{
			margin-top: 10px;
		}
		.PageFooter
		{
			width: 100%;
			position: fixed;
			bottom: 0;
			display: none;
			font-size: 12px;
		}
		@media print {
			.PageFooter
			{
				display: block;
			}
		}
		.PageFooter1
		{
			font-size: 12px;
			width: 100%;
		}
		@page {
		    size: auto;
		    margin: 8mm 10mm;
		}
	</style>
</head>
<body>
	<?php $page = 1;?>
	@php
	$Criteria1=DB::table('Criteria')->where('RecId',1)->first();
	$Criteria2=DB::table('Criteria')->where('RecId',2)->first();
	@endphp
	@foreach($MainData['CalData'] as $caldata)
	<b style="text-align: center;width: 100%;display: inline-block;">ANNEXURE-IX</b>
	<table class="table table-bordered headertable">
		<tr>
			<td rowspan="2" colspan="2" class="headerlogo">
				<img src="{{ asset('public/img/logo.png') }}" alt="Calibration" style="width: 180px;">
			</td>
			<td colspan="2">
				<h5 class="title">ALEMBIC RESEARCH CENTRE </h5>
				<h5 class="title">ANALYTICAL DEVELOPMENT</h5>
			</td>
			<td colspan="2" style="text-align: right;">
				<p style="margin: 10px 0;">Form ID: <b>{{$caldata->FormId}}</b></p>
			</td>
		</tr>
		<tr>
			<td colspan="4">
				<h5 class="title">CALIBRATION RECORD OF ANALYTICAL BALANCE </h5>
				<h5 class="title">(ACCURACY)</h5>
			</td>
		</tr>
		<tr>
			<td>Department</td>
			<td>Analytical Development</td>
			<td>SOP No.</td>
			<td>{{ $MainData['SopFormat'][2]->sop1 }}</td>
			<td>Page No.</td>
			<td> <?php echo $page++;?> of <span class="no-of-pages">2</span></td>
		</tr>
	</table>
	<table class="mytable">
		<tr>
			<td colspan="4">Date : <b>{{date('d/m/Y')}}</b></td>
		</tr>
		<tr>
			<td colspan="2"><span class="UnderLine" style="border-color: #555;">Instrument Details</span></td>
			<td colspan="2"><span class="UnderLine" style="border-color: #555;">Standard weight box Details</span></td>
		</tr>
		<tr>
			<td width="20%">Instrument ID No.</td>
			<td width="30%">: <span class="UnderLine">{{$caldata->DeviceName}}</span></td>
			<td width="20%">Weight box ID No.</td>
			<td width="30%">: <span class="UnderLine">{{$caldata->WeightBoxId}}</span></td>
		</tr>
		<tr>
			<td>Make</td>
			<td>: <span class="UnderLine">{{$caldata->Make}}</span></td>
			<td>Calibrated on</td>
			<td>: <span class="UnderLine">{{ date('d/m/Y',strtotime($caldata->CalibrationDate)) }}</span></td>
		</tr>
		<tr>
			<td>Model</td>
			<td>: <span class="UnderLine">{{$caldata->Model}}</span></td>
			<td>Next calibration on</td>
			<td>: <span class="UnderLine">{{ date('d/m/Y',strtotime($caldata->CalibrationNextDate)) }}</span></td>
		</tr>
		<tr>
			<td>Next calibration on</td>
			<td colspan="3">: <span class="UnderLine">{{ $caldata->CalibrationNextDate1 ? date('d/m/Y',strtotime($caldata->CalibrationNextDate1)) : '' }}</span></td>
		</tr>
	</table>

	<?php
	if($caldata->DeviceTypeM==1)
	{
		$DeviceTypeMM="gm";
	}
	elseif($caldata->DeviceTypeM==2)
	{
		$DeviceTypeMM="mg";
	}
	else
	{
		$DeviceTypeMM=" ";
	}
	?>

	<b style="padding-top: 10px;display: inline-block;">Weighing Method: Positive</b>
	<table class="table table-bordered tablefontsize">
		<thead>
			<tr>
				<th>Sr. No</th>
				<th>Standard Weight({{ $DeviceTypeMM }})</th>
				<th>Certified Weight(A)({{ $DeviceTypeMM }})</th>
				<th>Displayed Weight(B)({{ $DeviceTypeMM }})</th>
				<th>Difference Between A and B (A-B) ({{ $DeviceTypeMM }})</th>
				<th>Acceptance Criteria({{ $DeviceTypeMM }}) of Certified Weight</th>
				<th>Result (Passes / Fails)</th>
			</tr>
		</thead>
		<tbody>
			@foreach($MainData['PLineData'] as $calline)
			<tr>
				<td>{{ $calline->LineId }}</td>
				<td>{{ number_format((float)$calline->StWeight, $MainData['Decimal'][0]->standard_weight, '.', '') }}</td>
				<td>{{ number_format((float)$calline->CertWeight, $MainData['Decimal'][0]->certified_weight, '.', '') }}</td>
				<td>{{ number_format((float)$calline->DispWeight, $MainData['Decimal'][0]->displayed_weight, '.', '') }}</td>
				<td>{{ number_format((float)$calline->DiffWeight, $MainData['Decimal'][0]->difference_between_A_B, '.', '') }}</td>
				<td>± {{ number_format((float)$calline->AccpWeight, $MainData['Decimal'][0]->acceptance_weight, '.', '') }}</td>
				<td>@if($calline->Result==1){{'Passes'}}@elseif($calline->Result==2){{'Fails'}}@else{{''}} @endif</td>
			</tr>
			@endforeach
		</tbody>
	</table>

	<b style="padding-top: 10px;display: inline-block;">Weighing Method: Negative</b>
	<table class="table table-bordered tablefontsize">
		<thead>
			<tr>
				<th>Sr. No</th>
				<th>Standard Weight({{ $DeviceTypeMM }})</th>
				<th>Certified Weight(A)({{ $DeviceTypeMM }})</th>
				<th>Displayed Weight(B)({{ $DeviceTypeMM }})</th>
				<th>Difference Between A and B (A-B) ({{ $DeviceTypeMM }})</th>
				<th>Acceptance Criteria({{ $DeviceTypeMM }}) of Certified Weight</th>
				<th>Result (Passes / Fails)</th>
			</tr>
		</thead>
		<tbody>
			@foreach($MainData['NLineData'] as $calline)
			<tr>
				<td>{{ $calline->LineId }}</td>
				<td>{{ number_format((float)$calline->StWeight, $MainData['Decimal'][0]->standard_weight, '.', '') }}</td>
				<td>{{ number_format((float)$calline->CertWeight, $MainData['Decimal'][0]->certified_weight, '.', '') }}</td>
				<td>{{ number_format((float)$calline->DispWeight, $MainData['Decimal'][0]->displayed_weight, '.', '') }}</td>
				<td>{{ number_format((float)$calline->DiffWeight, $MainData['Decimal'][0]->difference_between_A_B, '.', '') }}</td>
				<td>± {{ number_format((float)$calline->AccpWeight, $MainData['Decimal'][0]->acceptance_weight, '.', '') }}</td>
				<td>@if($calline->Result==1){{'Passes'}}@elseif($calline->Result==2){{'Fails'}}@else{{''}} @endif</td>
			</tr>
			@endforeach
		</tbody>
	</table>

	<table class="mytable" style="margin-bottom: 20px;">
		<tr>
			<td style="width:15%;">Performed by</td>
			<td style="width:35%;">: <span class="UnderLine">
					@php
					if($caldata->PerformedBy!='')
					{
						$PerformedByName=DB::table('usermaster')->where('UserId',$caldata->PerformedBy)->get();
						echo $PerformedByName[0]->UserName;
					}
					@endphp
				</span>
			</td>
			<td style="width:15%;">
				@if($caldata->Status=='20')
				Verified by
				@elseif($caldata->Status=='25')
				Decline (Verify) by
				@else
				Verified by
				@endif
			</td>
			<td style="width:35%;">: <span class="UnderLine">
					@php
					if($caldata->VerifiedBy!='')
					{
						$VerifiedByName=DB::table('usermaster')->where('UserId',$caldata->VerifiedBy)->get();
						echo $VerifiedByName[0]->UserName;
					}
					@endphp
				</span>
			</td>
		</tr>
		<tr>
			<td>Date</td>
			<td>: <span class="UnderLine">{{ date('d/m/Y h:i A',strtotime($caldata->PerformDate)) }}</span></td>
			<td>Date</td>
			<td>: <span class="UnderLine">@if($caldata->VerifiedBy!='') {{ date('d/m/Y h:i A',strtotime($caldata->VerifiedDate)) }} @endif</span></td>
		</tr>
	</table>
	<table class="table table-bordered" style="border-width: 1px;">
		<tbody>
			<tr>
				<td style="width: 50%;">
					@if($caldata->Status=='30')
					Approved By :
					@elseif($caldata->Status=='40')
					Decline by :
					@else
					Approved By :
					@endif

					@php
					if($caldata->AproovelBy!='')
					{
						$AproovelByName=DB::table('usermaster')->where('UserId',$caldata->AproovelBy)->get();
						echo $AproovelByName[0]->UserName;
					}
					@endphp
				</td>
				<td>Date : @if($caldata->AproovelBy!='') {{ date('d/m/Y h:i A',strtotime($caldata->AproovelDate)) }} @endif</td>
			</tr>
		</tbody>
	</table>
	<div class="PageFooter1">
		<p style="text-align:right;">Format No.: {{ $MainData['SopFormat'][2]->format_no1 }}</p>
	</div>
<?php $count=1;?>
<?php if(count($MainData['CalCommentData']) > 0){ ?>

	<p style="page-break-before: always"></p>
	<b style="text-align: center;width: 100%;display: inline-block;">ANNEXURE-IX</b>
	<table class="table table-bordered headertable">
		<tr>
			<td rowspan="2" colspan="2" class="headerlogo">
				<img src="{{ asset('public/img/logo.png') }}" alt="Calibration" style="width: 180px;">
			</td>
			<td colspan="2">
				<h5 class="title">ALEMBIC RESEARCH CENTRE </h5>
				<h5 class="title">ANALYTICAL DEVELOPMENT</h5>
			</td>
			<td colspan="2" style="text-align: right;">
				<p style="margin: 10px 0;">Form ID: <b>{{$caldata->FormId}}</b></p>
			</td>
		</tr>
		<tr>
			<td colspan="4">
				<h5 class="title">CALIBRATION RECORD OF ANALYTICAL BALANCE </h5>
				<h5 class="title">(ACCURACY)</h5>
			</td>
		</tr>
		<tr>
			<td>Department</td>
			<td>Analytical Development</td>
			<td>SOP No.</td>
			<td>{{ $MainData['SopFormat'][2]->sop1 }}</td>
			<td>Page No.</td>
			<td> <?php echo $page++;?> of <span class="no-of-pages">2</span></td>
		</tr>
	</table>
	<span style="padding-bottom:0px;border-bottom: 2px solid #555;font-weight: bold;">Comments/Audit Trail</span>
	<table class="table table-bordered" style="border-width: 1px;">
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
			<?php if($count<15) {?>
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
			<?php $count++; }?>
			@endforeach
		</tbody>
	</table>
<?php } ?>

<?php $count2=14;?>
<?php if(count($MainData['CalCommentData']) > 14){ ?>

	<p style="page-break-before: always"></p>
	<b style="text-align: center;width: 100%;display: inline-block;">ANNEXURE-IX</b>
	<table class="table table-bordered headertable">
		<tr>
			<td rowspan="2" colspan="2" class="headerlogo">
				<img src="{{ asset('public/img/logo.png') }}" alt="Calibration" style="width: 180px;">
			</td>
			<td colspan="2">
				<h5 class="title">ALEMBIC RESEARCH CENTRE </h5>
				<h5 class="title">ANALYTICAL DEVELOPMENT</h5>
			</td>
			<td colspan="2" style="text-align: right;">
				<p style="margin: 10px 0;">Form ID: <b>{{$caldata->FormId}}</b></p>
			</td>
		</tr>
		<tr>
			<td colspan="4">
				<h5 class="title">CALIBRATION RECORD OF ANALYTICAL BALANCE </h5>
				<h5 class="title">(ACCURACY)</h5>
			</td>
		</tr>
		<tr>
			<td>Department</td>
			<td>Analytical Development</td>
			<td>SOP No.</td>
			<td>{{ $MainData['SopFormat'][2]->sop1 }}</td>
			<td>Page No.</td>
			<td> <?php echo $page++;?> of <span class="no-of-pages">2</span></td>
		</tr>
	</table>
	<br>
	<!-- <span style="padding-bottom:0px;border-bottom: 2px solid #555;font-weight: bold;">Comments/Audit Trail</span> -->
	<table class="table table-bordered" style="border-width: 1px;">
		<thead>
			<tr>
				<th style="width: 55%;">Comment</th>
				<th>Commented Date</th>
				<th>Commented By</th>
				<th>Calibration Status</th>
			</tr>
		</thead>
		<tbody>
			@foreach($MainData['CalCommentData'] as $key=>$comment)
			<?php if($count2==$key) {?>
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
			<?php $count2++; }?>
			@endforeach
		</tbody>
	</table>
<?php } ?>
	<!--
	@foreach($MainData['CalCommentData'] as $comment)
	<div>{{ $comment->Comments }}</div>
	@endforeach
	-->
	
<?php $page1 = 1;?>
	<p style="page-break-before: always"></p>

	<b style="text-align: center;width: 100%;display: inline-block;margin-top:20px;">ANNEXURE-IX</b>
	<table class="table table-bordered headertable">
		<tr>
			<td rowspan="2" colspan="2" class="headerlogo">
				<img src="{{ asset('public/img/logo.png') }}" alt="Calibration" style="width: 180px;">
			</td>
			<td colspan="2">
				<h5 class="title">ALEMBIC RESEARCH CENTRE </h5>
				<h5 class="title">ANALYTICAL DEVELOPMENT</h5>
			</td>
			<td colspan="2" style="text-align: right;">
				<p style="margin: 10px 0;">Form ID: <b>{{$caldata->FormId}}</b></p>
			</td>
		</tr>
		<tr>
			<td colspan="4">
				<h5 class="title">CALIBRATION RECORD OF ANALYTICAL BALANCE </h5>
				<h5 class="title">(ACCURACY)</h5>
			</td>
		</tr>
		<tr>
			<td>Department</td>
			<td>Analytical Development</td>
			<td>SOP No.</td>
			<td>{{ $MainData['SopFormat'][2]->sop2 }}</td>
			<td>Page No.</td>
			<td> <?php echo $page1++;?> of <span class="no-of-pages1"></span></td>
		</tr>
	</table>
	<table class="mytable">
		<tr>
			<td colspan="4">Date : <b>{{date('d/m/Y')}}</b></td>
		</tr>
		<tr>
			<td colspan="2"><span class="UnderLine" style="border-color: #555;">Instrument Details</span></td>
			<td colspan="2"><span class="UnderLine" style="border-color: #555;">Standard weight box Details</span></td>
		</tr>
		<tr>
			<td style="width:20%;">Instrument ID No.</td>
			<td style="width:30%;">: <span class="UnderLine">{{$caldata->InstrumentName}}</span></td>
			<td style="width:20%;">Weight box ID No.</td>
			<td style="width:30%;">: <span class="UnderLine">{{$caldata->WeightBoxId}}</span></td>
		</tr>
		<tr>
			<td>Make</td>
			<td>: <span class="UnderLine">{{$caldata->Make}}</span></td>
			<td>Calibrated on</td>
			<td>: <span class="UnderLine">{{ date('d/m/Y',strtotime($caldata->CalibrationDate)) }}</span></td>
		</tr>
		<tr>
			<td>Model</td>
			<td>: <span class="UnderLine">{{$caldata->Model}}</span></td>
			<td>Next Calibration on</td>
			<td>: <span class="UnderLine">{{ date('d/m/Y',strtotime($caldata->CalibrationNextDate)) }}</span></td>
		</tr>
		<tr>
			<td>Next Calibration on</td>
			<td colspan="3">: <span class="UnderLine">{{ $caldata->CalibrationNextDate1 ? date('d/m/Y',strtotime($caldata->CalibrationNextDate1)) : '' }}</span></td>
		</tr>
	</table>
	@foreach($MainData['CalData1'] as $caldata1)
	<table class="table table-bordered tablefontsize">
		<thead>
			<tr>
				<th>Sr. No</th>
				<th>Standard Weight ({{ $DeviceTypeMM }})</th>
				<th>Observed Mass ({{ $DeviceTypeMM }})</th>
			</tr>
		</thead>
		<tbody>
			@foreach($MainData['DeviceWeightObsMass'] as $key=>$val)
			<tr>
				<td>
					{{ $val->LineId }}
				</td>
				<td>
					{{ number_format((float)$val->StWeight, $MainData['Decimal'][0]->standard_weight, '.', '') }}
				</td>
				<td>
					{{ number_format((float)$val->ObsMass, $MainData['Decimal'][0]->observed_mass, '.', '') }}
				</td>
			</tr>
			@endforeach
			<tr>
				<th colspan="2">Average Mass</th>
				<td>{{ $caldata1->AverageMass }}</td>
			</tr>
			<tr>
				<th colspan="2">Standard deviation(SD)</th>
				<td>{{ $caldata1->SD2 }}</td>
			</tr>
		</tbody>
	</table>
	@endforeach

	<div class="PageFooter1">
		<p style="text-align:right;">Format No.: {{ $MainData['SopFormat'][2]->format_no2 }}</p>
	</div>
	<?php $count=1;?>
<?php if(count($MainData['CalCommentData1']) > 0){ ?>
	<span style="padding-bottom: 0px;border-bottom: 2px solid #555;font-weight: bold;">Comments/Audit Trail</span>
	<table class="table table-bordered" style="border-width: 1px;">
		<thead>
			<tr>
				<th>Comment</th>
				<th>Commented Date</th>
				<th>Commented By</th>
				<th>Calibration Status</th>
			</tr>
		</thead>
		<tbody>
			@foreach($MainData['CalCommentData1'] as $comment)
			<?php if($count<7){?>
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
			<?php $count++;}?>
			@endforeach
		</tbody>
	</table>
<?php } ?>
<?php $count2=6;?>
<?php if(count($MainData['CalCommentData1']) > 6){ ?>
	<p style="page-break-before: always"></p>

	<b style="text-align: center;width: 100%;display: inline-block;margin-top:20px;">ANNEXURE-IX</b>
	<table class="table table-bordered headertable">
		<tr>
			<td rowspan="2" colspan="2" class="headerlogo">
				<img src="{{ asset('public/img/logo.png') }}" alt="Calibration" style="width: 180px;">
			</td>
			<td colspan="2">
				<h5 class="title">ALEMBIC RESEARCH CENTRE </h5>
				<h5 class="title">ANALYTICAL DEVELOPMENT</h5>
			</td>
			<td colspan="2" style="text-align: right;">
				<p style="margin: 10px 0;">Form ID: <b>{{$caldata->FormId}}</b></p>
			</td>
		</tr>
		<tr>
			<td colspan="4">
				<h5 class="title">CALIBRATION RECORD OF ANALYTICAL BALANCE </h5>
				<h5 class="title">(ACCURACY)</h5>
			</td>
		</tr>
		<tr>
			<td>Department</td>
			<td>Analytical Development</td>
			<td>SOP No.</td>
			<td>{{ $MainData['SopFormat'][2]->sop2 }}</td>
			<td>Page No.</td>
			<td> <?php echo $page1++;?> of <span class="no-of-pages1"></span></td>
		</tr>
	</table>
	<br>
	<!-- <span style="padding-bottom: 0px;border-bottom: 2px solid #555;font-weight: bold;">Comments/Audit Trail</span> -->
	<table class="table table-bordered" style="border-width: 1px;">
		<thead>
			<tr>
				<th>Comment</th>
				<th>Commented Date</th>
				<th>Commented By</th>
				<th>Calibration Status</th>
			</tr>
		</thead>
		<tbody>
			@foreach($MainData['CalCommentData1'] as $key=>$comment)
			<?php if($count2==$key) {?>
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
			<?php $count2++; }?>
			@endforeach
		</tbody>
	</table>
<?php } ?>
	<!--
	@foreach($MainData['CalCommentData1'] as $comment)
	<div>{{ $comment->Comments }}</div>
	@endforeach
	-->

	<p style="page-break-before: always"></p>
	<b style="text-align: center;width: 100%;display: inline-block;margin-top:20px;">ANNEXURE-IX</b>
	<table class="table table-bordered headertable">
		<tr>
			<td rowspan="2" colspan="2" class="headerlogo">
				<img src="{{ asset('public/img/logo.png') }}" alt="Calibration" style="width: 180px;">
			</td>
			<td colspan="2">
				<h5 class="title">ALEMBIC RESEARCH CENTRE </h5>
				<h5 class="title">ANALYTICAL DEVELOPMENT</h5>
			</td>
			<td colspan="2" style="text-align: right;">
				<p style="margin: 10px 0;">Form ID: <b>{{$caldata->FormId}}</b></p>
			</td>
		</tr>
		<tr>
			<td colspan="4">
				<h5 class="title">CALIBRATION RECORD OF ANALYTICAL BALANCE </h5>
				<h5 class="title">(ACCURACY)</h5>
			</td>
		</tr>
		<tr>
			<td>Department</td>
			<td>Analytical Development</td>
			<td>SOP No.</td>
			<td>{{ $MainData['SopFormat'][2]->sop3 }}</td>
			<td>Page No.</td>
			<td> <?php echo $page1++;?> of <span class="no-of-pages1">2</span></td>
		</tr>
	</table>
	@foreach($MainData['CalData1'] as $caldata1)
	<table class="table table-bordered tablefontsize mt10 mb20">
		<tbody>
			<tr>
				<th style="width: 50%;text-align: center;">
					<p>2 X SD X 100</p>
					<p style="border-top: 1px dotted #000;">Desired smallest net weight(g)</p>
				</th>
				<td style="text-align: center;">
					<p>2 X {{ $caldata1->SD2 }} X 100</p>
					<p style="border-top: 1px dotted #000;">{{$caldata->Desired_Smallest}}</p>
				</td>
			</tr>
			<tr>
				<th>SD (Standard Deviation or 0.41d [ d=0.00001 or 0.0001] whichever is greater)</th>
				<td>{{ $caldata1->SD1 }}</td>
			</tr>
			<tr>
				<th>{{ $Criteria1->Data }}</th>
				<td>{{ $caldata1->AcceptanceCriteria }}</td>
			</tr>
			<tr>
				<th>Complies with the Acceptance Criteria</th>
				<td>
					<div style="pointer-events: none;">
						<input type="radio" name="RdoComplies" value="1" <?php if($caldata1->CompliesAcceptanceCriteria==1) { ?> checked="checked" <?php } ?>>Yes
						<input type="radio" name="RdoComplies" value="2" <?php if($caldata1->CompliesAcceptanceCriteria==2) { ?> checked="checked" <?php } ?>>No
					</div>
				</td>
			</tr>
		</tbody>
	</table>
	@endforeach

	<table class="mytable" style="margin-bottom: 20px;">
		<tr>
			<td style="width: 15%;">Performed by</td>
			<td style="width: 35%;">: <span class="UnderLine">
					@php
					if($caldata->PerformedBy!='')
					{
						$PerformedByName=DB::table('usermaster')->where('UserId',$caldata->PerformedBy)->get();
						echo $PerformedByName[0]->UserName;
					}
					@endphp
				</span>
			</td>
			<td style="width: 15%;">
				@if($caldata->Status=='20')
				Verified by
				@elseif($caldata->Status=='25')
				Decline (Verify) by
				@else
				Verified by
				@endif
			</td>
			<td style="width:35%;">: <span class="UnderLine">
					@php
					if($caldata->VerifiedBy!='')
					{
						$VerifiedByName=DB::table('usermaster')->where('UserId',$caldata->VerifiedBy)->get();
						echo $VerifiedByName[0]->UserName;
					}
					@endphp
				</span>
			</td>
		</tr>
		<tr>
			<td>Date</td>
			<td>: <span class="UnderLine">{{ date('d/m/Y h:i A',strtotime($caldata->PerformDate)) }}</span></td>
			<td>Date</td>
			<td>: <span class="UnderLine">@if($caldata->VerifiedBy!='') {{ date('d/m/Y h:i A',strtotime($caldata->VerifiedDate)) }} @endif</span></td>
		</tr>
	</table>
	<table class="table table-bordered" style="border-width: 1px;">
		<tbody>
			<tr>
				<td style="width: 50%;">
					@if($caldata->Status=='30')
					Approved By :
					@elseif($caldata->Status=='40')
					Decline by :
					@else
					Approved By :
					@endif

					@php
					if($caldata->AproovelBy!='')
					{
						$AproovelByName=DB::table('usermaster')->where('UserId',$caldata->AproovelBy)->get();
						echo $AproovelByName[0]->UserName;
					}
					@endphp
				</td>
				<td>Date : @if($caldata->AproovelBy!='') {{ date('d/m/Y h:i A',strtotime($caldata->AproovelDate)) }} @endif</td>
			</tr>
		</tbody>
	</table>

	<div class="PageFooter1">
		<p style="text-align:right;">Format No.: {{ $MainData['SopFormat'][2]->format_no3 }}</p>
	</div>

<?php $page2 = 1;?>
	<p style="page-break-before: always"></p>
	<b style="text-align: center;width: 100%;display: inline-block;margin-top:20px;">ANNEXURE-XI</b>
	<table class="table table-bordered headertable">
		<tr>
			<td rowspan="2" colspan="2" class="headerlogo">
				<img src="{{ asset('public/img/logo.png') }}" alt="Calibration" style="width: 180px;">
			</td>
			<td colspan="2">
				<h5 class="title">ALEMBIC RESEARCH CENTRE </h5>
				<h5 class="title">ANALYTICAL DEVELOPMENT</h5>
			</td>
			<td colspan="2" style="text-align: right;">
				<p style="margin: 10px 0;">Form ID: <b>{{$caldata->FormId}}</b></p>
			</td>
		</tr>
		<tr>
			<td colspan="4">
				<h5 class="title">MEASUREMENT OF OFF CENTRE ACCURACY</h5>
				<h5 class="title">(ECCENTRICITY)</h5>
			</td>
		</tr>
		<tr>
			<td>Department</td>
			<td>Analytical Development</td>
			<td>SOP No.</td>
			<td>{{ $MainData['SopFormat'][2]->sop4 }}</td>
			<td>Page No.</td>
			<td> <?php echo $page2++;?> of <span class="no-of-pages2">2</span></td>
		</tr>
	</table>
	<table class="mytable">
		<tr>
			<td colspan="4">Date : <b>{{date('d/m/Y')}}</b></td>
		</tr>
		<tr>
			<td colspan="2"><span class="UnderLine" style="border-color: #555;">Instrument Details</span></td>
			<td colspan="2"><span class="UnderLine" style="border-color: #555;">Standard weight box Details</span></td>
		</tr>
		<tr>
			<td style="width: 20%;">Instrument ID No.</td>
			<td style="width: 30%;">: <span class="UnderLine">{{$caldata->InstrumentName}}</span></td>
			<td style="width: 20%;">Weight box ID No.</td>
			<td style="width: 50%;">: <span class="UnderLine">{{$caldata->WeightBoxId}}</span></td>
		</tr>
		<tr>
			<td>Make</td>
			<td>: <span class="UnderLine">{{$caldata->Make}}</span></td>
			<td>Calibrated on</td>
			<td>: <span class="UnderLine">{{ date('d/m/Y',strtotime($caldata->CalibrationDate)) }}</span></td>
		</tr>
		<tr>
			<td>Model</td>
			<td>: <span class="UnderLine">{{$caldata->Model}}</span></td>
			<td>Next Calibration on</td>
			<td>: <span class="UnderLine">{{ date('d/m/Y',strtotime($caldata->CalibrationNextDate)) }}</span></td>
		</tr>
		<tr>
			<td>Next Calibration on</td>
			<td colspan="3">: <span class="UnderLine">{{ $caldata->CalibrationNextDate1 ? date('d/m/Y',strtotime($caldata->CalibrationNextDate1)) : '' }}</span></td>
		</tr>
	</table>
	<table class="table table-bordered tablefontsize mt10 mb20">
		<thead>
			<tr>
				<th>Sr. No</th>
				<th>Position of weight on the pan</th>
				<th>Standard Weight</th>
				<th>Actual Mass</th>
				<th>Observer Mass</th>
			</tr>
		</thead>
		<tbody>
			@foreach($MainData['DeviceWeightPosition'] as $key=>$val)
			<tr>
				<td>{{ $val->LineId }}</td>
				<td>{{ $val->PositionWeight }}</td>
				<td>{{ number_format((float)$val->StWeight, $MainData['Decimal'][0]->standard_weight, '.', '') }}</td>
				<td>{{ number_format((float)$val->ActualMass, $MainData['Decimal'][0]->actual_mass, '.', '') }}</td>
				<td>{{ number_format((float)$val->ObsMass, $MainData['Decimal'][0]->observed_mass, '.', '') }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	@foreach($MainData['CalData1'] as $caldata1)
	<div style="margin-bottom:10px;float: left;width: 100%;">
		<p><b>{{ $Criteria2->Data }} </b> {{ $Criteria2->DisplayValue }}</p>
		<p>
			<b>Complies with the acceptance criteria: </b>
			<input type="radio" name="CompliesAcceptanceCriteria2" value="1" <?php if($caldata1->CompliesAcceptanceCriteria2==1) { ?> checked="checked" <?php } ?>>Yes
			<input type="radio" name="CompliesAcceptanceCriteria2" value="2" <?php if($caldata1->CompliesAcceptanceCriteria2==2) { ?> checked="checked" <?php } ?>>No
		</p>
		<div style="pointer-events: none;display: flex;">
			<div class="AnswerPart">
				<input type="radio" name="CompliesAcceptanceCriteria3" value="1" <?php if($caldata1->CompliesAcceptanceCriteria3==1) { ?> checked="checked" <?php } ?>>
				For Rectangular/Square Pan:
				<br>
				<img src="{{ asset('public/img/RecPan.png') }}">
			</div>
			<div class="AnswerPart">
				<input type="radio" name="CompliesAcceptanceCriteria3" value="1" <?php if($caldata1->CompliesAcceptanceCriteria3==2) { ?> checked="checked" <?php } ?>>
				For Circular Pan
				<br>
				<img src="{{ asset('public/img/CirclePan.png') }}">
			</div>
			<div class="AnswerPart">
				<input type="radio" name="CompliesAcceptanceCriteria3" value="1" <?php if($caldata1->CompliesAcceptanceCriteria3==3) { ?> checked="checked" <?php } ?>>
				For Triangular Pan
				<br>
				<img src="{{ asset('public/img/TriPan.png') }}">
			</div>
		</div>

	</div>
	@endforeach
	<table class="mytable" style="margin-bottom: 20px;">
		<tr>
			<td style="width: 15%;">Performed by</td>
			<td style="width: 35%;">: <span class="UnderLine">
					@php
					if($caldata->PerformedBy!='')
					{
						$PerformedByName=DB::table('usermaster')->where('UserId',$caldata->PerformedBy)->get();
						echo $PerformedByName[0]->UserName;
					}
					@endphp
				</span>
			</td>
			<td style="width: 15%;">
				@if($caldata->Status=='20')
				Verified by
				@elseif($caldata->Status=='25')
				Decline (Verify) by
				@else
				Verified by
				@endif
			</td>
			<td style="width: 35%;">: <span class="UnderLine">
					@php
					if($caldata->VerifiedBy!='')
					{
						$VerifiedByName=DB::table('usermaster')->where('UserId',$caldata->VerifiedBy)->get();
						echo $VerifiedByName[0]->UserName;
					}
					@endphp
				</span>
			</td>
		</tr>
		<tr>
			<td>Date</td>
			<td>: <span class="UnderLine">{{ date('d/m/Y h:i A',strtotime($caldata->PerformDate)) }}</span></td>
			<td>Date</td>
			<td>: <span class="UnderLine">@if($caldata->VerifiedBy!='') {{ date('d/m/Y h:i A',strtotime($caldata->VerifiedDate)) }} @endif</span></td>
		</tr>
	</table>
	<table class="table table-bordered" style="border-width: 1px;">
		<tbody>
			<tr>
				<td style="width: 50%;">
					@if($caldata->Status=='30')
					Approved By :
					@elseif($caldata->Status=='40')
					Decline by :
					@else
					Approved By :
					@endif

					@php
					if($caldata->AproovelBy!='')
					{
						$AproovelByName=DB::table('usermaster')->where('UserId',$caldata->AproovelBy)->get();
						echo $AproovelByName[0]->UserName;
					}
					@endphp
				</td>
				<td>Date : @if($caldata->AproovelBy!='') {{ date('d/m/Y h:i A',strtotime($caldata->AproovelDate)) }} @endif</td>
			</tr>
		</tbody>
	</table>

	<div class="PageFooter1">
		<p style="text-align:right;">Format No.: {{ $MainData['SopFormat'][2]->format_no4 }}</p>
	</div>

	<?php $count=1;?>
<?php if(count($MainData['CalCommentData2']) > 0){ ?>
	<span style="padding-bottom: 0px;border-bottom: 2px solid #555;font-weight: bold;">Comments/Audit Trail</span>
	<table class="table table-bordered" style="border-width: 1px;">
		<thead>
			<tr>
				<th>Comment</th>
				<th>Commented Date</th>
				<th>Commented By</th>
				<th>Calibration Status</th>
			</tr>
		</thead>
		<tbody>
			@foreach($MainData['CalCommentData2'] as $comment)
			<?php if($count<2){?>
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
			<?php $count++;}?>
			@endforeach
		</tbody>
	</table>
<?php } ?>


<?php $count2=1;?>
<?php if(count($MainData['CalCommentData2']) > 1){ ?>
	<p style="page-break-before: always"></p>

	<b style="text-align: center;width: 100%;display: inline-block;margin-top:20px;">ANNEXURE-IX</b>
	<table class="table table-bordered headertable">
		<tr>
			<td rowspan="2" colspan="2" class="headerlogo">
				<img src="{{ asset('public/img/logo.png') }}" alt="Calibration" style="width: 180px;">
			</td>
			<td colspan="2">
				<h5 class="title">ALEMBIC RESEARCH CENTRE </h5>
				<h5 class="title">ANALYTICAL DEVELOPMENT</h5>
			</td>
			<td colspan="2" style="text-align: right;">
				<p style="margin: 10px 0;">Form ID: <b>{{$caldata->FormId}}</b></p>
			</td>
		</tr>
		<tr>
			<td colspan="4">
				<h5 class="title">MEASUREMENT OF OFF CENTRE ACCURACY</h5>
				<h5 class="title">(ECCENTRICITY)</h5>
			</td>
		</tr>
		<tr>
			<td>Department</td>
			<td>Analytical Development</td>
			<td>SOP No.</td>
			<td>{{ $MainData['SopFormat'][2]->sop2 }}</td>
			<td>Page No.</td>
			<td> <?php echo $page2++;?> of <span class="no-of-pages2"></span></td>
		</tr>
	</table>
	<br>
	<!-- <span style="padding-bottom: 0px;border-bottom: 2px solid #555;font-weight: bold;">Comments/Audit Trail</span> -->
	<table class="table table-bordered" style="border-width: 1px;">
		<thead>
			<tr>
				<th>Comment</th>
				<th>Commented Date</th>
				<th>Commented By</th>
				<th>Calibration Status</th>
			</tr>
		</thead>
		<tbody>
			@foreach($MainData['CalCommentData2'] as $key=>$comment)
			<?php if($count2==$key) {?>
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
			<?php $count2++; }?>
			@endforeach
		</tbody>
	</table>
<?php } ?>
<!--
	@foreach($MainData['CalCommentData2'] as $comment)
	<div>{{ $comment->Comments }}</div>
	@endforeach
-->
<?php $page3 = 1;?>
	<p style="page-break-before: always"></p>
	<b style="text-align: center;width: 100%;display: inline-block;margin-top:20px;">ANNEXURE-XII</b>
	<table class="table table-bordered headertable">
		<tr>
			<td rowspan="2" colspan="2" class="headerlogo">
				<img src="{{ asset('public/img/logo.png') }}" alt="Calibration" style="width: 180px;">
			</td>
			<td colspan="2">
				<h5 class="title">ALEMBIC RESEARCH CENTRE </h5>
				<h5 class="title">ANALYTICAL DEVELOPMENT</h5>
			</td>
			<td colspan="2" style="text-align: right;">
				<p style="margin: 10px 0;">Form ID: <b>{{$caldata->FormId}}</b></p>
			</td>
		</tr>
		<tr>
			<td colspan="4">
				<h5 class="title">MEASUREMENT OF SENSITIVITY</h5>
			</td>
		</tr>
		<tr>
			<td>Department</td>
			<td>Analytical Development</td>
			<td>SOP No.</td>
			<td>{{ $MainData['SopFormat'][2]->sop5 }}</td>
			<td>Page No.</td>
			<td> <?php echo $page3++;?> of <span class="no-of-pages3">2</span></td>
		</tr>
	</table>
	<table class="mytable">
		<tr>
			<td colspan="4">Date : <b>{{date('d/m/Y')}}</b></td>
		</tr>
		<tr>
			<td colspan="2"><span class="UnderLine" style="border-color: #555;">Instrument Details</span></td>
			<td colspan="2"><span class="UnderLine" style="border-color: #555;">Standard weight box Details</span></td>
		</tr>
		<tr>
			<td style="width: 20%;">Instrument ID No.</td>
			<td style="width: 30%;">: <span class="UnderLine">{{$caldata->InstrumentName}}</span></td>
			<td style="width: 20%;">Weight box ID No.</td>
			<td style="width: 30%;">: <span class="UnderLine">{{$caldata->WeightBoxId}}</span></td>
		</tr>
		<tr>
			<td>Make</td>
			<td>: <span class="UnderLine">{{$caldata->Make}}</span></td>
			<td>Calibrated on</td>
			<td>: <span class="UnderLine">{{ date('d/m/Y',strtotime($caldata->CalibrationDate)) }}</span></td>
		</tr>
		<tr>
			<td>Model</td>
			<td>: <span class="UnderLine">{{$caldata->Model}}</span></td>
			<td>Next Calibration on</td>
			<td>: <span class="UnderLine">{{ date('d/m/Y',strtotime($caldata->CalibrationNextDate)) }}</span></td>
		</tr>
		<tr>
			<td>Next Calibration on</td>
			<td colspan="3">: <span class="UnderLine">{{ $caldata->CalibrationNextDate1 ? date('d/m/Y',strtotime($caldata->CalibrationNextDate1)) : '' }}</span></td>
		</tr>
	</table>
	@foreach($MainData['CalData1'] as $caldata1)
	<p><b>Measurement of Sensitivity: </b> </p>
	<p>Displayed weight of 200 gm weight(A): <b>{{ $caldata1->DisplayWeightA }}</b> </p>
	<p>Displayed weight of empty pan(B): <b>{{ $caldata1->DisplayWeightB }}</b></p>
	<p>Sensitivity test passes/fails: <b>{{ $caldata1->Sensitivity }}</b></p>
	<p style="margin-bottom: 5px;"><b>Acceptance Criteria:</b></p>
	<p style="margin-top: 0;margin-left: 10px;">{{ $caldata1->AcceptanceCriteriaDetail }}</p>
	@endforeach
	<table class="mytable" style="margin-bottom: 20px;">
		<tr>
			<td style="width: 15%;">Performed by</td>
			<td style="width: 35%;">: <span class="UnderLine">
					@php
					if($caldata->PerformedBy!='')
					{
						$PerformedByName=DB::table('usermaster')->where('UserId',$caldata->PerformedBy)->get();
						echo $PerformedByName[0]->UserName;
					}
					@endphp
				</span>
			</td>
			<td style="width: 15%;">
				@if($caldata->Status=='20')
				Verified by
				@elseif($caldata->Status=='25')
				Decline (Verify) by
				@else
				Verified by
				@endif
			</td>
			<td style="width: 35%;">: <span class="UnderLine">
					@php
					if($caldata->VerifiedBy!='')
					{
						$VerifiedByName=DB::table('usermaster')->where('UserId',$caldata->VerifiedBy)->get();
						echo $VerifiedByName[0]->UserName;
					}
					@endphp
				</span>
			</td>
		</tr>
		<tr>
			<td>Date</td>
			<td>: <span class="UnderLine">{{ date('d/m/Y h:i A',strtotime($caldata->PerformDate)) }}</span></td>
			<td>Date</td>
			<td>: <span class="UnderLine">@if($caldata->VerifiedBy!='') {{ date('d/m/Y h:i A',strtotime($caldata->VerifiedDate)) }} @endif</span></td>
		</tr>
	</table>
	<table class="table table-bordered" style="border-width: 1px;">
		<tbody>
			<tr>
				<td style="width: 50%;">
					@if($caldata->Status=='30')
					Approved By :
					@elseif($caldata->Status=='40')
					Decline by :
					@else
					Approved By :
					@endif

					@php
					if($caldata->AproovelBy!='')
					{
						$AproovelByName=DB::table('usermaster')->where('UserId',$caldata->AproovelBy)->get();
						echo $AproovelByName[0]->UserName;
					}
					@endphp
				</td>
				<td>Date : @if($caldata->AproovelBy!='') {{ date('d/m/Y h:i A',strtotime($caldata->AproovelDate)) }} @endif</td>
			</tr>
		</tbody>
	</table>

	<div class="PageFooter1">
		<p style="text-align:right;">Format No.: {{ $MainData['SopFormat'][2]->format_no5 }}</p>
	</div>

	<?php $count=1;?>
<?php if(count($MainData['CalCommentData3']) > 0){ ?>
	<span style="padding-bottom: 0px;border-bottom: 2px solid #555;font-weight: bold;">Comments/Audit Trail</span>
	<table class="table table-bordered" style="border-width: 1px;">
		<thead>
			<tr>
				<th>Comment</th>
				<th>Commented Date</th>
				<th>Commented By</th>
				<th>Calibration Status</th>
			</tr>
		</thead>
		<tbody>
			@foreach($MainData['CalCommentData3'] as $comment)
			<?php if($count<11){?>
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
			<?php $count++;}?>
			@endforeach
		</tbody>
	</table>
<?php } ?>

<?php $count2=9;?>
<?php if(count($MainData['CalCommentData3']) > 9){ ?>
	<p style="page-break-before: always"></p>
	<b style="text-align: center;width: 100%;display: inline-block;margin-top:20px;">ANNEXURE-XII</b>
	<table class="table table-bordered headertable">
		<tr>
			<td rowspan="2" colspan="2" class="headerlogo">
				<img src="{{ asset('public/img/logo.png') }}" alt="Calibration" style="width: 180px;">
			</td>
			<td colspan="2">
				<h5 class="title">ALEMBIC RESEARCH CENTRE </h5>
				<h5 class="title">ANALYTICAL DEVELOPMENT</h5>
			</td>
			<td colspan="2" style="text-align: right;">
				<p style="margin: 10px 0;">Form ID: <b>{{$caldata->FormId}}</b></p>
			</td>
		</tr>
		<tr>
			<td colspan="4">
				<h5 class="title">MEASUREMENT OF SENSITIVITY</h5>
			</td>
		</tr>
		<tr>
			<td>Department</td>
			<td>Analytical Development</td>
			<td>SOP No.</td>
			<td>{{ $MainData['SopFormat'][2]->sop5 }}</td>
			<td>Page No.</td>
			<td> <?php echo $page3++;?> of <span class="no-of-pages3">2</span></td>
		</tr>
	</table>
	<br>
	<!-- <span style="padding-bottom: 0px;border-bottom: 2px solid #555;font-weight: bold;">Comments/Audit Trail</span> -->
	<table class="table table-bordered" style="border-width: 1px;">
		<thead>
			<tr>
				<th>Comment</th>
				<th>Commented Date</th>
				<th>Commented By</th>
				<th>Calibration Status</th>
			</tr>
		</thead>
		<tbody>
			@foreach($MainData['CalCommentData3'] as $key=>$comment)
			<?php if($count2<$key){?>
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
			<?php $count2++; }?>
			@endforeach
		</tbody>
	</table>
<?php } ?>

<!--
	@foreach($MainData['CalCommentData3'] as $comment)
	<div>{{ $comment->Comments }}</div>
	@endforeach
-->
<?php $page4 = 1;?>
	<p style="page-break-before: always"></p>
	<b style="text-align: center;width: 100%;display: inline-block;margin-top:20px;">ANNEXURE-XIII</b>
	<table class="table table-bordered headertable">
		<tr>
			<td rowspan="2" colspan="2" class="headerlogo">
				<img src="{{ asset('public/img/logo.png') }}" alt="Calibration" style="width: 180px;">
			</td>
			<td colspan="2">
				<h5 class="title">ALEMBIC RESEARCH CENTRE </h5>
				<h5 class="title">ANALYTICAL DEVELOPMENT</h5>
			</td>
			<td colspan="2" style="text-align: right;">
				<p style="margin: 10px 0;">Form ID: <b>{{$caldata->FormId}}</b></p>
			</td>
		</tr>
		<tr>
			<td colspan="4">
				<h5 class="title">MEASUREMENT OF LINEARITY</h5>
			</td>
		</tr>
		<tr>
			<td>Department</td>
			<td>Analytical Development</td>
			<td>SOP No.</td>
			<td>{{ $MainData['SopFormat'][2]->sop6 }}</td>
			<td>Page No.</td>
			<td> <?php echo $page4++;?> of <span class="no-of-pages4">2</span></td>
		</tr>
	</table>
	<table class="mytable">
		<tr>
			<td colspan="4">Date : <b>{{date('d/m/Y')}}</b></td>
		</tr>
		<tr>
			<td colspan="2"> <span class="UnderLine" style="border-color: #555;">Instrument Details</span></td>
			<td colspan="2"> <span class="UnderLine" style="border-color: #555;">Standard weight box Details</span></td>
		</tr>
		<tr>
			<td style="width: 20%;">Instrument ID No. </td>
			<td style="width: 30%;">: <span class="UnderLine">{{$caldata->InstrumentName}}</span></td>
			<td style="width: 20%;">Weight box ID No. </td>
			<td style="width: 30%;">: <span class="UnderLine">{{$caldata->WeightBoxId}}</span></td>
		</tr>
		<tr>
			<td>Make </td>
			<td>: <span class="UnderLine">{{$caldata->Make}}</span></td>
			<td>Calibrated on </td>
			<td>: <span class="UnderLine">{{ date('d/m/Y',strtotime($caldata->CalibrationDate)) }}</span></td>
		</tr>
		<tr>
			<td>Model </td>
			<td>: <span class="UnderLine">{{$caldata->Model}}</span></td>
			<td>Next Calibration on </td>
			<td>: <span class="UnderLine">{{ date('d/m/Y',strtotime($caldata->CalibrationNextDate)) }}</span></td>
		</tr>
		<tr>
			<td>Next Calibration on </td>
			<td>: <span class="UnderLine">{{ $caldata->CalibrationNextDate1 ? date('d/m/Y',strtotime($caldata->CalibrationNextDate1)) : '' }}</span></td>
		</tr>
	</table>
	<table class="table table-bordered tablefontsize mt10">
		<thead>
			<tr>
				<th>Sr. No</th>
				<th>Standard Weight({{ $DeviceTypeMM }})</th>
				<th>Certified Weight(A)({{ $DeviceTypeMM }})</th>
				<th>Displayed Weight(B)({{ $DeviceTypeMM }})</th>
				<th>Difference Between A and B({{ $DeviceTypeMM }})</th>
				<th>Acceptance Criteria({{ $DeviceTypeMM }}) of Certified Weight</th>
				<th>Result (Passes / Fails)</th>
			</tr>
		</thead>
		<tbody>
			@foreach($MainData['LineData'] as $calline)
			<tr>
				<td>{{ $calline->LineId }}</td>
				<td>{{ number_format((float)$calline->StWeight, $MainData['Decimal'][0]->standard_weight, '.', '') }}</td>
				<td>{{ number_format((float)$calline->CertWeight, $MainData['Decimal'][0]->certified_weight, '.', '') }}</td>
				<td>{{ number_format((float)$calline->DispWeight, $MainData['Decimal'][0]->displayed_weight, '.', '') }}</td>
				<td>{{ number_format((float)$calline->DiffWeight, $MainData['Decimal'][0]->difference_between_A_B, '.', '') }}</td>
				<td>± {{ number_format((float)$calline->AccpWeight, $MainData['Decimal'][0]->acceptance_weight, '.', '') }}</td>
				<td>@if($calline->Result==1){{'Passes'}}@elseif($calline->Result==2){{'Fails'}}@else{{''}} @endif</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	<table class="mytable mt10 mb20">
		<tr>
			<td style="width: 15%;">Performed by </td>
			<td style="width: 35%;">: <span class="UnderLine">
					@php
					if($caldata->PerformedBy!='')
					{
						$PerformedByName=DB::table('usermaster')->where('UserId',$caldata->PerformedBy)->get();
						echo $PerformedByName[0]->UserName;
					}
					@endphp
				</span>
			</td>
			<td style="width: 15%;">
				@if($caldata->Status=='20')
				Verified by 
				@elseif($caldata->Status=='25')
				Decline (Verify) by 
				@else
				Verified by 
				@endif
			</td>
			<td style="width: 35%;">: <span class="UnderLine">
					@php
					if($caldata->VerifiedBy!='')
					{
						$VerifiedByName=DB::table('usermaster')->where('UserId',$caldata->VerifiedBy)->get();
						echo $VerifiedByName[0]->UserName;
					}
					@endphp
				</span>
			</td>
		</tr>
		<tr>
			<td>Date </td>
			<td>: <span class="UnderLine">{{ date('d/m/Y h:i A',strtotime($caldata->PerformDate)) }}</span></td>
			<td>Date </td>
			<td>: <span class="UnderLine">@if($caldata->VerifiedBy!='') {{ date('d/m/Y h:i A',strtotime($caldata->VerifiedDate)) }} @endif</span></td>
		</tr>
	</table>
	<table class="table table-bordered mt10" style="border-width: 1px;">
		<tbody>
			<tr>
				<td style="width: 50%;">
					@if($caldata->Status=='30')
					Approved By :
					@elseif($caldata->Status=='40')
					Decline by :
					@else
					Approved By :
					@endif

					@php
					if($caldata->AproovelBy!='')
					{
						$AproovelByName=DB::table('usermaster')->where('UserId',$caldata->AproovelBy)->get();
						echo $AproovelByName[0]->UserName;
					}
					@endphp
				</td>
				<td>Date : @if($caldata->AproovelBy!='') {{ date('d/m/Y h:i A',strtotime($caldata->AproovelDate)) }} @endif</td>
			</tr>
		</tbody>
	</table>
	<div class="PageFooter1">
		<p style="text-align:right;">Format No.:{{ $MainData['SopFormat'][2]->format_no6 }}</p>
	</div>


	<?php $count = 0;?>
<?php if(count($MainData['CalCommentData4']) > 0){ ?>
	<span style="padding-bottom: 0px;border-bottom: 2px solid #555;font-weight: bold;">Comments/Audit Trail</span>
	<table class="table table-bordered" style="border-width: 1px;">
		<thead>
			<tr>
				<th>Comment</th>
				<th>Commented Date</th>
				<th>Commented By</th>
				<th>Calibration Status</th>
			</tr>
		</thead>
		<tbody>
			@foreach($MainData['CalCommentData4'] as $comment)
			<?php if($count<9){?>
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
			<?php $count++;}?>
			@endforeach
		</tbody>
	</table>
<?php } ?>

<?php $count2 = 9;?>
<?php if(count($MainData['CalCommentData4']) > 9){ ?>
	<p style="page-break-before: always"></p>
	<b style="text-align: center;width: 100%;display: inline-block;margin-top:20px;">ANNEXURE-XIII</b>
	<table class="table table-bordered headertable">
		<tr>
			<td rowspan="2" colspan="2" class="headerlogo">
				<img src="{{ asset('public/img/logo.png') }}" alt="Calibration" style="width: 180px;">
			</td>
			<td colspan="2">
				<h5 class="title">ALEMBIC RESEARCH CENTRE </h5>
				<h5 class="title">ANALYTICAL DEVELOPMENT</h5>
			</td>
			<td colspan="2" style="text-align: right;">
				<p style="margin: 10px 0;">Form ID: <b>{{$caldata->FormId}}</b></p>
			</td>
		</tr>
		<tr>
			<td colspan="4">
				<h5 class="title">MEASUREMENT OF LINEARITY</h5>
			</td>
		</tr>
		<tr>
			<td>Department</td>
			<td>Analytical Development</td>
			<td>SOP No.</td>
			<td>{{ $MainData['SopFormat'][2]->sop6 }}</td>
			<td>Page No.</td>
			<td> <?php echo $page4++;?> of <span class="no-of-pages4">2</span></td>
		</tr>
	</table>
	<br>
	<!-- <span style="padding-bottom: 0px;border-bottom: 2px solid #555;font-weight: bold;">Comments/Audit Trail</span> -->
	<table class="table table-bordered" style="border-width: 1px;">
		<thead>
			<tr>
				<th>Comment</th>
				<th>Commented Date</th>
				<th>Commented By</th>
				<th>Calibration Status</th>
			</tr>
		</thead>
		<tbody>
			@foreach($MainData['CalCommentData4'] as $key=>$comment)
			<?php if($count2==$key) {?>
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
			<?php $count2++; }?>
			@endforeach
		</tbody>
	</table>
<?php } ?>
<!--
	@foreach($MainData['CalCommentData4'] as $comment)
	<div>{{ $comment->Comments }}</div>
	@endforeach
-->
	<!-- start 25-12-2020 -->

	<p style="page-break-before: always"></p>
	<div style="width: 100%;margin:20px 0;">
		@foreach($MainData['PLineData'] as $calline)
		<img src="{{ asset('public/Doc/'.$calline->Ifile.'') }}" style="width: 230px;" />
		@endforeach
		@foreach($MainData['NLineData'] as $calline)
		<img src="{{ asset('public/Doc/'.$calline->Ifile.'') }}" style="width: 230px;" />
		@endforeach
	</div>

	<p style="page-break-before: always"></p>
	<div style="width: 100%;margin:20px 0;">
		@foreach($MainData['DeviceWeightObsMass'] as $calline)
		<img src="{{ asset('public/Doc/'.$calline->Ifile.'') }}" style="width: 230px;" />
		@endforeach
	</div>

	<p style="page-break-before: always"></p>
	<div style="width: 100%;margin:20px 0;">
		@foreach($MainData['DeviceWeightPosition'] as $calline)
		<img src="{{ asset('public/Doc/'.$calline->Ifile.'') }}" style="width: 230px;" />
		@endforeach
	</div>

	<p style="page-break-before: always"></p>
	<div style="width: 100%;margin:20px 0;">
		@foreach($MainData['CalData1'] as $calline)
		<img src="{{ asset('public/Doc/'.$calline->IfileA.'') }}" style="width: 230px;" />
		<img src="{{ asset('public/Doc/'.$calline->IfileB.'') }}" style="width: 230px;" />
		@endforeach
	</div>

	<p style="page-break-before: always"></p>
	<div style="width: 100%;margin:20px 0;">
		@foreach($MainData['LineData'] as $calline)
		<img src="{{ asset('public/Doc/'.$calline->Ifile.'') }}" style="width: 230px;" />
		@endforeach
	</div>
	<!-- end 25-12-2020 -->

	@endforeach
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
	<script src="{{ asset('public/js/jquery.min.js') }}"></script>
	<script type="text/javascript">
		var pages = '<?php echo $page;?>';
		$('.no-of-pages').text(pages-1);
		var pages1 = '<?php echo $page1;?>';
		$('.no-of-pages1').text(pages1-1);
		var pages2 = '<?php echo $page2;?>';
		$('.no-of-pages2').text(pages2-1);
		var pages3 = '<?php echo $page3;?>';
		$('.no-of-pages3').text(pages3-1);
		var pages4 = '<?php echo $page4;?>';
		$('.no-of-pages4').text(pages4-1);
		window.print();
	</script>
</body>
</html>
