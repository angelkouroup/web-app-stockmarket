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

$username = $_POST['username'];
$pswd = $_POST['pswd'];
$query = "UPDATE users SET pswd = '$pswd', u_name = '$u_name', u_surname = '$u_surname', email = '$email' WHERE username = '$username'";
if(mysql_query($query)){ header("location:index.php?p=cf?msg=failed");} else{ echo "fail";} ?> 