<?php
require '../system/dbcon.php';

$user_id = $_POST['user_id'];

$result = mysql_query("SELECT u_wallet, u_wallet2 FROM users WHERE user_id=".$user_id);


$rows = array();
while($r = mysql_fetch_assoc($result)) 
{
    $rows[] = $r;
}

$enc=json_encode($rows);
mysql_close($con);
echo $enc;

?>
