<?php
require_once 'connect.php';
header('Content-type: text/plain; charset=utf-8');
$sqlgame1="select * from gamesquiz,gamesexamination where gamesquiz.games_exa_id=gamesexamination.games_exa_id and
  		games_types_lv=".$_GET["level"]." and games_types_id=1 and games_quiz_topic='".$_GET["num"]."'
  		";
$querygame1=mysql_query($sqlgame1);
$resultgame1=mysql_fetch_array($querygame1);
$sqlchoice="select * from gameschoice,gamesquizjoin where gameschoice.games_choice_id=gamesquizjoin.games_choice_id
 		and games_quiz_id=".$resultgame1["games_quiz_id"]." order by  gameschoice.games_choice_id
 		";

$querychoice=mysql_query($sqlchoice);
$jsonStr='{"sound":"'.$resultgame1["games_quiz_sound"].'"';
$jsonStr.=',"correct":"'.$resultgame1["games_quiz_status"].'"';
$jsonStr.=',"choice":[';
$outp=1;

while ($resultchoice=mysql_fetch_array($querychoice)){
if ($outp != 1) {$jsonStr .= ",";}
$jsonStr.='{"longsound":"'.$resultchoice["longsound"].'","topic":"'.$resultchoice["games_choice_topic"].'","detail":"'.$resultchoice["games_choice_detail"].'","pics":"'.$resultchoice["games_choice_pics"].'"}';
$outp++;
}
$jsonStr.="]}";
echo  $jsonStr;
?>