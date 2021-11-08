<!DOCTYPE html>
<html lang="en-us">
<head>
	<meta charset="utf-8">
	<title>Calibration Log</title>
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
			<td style="width: 55%;margin-top:10px;vertical-align: bottom;"><h3 style="padding: 0;margin: 0;">Log Data<h3></td>
			</tr>
		</table>
		@if($MainData['FillterLogType']==1)
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>UserId</th>
					<th>User Name</th>
					<th>Login Date</th>
					<th>Login Status</th>
				</tr>
			</thead>
			<tbody>
				@foreach($MainData['LogData'] as $Log)
				<tr>
					<td>{{ $Log['UserId'] }}</td>
					<td>{{ $Log['UserName'] }}</td>
					<td>{{ date("d/m/Y h:i A",strtotime($Log['LoginDate'])) }}</td>
					<td>@if($Log['Status']==1) {{"Login Successfully"}} @elseif($Log['Status']==0) {{"Login Failed"}} @endif</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		@endif
		@if($MainData['FillterLogType']==2)
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Calibration Form Id</th>
					<th>Calibration Status</th>
					<th>Comments</th>
					<th>Created By</th>
					<th>Created Date</th>
				</tr>
			</thead>
			<tbody>
				@foreach($MainData['LogData'] as $Log)
				<tr>
					<td>{{ $Log['FormId'] }}</td>
					<td>{{ $Log['Name'] }}</td>
					<td>{{ $Log['Comments'] }}</td>
					<td>{{ $Log['UserName'] }}</td>
					<td>{{ date("d/m/Y h:i A",strtotime($Log['CreatedDate'])) }}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		@endif
		<script type="text/javascript">
			window.print();
		</script>
	</body>
	</html>