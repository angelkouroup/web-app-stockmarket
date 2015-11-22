<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Stockmarket</title>

    <!-- Bootstrap Core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="bootstrap/css/custom.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="bootstrap/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"> 

</head>

<body>

    <div id="wrapper-login">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        	
            <!-- Brand and login get grouped for better mobile display -->
            <?php require "modules/login/top_login.php"; ?>
         
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">
            
				<!-- Welcome page and registration form -->
				<?php require "modules/register/default.php"; ?>
	
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper-login -->

    <!-- jQuery -->
    <script src="bootstrap/js/jquery.js"></script>  

    <!-- Bootstrap Core JavaScript -->
    <script src="bootstrap/js/bootstrap.min.js"></script> 

</body>

</html>