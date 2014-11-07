<?php
require_once 'func/connect.php';
$sqllogin="select * from account where acc_username='".$_POST["txt_user"]."' and acc_password='".md5($_POST["txt_pass"])."'";
$querylogin=mysql_query($sqllogin);
$fetchlogin=mysql_fetch_array($querylogin);
if($fetchlogin["acc_username"]=="")echo 'กรุณาตรวจสอบ username และ  password';
else{ @session_start();
	$_SESSION["acc_username"]=$_POST["txt_user"];
	echo "true";
}

?>