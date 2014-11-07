   <?php 
   require_once 'func/connect.php';
   require_once 'func/prename.php';
   $sqlchil="select * from children";
   $querychild=mysql_query($sqlchil);
   ?>
   
    <div class="container">
	  <a href="#" onclick="childlink(5,'formchild.php','');"> <img src="images/add.png"  alt="" width="100" height="100" /></a>
<table cellpadding="0" cellspacing="0" border="0" class="display" id="example" width="100%" style="font-size:14px">
	<thead>
		<tr>
		
			<th style="text-align: center !important;">ชื่อ - นามสกุล</th>
			<th style="text-align: center !important;">อายุ</th>
			<th style="text-align: center !important;">แก้ไข</th>
			<th style="text-align: center !important;">ทดสอบ</th>
		</tr>
	</thead>
	<tbody style="color:black !important;">
	<?php while ($resultchild=mysql_fetch_array($querychild)){?>
		<tr>
			
			<td><?php echo  prename($resultchild["ch_prename"])." ".$resultchild["ch_name"]."  ".$resultchild["ch_lastname"] ?></td>
			<td align="center"><?php echo  $resultchild["ch_age"]?></td>
			<td class="center"><img src="images/edit.png"  alt="" width="50" height="50" onclick="childlink(5,'formupdatechild.php?temp=<?php echo $resultchild["ch_id"]?>','');" /></td>
			<td class="center"><a href="#" onclick="childlink(3,'menuselectgames.php?temp=<?php echo $resultchild["ch_id"]?>','');"><img src="images/joystick-icon.png"  alt="" width="50" height="50" /></a></td>
		</tr>
		<?php }?>
	</tbody>
	
</table>
	</div>

    </div>
    
    <script>
   

    $(document).ready(function(){
//      $('#example').dataTable();
  	oTable = $('#example').dataTable({
          "bJQueryUI": true,
          "sPaginationType": "full_numbers"
      });
    });
    </script>