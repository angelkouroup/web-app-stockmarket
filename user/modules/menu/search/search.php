<?php
session_start(); 
require '../../system/dbcon.php';

$q = $_GET["s"];
$stocks = mysql_query("SELECT * FROM stocks");

//GET ALL USERS FROM DB
//$stocks = db_query("SELECT * FROM stocks"); 
$hint = false;
$response = array();

if (strlen($q)>0) {  
	while($stock = mysql_fetch_array($stocks, MYSQL_ASSOC)) {
	//while($stock = db_while_fetch($stocks)){
		if ($hint = substr($stock['stock_name'], 0, strlen($q)) === $q)
		{
			//an exei kanei login mes ta teleutaia 10 lepta emfanise ton prasino allios kokkino
			array_push($response,$stock['stock_name']);
			//'<a href="user/index.php?p=pr&stock='.$stock['stock_id'].'">'.$stock['stock_name'].'</a>');
		}
	}
}

echo json_encode($response);
?>