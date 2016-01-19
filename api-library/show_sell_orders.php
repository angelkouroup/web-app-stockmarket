<?php
require '../system/dbcon.php';

$user_id2 = $_POST['user_id'];

$result = mysql_query("SELECT t1.sales_id, t1.s_stock_id, t1.s_price, t1.s_pieces, t1.s_state, t1.s_input_date, t1.s_expire_date, t2.stock_name, t2.stock_current_price, t2.stock_previous_price FROM sales_orders t1, stocks t2 WHERE t1.s_stock_id=t2.stock_id AND t1.s_user_id=".$user_id2." ORDER BY t1.s_input_date DESC");


$rows = array();
while($r = mysql_fetch_assoc($result)) 
{
    $rows[] = $r;
}

$enc=json_encode($rows);
mysql_close($con);
echo $enc;

?>
