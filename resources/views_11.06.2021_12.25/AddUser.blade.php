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
			<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="product-content product-wrap clearfix product-deatil">
					<form id="SaveUser" name="frm" method="post" action="{{ url('SaveUser') }}">
						<input type="hidden" value="{{csrf_token()}}" name="_token" />
						<div class="col-lg-12">
							<div class="row top-menu-box">
								<b>Add Users</b>
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
								<fieldset class="col-lg-5 mobile-mt20">
									<div class="row">
										<label class="col-md-4 control-label form-lable"><b>User ID:</b></label>
										<div class="col-md-8 input-area">
											<i class="icon-append fa fa-user"></i>
											<input type="text" name="UserId" class="form-input form-control UserId" autocomplete="off">
										</div> 
									</div>
								</fieldset>
								<fieldset class="col-lg-5 mobile-mt20">
									<div class="row">
										<label class="col-md-4 control-label form-lable"><b>User Type:</b></label>
										<div class="col-md-8 input-area">
											<i class="icon-append fa fa-users"></i>
											<select type="text" class="form-input form-control UserType" name="UserType">
												@php
												$RoleMaster=DB::table('rolemaster')->where('IsActive','1')->get();
												@endphp
												@foreach($RoleMaster as $Role)
												<option value="<?php echo $Role->RecId; ?>"><?php echo $Role->Role; ?></option>
												@endforeach
											</select>
										</div> 
									</div>
								</fieldset>
							</div>
							<div class="row" style="margin-bottom: 15px;">
								<fieldset class="col-lg-2 mobile-mt20 LocalUserData">
									<div class="row">
										<div class="col-lg-12">
											<div class="checkbox pull-right">
												<label>
													<input type="checkbox" name="LocalUser" value="1" class="checkbox style-1">
													<span></span>Local User
												</label>
											</div>
										</div>
									</div>
								</fieldset>
								<fieldset class="col-lg-4 mobile-mt20">
									<div class="row">
										<div class="col-md-8 input-area">
											<i class="icon-append fa fa-lock"></i>
											<input type="password" placeholder="Password..." readonly="readonly" name="Password" class="form-input form-control Password" autocomplete="off">
										</div> 
									</div>
								</fieldset>
								<fieldset class="col-lg-6 mobile-mt20">
									<div class="row">
										<div class="col-lg-12">
											<button class="btnSaveUser Mobilemtb20 btn btn-primary pull-right" type="submit"><i class="fa fa-lg fa-fw fa-save"></i> <span class="area-text">Save User</span></button>
										</div>
									</div>
								</fieldset>
							</div>
						</div>
					</form>
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
		$.get('AjaxGetUserData/'+ $(this).attr("data-RecId"),function(data){
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