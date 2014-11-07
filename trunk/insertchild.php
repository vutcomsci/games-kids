<?php
require_once 'func/connect.php';
$sqlinsert="insert into children(ch_prename,ch_name,ch_lastname,ch_nickname,ch_age) values (".$_GET["prename"].",'".$_GET["name"]."','".$_GET["lname"]."','".$_GET["nick"]."',".$_GET["age"].")";
$queryinsert=mysql_query($sqlinsert);

?>
<script>
$(function(){
$("#showdiv").load("menuchild.php");
	
});
</script>