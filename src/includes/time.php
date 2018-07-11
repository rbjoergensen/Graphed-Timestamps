<?php
global $minutesPassed;
global $minutesSubtr;
date_default_timezone_set('Europe/Copenhagen');
$date = strtotime(date('m/d/Y h:i:s a', time()));
$time_hours = date('H', $date);
$time_minut = date('m', $date);
// Echo time, add 2 hours of padding for the graph and convert to minutes. Then Add the minutes of the hour.
$minutesPassed = (($time_hours + 1) * 60) + $time_minut;
$minutesPassed = "'" . $minutesPassed . " minute'";
$minutesSubtr = 1440 - (($time_hours + 0) * 60) + $time_minut;
$minutesSubtr = "'" . $minutesSubtr . " minute'";

 ?>
