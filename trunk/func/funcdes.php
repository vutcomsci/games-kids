<?php
require_once 'connect.php';
header('Content-type: text/plain; charset=utf-8');
$sqldes="insert into gamesdes(games_test_id,games_score,games_descrip) values(0,".$_GET["score"].",'".$_GET["num"]."')";
$querydes=mysql_query($sqldes);
?>