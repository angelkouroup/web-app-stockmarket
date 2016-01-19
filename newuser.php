<?php
require '/system/dbcon.php';

$_POST[username];
$_POST[kwdikos];
$_POST[email];
$_POST[onoma];
$_POST[epitheto];
//Kataxwrisi sto Database

$result = mysql_query("INSERT INTO users (`user_id`, `username`, `pswd`, `email`, `u_name`, `u_surname`, `u_register_date`, `u_last_date`, `u_type`, `u_wallet`, `u_wallet2`) VALUES (0, '$_POST[username]', '$_POST[kwdikos]', '$_POST[email]', '$_POST[onoma]', '$_POST[epitheto]', NOW(), NOW(), 0, 0, 0)");

echo mysql_error();
//  ".$insert_s_expire_date.")");
//$sql = "INSERT INTO users (user_id, username, pswd, email, u_name, u_surname, u_register_date, u_lasta_date, u_type, u_wallet) VALUES (0, '$_POST[username]', '$_POST[kwdikos]', '$_POST[email]', '$_POST[onoma]', '$_POST[epitheto]', NOW(), NOW(), 0, 0)";


/*if ($conn->query($sql) === TRUE) {
    echo "";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();*/
?>
<?php
if(isset($_POST)){
header("location:../../index.php?msg=failed");
    }
?>