<?php $_SESSION["user_id"]; ?> 
<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="../admin/modules/js/admin.js"></script>
<script>
window.setInterval('refresh()',2000);

function refresh()
{
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() 
	{
    	if (xhttp.readyState == 4 && xhttp.status == 200) 
		{
			loadusers(xhttp.responseText);
   		}
  	};
  	xhttp.open("POST", "../admin/modules/library/show_users.php", true);
  	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  	xhttp.send();
} 
</script>

<!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Χρήστες
            </h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table id='userstable' class="table table-hover table-striped">
                
                </table>
            </div>
        </div>
    </div> 