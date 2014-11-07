<?php 
require_once 'func/connect.php';
$sqltemp="select * from children where ch_id=".$_GET["temp"];
$querytemp=mysql_query($sqltemp);
$resulttemp=mysql_fetch_array($querytemp);
?>
<form id="formin" name="formin" action="Javascript:childlink(7,'updatechild.php?temp=<?php echo $_GET["temp"]?>',1);" method="get">
<div style=" background-color: white;width: 80%;margin-left: 10%;color: black
;border-radius:5px;box-shadow: 10px 10px 5px #c0c0c0;font-size: 20px
">
<div style="text-align: center;">
<img src="images/child.png" />
<p style="color: black">แก้ไขข้อมูลผู้ทดสอบ</p>
</div>

<table style="width: 50%;margin-left: 20%;">
<tr>
<td>คำนำหน้า</td>
<td><select id="prename" class="form-control input-sm" style="width: 70px;">
<option value="1" <?php if($resulttemp["ch_prename"]==1) echo "selected";?>>ด.ช.</option>
<option value="2" <?php if($resulttemp["ch_prename"]==2) echo "selected";?>>ด.ญ.</option>
</select></td></tr>
<tr ><td>ชื่อ</td>
<td><input class="form-control" id="name" name="name" value="<?php echo $resulttemp["ch_name"];?>" style="width: 250px" placeholder="กรอกชื่อ" required="required"></td></tr>
<tr ><td>นามสกุล</td>
<td><input class="form-control" id="lname" name="lname" value="<?php echo $resulttemp["ch_lastname"];?>" style="width: 250px" placeholder="กรอกนามสกุล" required="required"></td></tr>
<tr ><td>ชื่อเล่น</td>
<td><input class="form-control" id="nick" value="<?php echo $resulttemp["ch_nickname"];?>" name="nick" style="width: 150px" placeholder="กรอกชื่อเล่น" required="required"></td></tr>
<tr ><td>อายุ</td>
<td><input type="number" id="age" name="age" value="<?php echo $resulttemp["ch_age"];?>" style="width: 100px" class="form-control" placeholder="กรอกอายุ" required="required"></td></tr>

</table>
<div style="float: right;margin-right: 50px;">
<button type="submit" class="btn btn-success">แก้ไขข้อมูล</button>
<button type="button" class="btn btn-default"  onclick="childlink(1,'menuchild.php','');">ยกเลิก</button>
</div>
<br/><br/>
</div></form>