<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="../bootstrap/js/bootstrap-datepicker.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('.datepicker').datepicker({
            //dateFormat: "dd-mm-yyyy",
			dateFormat: "yyyy-mm-dd",
            changeMonth: true,
            changeYear: true,
            beforeShow: function() { 
                $('#ui-datepicker-div').addClass('datepicker');
              }
        });
    });
</script>
    
<script>

function buystocks()
{
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() 
	{
    	if (xhttp.readyState == 4 && xhttp.status == 200) 
		{
			alert(xhttp.responseText);
			//alert('Η Εντολή Αγοράς Καταχωρήθηκε!');
   		}
  	};
  	xhttp.open("POST", "../../../api-library/new_order.php", true);
  	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	sendstr='stockid='+$('#bstockid').val()+'&price='+$('#bprice').val()+'&pieces='+$('#bpieces').val()+'&suserid='+$('#buserid').val()+'&ordertype='+$('#bordertype').val();
	xhttp.send(sendstr);
	$('#nea_entolh_agoras').modal('toggle')
}
 
</script>


<script>

function sellstocks()
{
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() 
	{
    	if (xhttp.readyState == 4 && xhttp.status == 200) 
		{
			alert(xhttp.responseText);
			//alert('Η Εντολή Πώλησης Καταχωρήθηκε!');
   		}
  	};
  	xhttp.open("POST", "../../../api-library/new_order.php", true);
  	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	sendstr='stockid='+$('#sstockid').val()+'&price='+$('#sprice').val()+'&pieces='+$('#spieces').val()+'&suserid='+$('#suserid').val()+'&ordertype='+$('#sordertype').val();
	xhttp.send(sendstr);
	$('#nea_entolh_polhshs').modal('toggle')
} 

</script>

<script>

function moneyin()
{
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() 
	{
    	if (xhttp.readyState == 4 && xhttp.status == 200) 
		{
			alert(xhttp.responseText);
   		}
  	};
  	xhttp.open("POST", "../../../api-library/edit_wallet.php", true);
  	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	sendstr='money='+$('#inmoney').val()+'&suserid='+$('#insuserid').val()+'&wallet_action='+$('#inwallet_action').val();
	xhttp.send(sendstr);
	$('#katathesi').modal('toggle')
} 

</script>

<script>

function moneyout()
{
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() 
	{
    	if (xhttp.readyState == 4 && xhttp.status == 200) 
		{
			alert(xhttp.responseText);
   		}
  	};
  	xhttp.open("POST", "../../../api-library/edit_wallet.php", true);
  	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	sendstr='money='+$('#outmoney').val()+'&suserid='+$('#outsuserid').val()+'&wallet_action='+$('#outwallet_action').val();
	xhttp.send(sendstr);
	$('#analipsi').modal('toggle')
} 

</script>

<!-- Modal gia entoli agoras-->
<div class="modal fade" id="nea_entolh_agoras" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Κλείσιμο</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">
                     Νέα Εντολή Αγοράς
                </h4>
            </div>
            
            <!-- Modal Body -->
            
            <form role="form">
            	<div class="modal-body">
                   
                	<div class="form-group">
                    	<label for="metoxh">Μετοχή</label>
                      	<select name="stockid" class="form-control" id="bstockid">
                        <?php  
                        	$result = mysql_query("SELECT * FROM stocks ORDER BY stock_name");
						
							echo '<option selected value="no"> -- Επιλέξτε μετοχή -- </option>';
							
							while($row = mysql_fetch_array($result, MYSQL_ASSOC))
							{
								echo '<option value="'.$row['stock_id'].'"> '.$row['stock_name'].' </option>';
							} ?>
                      	</select>
                  	</div>

                	<div class="form-group">
                    	<label for="exampleInputTimi"> Τιμή</label>
                      	<input type="text" name="price" class="form-control" id="bprice" placeholder="Εισαγωγή τιμής"/>
                  	</div>
                  
                  	<div class="form-group">
                    	<label for="exampleInputPieces"> Κομμάτια</label>
                      	<input type="text" name="pieces" class="form-control" id="bpieces" placeholder="Εισαγωγή τεμαχίων"/>
                  	</div>
                  
                  	<div class="form-group">
                    	<label for="exampleInputPieces"> Ημερομηνία λήξης εντολής</label>
                    	<input type="date" name="expiredate"  class="datepicker" id="bexpiredate" placeholder="Επιλέξτε ημερομηνία" />
                  	</div>
              			<input type="hidden" name="ordertype" id="bordertype" value="buy" />
                    	<input type="hidden" name="suserid" id="buserid" value="<?php echo $_SESSION["user_id"]; ?>" /> 
                
            		</div>
            
            		<!-- Modal Footer -->
            		<div class="modal-footer">
                		<button type="button" class="btn btn-default" data-dismiss="modal">Ακύρωση</button>
                		<button type="button" class="btn btn-primary" onclick="buystocks()">Καταχώρηση</button>
            		</div>
     	    </form>   
        </div>
    </div>
</div>

<!-- modal gia entoli pwlhshs -->
<div class="modal fade" id="nea_entolh_polhshs" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Κλείσμο</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">
                     Νέα Εντολή Πώλησης
                </h4>
            </div>
            
            <!-- Modal Body -->
            
            <form role="form">
            	<div class="modal-body">
                   
                	<div class="form-group">
                    	<label for="metoxh">Μετοχή</label>
                      	<select name="stockid" class="form-control" id="sstockid">
                        <?php   //echo $_SESSION["user_id"];
                        	//$result = mysql_query("SELECT * FROM stocks t1, pur_orders t2, match t3 WHERE t1.stock_id=t2.p_stock_id AND t2.p_user_id=".$_SESSION["user_id"]." AND ORDER BY stock_name");
						
							$result = mysql_query("SELECT st.stock_id, st.stock_name, SUM(mp.m_pieces)-SUM(ms.m_pieces) as pieces, st.stock_current_price, (SUM(mp.m_pieces)-SUM(ms.m_pieces))*st.stock_current_price as total FROM `match` mp, `pur_orders` p, `match` ms,`sales_orders` s, `stocks` st WHERE mp.m_pur_id=p.pur_id AND p.p_user_id=s.s_user_id AND ms.m_sales_id=s.sales_id AND s.s_user_id=2 AND mp.m_stock_id=ms.m_stock_id AND mp.m_stock_id=st.stock_id GROUP BY mp.m_stock_id");
							
							echo '<option selected value="no"> -- Επιλέξτε μετοχή -- </option>';
							
							while($row = mysql_fetch_array($result, MYSQL_ASSOC))
							{
								echo '<option value="'.$row['stock_id'].'"> '.$row['stock_name'].' </option>';
							} ?>
                      	</select>
                  	</div>

                	<div class="form-group">
                    	<label for="exampleInputTimi"> Τιμή</label>
                      	<input type="text" name="price" class="form-control" id="sprice" placeholder="Εισαγωγή τιμής"/>
                  	</div>
                  
                  	<div class="form-group">
                    	<label for="exampleInputPieces"> Κομμάτια</label>
                      	<input type="text" name="pieces" class="form-control" id="spieces" placeholder="Εισαγωγή τεμαχίων"/>
                  	</div>
                  
                  	<div class="form-group">
                    	<label for="exampleInputPieces"> Ημερομηνία λήξης εντολής</label>
                    	<input type="date" name="expiredate"  class="datepicker" id="sexpiredate" placeholder="Επιλέξτε ημερομηνία" />
                  	</div>
              			<input type="hidden" name="ordertype" id="sordertype" value="sell" />
                    	<input type="hidden" name="suserid" id="suserid" value="<?php echo $_SESSION["user_id"]; ?>" /> 
                
            		</div>
            
            		<!-- Modal Footer -->
            		<div class="modal-footer">
                		<button type="button" class="btn btn-default" data-dismiss="modal">Ακύρωση</button>
                		<button type="button" class="btn btn-primary" onclick="sellstocks()">Καταχώρηση</button>
            		</div>
     	    </form>   
        </div>
    </div>
</div>

<!-- Modal gia katathesi posou -->
<div id="katathesi" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Εντολή Κατάθεσης</h4>
        </div>
        <form role="form">
        <div class="modal-body">
        	<div class="form-group">
            	<label for="exampleInputTimi">Ποσό προς κατάθεση σε €</label>
                <input type="text" name="money" class="form-control" id="inmoney" placeholder="Δώστε το επιθυμητό ποσό σε €"/>
            </div>
        	<input type="hidden" name="wallet_action" id="inwallet_action" value="in" />
            <input type="hidden" name="suserid" id="insuserid" value="<?php echo $_SESSION["user_id"]; ?>" /> 
        </div>
		 <!-- Modal Footer -->
      	<div class="modal-footer">
       		<button type="button" class="btn btn-default" data-dismiss="modal">Ακύρωση</button>
       		<button type="button" class="btn btn-primary" onclick="moneyin()">Εκτέλεση Κατάθεσης</button>
     	</div>
     </form>   
    </div>

  </div>
</div>  

<!-- Modal gia analipsi posou-->
<div id="analipsi" class="modal fade" role="dialog">
  <div class="modal-dialog">

     <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Εντολή Ανάληψης</h4>
        </div>
        <form role="form">
        <div class="modal-body">
        	<div class="form-group">
            	<label for="exampleInputTimi">Ποσό προς ανάληψη σε €</label>
                <input type="text" name="money" class="form-control" id="outmoney" placeholder="Δώστε το επιθυμητό ποσό σε €"/>
            </div>
        	<input type="hidden" name="wallet_action" id="outwallet_action" value="out" />
            <input type="hidden" name="suserid" id="outsuserid" value="<?php echo $_SESSION["user_id"]; ?>" /> 
        </div>
		 <!-- Modal Footer -->
      	<div class="modal-footer">
       		<button type="button" class="btn btn-default" data-dismiss="modal">Ακύρωση</button>
       		<button type="button" class="btn btn-primary" onclick="moneyout()">Εκτέλεση Ανάληψης</button>
     	</div>
     </form>   
    </div>

  </div>
</div>  
            