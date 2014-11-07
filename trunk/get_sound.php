<?php
if(isset($_GET['text'])){
 $txt=htmlspecialchars($_GET['text']);
 $txt=rawurlencode($txt);

  header("Content-type: audio/mpeg");
  $url="https://translate.google.com/translate_tts?q=$txt&tl=th";
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_TIMEOUT, 30);
  $audio = curl_exec($ch);
  echo $audio;

}
?>
