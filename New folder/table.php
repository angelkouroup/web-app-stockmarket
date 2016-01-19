 <!doctype html>
    <html>
    <head>
      <meta charset="UTF-8">
    </head>
    <body>
		
    <?php	 
	$con=mysqli_connect("localhost", "root", "", "soti");
    if (mysqli_connect_errno($con)){
	echo "MySql Error: " . mysqli_connect_error();} 
	$sql = "(SELECT s_price, s_pieces, s_state FROM sales_orders) UNION ALL (SELECT p_price, p_pieces, p_state FROM pur_orders) ";
	
	$result = mysqli_query($con, $sql) or die(mysqli_error($con));
	?>
	<table border="0" style="width:80%; padding:5px; text-align:center;";>
     <thead bgcolor='#F5F5F5'>
		 <tr>
			 <th> Εντολή αγοράς </th>
			 <th> Εντολή πώλησης </th>
			 <th> Κομάτια αγοράς</th>
			 <th> Κομάτια πώλησης</th>
			 <th> Τρέχουσα κατάσταση εντολής αγοράς </th>
			 <th> Τρέχουσα κατάσταση εντολής πώλησης </th>
		 </tr>
	 </thead>
	 <?php
	 if(mysqli_num_rows($result)>0):
		$i=0;
     while($row = mysqli_fetch_array($result)) {
							
			echo "<tr bgcolor='#F5F5F5'>";
			if($i%2 == 0){
					echo "<tr bgcolor='#E5E5E5'>";
				}   $i++;
		  	//foreach($row as $key=>$value) {
			//echo '<td>',$value,'</td>';
			echo "<td>" . $row["p_price"]. "</td>";
			echo "<td>" . $row["s_price"]. "</td>";
			echo"<td>" .$row["p_pieces"]. "</td>";
			echo"<td>" .$row["s_pieces"]. "</td>";
			echo"<td>" .$row["s_state"]. "</td>";
			echo "<td>" .$row["p_state"]. "</td>";
			//}
			echo"</tr>";
	 }
			echo "</table>";
	 
	?>
	
<?php  endif; mysqli_close($con); ?>


 </body>
    </html>




	   
	