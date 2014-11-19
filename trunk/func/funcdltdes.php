<?php
require_once 'connect.php';
$sqldlt="delete from gamesdes where games_test_id=".$_GET["test_temp"];
$querydlt=mysql_query($sqldlt);
echo $sqldlt;
?>