<?php
$host="localhost";
$username="root";
$password="";
$database="games";
mysql_connect($host,$username,$password);
mysql_select_db($database) or die("Cannot Connecting to Database.");
mysql_query("SET character_set_results=utf8");
mysql_query("SET character_set_client=utf8");
mysql_query("SET character_set_connection=utf8");
?>