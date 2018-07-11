<?php
// Content of settings.php
// global $DB_HOST;
// global $DB_NAME;
// global $DB_USERNAME;
// global $DB_PASSWORD;
// $DB_HOST = "";
// $DB_USERNAME = "";
// $DB_PASSWORD = "";
// $DB_NAME = "";
include("./settings.php");
include("./time.php");
$connectString = "host=$DB_HOST dbname=$DB_NAME user=$DB_USERNAME password=$DB_PASSWORD";
$db_connection = pg_connect ($connectString);
if (!$db_connection)
{
	die('Error: Could not connect: ' . pg_last_error());
}

$SETTING_INTERVAL = "'30 minute'";

// interval can be day, hour, minute etc.
$result = pg_query("SELECT
	d.dte, count(a.activitytime)
	from generate_series(current_date - interval $minutesSubtr, current_date + interval $minutesPassed, $SETTING_INTERVAL) d(dte)
	left join	activities a
  on a.activitytime >= d.dte and a.activitytime < d.dte + interval $SETTING_INTERVAL
	group by d.dte
	order by d.dte;");

$myarray = pg_fetch_all($result);
print json_encode($myarray);
?>
