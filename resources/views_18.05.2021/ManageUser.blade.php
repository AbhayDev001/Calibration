@extends('Main')
@section('content')
<div id="ribbon">
	<ol class="breadcrumb">
		<li><a href="{{ url('/home') }}">Home</a></li>
		<li>Manage User</li>
	</ol>
</div>
<div id="content">
	<!--section id="widget-grid" class=""-->
	<section>
		<div class="row">
			<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12 mt20">
				<div class="product-content product-wrap clearfix product-deatil">
					<div class="col-lg-12">
						<div class="row top-menu-box">
							<b>Manage Users</b>
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
						<div class="table-responsive">
							<table id="datatable_fixed_column" class="table table-striped table-bordered table-hover" width="100%">
								<thead> 
									<tr>
										<th>
											<input type="text" class="form-control FillterData" placeholder="UserId" style="width: 100%;">
										</th>
										<th>
											<input type="text" class="form-control FillterData" placeholder="Name" style="width: 100%;">
										</th>
										<th>
											<input type="text" class="form-control FillterData" placeholder="Email" style="width: 100%;">
										</th>
										<th>
											<input type="text" class="form-control FillterData" placeholder="Contact" style="width: 100%;">
										</th>
										<th>
											<select class="form-control FillterData FillterStatus" style="width: 100%;">
												<option value="">All</option>
												@php
												$RoleMaster=DB::table('rolemaster')->where('IsActive','1')->get();
												@endphp
												@foreach($RoleMaster as $Role)
												<option><?php echo $Role->Role; ?></option>
												@endforeach
											</select>
										</th>
										<th></th>
									</tr>    
									<tr>
										<th><i class="fa fa-fw fa-user text-muted hidden-md hidden-sm hidden-xs"></i> UserId</th>
										<th><i class="fa fa-fw fa-user text-muted hidden-md hidden-sm hidden-xs"></i> Full Name</th>
										<th><i class="fa fa-fw fa-envelope text-muted hidden-md hidden-sm hidden-xs"></i> Email</th>
										<th><i class="fa fa-fw fa-phone txt-color-blue hidden-md hidden-sm hidden-xs"></i> Contact</th>
										<th><i class="fa fa-fw fa-users txt-color-blue hidden-md hidden-sm hidden-xs"></i> User Type</th>
										<th style="width: 90px;">Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach($MainData['Users'] as $user)
									<tr class="@if($user->LdapUser==0) {{ 'LocalUser' }} @endif">
										<td>{{ $user->UserId }}</td>
										<td>{{ $user->UserName }}</td>
										<td>{{ $user->UserEmail }}</td>
										<td>{{ $user->ContactNum }}</td>
										<td>
											@php
											$GetRole=DB::table('rolemaster')->where('RecId',$user->Role)->get();
											echo $GetRole[0]->Role;
											@endphp
											@if($user->LdapUser==0)
											{{ " / Local-User" }}
											@endif
										</td>
										<td>
											<a href="javascript:void(0)" data-RecId="{{ $user->UserId }}" class="btn btn-xs btn-default btnEditUser"><i class="fa fa-pencil"></i></a>

											<form name="frm" method="post" action="{{ url('ActiveDeactiveUser') }}" style="display: inline-block;"> 
												<input type="hidden" value="{{csrf_token()}}" name="_token" />
												<input type="hidden" value="{{ $user->UserId }}" name="UserId" />
												<input type="hidden" value="{{ $user->IsActive }}" name="IsActive" />
												@if($user->IsActive==0)
												<button type="submit" title="Active Now" class="btn btn-xs btn-default"><i class="fa fa-check"></i></button>
												@else
												<button type="submit" title="Deactive Now" class="btn btn-xs btn-default"><i class="fa fa-close"></i></button>
												@endif
											</form>
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</article>
		</div>

		<div class="modal fade" id="EditUser" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<form id="UpdUser" name="frm" method="post" action="{{ url('UpdUser') }}">
						<input type="hidden" value="{{csrf_token()}}" name="_token" />
						<input type="hidden" value="0" name="UserId" class="UpdUserId" />
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Edit User<span class="ThisUser"></span></h4>
						</div>
						<div class="modal-body">
							<div class="input-area">
								<div class="form-group">
									<label for="UserName">Full Name</label>
									<input type="text" class="form-control UpdUserName" id="UserName" name="UserName" autocomplete="off">
								</div>
							</div>
							<div class="input-area">
								<div class="form-group">
									<label for="UserEmail">Email</label>
									<input type="text" class="form-control UpdUserEmail" id="UserEmail" name="UserEmail" autocomplete="off">
								</div>
							</div>
							<div class="input-area">
								<div class="form-group">
									<label for="ContactNum">Contact Number</label>
									<input type="text" class="form-control UpdContactNum" id="ContactNum" name="ContactNum" autocomplete="off">
								</div>
							</div>
							<div class="input-area">
								<div class="form-group">
									<label for="ContactNum">User Type</label>
									<select type="text" class="form-control UpdUserType" name="UserType">
										<option>--select--</option>
										@php
										$RoleMaster=DB::table('rolemaster')->where('IsActive','1')->get();
										@endphp
										@foreach($RoleMaster as $Role)
										<option value="<?php echo $Role->RecId; ?>"><?php echo $Role->Role; ?></option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="input-area PasswordField" style="display: none;">
								<div class="form-group">
									<label for="ContactNum">Password</label>
									<input type="password" class="form-control UpdPassword"  name="Password" autocomplete="off" data-toggle="password">
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-info btnUpdUser">Save</button>
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
					</form>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-sm-12">
				<!-- your contents here -->
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
<script type="text/javascript">
	$(".btnSaveUser").click(function(){
		if($(".UserId").val()=='' || $(".UserId").val()==0)
		{
			$(".UserId").parent("div").children(".tooltip").remove();
			$(".UserId").parent("div").append("<b class='tooltip tooltip-bottom-right'>Required field</b>",removetooltip('UserId'));
			$(".UserId").focus();
			return false;
		}
		if($(".UserType").val()=='' || $(".UserType").val()==0)
		{
			$(".UserType").parent("div").children(".tooltip").remove();
			$(".UserType").parent("div").append("<b class='tooltip tooltip-bottom-right'>Required field</b>",removetooltip('UserType'));
			$(".UserType").focus();
			return false;
		}
		if($(".LocalUserData input[type='checkbox']").prop("checked")== true)
		{
			if($(".Password").val()=="")
			{
				$(".Password").parent("div").children(".tooltip").remove();
				$(".Password").parent("div").append("<b class='tooltip tooltip-bottom-right'>Required field</b>",removetooltip('Password'));
				$(".Password").focus();
				return false;
			}
		}
	});
</script>
<script type="text/javascript">
	$(".btnEditUser").click(function(){
		$.get('../AjaxGetUserData/'+ $(this).attr("data-RecId"),function(data){
			if(data!='')
			{
				$(".ThisUser").text(" ("+data['UserId']+")");
				$(".UpdUserId").val(data['UserId']);
				$(".UpdUserName").val(data['UserName']);
				$(".UpdUserEmail").val(data['UserEmail']);
				$(".UpdContactNum").val(data['ContactNum']);
				$(".UpdUserType").val(data['Role']);
				if(data['LdapUser']==0)
				{
					$(".PasswordField").show();
					$(".UpdPassword").val(data['Password']);
				}
				else
				{
					$(".UpdPassword").val("");
					$(".PasswordField").hide();	
				}
				$('#EditUser').modal('show');
			}
		});
	});
</script>
<script type="text/javascript">
	$(".LocalUserData input[type='checkbox']").click(function(){
		$(".Password").val("");
		if($(this).prop("checked") == true){
			$(".Password").removeAttr("readonly");
		}
		else
		{
			$(".Password").attr("readonly","readonly");
		}
	});
</script>

<script src="{{ asset('public/js/bootstrap-show-password.min.js') }}"></script>
<script type="text/javascript">
	$("#password").password('toggle');
</script>
<script type="text/javascript" src="{{ asset('public/js/plugin/typeahead/typeahead.min.js') }}"></script>
<script type="text/javascript">
	$( ".UserId" ).keyup(function() {
		if($(this).val().length>1)
		{
			var SearchText=$(this).val();
			$( ".UserId" ).autocomplete({
				source: function (request, response) {
					/*$.ajax({
						type: "GET",
						contentType: "application/json; charset=utf-8",
						url: "SearchLdapUser",
						data: "{'SearchText':'" + SearchText + "'}",
						dataType: "json",
						success: function (data) {
							response(data.d);
						},
						error: function (XMLHttpRequest, textStatus, errorThrown) {
							var err = eval("(" + XMLHttpRequest.responseText + ")");
							console.log(err.Message);
						}
					});*/
					$.get('SearchLdapUser/'+ SearchText,function(data){
						return response(data);
					});
				},
				minLength: 1
			});
		}
	});
</script>
@endsection