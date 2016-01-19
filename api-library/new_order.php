<?php
require '../system/dbcon.php';


//Τιμές από την Φόρμα Εντολής Πώλησης ή Αγοράς
$insert_orderType = $_POST['ordertype'];

//--Στοιχεία Χρήστη
$insert_user_id = $_POST['suserid'];

//--Στοιχεία Μετοχής
//$insert_stock_name = $_POST['stockName'];
$insert_stock_id = $_POST['stockid'];

//--Στοιχεία Εντολής
$insert_price = $_POST['price'];
$insert_pieces = $_POST['pieces'];
$st='0';
$insert_expire_date = '0000-00-00';



// ------ Αν η Εντολή είναι Πώλησης ------
if ($insert_orderType=='sell')
{

	//Εισαγωγή εντολής πώλησης στον πίνακα sales_orders
	$result = mysql_query("INSERT INTO sales_orders (`sales_id`, `s_user_id`, `s_stock_id`, `s_price`, `s_pieces`, `s_state`, `s_input_date`, `s_expire_date`) VALUES (0, ".$insert_user_id.", ".$insert_stock_id.", ".$insert_price.", ".$insert_pieces.", ".$st.", NOW(), ".$insert_expire_date.")");
	
	$insert_sales_id = mysql_insert_id();

	//Εμφάνιση (select) & Έλεγχος (if) αν υπάρχει εντολή αγοράς (ενεργή και όχι ολοκληρωμένη ή εκτελεσμένη) στον πίνακα 	pur_orders για την ίδια μετοχή που δίνεται στην εντολή πώλησης
	$result = mysql_query("SELECT * FROM pur_orders WHERE p_state<>2 AND p_state<>3 AND p_stock_id=".$insert_stock_id." AND p_user_id<>".$insert_user_id." ORDER BY p_input_date");
	$num_rows = mysql_num_rows($result);
	//echo '3 - table rows: '.$num_rows.'<br/>';

	if ($num_rows!=0) 
	{
		while($row = mysql_fetch_array($result, MYSQL_ASSOC))
		{
			$result_pur_id = $row['pur_id'];
			$result_p_price = $row['p_price'];
			$result_p_pieces = $row['p_pieces'];
			$result_p_user = $row['p_user_id'];
			
		  
			//0 - Απόλυτο match εντολών: αριθμός μετοχών εντολής πώλησης = αριθμός μετοχών εντολής αγοράς
			if (($insert_price <= $result_p_price) && ($insert_pieces == $result_p_pieces))  
			{
				//Ενημέρωση κατάστασης εντολών αγοράς και πώλησης
				updateOrders("pur_orders","3",$result_p_pieces,$result_pur_id);
				updateOrders("sales_orders","3",$result_p_pieces,$insert_sales_id);
			
				//Εισαγωγή αγοροπωλησίας στον πίνακα match & 
				//Ενημέρωση τιμής μετοχής μετά την αγοροπωλησία (παίρνει την τιμή της εντολής αγοράς)
				Match($result_pur_id,$insert_sales_id,$insert_stock_id,$result_p_pieces,$result_p_price);
				//Ενημέρωση Πορτοφολιών (δεσμευμένων για τον αγοραστή)
	      		updatewallet($insert_user_id,$result_p_user,$result_p_pieces,$result_p_price);
		  		
				break;
			}
		
			//1 - Μερικό match εντολών: αριθμός μετοχών εντολής πώλησης > αριθμός μετοχών εντολής αγοράς
			if (($insert_price <= $result_p_price) && ($insert_pieces > $result_p_pieces))  
			{
				$s_pieces_left = $insert_pieces - $result_p_pieces;
				//***tha mporousa na to midenizw $result_p_pieces
			
				//Ενημέρωση κατάστασης εντολών αγοράς και πώλησης
				updateOrders("pur_orders","3",$result_p_pieces,$result_pur_id);
				updateOrders("sales_orders","1",$s_pieces_left,$insert_sales_id);
			
				//Εισαγωγή αγοροπωλησίας στον πίνακα match & 
				//Ενημέρωση τιμής μετοχής μετά την αγοροπωλησία (παίρνει την τιμή της εντολής αγοράς)
				Match($result_pur_id,$insert_sales_id,$insert_stock_id,$result_p_pieces,$result_p_price);
				//Ενημέρωση Πορτοφολιών (δεσμευμένων για τον αγοραστή)
	      		updatewallet($insert_user_id,$result_p_user,$result_p_pieces,$result_p_price);
		  
			}
		
			//2 - Μερικό match εντολών: αριθμός μετοχών εντολής πώλησης < αριθμός μετοχών εντολής αγοράς
			if (($insert_price <= $result_p_price) && ($insert_pieces < $result_p_pieces))  
			{
				$p_pieces_left = $result_p_pieces - $insert_pieces;
				//***tha mporousa na to midenizw $insert_pieces
			
				//Ενημέρωση κατάστασης εντολών αγοράς και πώλησης
				updateOrders("pur_orders","1",$p_pieces_left,$result_pur_id);
				updateOrders("sales_orders","3",$insert_pieces,$insert_sales_id);
			
				//Εισαγωγή αγοροπωλησίας στον πίνακα match & 
				//Ενημέρωση τιμής μετοχής μετά την αγοροπωλησία (παίρνει την τιμή της εντολής αγοράς)
				Match($result_pur_id,$insert_sales_id,$insert_stock_id,$insert_pieces,$result_p_price);
				//Ενημέρωση Πορτοφολιών (δεσμευμένων για τον αγοραστή)
	      		updatewallet($insert_user_id,$result_p_user,$result_p_pieces,$result_p_price);
		  
			}
		  }
		
		}
	
	echo 'Η Εντολή Πώλησης Καταχωρήθηκε!';
}


// ------ Αν η Εντολή είναι Αγοράς ------
if ($insert_orderType=='buy')
{
  //Έλενχος αν το πορτοφόλι του επίδοξου αγοραστή είναι αρκετό για να καταχωρηθεί η εντολή - αν είναι τότε γίνεται δέσμευση των χρημάτων
  if (checkcommitwallet($insert_user_id,$insert_pieces,$insert_price)==true)
  {	  

	//Εισαγωγή εντολής αγοράς στον πίνακα pur_orders
	$result = mysql_query("INSERT INTO pur_orders (`pur_id`, `p_user_id`, `p_stock_id`, `p_price`, `p_pieces`, `p_state`, `p_input_date`, `p_expire_date`) VALUES (0, ".$insert_user_id.", ".$insert_stock_id.", ".$insert_price.", ".$insert_pieces.", ".$st.", NOW(), ".$insert_expire_date.")");

	$insert_pur_id = mysql_insert_id();

	//Εμφάνιση (select) & Έλεγχος (if) αν υπάρχει εντολή πώλησης (ενεργή και όχι ολοκληρωμένη ή εκτελεσμένη) στον πίνακα 	sales_orders για την ίδια μετοχή που δίνεται στην εντολή αγοράς
	$result = mysql_query("SELECT * FROM sales_orders WHERE s_state<>2 AND s_state<>3 AND s_stock_id=".$insert_stock_id." AND s_user_id<>".$insert_user_id." ORDER BY s_input_date");
	$num_rows = mysql_num_rows($result);
	//echo '3 - table rows: '.$num_rows.'<br/>';

	if ($num_rows!=0) 
	{
		while($row = mysql_fetch_array($result, MYSQL_ASSOC))
		{
			$result_sales_id = $row['sales_id'];
			$result_s_price = $row['s_price'];
			$result_s_pieces = $row['s_pieces'];
			$result_s_user = $row['s_user_id'];
			
		
			//0 - Απόλυτο match εντολών: αριθμός μετοχών εντολής πώλησης = αριθμός μετοχών εντολής αγοράς
			if (($insert_price >= $result_s_price) && ($insert_pieces == $result_s_pieces))  
			{
				//Ενημέρωση κατάστασης εντολών αγοράς και πώλησης
				updateOrders("pur_orders","3",$result_s_pieces,$insert_pur_id);
				updateOrders("sales_orders","3",$result_s_pieces,$result_sales_id);
			
				//Εισαγωγή αγοροπωλησίας στον πίνακα match & 
				//Ενημέρωση τιμής μετοχής μετά την αγοροπωλησία (παίρνει την τιμή της εντολής αγοράς)
				Match($insert_pur_id,$result_sales_id,$insert_stock_id,$result_s_pieces,$result_s_price);
				updatewallet($result_s_user,$insert_user_id,$result_s_pieces,$result_s_price);		
				break;
			}
		
			//1 - Μερικό match εντολών: αριθμός μετοχών εντολής πώλησης > αριθμός μετοχών εντολής αγοράς
			if (($insert_price >= $result_s_price) && ($insert_pieces < $result_s_pieces))  
			{
				$s_pieces_left = $result_s_pieces - $insert_pieces;
				//***tha mporousa na to midenizw $result_p_pieces
			
				//Ενημέρωση κατάστασης εντολών αγοράς και πώλησης
				updateOrders("pur_orders","3",$insert_pieces,$insert_pur_id);
				updateOrders("sales_orders","1",$s_pieces_left,$result_sales_id);
			
				//Εισαγωγή αγοροπωλησίας στον πίνακα match & 
				//Ενημέρωση τιμής μετοχής μετά την αγοροπωλησία (παίρνει την τιμή της εντολής αγοράς)
				Match($insert_pur_id,$result_sales_id,$insert_stock_id,$insert_pieces,$insert_price);
				updatewallet($result_s_user,$insert_user_id,$insert_pieces,$insert_price);
			}
		
			//2 - Μερικό match εντολών: αριθμός μετοχών εντολής πώλησης < αριθμός μετοχών εντολής αγοράς
			if (($insert_price >= $result_s_price) && ($insert_pieces > $result_s_pieces))  
			{
				$p_pieces_left = $insert_pieces - $result_s_pieces;
				//***tha mporousa na to midenizw $result_s_pieces
			
				//Ενημέρωση κατάστασης εντολών αγοράς και πώλησης
				updateOrders("pur_orders","1",$p_pieces_left,$insert_pur_id);
				updateOrders("sales_orders","3",$result_s_pieces,$result_sales_id);
			
				//Εισαγωγή αγοροπωλησίας στον πίνακα match & 
				//Ενημέρωση τιμής μετοχής μετά την αγοροπωλησία (παίρνει την τιμή της εντολής αγοράς)
				Match($insert_pur_id,$result_sales_id,$insert_stock_id,$result_s_pieces,$insert_price);
				updatewallet($result_s_user,$insert_user_id,$result_s_pieces,$insert_price);
			}
		
		}
	}
  	echo 'Η Εντολή Αγοράς Καταχωρήθηκε!';
  }
  else
  {
	echo 'Δεν είναι αρκετά τα χρήματα σας για την Καταχώρηση της παρούσας Ενοτλής Αγοράς!';
  }
}




//*****FUNCTIONS**********

//Ενημέρωση κατάστασης εντολών αγοράς και πώλησης
function updateOrders($table,$state,$pieces,$id)
{
	$pieces2=(int)$pieces;
	$id2=(int)$id;
		
	if ($table=='pur_orders')
	{
		$result = mysql_query("UPDATE pur_orders SET p_state=".$state.", p_pieces=".$pieces2." WHERE pur_id=".$id2);
	}
	
	if ($table=='sales_orders')
	{
		$result = mysql_query("UPDATE sales_orders SET s_state=".$state.", s_pieces=".$pieces2." WHERE sales_id=".$id2);
	}
}

//Εισαγωγή αγοροπωλησίας στον πίνακα match & 
//Ενημέρωση τιμής μετοχής μετά την αγοροπωλησία (παίρνει την τιμή της εντολής αγοράς)
function Match($mpid,$msid,$mstid,$mpi,$mpr)
{
	$mpid2=(int)$mpid;
	$msid2=(int)$msid;
	$mstid2=(int)$mstid;
	$mpi2 =(float)$mpi;
	$mpr2=(float)$mpr;
	
	$result = mysql_query("INSERT INTO `match` (`match_id`, `m_pur_id`, `m_sales_id`, `m_stock_id`, `m_pieces`, `m_date`, `m_price`) VALUES (0, ".$mpid2.", ".$msid2.", ".$mstid2.", ".$mpi2.", NOW(), ".$mpr2.")");
	 
	
	//Εύρεση τρέχουσας τιμής πριν το match για την ενημέρωση του πεδίου με την προηγούμενη τιμή της μετοχής
	$result = mysql_query("SELECT stock_current_price FROM stocks WHERE stock_id=".$mstid2);
	$row = mysql_fetch_row($result);
	$previous_price = $row[0]; 
	
	//Ενημέρωση τρέχουσας τιμής μετοχής με την νέα
	$result = mysql_query("UPDATE stocks SET stock_current_price=".$mpr2.", stock_previous_price=".$previous_price.", stock_last_update=NOW() WHERE stock_id=".$mstid2);
	
	
}



//Έλεγχος αν το πορτοφόλι του αγοραστή είναι αρκετο για να εκτελεστεί η εντολή αγοράς (η αγοραπωλησία) 
//--> αν ναι...  ενημερώνονται τα πορτοφόλια και των 2 χρηστών
function updatewallet($idforsal,$idforpur,$mpieces,$mprice)
{
	
	$idforsal2=(int)$idforsal;
	$idforpur2=(int)$idforpur;
	$mpieces2 =(int)$mpieces;
	$mprice2=(float)$mprice;
	
	//κόστος σε € της αγοραπωλησίας
	$money2 = $mpieces2 * $mprice2;
	$money=(float)$money2;
	
	//δεσμευμένα αγοραστή - pur user
	$result = mysql_query("SELECT u_wallet2 FROM users WHERE user_id=".$idforpur2);
	$row = mysql_fetch_row($result);
	$wallet2_pur = $row[0];
	$wallet2_pur2=(float)$wallet2_pur;
	
	//ενημέρωση δεσμευμένων αγοραστή - update wallet2 - pur user
	$new_wallet2_pur = $wallet2_pur2 - $money;
	$result2 = mysql_query("UPDATE users SET u_wallet2=".$new_wallet2_pur." WHERE user_id=".$idforpur2);
		
	//πορτοφόλι πωλητή - sale user
	$result3 = mysql_query("SELECT u_wallet FROM users WHERE user_id=".$idforsal2);
	$row3 = mysql_fetch_row($result3);
	$wallet_sal = $row3[0];
	$wallet_sal2=(float)$wallet_sal;
		
	//ενημέρωση πορτοφόλι πωλητή - update wallet - sale user
	$new_wallet_sal = $wallet_sal2 + $money;
	$result4 = mysql_query("UPDATE users SET u_wallet=".$new_wallet_sal." WHERE user_id=".$idforsal2);
	
	

}

function checkcommitwallet($idpur,$pieces,$price)
{
	$idpur2=(int)$idpur;
	$pieces2 =(int)$pieces;
	$price2=(float)$price;
	
	//κόστος εντολής αγοράς σε €
	$money_order2 = $pieces2 * $price2;
	$money_order=(float)$money_order2;
	
	//πορτοφόλι αγοραστή
	$result = mysql_query("SELECT u_wallet FROM users WHERE user_id=".$idpur2);
	$row = mysql_fetch_row($result);
	$wallet_user_pur = $row[0];
	$wallet_user_pur2=(float)$wallet_user_pur;
	
	if ($wallet_user_pur2 >= $money_order)
	{
		//δεσμευμένα χρήματα αγοραστή
		$result2 = mysql_query("SELECT u_wallet2 FROM users WHERE user_id=".$idpur2);
		$row2 = mysql_fetch_row($result2);
		$wallet_com = $row2[0];
		$wallet_com2=(float)$wallet_com;
		
		//ενημέρωση πορτοφολιού και δεσμευμένων χρηματων αγοραστή
		$new_wallet_com = $wallet_com2 + $money_order;
		$new_wallet = $wallet_user_pur2 - $money_order;
		$result4 = mysql_query("UPDATE users SET u_wallet=".$new_wallet.", u_wallet2=".$new_wallet_com."  WHERE user_id=".$idpur2);
		return true;
	}
	else
	{
		return false;
	}
}
?>