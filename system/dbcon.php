<?php
$con = mysql_connect("localhost","dbastma","12345");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

if (!mysql_select_db('stma_db')) {
	echo 'wrong db';};
	
mysql_query("SET NAMES 'utf8'", $con);
mysql_query("SET CHARACTER SET 'utf8'", $con);	

/*

$mysqli = new mysqli('localhost','dbastma','12345','stma_db');
//$con = mysqli_connect("localhost","dbastma","12345","stma_db");

$mysqli->set_charset('utf-8');
$mysqli->query("SET CHARACTER SET 'utf8'");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }


*/

?>
