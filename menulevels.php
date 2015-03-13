<?php 
require_once 'func/connect.php';
require_once 'func/prename.php';
$sqltemp="select * from children where ch_id=".$_GET["temp"];
$querytemp=mysql_query($sqltemp);
$resulttemp=mysql_fetch_array($querytemp);
?>
<div style="font-size: 30px;color: black;">
กำลังทดสอบ : <?php echo  prename($resulttemp["ch_prename"])." ".$resulttemp["ch_name"]. " ".$resulttemp["ch_lastname"]?></div>
<div style="font-size: 40px;text-align: center;color:black;">เลือกระดับ</div>
<div style="text-align: center;">

<div style="width: 32%;float: left">
<a href="#" onclick="childlink(5,'games<?php echo $_GET["type"]?>.php?level=1&type=1&temp=<?php echo $_GET["temp"]?>',1);">
<img alt="" src="images/level/1.png" style="width:50%"></a>
</div>
<div  style="width: 32%;float: left">
<a href="#" onclick="childlink(5,'games<?php echo $_GET["type"]?>.php?level=2&type=1&temp=<?php echo $_GET["temp"]?>',1);">
<img alt="" src="images/level/2.png" style="width:50%">
</a>
</div>
<div  style="width: 32%;float: left">
<a href="#" onclick="childlink(5,'games<?php echo $_GET["type"]?>.php?level=3&type=1&temp=<?php echo $_GET["temp"]?>',1);">
<img alt="" src="images/level/3.png" style="width:50%">
</a>
</div>
<div  style="width: 32%;float: left">
<a href="#" onclick="childlink(5,'games<?php echo $_GET["type"]?>.php?level=4&type=1&temp=<?php echo $_GET["temp"]?>',1);">
<img alt="" src="images/level/4.png" style="width:50%"></a>
</div>
<div  style="width: 32%;float: left">
<a href="#" onclick="childlink(5,'games<?php echo $_GET["type"]?>.php?level=5&type=1&temp=<?php echo $_GET["temp"]?>',1);">
<img alt="" src="images/level/5.png" style="width:50%"></a>
</div>
<div  style="width: 32%;float: left">
<a href="#" onclick="childlink(5,'games<?php echo $_GET["type"]?>.php?level=6&type=1&temp=<?php echo $_GET["temp"]?>',1);">
<img alt="" src="images/level/6.png" style="width:50%">
</a>
</div>
</div>