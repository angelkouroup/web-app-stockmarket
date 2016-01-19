
  <?php
    $con=mysqli_connect("localhost", "root", "", "soti");
    if (mysqli_connect_errno($con))
    {
        echo "MySql Error: " . mysqli_connect_error();
       }
	       
  ?>
  
  

<!DOCTYPE HTML>
<html>
	<head>
		<title></title>
		<meta charset="UTF-8">
	</head>
	<body id="body-color">
		<fieldset style="width:30%"><legend>LOG-IN HERE</legend>
				<form method="POST" action="index.php">
				User <br><input type="text" name="username" size="40"><br>
				Password <br><input type="password" name="password" size="40"><br>
				<input id="button" type="submit" name="submit" value="Log-In">
				
				</form>
		</fieldset>
	</body>
</html> 




  <?php
  
  if( isset($_POST['username']) && isset($_POST['password'])){
	$user = $_POST['username'];
	$pwd=$_POST['password'];
	$query=mysqli_query($con,"SELECT * FROM users WHERE username='$_POST[username]' && pswd='$_POST[password]'");
    $count=mysqli_num_rows($query);
	//  $row=mysqli_fetch_array($query);
	
		if (isset($_POST['submit'])) 
		{
			if($count==1){
			session_start();
			$_SESSION['username1'] = $_POST['username'];
			$_SESSION['password1'] = $_POST['password'];
			echo "Welcome user \n" . $user;
			}
		else{
			echo "Invalid username or password";
			}   
	   }
   
  }
    mysqli_close($con);
	
	
?>


