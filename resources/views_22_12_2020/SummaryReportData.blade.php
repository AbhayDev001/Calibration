<!DOCTYPE html>
<html lang="en-us">
<head>
	<meta charset="utf-8">
	<title>Calibration Summary Report</title>
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
			/*border-bottom: 2px solid #BDBDBD;*/
			font-weight: bold;
		}
	</style>
</head>
<body>
	<table class="mytable" style="page-break-before: always;">
		<tr>
			<td><img src="{{ asset('public/img/logo.png') }}" alt="Calibration" style="width: 150px;"></td>
		</tr>
	</table>
	@foreach($MainData['CalData'] as $caldata)
	<table class="mytable" style="border: 1px solid #ddd;margin: 5px 0;">
		<tr>
			<td>Form ID : <span class="UnderLine">{{$caldata->FormId}}</span></td>
			<td>Calibration Method : <span class="UnderLine">{{$caldata->CalibrationName}}</span></td>
			<td>Instrument ID No : <span class="UnderLine">{{$caldata->InstrumentName}}</span></td>
		</tr>
		<tr>
			<td>Device : <span class="UnderLine">{{$caldata->DeviceName}}</span></td>
			<td>Make : <span class="UnderLine">{{$caldata->Make}}</span></td>
			<td>Model : <span class="UnderLine">{{$caldata->Model}}</span></td>
		</tr>
		<tr>
			<td>
				Analysis By : 
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
						$PerformedByName=DB::table('usermaster')->where('UserId',$caldata->VerifiedBy)->get();
						echo $PerformedByName[0]->UserName;
					}
					@endphp
				</span>
			</td>
			<td>
				@if($caldata->Status=='30')
				Approved By : 
				@elseif($caldata->Status=='40')
				Decline by : 
				@else
				Approved By : 
				@endif
				<span class="UnderLine">
					@php
					if($caldata->AproovelBy!='')
					{
						$PerformedByName=DB::table('usermaster')->where('UserId',$caldata->AproovelBy)->get();
						echo $PerformedByName[0]->UserName;
					}
					@endphp
				</span>
			</td>
		</tr>
		<tr>
			<td>
				Date : 
				<span class="UnderLine">
					@php
					if($caldata->PerformedBy!='')
					{
						echo date('d/m/Y h:i A',strtotime($caldata->PerformDate));
					}
					@endphp
				</span>
			</td>
			<td>
				Date : 
				<span class="UnderLine">
					@php
					if($caldata->VerifiedBy!='')
					{
						echo date('d/m/Y h:i A',strtotime($caldata->VerifiedDate));
					}
					@endphp
				</span>
			</td>
			<td>
				Date : 
				<span class="UnderLine">
					@php
					if($caldata->AproovelBy!='')
					{
						echo date('d/m/Y h:i A',strtotime($caldata->AproovelDate));
					}
					@endphp
				</span>
			</td>
		</tr>
	</table>
	@endforeach
	<script type="text/javascript">
		window.print();
	</script>
</body>
</html>