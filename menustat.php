<?php 
require_once 'func/connect.php';
require_once 'func/prename.php';
$sqltemp="select * from children where ch_id=".@$_GET["temp"];
$querytemp=mysql_query($sqltemp);
$resulttemp=@mysql_fetch_array($querytemp);
?>
<?php if(isset($_GET["temp"])){ ?>
<div style="font-size: 30px;color: black;">
ผลการทดสอบ : <?php echo  prename($resulttemp["ch_prename"])." ".$resulttemp["ch_name"]. " ".$resulttemp["ch_lastname"]?></div>
<?php }?>
<div style="width: 40%;margin-left:5%">

<br><br>
<span style="font-size: 20px;color:black;float:left">เลือกการแสดงผล  :</span>
<select class="form-control" style="width:40%;float:left" id="charttype">
<option value="0">เลือกการแสดงผลReport</option>
<option value="1">ทายภาพจากเสียง</option>
<option value="2">จับคู่เสียงกับภาพ</option>
<option value="3">ทำตามคำบอก</option>
</select>
<button class="btn btn-success" style="margin-left: 10px;" onclick="loadChart();" id="btnnxt">เลือก</button>
</div>
<br><br>
<div id="chart" style="min-width: 310px; max-width: 100%; height: 400px; margin: 0 auto"></div>
<script>
function loadChart(){
$.ajax({
url:"func/funcchart.php?typechart="+$("#charttype").val()+"&temp=<?php echo @$_GET["temp"]?>",
	success:function(msg){
		$("#chart").html(msg);
		}
});
	
}
</script>