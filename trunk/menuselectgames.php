<?php 
require_once 'func/connect.php';
require_once 'func/prename.php';
$sqltemp="select * from children where ch_id=".$_GET["temp"];
$querytemp=mysql_query($sqltemp);
$resulttemp=mysql_fetch_array($querytemp);
?>
<div style="font-size: 30px;color: black;">
กำลังทดสอบ : <?php echo  prename($resulttemp["ch_prename"])." ".$resulttemp["ch_name"]. " ".$resulttemp["ch_lastname"]?></div>
<div style="text-align: center">
<div><img class="selectg" numPics="1" alt="" src="images/game1.png" onclick="childlink(4,'menulevels.php?type=1&temp=<?php echo $_GET["temp"]?>',1);">
<img class="selectg" numPics="2" alt="" src="images/game2.png" onclick="childlink(4,'menulevels.php?type=2&temp=<?php echo $_GET["temp"]?>',2);"></div>
<div><img class="selectg" numPics="3" alt="" src="images/game3.png" onclick="childlink(4,'menulevels.php?type=3&temp=<?php echo $_GET["temp"]?>',3);">
<img class="selectg" numPics="4" alt="" src="images/game4.png" onclick="childlink(4,'menustat.php?type=3&temp=<?php echo $_GET["temp"]?>',4);">
</div>
</div>
<script>
$(document).ready(function(){
$(".selectg").hover(function() {
$(this).attr("src","images/game"+$(this).attr("numPics")+"h.png");
}, function() {
$(this).attr("src","images/game"+$(this).attr("numPics")+".png");
});
	
});
</script>