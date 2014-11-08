<?php
require_once 'func/connect.php';
if(!isset($_SESSION['account_name'])){
// 	header('Location: login.php');
// 	exit;
}
?>
<!DOCTYPE html>

  <head>
    <title>Games</title>
    <meta name="keywords" content="" />
	<meta name="description" content="" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/templatemo_misc.css">
    <link href="css/templatemo_style.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100,600' rel='stylesheet' type='text/css'>
    <link href="css/style.css" rel="stylesheet">
    <script src="js/jquery-1.10.2.min.js"></script> 
	<script src="js/jquery.lightbox.js"></script>
	<script src="js/templatemo_custom.js"></script>
	<script src="js/Chart.js"></script>
	<script type="text/javascript" src="js/datatable.js"></script>
<link rel="stylesheet" href="css/datatable.css" />
      
<link type="text/css" rel="stylesheet" href="css/ui.css" />    
<!-- <link rel="stylesheet" href="//ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables_themeroller.css" /> -->
    <script>
    $(function(){
    	$("body").load("login.php");
    });
 
  	</script>

  </head>
  <body>
  	
  </body>
  <script type="text/javascript" src="countdown/jquery.countdown.js"></script>

  <script type="text/javascript" src="chart/highcharts.js">

</script>
    <script type="text/javascript" src="chart/exporting.js"></script>
  <script type="text/javascript">
 // var charta=$.noConflict();
<!--

//-->
</script>
</html>