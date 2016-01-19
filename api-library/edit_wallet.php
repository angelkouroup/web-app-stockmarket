<?php
require '../system/dbcon.php';


//Τιμές από την Φόρμα για το Πορτοφόλι
$insert_wallet_action = $_POST['wallet_action'];

//--Στοιχεία Χρήστη
$insert_user_id = $_POST['suserid'];

//--Ποσό
$insert_money = $_POST['money'];

//Εύρεση ποσού στο πορτοφόλι πριν την κατάθεση/ανάληψη
$result = mysql_query("SELECT u_wallet FROM users WHERE user_id=".$insert_user_id);
$row = mysql_fetch_row($result);
$previous_wallet = $row[0];



// ------ Κατάθεση Χρημάτων ------
if ($insert_wallet_action=='in')
{
	$new_wallet = $previous_wallet + $insert_money; 
	$result = mysql_query("UPDATE users SET u_wallet=".$new_wallet." WHERE user_id=".$insert_user_id);
	echo "Η Κατάθεση του Ποσού των ".$insert_money."€, πραγματοποιήθηκε με επιτυχία! \n Νέο Υπόλοιπο στο Πορτοφόλι σας: ".$new_wallet."€";
}

// ------ Ανάληψη Χρημάτων ------
if ($insert_wallet_action=='out')
{
	$new_wallet = $previous_wallet - $insert_money;
	
	if ($new_wallet<0)
	{
		echo "Η Ανάληψη του Ποσού των ".$insert_money."€ δεν μπορεί να πραγματοποιηθεί! \n Στο πορτοφόλι σας έχετε μόνο ".$previous_wallet."€!!!";
		
	}
	elseif ($new_wallet>=0) 
	{
		$result = mysql_query("UPDATE users SET u_wallet=".$new_wallet." WHERE user_id=".$insert_user_id);
		echo "Η Ανάληψη του Ποσού των ".$insert_money."€, πραγματοποιήθηκε με επιτυχία! \n Νέο Υπόλοιπο στο Πορτοφόλι σας: ".$new_wallet."€";
		
	}
}

?>
