<?php
require_once 'connect.php';
if($_GET["test_temp"]==1){
	$test_id=0;	
	$sqldltdes="delete from gamesdes where games_test_id=0";
	$querydltdes=mysql_query($sqldltdes);
}else{
	$test_id=-1;
}
$sqldes="insert into gamesdes(games_test_id,games_score,games_descrip) values(".$test_id.",".$_GET["score"].",'".$_GET["num"]."')";
$querydes=mysql_query($sqldes);
//echo $sqldes;
?>
