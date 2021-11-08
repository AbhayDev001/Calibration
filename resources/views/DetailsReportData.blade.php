<!DOCTYPE html>
<html lang="en-us">
<head>
	<meta charset="utf-8">
	<title>Calibration Details Report</title>
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<link rel="shortcut icon" href="{{ asset('public/img/favicon/favicon.ico') }}" type="image/x-icon">
	<link rel="icon" href="{{ asset('public/img/favicon/favicon.ico') }}" type="image/x-icon">
	<style type="text/css">
		.table-bordered {
			border: 1px solid #ddd;
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
			border: 1px solid #ddd;
		}
		.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
			padding: 5px 8px;
			line-height: 1.42857143;
			vertical-align: top;
			border-top: 1px solid #ddd;
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
	</style>
</head>
<body>
	@foreach($MainData['CalData'] as $caldata)
	<table class="mytable" style="page-break-before: always;">
		<tr>
			<td><img src="{{ asset('public/img/logo.png') }}" alt="Calibration" style="width: 150px;"></td>
		</tr>
	</table>
	<table class="mytable">
		<tr>
			<td>Form ID : <span class="UnderLine">{{$caldata->FormId}}</span></td>
			<td>Calibration Method : <span class="UnderLine">{{$caldata->CalibrationName}}</span></td>
		</tr>
		<tr>
			<td>Instrument ID No : <span class="UnderLine">{{$caldata->InstrumentName}}</span></td>
			<td>Device : <span class="UnderLine">{{$caldata->DeviceName}}</span></td>
		</tr>
		<tr>
			<td>Make : <span class="UnderLine">{{$caldata->Make}}</span></td>
			<td>Model : <span class="UnderLine">{{$caldata->Model}}</span></td>
		</tr>
		<tr>
			<td>Weight box ID No : <span class="UnderLine">{{$caldata->WeightBoxId}}</span></td>
			<td>Calibrated on : <span class="UnderLine">{{ date('d/m/Y',strtotime($caldata->CalibrationDate)) }}</span></td>
		</tr>
		<tr>
			<td>Next Calibration on : <span class="UnderLine">{{ date('d/m/Y',strtotime($caldata->CalibrationNextDate)) }}</span></td>
			<td>Spirit level of Balance Checked (Yes/No) : <span class="UnderLine">@if($caldata->SpiritLevel==1) {{"Yes"}} @elseif($caldata->SpiritLevel==2) {{"No"}} @else {{ "" }} @endif</span></td>
		</tr>
		<tr>
			<td>Internal Calibration (Passes/Fails) : <span class="UnderLine">@if($caldata->Internal==1) {{"Passes"}} @elseif($caldata->Internal==2) {{"Fails"}} @else {{ "" }} @endif</span></td>
		</tr>
	</table>
	<?php
	echo"Done".$caldata->DeviceTypeM;
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
				<th>Difference Between A and B (A-B)({{ $DeviceTypeMM }})</th>
				<th>Acceptance Criteria({{ $DeviceTypeMM }}) of Certified Weight</th>
				<th>Result (Passes / Fails)</th>
			</tr>
		</thead>
		<tbody>
			@php
			$CalLineData=DB::table('calibrationline')->where('RefRecId',$caldata->RecId)->orderBy('LineId', 'asc')->get();
			@endphp
			@foreach($CalLineData as $calline)
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
			<td style="width: 50%;">Performed by :
				<span class="UnderLine">
					@php
					if($caldata->PerformedBy!='')
					{
						$PerformedByName=DB::table('usermaster')->where('UserId',$caldata->PerformedBy)->get();
						echo $PerformedByName[0]->UserName;
					}
					@endphp
				</span>
			</td>
			<td>
				@if($caldata->Status=='20')
				Verified by:
				@elseif($caldata->Status=='25')
				Decline (Verify) by :
				@else
				Verified by:
				@endif
				<span class="UnderLine">
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
			<td>Date : <span class="UnderLine">{{ date('d/m/Y h:i A',strtotime($caldata->PerformDate)) }}</span></td>
			<td>Date : <span class="UnderLine">@if($caldata->VerifiedBy!='') {{ date('d/m/Y h:i A',strtotime($caldata->VerifiedDate)) }} @endif</span></td>
		</tr>
	</table>
	<table class="table table-bordered" style="border-width: 2px;">
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
	<div style="width: 100%;margin:20px 0;">
		@php
		$CalLineData=DB::table('calibrationline')->where('RefRecId',$caldata->RecId)->orderBy('LineId', 'asc')->get();
		@endphp
		@foreach($CalLineData as $calline)
		<img src="{{ asset('public/Doc/'.$calline->Ifile.'') }}" style="width: 230px;" />
		@endforeach
	</div>
	@endforeach
	<script type="text/javascript">
		window.print();
	</script>
</body>
</html>
