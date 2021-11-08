<!DOCTYPE html>
<html lang="en-us">
<head>
	<meta charset="utf-8">
	<title>Calibration Print</title>
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
			margin-top: 20px;
			margin-bottom: 20px;
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
			font-size: 12px;
		}
		@media print {
			.PageFooter
			{
				display: block;
			}
			@page { 
		        margin-top: 0; 
		        margin-bottom: 0; 
		    } 
		    /*body { 
		        padding-top: 72px; 
		        padding-bottom: 72px ; 
		    } */
		}
		@page {
		    size: auto;
		    margin: 8mm 10mm;
		}
	</style>
</head>
<body>
	@foreach($MainData['CalData'] as $caldata)
	<?php
	if($caldata->DeviceTypeM==1)
	{
		?>
		<b style="text-align: center;width: 100%;display: inline-block;">ANNEXURE-VIII</b>
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
					<h5 class="title">DAILY CALIBRATION RECORD OF ANALYTICAL </h5>
					<h5 class="title">BALANCE</h5>
				</td>
			</tr>
			<tr>
				<td>Department</td>
				<td>Analytical Development</td>
				<td>SOP No.</td>
				<td>{{ $MainData['SopFormat'][0]->sop1 }}</td>
				<td>Page No.</td>
				<td> 1 of 2</td>
			</tr>
		</table>
		<?php
	}
	else
	{
		?>
		<b style="text-align: center;width: 100%;display: inline-block;">ANNEXURE-IV</b>
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
					<h5 class="title">DAILY CALIBRATION RECORD OF ANALYTICAL </h5>
					<h5 class="title">MICROBALANCE</h5>
				</td>
			</tr>
			<tr>
				<td>Department</td>
				<td>Analytical Development</td>
				<td>SOP No.</td>
				<td>{{ $MainData['SopFormat'][1]->sop1 }}</td>
				<td>Page No.</td>
				<td> 1 of 2</td>
			</tr>
		</table>
		<?php
	}
	?>
	<table class="mytable">
		<tr>
			<td colspan="4">Date : <b>{{date('d/m/Y')}}</b></td>
		</tr>
		<tr>
			<td colspan="2"><span class="UnderLine" style="border-color: #555;">Instrument Details</span></td>
			<td colspan="2"> <span class="UnderLine" style="border-color: #555;">Standard weight box Details</span></td>
		</tr>
		<tr>
			<td width="20%">Instrument ID No. </td>
			<td width="30%">: <span class="UnderLine">{{$caldata->DeviceName}}</span></td>
			<td width="20%">Weight box ID No. </td>
			<td>: <span class="UnderLine">{{$caldata->WeightBoxId}}</span></td>
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
			<td colspan="3">Spirit level of Balance Checked (Yes/No)
			: <span class="UnderLine">@if($caldata->SpiritLevel==1) {{"Yes"}} @elseif($caldata->SpiritLevel==2) {{"No"}} @else {{ "" }} @endif</span></td>
		</tr>
		<tr>
			<td colspan="3">Internal Calibration (Passes/Fails)
			: <span class="UnderLine">@if($caldata->Internal==1) {{"Passes"}} @elseif($caldata->Internal==2) {{"Fails"}} @else {{ "" }} @endif</span></td>
		</tr>
	</table>
	<?php
		//echo"Done".$caldata->DeviceTypeM;
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
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>Sr. No</th>
				<th>Standard Weight({{ $DeviceTypeMM }})</th>
				<th>Certified Weight(A)({{ $DeviceTypeMM }})</th>
				<th>Displayed Weight(B)({{ $DeviceTypeMM }})</th>
				<th>Difference Between A and B (A-B) ({{ $DeviceTypeMM }})</th><!-- add new line (A-B)-->
				<th>Acceptance Criteria({{ $DeviceTypeMM }}) of Certified Weight</th>
				<th>Result (Passes / Fails)</th>
			</tr>
		</thead>
		<tbody>
			@foreach($MainData['CalLineData'] as $calline)
			<tr>
				<td>{{ $calline->LineId }}</td>
				<td>{{ number_format((float)$calline->StWeight, $MainData['Decimal'][0]->standard_weight, '.', '') }}</td>
				<td>{{ number_format((float)$calline->CertWeight, $MainData['Decimal'][0]->certified_weight, '.', '') }}</td>
				<td>{{ number_format((float)$calline->DispWeight, $MainData['Decimal'][0]->displayed_weight, '.', '') }}</td>
				<td>{{ number_format((float)$calline->DiffWeight, $MainData['Decimal'][0]->difference_between_A_B, '.', '') }}</td>
				<td>{{ "± ".number_format((float)$calline->AccpWeight, $MainData['Decimal'][0]->acceptance_weight, '.', '') }}</td>
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
			<td>: <span class="UnderLine">
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
<?php if(count($MainData['CalCommentData']) > 0){ ?>
	<span style="padding-bottom: 0px;border-bottom: 2px solid #555;font-weight: bold;">Comments/Audit Trail</span>
	<table class="table table-bordered" style="border-width: 1px;">
		<thead>
			<tr>
				<th style="width: 55%;">Comment</th>
				<th>Commented Date</th>
				<th>Commented By</th>
				<!-- <th>Calibration Status</th> -->
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
				<!-- <td>
					@php
					$StatusMaster=DB::table('statusmaster')->where('RecId',$comment->CalibrationStatus)->get();
					echo $StatusMaster[0]->Name;
					@endphp
				</td> -->
			</tr>
			@endforeach
		</tbody>
	</table>
<?php } ?>
	<div class="PageFooter">
		@if($caldata->DeviceTypeM==1)
		<p style="text-align:right;">Format No.: {{ $MainData['SopFormat'][0]->format_no1 }}</p>
		@else
		<div style="float:left;width: 65%;display: inline-block;">
			<!-- <p>
				This document is electronically signed and e-Signture is on first page.
				<br>
				Effective Date: {{ date('d/m/Y h:i A',strtotime($caldata->CalibrationDate)) }} & Next Review Date: {{ date('d/m/Y h:i A',strtotime($caldata->CalibrationNextDate)) }}
				<br>
				This is document is printed by {{ Session::get('LoginData')['UserName'] }} on {{ Date("d/M/Y h:i A") }}
				<br>
				This document is a "Controlled copy"
			</p> -->
		</div>
		<p style="text-align:right;width: 35%;float: right;">Format No.: {{ $MainData['SopFormat'][1]->format_no1 }}</p>
		@endif
	</div>

<!--
	@foreach($MainData['CalCommentData'] as $comment)
	<div>{{ $comment->Comments }}</div>
	@endforeach
-->
	<p style="page-break-before: always"></p>
	<div style="width: 100%;margin:20px 0;">
		@foreach($MainData['CalLineData'] as $calline)
		<img src="{{ asset('public/Doc/'.$calline->Ifile.'') }}" style="width: 230px;" />
		@endforeach
	</div>
	@endforeach
	<script type="text/javascript">
		window.print();
	</script>
</body>
</html>
