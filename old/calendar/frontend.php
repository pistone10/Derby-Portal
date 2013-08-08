<?php include('includes/calendar.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Create a dynamic jQuery calendar</title>
	<style type="text/css" media="screen">
		#calendar-events{ display: none; }
	</style>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="scripts/calendar.js" type="text/javascript" charset="utf-8"></script>
</head>
<body>
	<h1>August 2009</h1>
	<p>Click the 14th, 15th, or 16th to see events for those days.</p>
	<?php echo draw_calendar(8,2009); ?>
	<div id="calendar-events"></div>	
</body>
</html>