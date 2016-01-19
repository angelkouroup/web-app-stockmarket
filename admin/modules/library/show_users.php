<?php
require '../../../system/dbcon.php';

$result = mysql_query("SELECT * FROM users WHERE u_type='0'");


$rows = array();
while($r = mysql_fetch_assoc($result)) 
{
    $rows[] = $r;
}

$enc=json_encode($rows);
mysql_close($con);
echo $enc;

?>
