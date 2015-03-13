<?php
require_once 'connect.php';
$type=2;
if(@isset($_GET["at"])){
	$type=3;	
}
$sqlgame2="select * from gamesquiz,gamesexamination where gamesquiz.games_exa_id=gamesexamination.games_exa_id and
  		games_types_lv=".$_GET["level"]." and games_types_id=".$type." and games_quiz_topic=".$_GET["num"];
$querychoice1=mysql_query($sqlgame2);
 $jsonStr='{"choice1":[';
 $outp=1;
 $quizid="";
 while ($resultchoice1=mysql_fetch_array($querychoice1)){
 	if ($outp != 1) {$jsonStr .= ",";$quizid.=",";}
 	$quizid.=$resultchoice1["games_quiz_id"];
 	$jsonStr.='{"sound":"'.$resultchoice1["games_quiz_sound"].'","correct":"'.$resultchoice1["games_quiz_status"].'"}';
 	$outp++;
 }

$jsonStr.="],";
$sqlchoice2="select * from gameschoice,gamesquizjoin where gameschoice.games_choice_id=gamesquizjoin.games_choice_id
 		and games_quiz_id in(".$quizid.") ORDER BY RAND()";
$querychoice2=mysql_query($sqlchoice2);
// $jsonStr='{"sound":"'.$resultgame2["games_quiz_sound"].'"';
// $jsonStr.=',"correct":"'.$resultgame2["games_quiz_status"].'"';
$jsonStr.='"choice2":[';
$outp=1;

while ($resultchoice2=mysql_fetch_array($querychoice2)){
	if ($outp != 1) {$jsonStr .= ",";}
	$jsonStr.='{"pics":"'.$resultchoice2["games_choice_pics"].'","correct":"'.$resultchoice2["games_choice_id"].'"}';
	$outp++;
}
$jsonStr.="]}";
echo  $jsonStr;
?>