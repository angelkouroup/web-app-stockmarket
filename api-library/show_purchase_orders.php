<?php
require '../system/dbcon.php';

$user_id2 = $_POST['user_id'];

$result = mysql_query("SELECT t1.pur_id, t1.p_stock_id, t1.p_price, t1.p_pieces, t1.p_state, t1.p_input_date, t1.p_expire_date, t2.stock_name, t2.stock_current_price, t2.stock_previous_price FROM pur_orders t1, stocks t2 WHERE t1.p_stock_id=t2.stock_id AND t1.p_user_id=".$user_id2." ORDER BY t1.p_input_date DESC");


$rows = array();
while($r = mysql_fetch_assoc($result)) 
{
    $rows[] = $r;
}

$enc=json_encode($rows);
mysql_close($con);
echo $enc;

?>
