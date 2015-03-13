<div class="site-header">
		<div class="main-navigation">
			<div class="responsive_menu">
				<ul>
					<li><a class="show-2 templatemo_page2" href="#">ผู้ทดสอบ</a></li>
					<li><a class="show-1 templatemo_home" href="#">วัดผล</a></li>
<!-- 					<li><a class="show-3 templatemo_page3" href="#">Services</a></li> -->
				
				</ul>
			</div>
			<div class="container">
				<div class="row templatemo_gallerygap">
					<div class="col-md-12 responsive-menu">
						<a href="#" class="menu-toggle-btn">
				            <i class="fa fa-bars"></i>
				        </a>
					</div> <!-- /.col-md-12 -->
                    <div class="col-md-3 col-sm-12">
                    
                    	<a rel="nofollow" href="#">
                    	
<!--                     	<img src="images/templatemo_logo.jpg" alt="Polygon HTML5 Template"> -->
                    	</a>
                    </div>
					<div class="col-md-9 main_menu">
						<?php include("menuhead.php");?>
					</div> <!-- /.col-md-12 -->
				</div> <!-- /.row -->
			</div> <!-- /.container -->
		</div> <!-- /.main-navigation -->
	</div> <!-- /.site-header -->
    <div id="menu-container">
    <!-- gallery start -->
    <div class="content homepage" id="showdiv">
  	<?php include("menuchild.php");?>
    </div>
    <!-- contact end -->
	
    
<script type="text/javascript">
$(document).ready(function(){
//    $('#example').dataTable();
// 	oTable = $('#example').dataTable({
//         "bJQueryUI": true,
//         "sPaginationType": "full_numbers"
//     });
	$("input").css({"color":"black"});
	//$("#example_length label").text("�ʴ�˹����");
	$('.gallery_more').click(function(){
		var $this = $(this);
		$this.toggleClass('gallery_more');
		if($this.hasClass('gallery_more')){
			$this.text('Load More');			
		} else {
			$this.text('Load Less');
		}
	});
});
</script> 
	<script>
		function childlink(param1,param2,param3){
			$("canvas").remove();
			switch(param1){
			case 1://child_table
				$("#showdiv").load(param2);
				$("input").css({"color":"black"});
				break;
			case 2://chart
				$("#showdiv").load(param2);
				break;
			case 3: //selectgames
				$("#showdiv").load(param2);
				   break;
			case 4: //selectgames
				$("#showdiv").load(param2);
				   break;
			case 5: //anothers
				$("#showdiv").load(param2);
				   break;
			case 6: //insert
				$("#showdiv").load(param2+"?"+$("#formin").serialize()+"&prename="+$("#prename").val());
				   break;
			case 7: //update
				$("#showdiv").load(param2+"&"+$("#formin").serialize()+"&prename="+$("#prename").val());
				   break;
			}
			return false;
			}

	   function showhide()
	    {
	    	var div = document.getElementById("newpost");
			if (div.style.display !== "none")
			{
				div.style.display = "none";
			}
			else {
				div.style.display = "block";
			}
	    }
    </script>
<!-- templatemo 400 polygon -->
<!-- 
Polygon Template 
http://www.templatemo.com/preview/templatemo_400_polygon 
-->
