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
$result = pg_query("SELECT
    									date_trunc('minute', activitytime) - (CAST(EXTRACT(MINUTE FROM activitytime) AS integer) % 5) * interval '1 minute' AS trunc_5_minute,
    									count(*)
										FROM activities
										GROUP BY trunc_5_minute
										ORDER BY trunc_5_minute;");
//$result = pg_query("SELECT * FROM information_schema.columns WHERE table_name = 'activities'");
//while ($row = pg_fetch_row($result))
//{
  //foreach ($row as $column){echo "$column - ";}
  //echo "<br>";
//  $data[] = $row;
//}
$myarray = pg_fetch_all($result);
print json_encode($myarray);
?>
