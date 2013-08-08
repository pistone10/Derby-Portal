<?php

/**
 * Establish a database connection
 *
 * @see http://us2.php.net/pdo
 * @see http://us2.php.net/pdo_mysql
 * @see http://us2.php.net/pdo_sqlite
 */
$db = new PDO('sqlite:db/calendar.db');

//Set date from GET timestamp parameter
if( !isset($_GET['timestamp']) )
	die('You must provide a timestamp');
else
	$date = getdate($_GET['timestamp']);

//Define start and end timestamps for the requested day
$time_start = mktime(0,0,0,$date['mon'],$date['mday'],$date['year']);
$time_end = mktime(23,59,59,$date['mon'],$date['mday'],$date['year']);

//Fetch events from database as associative array
$stmt = $db->prepare('SELECT id, title, slug, time FROM events WHERE time BETWEEN ? AND ? ORDER BY time ASC');
$stmt->bindParam(1,$time_start,PDO::PARAM_INT);
$stmt->bindParam(2,$time_end,PDO::PARAM_INT);
$stmt->execute();
$events = $stmt->fetchAll(PDO::FETCH_ASSOC);

//Send output
if( !count($events) )
	exit('<p>No events were found</p>');
$output = '<ul>';
foreach( $events as $event )
	$output .= '<li>'.strftime("%l:%M %p",$event['time']).' - '.$event['title'].'</li>';
$output .= '</ul>';
exit($output);

?>