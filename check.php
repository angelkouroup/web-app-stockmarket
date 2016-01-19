<?php
// Start the session
session_start();
?>
<?php
require 'system/dbcon.php';
       
  ?>

<?php
  
  if( isset($_POST['username']) && isset($_POST['password'])){
	$user = $_POST['username'];
	$pwd=$_POST['password'];
	$result = mysql_query("SELECT * FROM users WHERE username='$_POST[username]' && pswd='$_POST[password]'");
	//$query=mysqli_query($con,"SELECT * FROM users WHERE username='$_POST[username]' && pswd='$_POST[password]'");
    $count=mysql_num_rows($result);
	//$row=mysqli_fetch_array($query);
	
		if (isset($_POST['submit'])) 
		{
			if($count==1)
			{
				
				while($row = mysql_fetch_array($result, MYSQL_ASSOC))
				{
					$userid = $row['user_id'];
					$usertype = $row['u_type'];
				}
                
                
	
				session_start();
				$_SESSION['username1'] = $_POST['username'];
				$_SESSION['user_id'] = $userid;
            	$_SESSION['u_type'] = $usertype;
			    
                if ($usertype=='0')
               	{ 
                    header("location:user/index.php");
                }
                elseif (($usertype=='1') || ($usertype=='2'))
                {
                    header("location:admin/index.php");
                }
                
                
			}
		else{
			header("location:index.php?msg2=failed");

			}   
	   }
   
  }
    mysqli_close($con);


?>

