@extends('Main')
@section('content')
<div id="ribbon">
	<ol class="breadcrumb">
		<li><a href="{{ url('/home') }}">Home</a></li>
		<li>Restore</li>
	</ol>
</div>
<div id="content">
	<section>
		
		
		<div class="row">
			<div class="error-msg pull-right">
									@if(Session::has('failed'))
									<label class="failed">{!! \Session::get('failed') !!}</label>
									@endif
									@if(Session::has('success'))
									<label class="success">{!! \Session::get('success') !!}</label>
									@endif
								</div>
			<div class="col-sm-12">
				<div class="table-responsive">

					<form name="frm" method="post" action="{{ url('/RestoreData') }}">
							<input type="hidden" value="{{csrf_token()}}" name="_token" />
							<div class="row">
								<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
									
								</div>
								
							<div class="col-lg-3 col-md-9 col-sm-12 col-xs-12" style="margin:20px 0;">
								
								

								<a href="{{ url('/BackupRestore/') }}"  class="btn btn-info">Back To Backup</a>&nbsp;

								

								<!-- <button type="submit" class="btn btn-info" name="BtnRestore" id="BtnRestore">Restore</button>&nbsp; -->

								
								
								
							</div>
						</div>
					</form>
					<!-- <a href="{{ url('/BackupRestore/') }}"  class="btn btn-info">Back To Backup</a> -->

					<table id="datatable_fixed_column" class="table table-striped table-bordered table-hover" width="100%">
						<thead>
							
							<tr>
								<th><i class="fa fa-fw fa-user text-muted hidden-md hidden-sm hidden-xs"></i> ID</th>
								<th><i class="fa fa-fw fa-user text-muted hidden-md hidden-sm hidden-xs"></i> File Name</th>
								<!-- <th><i class="fa fa-fw fa-phone text-muted hidden-md hidden-sm hidden-xs"></i> Folder Name</th> -->
								<!-- <th><i class="fa fa-fw fa-user txt-color-blue hidden-md hidden-sm hidden-xs"></i> Full Path</th> -->
								<!-- <th><i class="fa fa-fw fa-user txt-color-blue hidden-md hidden-sm hidden-xs"></i> Dir Path</th> -->
								
								<th style="width: 90px;">Action</th>
							</tr>
						</thead>
						<tbody>
							
							@foreach($backup_history as $caldata)
							<tr>
								<td>{{ $caldata->RecId }}</td>
								<td>{{ $caldata->file_name }}</td>
								<!-- <td>{{ $caldata->folder_name }}</td> -->
								<!-- <td>{{ $caldata->full_path }}</td> -->
								<!-- <td>{{ $caldata->dir_path }}</td> -->
								<?php if($caldata->backup_type=='Backup'){?>
								<td><a href="{{ url('/RestoreDatabase/'.$caldata->file_name) }}"  class="btn btn-xs btn-danger" disabled>Dont Restore</a></td>
							<?php }else{?>

							<td><a href="{{ url('/RestoreDatabase/'.$caldata->file_name) }}"  class="btn btn-xs btn-success" >Restore</a></td>
						<?php }?>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
		
	</section>
</div>
@endsection

@section('JSscript')
<script src="{{ asset('public/js/plugin/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('public/js/plugin/datatables/dataTables.colVis.min.js') }}"></script>
<script src="{{ asset('public/js/plugin/datatables/dataTables.tableTools.min.js') }}"></script>
<script src="{{ asset('public/js/plugin/datatables/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('public/js/plugin/datatable-responsive/datatables.responsive.min.js') }}"></script>
<script type="text/javascript">
	$(document).ready(function() {
		var responsiveHelper_datatable_fixed_column = undefined;
		var breakpointDefinition = {
			tablet : 1024,
			phone : 480
		};

		var table = $('#datatable_fixed_column').DataTable({
			"bFilter": true,
			"bInfo": true,
			"bLengthChange": true,
			"bAutoWidth": true,
			"bPaginate": true,
			"bSort": false,
			"bStateSave": false,
			"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-12 hidden-xs'l>r>" +
			"t" +
			"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
			"autoWidth": true,
			"oLanguage": {
				"sSearch": '<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>'
			},
			"preDrawCallback": function () {
				if (!responsiveHelper_datatable_fixed_column) {
					responsiveHelper_datatable_fixed_column = new ResponsiveDatatablesHelper($('#datatable_fixed_column'), breakpointDefinition);
				}
			},
			"rowCallback": function (nRow) {
				responsiveHelper_datatable_fixed_column.createExpandIcon(nRow);
			},
			"drawCallback": function (oSettings) {
				responsiveHelper_datatable_fixed_column.respond();
			}
		});

		$(".dataTables_filter").hide();
		$("#datatable_fixed_column thead th .FillterData").on( 'keyup change', function () {
			table.column( $(this).parent().index()+':visible' ).search( this.value ).draw();

		});
	});
</script>
@endsection