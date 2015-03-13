
<form id="formin" name="formin" action="Javascript:childlink(6,'insertchild.php',1);" method="get">
<div style=" background-color: white;width: 80%;margin-left: 10%;color: black
;border-radius:5px;box-shadow: 10px 10px 5px #c0c0c0;font-size: 20px
">
<div style="text-align: center;">
<img src="images/child.png" />
<p style="color: black">เพิ่มข้อมูลผู้ทดสอบ</p>
</div>

<table style="width: 50%;margin-left: 20%;">
<tr>
<td>คำนำหน้า</td>
<td><select id="prename" class="form-control input-sm" style="width: 70px;">
<option value="1">ด.ช.</option>
<option value="2">ด.ญ.</option>
</select></td></tr>
<tr ><td>ชื่อ</td>
<td><input class="form-control" id="name" name="name" style="width: 250px" placeholder="กรอกชื่อ" required="required"></td></tr>
<tr ><td>นามสกุล</td>
<td><input class="form-control" id="lname" name="lname" style="width: 250px" placeholder="กรอกนามสกุล" required="required"></td></tr>
<tr ><td>ชื่อเล่น</td>
<td><input class="form-control" id="nick" name="nick" style="width: 150px" placeholder="กรอกชื่อเล่น" required="required"></td></tr>
<tr ><td>อายุ</td>
<td><input type="number" id="age" name="age" style="width: 100px" class="form-control" placeholder="กรอกอายุ" required="required"></td></tr>

</table>
<div style="float: right;margin-right: 50px;">
<button type="submit" class="btn btn-success">เพิ่มข้อมูล</button>
<button type="button" class="btn btn-default"  onclick="childlink(1,'menuchild.php','');">ยกเลิก</button>
</div>
<br/><br/>
</div></form>