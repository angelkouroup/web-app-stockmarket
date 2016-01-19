<?php $_SESSION["user_id"]; ?> 
<script src="../../../api-library/js/stocks.js"></script>
<script>
window.setInterval('refresh()',2000);

function refresh()
{
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() 
	{
    	if (xhttp.readyState == 4 && xhttp.status == 200) 
		{
			loadsales(xhttp.responseText);
   		}
  	};
  	xhttp.open("POST", "../../../api-library/show_sell_orders.php", true);
  	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send('user_id=<?php echo $_SESSION['user_id']; ?>');
} 
</script>

<!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Εντολές Πώλησης
            </h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table id='salestable' class="table table-bordered table-hover table-striped">
                    <!--<thead>
                        <tr>
                            <th>Όνομα</th>
                            <th>Τιμή</th>
                            <th>Κομμάτια</th>
                            <th>Ημ/νία Λήξης Εντολής</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Πώληση μετοχής 1</td>
                            <td>10 &euro;</td>
                            <td>10</td>
                            <td>30/01/2016</td>
                        </tr>
                       <tr>
                            <td>Πώληση μετοχής 2</td>
                            <td>20 &euro;</td>
                            <td>12</td>
                            <td>13/02/2016</td>
                        </tr>
                        <tr>
                            <td>Πώληση μετοχής 3</td>
                            <td>23.7 &euro;</td>
                            <td>19</td>
                            <td>12/03/2016</td>
                        </tr>
                    </tbody>-->
                </table>
            </div>
        </div>
    </div> 