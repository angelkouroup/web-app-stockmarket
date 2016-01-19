<?php $_SESSION["user_id"]; ?> 
<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="../../../api-library/js/stocks.js"></script>
<script>
window.setInterval('refresh()',2000);
window.setInterval('refresh3()',3000);
window.setInterval('refresh4()',4000);
window.setInterval('refresh2()',5000);

function refresh()
{
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() 
	{
    	if (xhttp.readyState == 4 && xhttp.status == 200) 
		{
			loadstocks(xhttp.responseText);
   		}
  	};
  	xhttp.open("POST", "../../../api-library/show_stocks.php", true);
  	xhttp.send();
} 

function refresh2()
{
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() 
	{
    	if (xhttp.readyState == 4 && xhttp.status == 200) 
		{
			loaduserstocks(xhttp.responseText);
   		}
  	};
  	xhttp.open("POST", "../../../api-library/show_user_stocks.php", true);
  	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send('user_id=<?php echo $_SESSION['user_id']; ?>');
} 



function refresh3()
{
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() 
	{
    	if (xhttp.readyState == 4 && xhttp.status == 200) 
		{
			loadsum(xhttp.responseText);
   		}
  	};
  	xhttp.open("POST", "../../../api-library/show_user_stocks.php", true);
  	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send('user_id=<?php echo $_SESSION['user_id']; ?>');
} 

function refresh4()
{
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() 
	{
    	if (xhttp.readyState == 4 && xhttp.status == 200) 
		{
			loadwallet(xhttp.responseText);
   		}
  	};
  	xhttp.open("POST", "../../../api-library/show_user_wallet.php", true);
  	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send('user_id=<?php echo $_SESSION['user_id']; ?>');
} 


</script>


<!-- Page Heading -->
	<div class="row">
    	<div class="col-lg-12">
        	<h1 class="page-header">
			Πίνακας Ελέγχου            
            </h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    
    <div class="row">
        <div class="col-lg-4">
        	
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-credit-card fa-4x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div id="swallet" class="huge"></div>
                            <div>To Πορτφόλι μου</div>
                        </div>
                    </div>
                </div>
                
                    <div class="panel-footer">
                    <a href="#katathesi"><span class="pull-left"><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#katathesi">Κατάθεση<br/><i class="fa fa-fw fa-plus"></i></span></button></a>
                    <a href="#analipsi"><span class="pull-right"><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#analipsi">Ανάληψη<br/><i class="fa fa-fw fa-minus"></i></span></button></a>
                        <div class="clearfix"></div>
                    </div>
                
            </div>
 			
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-money fa-4x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div  id="sumstocks" class="huge"></div>
                            <div>Οι Μετοχές μου σε €</div>
                        </div>
                    </div>
                </div>
                <a href="?p=su">
                    <div class="panel-footer">
                        <span class="pull-left">Προβολή των Μετοχών μου<br/>.</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <!-- /.col-lg-4 -->
       
    
    
        <div class="col-lg-4">
    		<div class="panel panel-info">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-shopping-cart fa-4x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">16</div>
                            <div>Ενεργές Εντολές Αγοράς</div>
                        </div>
                    </div>
                </div>
                <a href="?p=po">
                    <div class="panel-footer">
                        <span class="pull-left">Προβολή Όλων των Εντ. Αγοράς <br/>(Ενεργές + Ληγμένες)</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
            
             <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-bookmark fa-4x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">13</div>
                            <div>Ενεργές Εντολές Πώλησης</div>
                        </div>
                    </div>
                </div>
                <a href="?p=so">
                    <div class="panel-footer">
                        <span class="pull-left">Προβολή Όλων των Εντ. Πώλησης<br/> (Ενεργές + Ληγμένες)</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
            
    
        </div>
        <!-- /.col-lg-4 -->
          
	
  <div class="col-lg-4">
            <!--<h2>Μετοχές</h2>-->
            <div class="table-responsive">
                <table id='stockstable' class="table table-bordered table-hover table-striped">
                    <!--<thead>
                        <tr>
                            <th>Όνομα</th>
                            <th>Τιμή</th>
                            <th>Κομμάτια</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Μετοχή 1</td>
                            <td>10 &euro;</td>
                            <td>10</td>
                        </tr>
                       <tr>
                            <td>Μετοχή 2</td>
                            <td>20 &euro;</td>
                            <td>12</td>
                        </tr>
                        <tr>
                            <td>Μετοχή 3</td>
                            <td>23.7 &euro;</td>
                            <td>19</td>
                        </tr>
                    </tbody>-->
                </table>
            </div>
        </div>
    </div>        
    
     <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Οι Μετοχές μου
            </h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table id='userstockstable' class="table table-bordered table-hover table-striped">
                  
                </table>
            </div>
        </div>       