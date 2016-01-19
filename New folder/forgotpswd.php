
<html>
<head>
<style type="text/css">
 input{
 border:1px solid olive;
 border-radius:5px;
 }
 h1{
  color:darkgreen;
  font-size:22px;
  text-align:center;
 }

</style>
</head>
<body>
<h2 style="text-align:center;"> Please enter your email..</h2>
<form action='#' method='post'>
<table cellspacing='5' align='center'>
<tr><td>Email:</td><td><input type='text' name='email'/></td></tr>
<tr><td></td><td><input type='submit' name='submit' value='Submit'/></td></tr>
</table>
</form>


<?php 
session_start();
$con = mysqli_connect("localhost","dbastma","12345");
if (!$con)
  { die('Could not connect: ' . mysql_error());
  }if (!mysql_select_db('stma_db')) {
    echo 'wrong db';
	}

if(isset($_POST['submit'])){

	$mail=$_POST['email'];
 	$sql = "SELECT * FROM users where email='".$mail."' ";
	$result = mysqli_query($con, $sql) or die(mysqli_error($con));
	//$count=mysqli_num_rows($result);
	if(mysqli_num_rows($result)>0){	
		$rows=mysqli_fetch_array($result);
        $pass  =  $rows['pswd'];
        $to = $rows['email'];
		//Details for sending E-mail
        $from = "Stockmarket";
		$to=$rows['email'];  
		$message='Your password : '.$rows['pswd'];
		$from = "info@stockmarket.angelkouroup.gr";
		$subject = "Remind password";
		$headers1 = "From: $from\n";
		$headers1 .= "Content-type: text/html;charset=iso-8859-1\r\n";
	    $headers1 .= "X-Priority: 1\r\n";
	    $headers1 .= "X-MSMail-Priority: High\r\n";
	    $headers1 .= "X-Mailer: Just My Server\r\n";
		
		  if(mail ( $to, $subject, $message, $headers1 )){
				echo'Check your inbox in mail';
				exit();
			}else{
				echo'mail is not send';
				exit();
			}          
		}else{
		echo 'Not found your email in our database! Please sign up!!';
		}
}
		
	?>
</body>
</html>