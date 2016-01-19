

<!-- Brand and Login get grouped for better mobile display -->

	<div class="navbar-header">
		<a class="navbar-brand" href=<?php print "?p=#" ?>>Web app Stockmarket</a>
	          
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse" >
			<span class="sr-only">Toggle navigation</span>
			Σύνδεση
			<span class="fa fa-sign-in"></span>                    
		</button>
    </div>
    <!-- /.navbar-header -->            
	
    <div class="collapse navbar-collapse navbar-ex1-collapse">            

		<ul class="nav navbar-right top-nav-login">  
    		
            <!-- Login form -->
    		<form  class="form-inline" action="check.php" method='post'>
            			<div class="form-group">
    				<label class="sr-only" for="exampleInputEmail3">Email address</label>
    				<input type="text" name="username" class="form-control" id="exampleInputEmail3" placeholder="Όνομα Χρήστη">
  				</div>
            	<div class="form-group">
            		<label class="sr-only" for="exampleInputPassword3">Password</label>
            		<input type="password" name="password" class="form-control" id="exampleInputPassword3" placeholder="Κωδικός">
            	</div>
            	<div class="checkbox">
            		<label>
            			<input type="checkbox"> Να με θυμάσαι
            		</label>
            	</div>
				<p> Forgot your Password? 
				<a href="forgotpswd.php"> Click here..</a>
				</p>
              	<button type="submit"name='submit' value='submit' class="btn btn-default">Σύνδεση</button>
        	    <?php
					if (isset($_GET["msg"]) && $_GET["msg"] == 'failed') {
							echo "Wrong Username / Password";
					}
?>

            </form>
    
    	</ul>

	</div>               
	<!-- /.collapse navbar-collapse navbar-ex2-collapse -->