@extends('Main')
@section('content')
<div id="ribbon">
	<ol class="breadcrumb">
		<li>Home</li>
	</ol>
</div>
<div id="content">
	<section>
		<div class="row">
			<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="product-content product-wrap clearfix product-deatil" style="padding: 5px;background: #ecf0f5;">
					<div class="col-lg-12">
						<div class="row">
							@if(Session::has('failed'))
							<div class="alert alert-danger alert-dismissible myalert">
								<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
								{!! \Session::get('failed') !!}
							</div>
							@endif
							@if(Session::has('success'))
							<div class="alert alert-success alert-dismissible myalert">
								<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
								{!! \Session::get('success') !!}
							</div>
							@endif
						</div>
						<div class="row mt10">
							<div class="col-md-3 col-sm-6 col-xs-12">
								<div class="info-box">
									<span class="info-box-icon bg-aqua"><i class="fa fa-lg fa-fw fa-cube"></i></span>
									<div class="info-box-content">
										<span class="info-box-text">Total Calibration</span>
										<span class="info-box-number">{{ $MainData['totcal'] }}</span>
									</div>
								</div>
							</div>
							<div class="col-md-3 col-sm-6 col-xs-12">
								<div class="info-box">
									<span class="info-box-icon bg-aqua"><i class="fa fa-lg fa-fw fa-cube"></i></span>
									<div class="info-box-content">
										<a href="{{ url('/home/NewCalibration') }}">
											<span class="info-box-text">New Calibration</span>
											<span class="info-box-number">{{ $MainData['newcal'] }}</span>
										</a>
									</div>
								</div>
							</div>
							<div class="col-md-3 col-sm-6 col-xs-12">
								<div class="info-box">
									<span class="info-box-icon bg-green"><i class="fa fa-lg fa-fw fa-cube"></i></span>
									<div class="info-box-content">
										<a href="{{ url('/home/VerifiedCalibration') }}">
											<span class="info-box-text">Verified Calibration</span>
											<span class="info-box-number">{{ $MainData['verifiedcal'] }}</span>
										</a>
									</div>
								</div>
							</div>
							<div class="col-md-3 col-sm-6 col-xs-12">
								<div class="info-box">
									<span class="info-box-icon bg-yellow"><i class="fa fa-lg fa-fw fa-cube"></i></span>
									<div class="info-box-content">
										<a href="{{ url('/home/ApprovedCalibration') }}">
											<span class="info-box-text">Approved Calibration</span>
											<span class="info-box-number">{{ $MainData['approvedcal'] }}</span>
										</a>
									</div>
								</div>
							</div>
						</div>
						<div class="row mt10">
							<div class="col-md-3 col-sm-6 col-xs-12">
								<div class="info-box">
									<span class="info-box-icon bg-red"><i class="fa fa-lg fa-fw fa-cube"></i></span>
									<div class="info-box-content">
										<a href="{{ url('/home/DeclinedCalibration') }}">
											<span class="info-box-text">Declined Calibration</span>
											<span class="info-box-number">{{ $MainData['declinedcal'] }}</span>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</article>
		</div>

		@if(isset($MainData["Calibration"]))
		<div class="row">
			<div class="col-sm-12">
				<div class="table-responsive">
					<table id="datatable_fixed_column" class="table table-striped table-bordered table-hover" width="100%">
						<thead>
							<tr>
								<th>
									<input type="text" class="form-control FillterData" placeholder="FormID" style="width: 100%;">
								</th>
								<th>
									<input type="text" class="form-control FillterData" placeholder="Calibrated" style="width: 100%;">
								</th>
								<th>
									<input type="text" class="form-control FillterData" placeholder="Instrument" style="width: 100%;">
								</th>
								<th>
									<input type="text" class="form-control FillterData" placeholder="Device" style="width: 100%;">
								</th>
								<th>
									<input type="text" class="form-control numeric FillterData" placeholder="Make" style="width: 100%;">
								</th>
								<th>
									<input type="text" class="form-control FillterData" placeholder="Model" style="width: 100%;">
								</th>
								<th>
									<input type="text" class="form-control FillterData" placeholder="Perform By" style="width: 100%;">
								</th>
								<th>
									<input type="text" class="form-control FillterData datepicker" data-dateformat="dd/mm/yy" placeholder="Perform Date" style="width: 100%;">
								</th>
								<th style="width: 100px;">
									<select class="form-control FillterData FillterStatus" style="width: 100%;">
										<option value="">All</option>
										@php
										$StatusMaster=DB::table('statusmaster')->where('IsActive','1')->get();
										@endphp
										@foreach($StatusMaster as $status)
										<option><?php echo $status->Name; ?></option>
										@endforeach
									</select>
								</th>
								<th></th>
							</tr>
							<tr>
								<th><i class="fa fa-fw fa-user text-muted hidden-md hidden-sm hidden-xs"></i> FormID</th>
								<th><i class="fa fa-fw fa-user text-muted hidden-md hidden-sm hidden-xs"></i> Calibrated</th>
								<th><i class="fa fa-fw fa-phone text-muted hidden-md hidden-sm hidden-xs"></i> LAB</th>
								<th><i class="fa fa-fw fa-user txt-color-blue hidden-md hidden-sm hidden-xs"></i> Instrument</th>
								<th><i class="fa fa-fw fa-user txt-color-blue hidden-md hidden-sm hidden-xs"></i> Make</th>
								<th><i class="fa fa-fw fa-user txt-color-blue hidden-md hidden-sm hidden-xs"></i> Model</th>
								<th><i class="fa fa-fw fa-user txt-color-blue hidden-md hidden-sm hidden-xs"></i> Perform By</th>
								<th><i class="fa fa-fw fa-user txt-color-blue hidden-md hidden-sm hidden-xs"></i> Perform Date</th>
								<th style="width: 120px;"><i class="fa fa-fw fa-user txt-color-blue hidden-md hidden-sm hidden-xs"></i> Status</th>
								<th style="width: 90px;">Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($MainData['Calibration'] as $caldata)
							<tr>
								<td>{{ $caldata->FormId }}</td>
								<td>{{ $caldata->CalibrationName }}</td>
								<td>{{ $caldata->InstrumentName }}</td>
								<td>{{ $caldata->DeviceName }}</td>
								<td>{{ $caldata->Make }}</td>
								<td>{{ $caldata->Model }}</td>
								<td>
								<?php $CreatedByName=DB::table('usermaster')->where('UserId',$caldata->PerformedBy)->first(); 
									if(isset($CreatedByName->UserName)){
										echo $CreatedByName->UserName;
									}
									?>
									
								</td>
								<td>{{ date("d/m/Y",strtotime($caldata->PerformDate)) }}</td>
								<td>
									@php
									$StatusMaster=DB::table('statusmaster')->where('RecId',$caldata->Status)->first();
									echo $StatusMaster->Name;
									@endphp
								</td>
								<td>
									@if($caldata->CType==2)
									@if($caldata->DeviceType==1)
									<a href="{{ url('/ViewMonthlyCalibration/'.$caldata->RecId) }}" class="btn btn-xs btn-default"><i class="fa fa-eye"></i></a>
									@if(($caldata->Status==10 && $caldata->PerformedBy==Session::get('LoginData')['UserId'] && Session::get('LoginData')['Role']==2))
									<a href="{{ url('/EditMonthlyCalibration/'.$caldata->RecId) }}" class="btn btn-xs btn-default"><i class="fa fa-pencil"></i></a>
									@endif
									<a href="{{ url('/PrintMonthlyCalibration/'.$caldata->RecId) }}" target="_blank" class="btn btn-xs btn-default"><i class="fa fa-print"></i></a>
									@else
									<a href="{{ url('/ViewMonthlyCalibrationMG/'.$caldata->RecId) }}" class="btn btn-xs btn-default"><i class="fa fa-eye"></i></a>
									@if(($caldata->Status==10 && $caldata->PerformedBy==Session::get('LoginData')['UserId'] && Session::get('LoginData')['Role']==2))
									<a href="{{ url('/EditMonthlyCalibrationMG/'.$caldata->RecId) }}" class="btn btn-xs btn-default"><i class="fa fa-pencil"></i></a>
									@endif
									<a href="{{ url('/PrintMonthlyCalibrationMG/'.$caldata->RecId) }}" target="_blank" class="btn btn-xs btn-default"><i class="fa fa-print"></i></a>
									@endif
									@else
									<a href="{{ url('/ViewCalibration/'.$caldata->RecId) }}" class="btn btn-xs btn-default"><i class="fa fa-eye"></i></a>
									@if(($caldata->Status==10 && $caldata->PerformedBy==Session::get('LoginData')['UserId'] && Session::get('LoginData')['Role']==2))
									<a href="{{ url('/EditCalibration/'.$caldata->RecId) }}" class="btn btn-xs btn-default"><i class="fa fa-pencil"></i></a>
									@endif
									<a href="{{ url('/PrintCalibration/'.$caldata->RecId) }}" target="_blank" class="btn btn-xs btn-default"><i class="fa fa-print"></i></a>
									@endif
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
		@endif

		<!-- row -->
		<div class="row">
			<?php /*  ?>
			<div class="col-sm-12 col-md-12 col-lg-3">
				<!-- new widget -->
				<div class="jarviswidget jarviswidget-color-blueDark">
					<header>
						<h2> Add Events </h2>
					</header>

					<!-- widget div-->
					<div>

						<div class="widget-body">
							<!-- content goes here -->

							<form id="add-event-form">
								<fieldset>

									<div class="form-group">
										<label>Select Event Icon</label>
										<div class="btn-group btn-group-sm btn-group-justified" data-toggle="buttons">
											<label class="btn btn-default active">
												<input type="radio" name="iconselect" id="icon-1" value="fa-info" checked>
												<i class="fa fa-info text-muted"></i> </label>
											<label class="btn btn-default">
												<input type="radio" name="iconselect" id="icon-2" value="fa-warning">
												<i class="fa fa-warning text-muted"></i> </label>
											<label class="btn btn-default">
												<input type="radio" name="iconselect" id="icon-3" value="fa-check">
												<i class="fa fa-check text-muted"></i> </label>
											<label class="btn btn-default">
												<input type="radio" name="iconselect" id="icon-4" value="fa-user">
												<i class="fa fa-user text-muted"></i> </label>
											<label class="btn btn-default">
												<input type="radio" name="iconselect" id="icon-5" value="fa-lock">
												<i class="fa fa-lock text-muted"></i> </label>
											<label class="btn btn-default">
												<input type="radio" name="iconselect" id="icon-6" value="fa-clock-o">
												<i class="fa fa-clock-o text-muted"></i> </label>
										</div>
									</div>

									<div class="form-group">
										<label>Event Title</label>
										<input class="form-control"  id="title" name="title" maxlength="40" type="text" placeholder="Event Title">
									</div>
									<div class="form-group">
										<label>Event Description</label>
										<textarea class="form-control" placeholder="Please be brief" rows="3" maxlength="40" id="description"></textarea>
										<p class="note">Maxlength is set to 40 characters</p>
									</div>

									<div class="form-group">
										<label>Select Event Color</label>
										<div class="btn-group btn-group-justified btn-select-tick" data-toggle="buttons">
											<label class="btn bg-color-darken active">
												<input type="radio" name="priority" id="option1" value="bg-color-darken txt-color-white" checked>
												<i class="fa fa-check txt-color-white"></i> </label>
											<label class="btn bg-color-blue">
												<input type="radio" name="priority" id="option2" value="bg-color-blue txt-color-white">
												<i class="fa fa-check txt-color-white"></i> </label>
											<label class="btn bg-color-orange">
												<input type="radio" name="priority" id="option3" value="bg-color-orange txt-color-white">
												<i class="fa fa-check txt-color-white"></i> </label>
											<label class="btn bg-color-greenLight">
												<input type="radio" name="priority" id="option4" value="bg-color-greenLight txt-color-white">
												<i class="fa fa-check txt-color-white"></i> </label>
											<label class="btn bg-color-blueLight">
												<input type="radio" name="priority" id="option5" value="bg-color-blueLight txt-color-white">
												<i class="fa fa-check txt-color-white"></i> </label>
											<label class="btn bg-color-red">
												<input type="radio" name="priority" id="option6" value="bg-color-red txt-color-white">
												<i class="fa fa-check txt-color-white"></i> </label>
										</div>
									</div>

								</fieldset>
								<div class="form-actions">
									<div class="row">
										<div class="col-md-12">
											<button class="btn btn-default" type="button" id="add-event" >
												Add Event
											</button>
										</div>
									</div>
								</div>
							</form>

							<!-- end content -->
						</div>

					</div>
					<!-- end widget div -->
				</div>
				<!-- end widget -->

				<div class="well well-sm" id="event-container">
					<form>
						<fieldset>
							<legend>
								Draggable Events
							</legend>
							<ul id='external-events' class="list-unstyled">
								<li>
									<span class="bg-color-darken txt-color-white" data-description="Currently busy" data-icon="fa-time">Office Meeting</span>
								</li>
								<li>
									<span class="bg-color-blue txt-color-white" data-description="No Description" data-icon="fa-pie">Lunch Break</span>
								</li>
								<li>
									<span class="bg-color-red txt-color-white" data-description="Urgent Tasks" data-icon="fa-alert">URGENT</span>
								</li>
							</ul>
							<div class="checkbox">
								<label>
									<input type="checkbox" id="drop-remove" class="checkbox style-0" checked="checked">
									<span>remove after drop</span> </label>

							</div>
						</fieldset>
					</form>

				</div>
			</div>
			<?php */ ?>
			<div class="col-sm-12 col-md-12 col-lg-12">

				<!-- new widget -->
				<div class="jarviswidget jarviswidget-color-blueDark">

					<!-- widget options:
					usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">

					data-widget-colorbutton="false"
					data-widget-editbutton="false"
					data-widget-togglebutton="false"
					data-widget-deletebutton="false"
					data-widget-fullscreenbutton="false"
					data-widget-custombutton="false"
					data-widget-collapsed="true"
					data-widget-sortable="false"

					-->
					<header>
						<span class="widget-icon"> <i class="fa fa-calendar"></i> </span>
						<h2> My Events </h2>
						<div class="widget-toolbar">
							<!-- add: non-hidden - to disable auto hide -->
							<div class="btn-group">
								<button class="btn dropdown-toggle btn-xs btn-default" data-toggle="dropdown">
									Showing <i class="fa fa-caret-down"></i>
								</button>
								<ul class="dropdown-menu js-status-update pull-right">
									<li>
										<a href="javascript:void(0);" id="mt">Month</a>
									</li>
									<li>
										<a href="javascript:void(0);" id="ag">Agenda</a>
									</li>
									<li>
										<a href="javascript:void(0);" id="td">Today</a>
									</li>
								</ul>
							</div>
						</div>
					</header>

					<!-- widget div-->
					<div>

						<div class="widget-body no-padding">
							<!-- content goes here -->
							<div class="widget-body-toolbar">

								<div id="calendar-buttons">

									<div class="btn-group">
										<a href="javascript:void(0)" class="btn btn-default btn-xs" id="btn-prev"><i class="fa fa-chevron-left"></i></a>
										<a href="javascript:void(0)" class="btn btn-default btn-xs" id="btn-next"><i class="fa fa-chevron-right"></i></a>
									</div>
								</div>
							</div>
							<div id="calendar"></div>

							<!-- end content -->
						</div>

					</div>
					<!-- end widget div -->
				</div>
				<!-- end widget -->

			</div>

		</div>

		<!-- end row -->
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
			"bSort": true,
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
<script src="http://www.cms.division.com.hk/js/plugin/fullcalendar/jquery.fullcalendar.min.js"></script>
<script type="text/javascript">

	$(document).ready(function() {

		    "use strict";

		    var date = new Date();
		    var d = date.getDate();
		    var m = date.getMonth();
		    var y = date.getFullYear();

		    var hdr = {
		        left: 'title',
		        center: 'month,agendaWeek,agendaDay',
		        right: 'prev,today,next'
		    };

		    var initDrag = function (e) {
		        // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
		        // it doesn't need to have a start or end

		        var eventObject = {
		            title: $.trim(e.children().text()), // use the element's text as the event title
		            description: $.trim(e.children('span').attr('data-description')),
		            icon: $.trim(e.children('span').attr('data-icon')),
		            className: $.trim(e.children('span').attr('class')) // use the element's children as the event class
		        };
		        // store the Event Object in the DOM element so we can get to it later
		        e.data('eventObject', eventObject);

		        // make the event draggable using jQuery UI
		        e.draggable({
		            zIndex: 999,
		            revert: true, // will cause the event to go back to its
		            revertDuration: 0 //  original position after the drag
		        });
		    };

		    var addEvent = function (title, priority, description, icon) {
		        title = title.length === 0 ? "Untitled Event" : title;
		        description = description.length === 0 ? "No Description" : description;
		        icon = icon.length === 0 ? " " : icon;
		        priority = priority.length === 0 ? "label label-default" : priority;

		        var html = $('<li><span class="' + priority + '" data-description="' + description + '" data-icon="' +
		            icon + '">' + title + '</span></li>').prependTo('ul#external-events').hide().fadeIn();

		        $("#event-container").effect("highlight", 800);

		        initDrag(html);
		    };

		    /* initialize the external events
			 -----------------------------------------------------------------*/

		    $('#external-events > li').each(function () {
		        initDrag($(this));
		    });

		    $('#add-event').click(function () {
		        var title = $('#title').val(),
		            priority = $('input:radio[name=priority]:checked').val(),
		            description = $('#description').val(),
		            icon = $('input:radio[name=iconselect]:checked').val();

		        addEvent(title, priority, description, icon);
		    });

		    /* initialize the calendar
			 -----------------------------------------------------------------*/

		    $('#calendar').fullCalendar({

		        header: hdr,
		        buttonText: {
		            prev: '<i class="fa fa-chevron-left"></i>',
		            next: '<i class="fa fa-chevron-right"></i>'
		        },

		        editable: false,
		        droppable: false, // this allows things to be dropped onto the calendar !!!

		        drop: function (date, allDay) { // this function is called when something is dropped

		            // retrieve the dropped element's stored Event Object
		            var originalEventObject = $(this).data('eventObject');

		            // we need to copy it, so that multiple events don't have a reference to the same object
		            var copiedEventObject = $.extend({}, originalEventObject);

		            // assign it the date that was reported
		            copiedEventObject.start = date;
		            copiedEventObject.allDay = allDay;

		            // render the event on the calendar
		            // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
		            $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);

		            // is the "remove after drop" checkbox checked?
		            if ($('#drop-remove').is(':checked')) {
		                // if so, remove the element from the "Draggable Events" list
		                $(this).remove();
		            }

		        },

		        select: function (start, end, allDay) {
		            var title = prompt('Event Title:');
		            if (title) {
		                calendar.fullCalendar('renderEvent', {
		                        title: title,
		                        start: start,
		                        end: end,
		                        allDay: allDay
		                    }, true // make the event "stick"
		                );
		            }
		            calendar.fullCalendar('unselect');
		        },
			// 10 new 20 verified 30 approved //
		        events: [
				@foreach($MainData['Calibration'] as $calibration)
					{
			            title: '{{ $calibration->FormId }}',
			            start: '{{ date("Y-m-d H:i:s", strtotime("-3 days", strtotime($calibration->CalibrationNextDate1)))}}',
			            end: '{{ $calibration->CalibrationNextDate1 }}',//new Date(y, m, 1),
			            description: '{{ $calibration->InstrumentName }}',
			            @if($calibration->Status == 20)
        					className: ["event", "bg-yellow"],
    					@elseif($calibration->Status == 30)
    						className: ["event", "bg-green"],
    					@else
    						className: ["event", "bg-aqua"],
    					@endif
			            //className: ["event", "bg-aqua"],
			            //icon: 'fa-check'
			            url:"{{ url('/ViewMonthlyCalibration/'.$calibration->RecId) }}"
			        },
				@endforeach
		        /*{
		            title: 'All Day Event',
		            start: new Date(y, m, 1),
		            description: 'long description',
		            className: ["event", "bg-color-greenLight"],
		            icon: 'fa-check'
		        }, {
		            title: 'Long Event',
		            start: new Date(y, m, d - 5),
		            end: new Date(y, m, d - 2),
		            className: ["event", "bg-color-red"],
		            icon: 'fa-lock'
		        }, {
		            id: 999,
		            title: 'Repeating Event',
		            start: new Date(y, m, d - 3, 16, 0),
		            allDay: false,
		            className: ["event", "bg-color-blue"],
		            icon: 'fa-clock-o'
		        }, {
		            id: 999,
		            title: 'Repeating Event',
		            start: new Date(y, m, d + 4, 16, 0),
		            allDay: false,
		            className: ["event", "bg-color-blue"],
		            icon: 'fa-clock-o'
		        }, {
		            title: 'Meeting',
		            start: new Date(y, m, d, 10, 30),
		            allDay: false,
		            className: ["event", "bg-color-darken"]
		        }, {
		            title: 'Lunch',
		            start: new Date(y, m, d, 12, 0),
		            end: new Date(y, m, d, 14, 0),
		            allDay: false,
		            className: ["event", "bg-color-darken"]
		        }, {
		            title: 'Birthday Party',
		            start: new Date(y, m, d + 1, 19, 0),
		            end: new Date(y, m, d + 1, 22, 30),
		            allDay: false,
		            className: ["event", "bg-color-darken"]
		        }, {
		            title: 'Smartadmin Open Day',
		            start: new Date(y, m, 28),
		            end: new Date(y, m, 29),
		            className: ["event", "bg-color-darken"]
		        }*/],

		        eventRender: function (event, element, icon) {
		            if (!event.description == "") {
		                element.find('.fc-event-title').append("<br/><span class='ultra-light'>" + event.description +
		                    "</span>");
		            }
		            if (!event.icon == "") {
		                element.find('.fc-event-title').append("<i class='air air-top-right fa " + event.icon +
		                    " '></i>");
		            }
		            //console.log('hellllllllo');
		            $('a.fc-event').attr('target','_blank');
		        },
		        windowResize: function (event, ui) {
		            $('#calendar').fullCalendar('render');
		        }
		    });

		    /* hide default buttons */
		    $('.fc-header-right, .fc-header-center').hide();


			$('#calendar-buttons #btn-prev').click(function () {
			    $('.fc-button-prev').click();
			    return false;
			});

			$('#calendar-buttons #btn-next').click(function () {
			    $('.fc-button-next').click();
			    return false;
			});

			$('#calendar-buttons #btn-today').click(function () {
			    $('.fc-button-today').click();
			    return false;
			});

			$('#mt').click(function () {
			    $('#calendar').fullCalendar('changeView', 'month');
			});

			$('#ag').click(function () {
			    $('#calendar').fullCalendar('changeView', 'agendaWeek');
			});

			$('#td').click(function () {
			    $('#calendar').fullCalendar('changeView', 'agendaDay');
			});

			//setTimeout(function(){ $('a.fc-event').attr('target','_blank'); }, 3000);
	});
</script>
@endsection
