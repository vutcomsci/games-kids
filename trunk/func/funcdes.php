<?php
require_once 'connect.php';
header('Content-type: text/plain; charset=utf-8');
if(isset($_GET["at"])){
	if($_GET["at"]==1){
		$test=0;
	}else{
		$test=-1;
	}
	}else{
		$test=0;
	}
$sqldes="insert into gamesdes(games_test_id,games_score,games_descrip) values(".$test.",".$_GET["score"].",'".$_GET["num"]."')";
$querydes=mysql_query($sqldes);
?>