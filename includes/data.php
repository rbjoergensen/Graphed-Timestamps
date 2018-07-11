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
$connectString = "host=$DB_HOST dbname=$DB_NAME user=$DB_USERNAME password=$DB_PASSWORD";
$db_connection = pg_connect ($connectString);
if (!$db_connection)
{
	die('Error: Could not connect: ' . pg_last_error());
}

$SETTING_DAYS = "";
$SETTING_INTERVAL = "";

// interval can be day, hour etc.
$result = pg_query("SELECT
	d.dte, count(a.activitytime)
	from generate_series(current_date - interval '12 hour', current_date, '15 minute') d(dte) left join
  	activities a
  on a.activitytime >= d.dte and a.activitytime < d.dte + interval '15 minute'
	group by d.dte
	order by d.dte;");
$myarray = pg_fetch_all($result);
print json_encode($myarray);
?>
