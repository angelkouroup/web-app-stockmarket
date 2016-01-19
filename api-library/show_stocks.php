<?php
require '../system/dbcon.php';

$result = mysql_query("SELECT * FROM stocks ORDER BY stock_last_update DESC");
//$result = mysql_query("SELECT * FROM exams WHERE tmima=" . $_GET['tmima']);

$rows = array();
while($r = mysql_fetch_assoc($result)) 
{
    $rows[] = $r;
}

$enc=json_encode($rows);
mysql_close($con);
echo $enc;

?>
