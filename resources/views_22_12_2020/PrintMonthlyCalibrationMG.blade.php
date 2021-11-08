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
			margin-top: 10px;
			margin-bottom: 20px;
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
			width: 98%;
			position: fixed;
			bottom: 0;
			display: none;
			font-size: 14px;
		}
		@media print {
			.PageFooter
			{
				display: block;
			}
		}
		@page {
		    size: auto;
		    margin: 8mm 10mm;
		}
	</style>
</head>
<body>
	@php
	$Criteria1=DB::table('Criteria')->where('RecId',1)->first();
	$Criteria2=DB::table('Criteria')->where('RecId',2)->first();
    @endphp
    @foreach($MainData['CalData'] as $caldata)
	<b style="text-align: center;width: 100%;display: inline-block;">ANNEXURE-V</b>
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
				<h5 class="title">MEASUREMENT OF REPEATABILITY </h5>
			</td>
		</tr>
		<tr>
			<td>Department</td>
			<td>Analytical Development</td>
			<td>SOP No.</td>
			<td>{{ $MainData['SopFormat'][3]->sop1 }}</td>
			<td>Page No.</td>
			<td> 1 of 2</td>
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
			<td style="width: 30%;">: <span class="UnderLine">{{$caldata->DeviceName}}</span></td>
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
			<td>: <span class="UnderLine">{{ date('d/m/Y h:i A',strtotime($caldata->CalibrationNextDate)) }}</span></td>
		</tr>
		<tr>
			<td>Next Calibration on</td>
			<td colspan="3">: <span class="UnderLine">{{ date('d/m/Y h:i A',strtotime($caldata->CalibrationNextDate1)) }}</span></td>
        {{-- date changes by Dinesh  --}}
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

	<p style="page-break-before: always"></p>
	<b style="text-align: center;width: 100%;display: inline-block;">ANNEXURE-V</b>
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
				<h5 class="title">MEASUREMENT OF REPEATABILITY </h5>
			</td>
		</tr>
		<tr>
			<td>Department</td>
			<td>Analytical Development</td>
			<td>SOP No.</td>
			<td>{{ $MainData['SopFormat'][3]->sop2 }}</td>
			<td>Page No.</td>
			<td> 2 of 2</td>
		</tr>
	</table>
	<table class="table table-bordered tablefontsize">
		<tbody>
			<tr>

				<th style="width: 50%;text-align: center;">
					<p style="text-align: left;">Measurement of Repeatability (%)</p>
					<p>2 X SD X 100</p>
					<p style="border-top: 1px dotted #000;">Desired smallest net weight(mg)</p>
				</th>
				<td style="text-align: center;" colspan="2">
					<p>2 X {{ $caldata1->SD2 }} X 100</p>
					<p style="border-top: 1px dotted #000;">0.02</p>
				</td>
			</tr>
			<tr>
				<th>Where, SD = Standard Deviation or 0.41d d=0.0001mg (whichever is greater)</th>
				<td colspan="2">{{ $caldata1->SD1 }}</td>
			</tr>
			<tr>
				<th>{{ $Criteria1->Data }}</th>
				<td>{{ $firstmg }} weight</td>
				<td>{{ $caldata1->AcceptanceCriteria }}</td>
			</tr>
			<tr>
				<th>Complies with the Acceptance Criteria</th>
				<td colspan="2">
					<div style="pointer-events: none;">
						<input type="radio" name="RdoComplies" value="1" <?php if($caldata1->CompliesAcceptanceCriteria==1) { ?> checked="checked" <?php } ?>>Yes
						<input type="radio" name="RdoComplies" value="2" <?php if($caldata1->CompliesAcceptanceCriteria==2) { ?> checked="checked" <?php } ?>>No
					</div>
				</td>
			</tr>
		</tbody>
	</table>
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
	@endforeach
	<div class="PageFooter">
		<div style="float: left;width: 65%;display: inline-block;">
			<p>
				This document is electronically signed and e-Signture is on first page.
				<br>
				Effective Date: {{ date('d/m/Y h:i A',strtotime($caldata->CalibrationDate)) }} & Next Review Date: {{ date('d/m/Y h:i A',strtotime($caldata->CalibrationNextDate)) }}
				<br>
				This is document is printed by {{ Session::get('LoginData')['UserName'] }} on {{ Date("d/M/Y h:i A") }}
				<br>
				This document is a "Controlled copy"
			</p>
        </div>
        <?php //if($key == 0){ ?>
        <p style="text-align:right;width: 35%;float: right;">Format No.: {{ $MainData['SopFormat'][3]->format_no1 }}</p>
        <?php /*}else{ ?>
        <p style="text-align:right;width: 35%;float: right;">Format No.: {{ $MainData['SopFormat'][3]->format_no2 }}</p>
        <?php }*/ ?>
	</div>
	@endforeach
	<script type="text/javascript">
		window.print();
	</script>
</body>
</html>
