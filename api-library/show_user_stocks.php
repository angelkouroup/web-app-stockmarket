<?php
require '../system/dbcon.php';

$user_id = $_POST['user_id'];

$result = mysql_query("SELECT st.stock_name, SUM(mp.m_pieces)-SUM(ms.m_pieces) as pieces, st.stock_current_price, (SUM(mp.m_pieces)-SUM(ms.m_pieces))*st.stock_current_price as total FROM `match` mp, `pur_orders` p, `match` ms,`sales_orders` s, `stocks` st WHERE mp.m_pur_id=p.pur_id AND p.p_user_id=s.s_user_id AND ms.m_sales_id=s.sales_id AND s.s_user_id=2 AND mp.m_stock_id=ms.m_stock_id AND mp.m_stock_id=st.stock_id GROUP BY mp.m_stock_id");


$rows = array();
while($r = mysql_fetch_assoc($result)) 
{
    $rows[] = $r;
}

$enc=json_encode($rows);
mysql_close($con);
echo $enc;

?>
