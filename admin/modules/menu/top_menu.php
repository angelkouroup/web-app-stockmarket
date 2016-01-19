<!-- Brand and Top Menu Items (toggle) get grouped for better mobile display -->

	<div class="navbar-header">
    	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
        	<span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
         </button>
         <a class="navbar-brand" href=<?php print "?p=main" ?>><img src="../smlogo.png"/></a>
     </div>


     <ul class="nav navbar-right top-nav">

        <li>
                <br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <button class="btn btn-xs btn-success" type="button">Έναρξη / Λήξη Συνεδρίας</button>
        </li>
	              
         <li class="dropdown">
         	<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
            <ul class="dropdown-menu alert-dropdown">
            	<li>
                	<a href="#"> Εντ. Πώλησης <br/><span class="label label-success"> Εκτελέστηκε! </span><p class="small text-muted"><i class="fa fa-clock-o"></i> Σήμερα στις 4:32 Μ.Μ.</p></a>
                </li>
                <li>
                	<a href="#"> Εντ. Αγοράς <br/><span class="label label-success"> Εκτελέστηκε! </span><p class="small text-muted"><i class="fa fa-clock-o"></i> Σήμερα στις 3:21 Μ.Μ.</p></a>
                    
                </li>
                <li>
                	<a href="#"> Εντ. Πώλησης <br/><span class="label label-danger"> Έληξε! </span><p class="small text-muted"><i class="fa fa-clock-o"></i> Σήμερα στις 11:21 Π.Μ.</p></a>
                </li>
                <li>
                    <a href="#"> Εντ. Αγοράς <br/><span class="label label-danger"> Έληξε! </span><p class="small text-muted"><i class="fa fa-clock-o"></i> Σήμερα στις 10:07 Π.Μ.</p></a>
                </li>
                
                <li class="divider"></li>
                	<li>
                    	<a href="#">Προβολή Όλων</a>
                    </li>
            </ul>
         </li>
         
         
         <li class="dropdown">
         	<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php // Set session variables
			echo $_SESSION["username1"];
			?> <b class="caret"></b></a>
            <ul class="dropdown-menu">
            	<li>
                	<a href="#"><i class="fa fa-fw fa-gear"></i> Επεξεργασία Προφίλ</a>
                </li>
                <li class="divider"></li>
                <li>
                	<a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Αποσύνδεση</a>
                </li>
            </ul>
         </li>
     </ul>
	<!-- ./nav navbar-right top-nav -->
