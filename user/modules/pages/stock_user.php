<?php $_SESSION["user_id"]; ?> 
<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
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
			loaduserstocks(xhttp.responseText);
   		}
  	};
  	xhttp.open("POST", "../../../api-library/show_user_stocks.php", true);
  	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send('user_id=<?php echo $_SESSION['user_id']; ?>');
} 

</script>

        
	
  
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