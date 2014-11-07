<?php
require_once 'connect.php';
$sqlgame1="select * from gamesexamination where games_types_lv=".$_GET["level"]." and games_types_id=1 
  		";
$querygame1=mysql_query($sqlgame1);
$resultgame1=mysql_fetch_array($querygame1);
$sqlorder="insert into gamestest(games_test_date,games_exa_id,games_ch_id) values('".date("Y-m-d")."',".$resultgame1["games_exa_id"].",".$_GET["temp"].")";
$queryorder=mysql_query($sqlorder);
$sqlgameo="select * from gamestest order by games_test_id desc
  		";
$querygameo=mysql_query($sqlgameo);
$resultgameo=mysql_fetch_array($querygameo);
$sqldes="update gamesdes set games_test_id=".$resultgameo["games_test_id"]." where games_test_id=0";
$querydes=mysql_query($sqldes);

?>