<?php
require_once 'func/connect.php';
$sqlupdate="update children set ch_prename=".$_GET["prename"]."
		,ch_name='".$_GET["name"]."',ch_lastname='".$_GET["lname"]."'
		,ch_nickname='".$_GET["nick"]."',ch_age=".$_GET["age"]." where ch_id=".$_GET["temp"];
$queryupdate=mysql_query($sqlupdate);
echo $sqlupdate;
?>
<script> 
$(function(){
 $("#showdiv").load("menuchild.php"); 
	
 });
 </script> 