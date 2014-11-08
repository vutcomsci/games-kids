<?php
require_once 'func/connect.php';
require_once 'func/prename.php';
$sqlclear="delete from gamesdes where games_test_id=0";
$queryclear=mysql_query($sqlclear);
$sqltemp="select * from children where ch_id=".$_GET["temp"];
$querytemp=mysql_query($sqltemp);
$resulttemp=mysql_fetch_array($querytemp);
?>
<div style="font-size: 30px;color: black;">
กำลังทดสอบ : <?php echo  prename($resulttemp["ch_prename"])." ".$resulttemp["ch_name"]. " ".$resulttemp["ch_lastname"]?></div>
     <div class="templatemo_ourteam">
     		<div class="container templatemo_hexteam">
     		<div class="row">
     		<div style="text-align: left;display:none;" id="soundans" >
     		<b style="color: black;font-size: 20px" id="cAns">ข้อที่ 1.</b>
     		<img style="cursor: pointer;" src="images/voice.png" width="100" height="100" onclick="document.getElementById('sound1').play()" />
     		<span style="color:black;font-size: 30px;font-weight: bold;"> <-คลิกเพื่อเล่นเสียง</span>
     		</div>
     		<input type="hidden" id="correctAns" value="0" />
     	<div style="display:none;text-align: center" id="divsound">	
 
	</div>
</div>
            	<div class="row" style="margin-top: 30px">
            	 <b id="divg1" style="display:none">
<!--             	   -->
                	<div class="col-md-3 col-sm-4" id="divg1">
                        	 <div class="hexagon hexagonteam gallery-item">
                               <div class="hexagon-in1">
                                 <a class="imgAns" numVal="1">
                                <div class="hexagon-in2" id="pics1">
                            
                                </div>
                                </a>
                            </div>
                          </div>
  			       </div>
                    <div class="col-md-3 col-sm-8 templatemo_servicetxt"  style="background:white;border-radius:20px;" >
                    	<h2 style="color:black !important;" id="topic1">t1</h2>
                        <p style="color:black !important;" id="detail1">d1</p>
                    </div>
                  </b>
                   <b id="divg2" style="display:none">
                    <div class="templatemo_servicecol2">
                    <div class="col-md-3 col-sm-4">
                        	 <div class="hexagon hexagonteam gallery-item">
                               <div class="hexagon-in1">
                              <a class="imgAns" numVal="2">
                                <div class="hexagon-in2" id="pics2"  >
                             
                                </div>
                                </a>
                            </div>
                          </div>
  			       </div>
                    <div class="col-md-3 col-sm-8 templatemo_servicetxt" style="background:white;border-radius:20px;">
                    	<h2 style="color:black !important;" id="topic2">t2</h2>
                        <p style="color:black !important;" id="detail2">d2</p>
                    </div>
                    </div>
                    </b>
               </div>
            </div>
            <div class="clear"></div>
            <div class="container templatemo_hexteam s_top">
            	<div class="row">
            	  <b id="divg3" style="display:none">
                	<div class="col-md-3 col-sm-4">
                        	 <div class="hexagon hexagonteam gallery-item">
                               <div class="hexagon-in1">
                               <a class="imgAns" numVal="3">
                                <div class="hexagon-in2" id="pics3" >
                               
                                </div>
                                </a>
                            </div>
                          </div>
  			       </div>
                    <div class="col-md-3 col-sm-8 templatemo_servicetxt" style="background:white;border-radius:20px;">
                    	<h2 style="color:black !important;" id="topic3">t3</h2>
                        <p style="color:black !important;" id="detail3">d3 </p>
                    </div>
                    </b>
                      <b id="divg4" style="display:none">
                    <div class="templatemo_servicecol2">
                    <div class="col-md-3 col-sm-4">
                        	 <div class="hexagon hexagonteam gallery-item">
                               <div class="hexagon-in1">
                               <a class="imgAns" numVal="4">
                                <div class="hexagon-in2" id="pics4">
                               
                                </div>
                                </a>
                            </div>
                          </div>
  			       </div>
                    <div class="col-md-3 col-sm-8 templatemo_servicetxt" style="background:white;border-radius:20px;">
                    	<h2 style="color:black !important;" id="topic4">t4</h2>
                        <p style="color:black !important;" id="detail4">d4</p>
                    </div>
                    </div>
                    </b>
               </div>
            </div>
            
     </div>
<script>
var nums=1;
var score=0;
var cor=0;
var _atAudio;
var _thismax=new Array();
var _thisname=new Array();
var load4=0;
$(function(){
	loadAns();
$(".imgAns").click(function(){
	if(load4==5){
	if($(this).attr("numVal")==$("#correctAns").val()){
		score++;
		cor=1;
		}
	else{
		cor=0;
		}
	$.ajax({
		url:"func/funcdes.php?type=1&num="+$(this).attr("numVal")+"&score="+cor
		});
	nums++;
if(nums==5)
{
$.ajax({
url:"func/game1order.php?level=<?php echo $_GET["level"];?>&temp=<?php echo $_GET["temp"]?>",
success:function(msg){
	console.log(msg);
	alert("ทำการทดสอบเสร็จสิ้น");
	childlink(1,'menuchild.php','');
}
});
	}//redirect
	if(nums!=5)
	{	
$("#cAns").text("ข้อที่."+nums);
loadAns();}
}else{alert("กรุณาฟังคำอธิบาย");}
});
	
});

function loadAns(){
	$.ajax({
		url:'func/game1func.php?level=<?php echo $_GET["level"];?>&num='+nums,
		success:function(res){
			load4=0;
			//console.log(res);
			var obj=$.parseJSON(res);
			var msgd;
			var txtsplit;
			//console.log(obj);
			$("#lsound").remove();
			$("#correctAns").val(obj.correct);
			$("#divsound").html('');
			$("#divsound").html("<audio id='sound1' controls><source src='sounds/"+obj.sound+".wav' type='audio/wav'/><source src='sounds/"+obj.sound+".wav' type='audio/ogg'/></audio> ");
			$.each(obj.choice,function(index){
				//alert(index);
			$("#topic"+(index+1)).html(obj.choice[index].topic);
			$("#detail"+(index+1)).html(obj.choice[index].detail);
			$("#pics"+(index+1)).removeAttr('style');

		//if(index==0)
				

			_thismax.push(obj.choice[index].longsound);
			txtsplit=obj.choice[index].pics.split(".");
			_thisname.push(txtsplit[0]);
			
			//$("body").append("<audio autoplay controls src='longsound/bird1.mp3' id='lsound'></audio>");

			$("#pics"+(index+1)).css({"background-image":"url(images/animal/"+obj.choice[index].pics+")"});
			});
			genAudio(_thismax[0],1);
		}
		});
	
}

function genAudio(maxa,atchoice) {
	 _atAudio=1;
 if(maxa >0){
	 $("#divg"+atchoice).fadeIn();
	 detectPlay(_atAudio,atchoice);
	 }
 }

 function detectPlay(atplay,thischoice){
	// console.log(_thisname);
	var choicere=0;
	 if(thischoice<5){
	 $("#lsound").remove();
	 if(atplay<=_thismax[thischoice-1]){
		 if(atplay==_thismax[thischoice-1]&&thischoice==4){choicere=5;}
	 $("body").append("<audio autoplay controls src='longsound/"+_thisname[thischoice-1]+""+atplay+".mp3' style='display:none;' id='lsound' onended='detectPlay("+(atplay+1)+","+(thischoice+choicere)+");'></audio>");
	 } else
	genAudio(_thismax[thischoice],thischoice+1);
		}else{
			load4=5;
			$("#soundans").fadeIn();
			 $("body").append("<audio autoplay controls src='longsound/ans.mp3' style='display:none;' id='ans' onended='dltans();'></audio>");
			}
	 }

 function dltans(){
$("#ans").remove();
	 }
  </script>