<?php
include 'includes/header.php';
$user = new User();
$codropsEvents = $user->findCalender();

echo "<script type='text/javascript'>
var codropsEvents = $codropsEvents;
</script>";
?>

<link rel="stylesheet" type="text/css" href="css/calendar.css">
<link rel="shortcut icon" href="../favicon.ico"> 
		<link rel="stylesheet" type="text/css" href="css/calendar.css" />
		<link rel="stylesheet" type="text/css" href="css/custom_1.css" />
		<script src="js/calendar/modernizr.custom.63321.js"></script>

	<div id="modal" class="modal fade" role="dialog" aria-labelledby="newEventModal">
	  <div class="modal-dialog" role="document">
	      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
	          <h4 class="modal-title" id="gridModalLabel">Modal title</h4>
	        </div>
	        <div class="modal-body">
	          
	        </div>
	        <div class="modal-footer">
	          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	          <button type="button" class="btn btn-primary">Save changes</button>
	        </div>
	      </div><!-- /.modal-content -->
	    </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->


	<div class="container">	
			<div class="custom-calendar-wrap custom-calendar-full">
				<div class="custom-header clearfix">
					<h2>Flexible Calendar <span></h2>
					<h3 class="custom-month-year">

						<span id="custom-month" class="custom-month"></span>
						<span id="custom-year" class="custom-year"></span>
						<!-- <button id="new-event" class="new-event" data-toggle="modal" data-target="#gridSystemModal">建立新事项</button> -->
						
						<nav>
							<span id="custom-prev" class="custom-prev"></span>
							<span id="custom-next" class="custom-next"></span>
							<span id="custom-current" class="custom-current" title="Got to current date"></span>
						</nav>
					</h3>
				</div>
				<div id="calendar" class="fc-calendar-container"></div>
			</div>
		</div><!-- /container -->

<script type="text/javascript" src="js/calendar.js"></script>
<script type="text/javascript" src="js/calendar/jquery.calendario.js"></script>
		<script type="text/javascript" src="js/calendar/data.js"></script>
<?php
include "includes/footer.php";
?>