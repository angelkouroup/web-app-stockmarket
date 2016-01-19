<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>User Pages - Stockmarket</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../bootstrap/css/bootstrap-datepicker.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../bootstrap/css/custom.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bootstrap/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"> 
    
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        	
            <!-- Brand and Top Menu Items (toggle) get grouped for better mobile display -->
            <?php require "modules/menu/top_menu.php"; ?>
            
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <?php require "modules/menu/sidebar_menu.php"; ?>
                
        </nav>

        <!-- Main Content - Pages -->
        <div id="page-wrapper">

            <div class="container-fluid">
			
				<?php 
                
                $p=$_REQUEST['p'];
                if($p == '') {$p='home';}
                switch ($p) 
                {
                    case 'home': require "modules/pages/main.php"; break;
                    case 'po': require "modules/pages/purchase_orders.php"; break;
                    case 'so': require "modules/pages/sell_orders.php"; break;
                    case 'wa': require "modules/pages/wallet.php"; break;
                    default : require "modules/pages/main.php";

                    //default : require "pages/error.php";
                }
    
                ?>
               
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
        <?php require "modules/menu/modals.php"; ?>
    </div>


    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../bootstrap/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../bootstrap/js/bootstrap-datepicker.min.js"></script>
    

    <script type="text/javascript">
    $(document).ready(function() {
        $('.datepicker').datepicker({
            dateFormat: "dd-mm-yyyy",
            changeMonth: true,
            changeYear: true,
            beforeShow: function() { 
                $('#ui-datepicker-div').addClass('datepicker');
              }
        });
    });
    </script>
    
</body>

</html>