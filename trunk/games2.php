<?php 
require_once 'func/connect.php';
require_once 'func/prename.php';
$sqltemp="select * from children where ch_id=".$_GET["temp"];
$querytemp=mysql_query($sqltemp);
$resulttemp=mysql_fetch_array($querytemp);
?>
<div style="font-size: 30px;color: black;">
กำลังทดสอบ : <?php echo  prename($resulttemp["ch_prename"])." ".$resulttemp["ch_name"]. " ".$resulttemp["ch_lastname"]?></div>
<div style="float:left;width: 100%;text-align: right;">
<button class="btn btn-danger" style="margin-right: 1%;" onclick="resetPair();">จับคู่ใหม่</button>
<button class="btn btn-success" style="margin-right: 5%;" >ข้อต่อไป</button>
</div>
<br/>
<div>
<div style="width:25% ;float: left;margin-left: 4%">
<ul style="list-style: none;">
<li style="min-height: 200px;margin-top: 23%">
<img style="cursor: pointer;" src="images/voice.png" width="100" height="100" onclick="document.getElementById('sound1').play()" />
<img style="cursor: pointer;" class="toggleBall" id="i1"  src="images/ballgray.png" width="50" height="50" checkedImg="0" />	
	<div style="display:none;text-align: center" id="divsound1">	
	</div>
</li>
<li style="min-height: 200px">
<img style="cursor: pointer;" src="images/voice.png" width="100" height="100" onclick="document.getElementById('sound2').play()" />
<img style="cursor: pointer;" class="toggleBall" id="i2"  src="images/ballgray.png" width="50" height="50" checkedImg="0" />		
	<div style="display:none;text-align: center" id="divsound2">	
	</div>
</li>
<li style="min-height: 200px">
<img style="cursor: pointer;" src="images/voice.png" width="100" height="100" onclick="document.getElementById('sound3').play()" />
	<img style="cursor: pointer;" class="toggleBall" id="i3"  src="images/ballgray.png" width="50" height="50" checkedImg="0" />	
	<div style="display:none;text-align: center" id="divsound3">	
	</div>
</li>
<li style="min-height: 200px">
<img style="cursor: pointer;" src="images/voice.png" width="100" height="100" onclick="document.getElementById('sound4').play()" />
	<img style="cursor: pointer;" class="toggleBall" id="i4"  src="images/ballgray.png" width="50" height="50" checkedImg="0" />	
	<div style="display:none;text-align: center" id="divsound4">	
	</div>
</li>
</ul>
</div>
<div style="width:20% ;float: left;margin-left: 4%">&nbsp;</div>
<div style="width:30% ;float: left;margin-left: 4%">
<ul style="list-style: none;margin-top:2px;">
<li>
<img style="cursor: pointer;" class="toggleBall2" id="img1"  src="images/ballgray.png" data-id="img1" width="50" height="50" checkedImg="0"  />	
<img  src="images/ballgray.png" width="200" height="200"  id="pics1" />	
</li>
<img style="cursor: pointer;"   class="toggleBall2" id="img2"  src="images/ballgray.png" data-id="img2" width="50" height="50" checkedImg="0"   />
<img  src="images/ballgray.png" width="200" height="200"  id="pics2"  />		
</li>
<li>
<img style="cursor: pointer;" class="toggleBall2"  id="img3"  src="images/ballgray.png" data-id="img3" width="50" height="50" checkedImg="0"   />	
<img  src="images/ballgray.png" width="200" height="200"  id="pics3"  />	
</li>
<li>
<img style="cursor: pointer;" class="toggleBall2" id="img4"  src="images/ballgray.png" data-id="img4" width="50" height="50" checkedImg="0" />	
<img  src="images/ballgray.png" width="200" height="200"  id="pics4"  />	
</li>
</ul>
</div>
<p></p>

</div>
<script>
var game2num=1;
var countPair=0;
var ballL="",ballR;
var score2=0;
$(function(){
	 $("body").append("<audio autoplay controls src='longsound/game21.mp3' style='display:none;' id='timesout' onended='$(this).remove();'></audio>");
	loadAns2();
$(".toggleBall").click(function(){
		if($(this).attr("checkedImg")!=2){
			$(".toggleBall[checkedImg!=2]").attr("src","images/ballgray.png");
			$(this).attr("src","images/ballblue.png");
			$(".toggleBall[checkedImg!=2]").attr("checkedImg","0");
			$(this).attr("checkedImg","1");
			ballL=$(this);
		}
		else{
alert("เลือกคำตอบไปแล้ว");
			}
});

$(".toggleBall2").click(function(){
	if(ballL!=""&&$(this).attr("checkedImg")!=2){
	
	//$(".toggleBall2[checkedImg!=2]").attr("src","images/ballgray.png");
	$(this).attr("src","images/ballblue.png");
	//$(".toggleBall2[checkedImg!=2]").attr("checkedImg","0");
	$(this).attr("checkedImg","2");
	ballR=$(this);
	ballL.attr("checkedImg","2");
	if(ballL.attr("correctVal")==ballR.attr("correctVal"))
		score2=1;
		//alert("ถูก");
	else
		score2=0;

	$.ajax({
		url:"func/funcdes.php?type=2&num="+$(this).attr("numVal")+"&score="+score2
		});
		//alert("ผิด");
	countPair++;
	drawPath();
	if(countPair==4){
	game2num++;
	loadAns2();
	}
	}
	else if($(this).attr("checkedImg")==2){ alert("เลือกคำตอบไปแล้ว");}
	else{alert("โปรดเลือกเสียงก่อน");}
});
});

function drawPath(){
        var $t = ballL;
        var $i = ballR;

        // find offset positions for the word (t = this) and image (i)
        var ot = {
            x: $t.offset().left + $t.width() / 2,
            y: $t.offset().top + $t.height() / 2
        };
        var oi = {
            x: $i.offset().left + $i.width() / 2,
            y: $i.offset().top + $i.height() / 2
        };
    
        // x,y = top left corner
        // x1,y1 = bottom right corner
        var p = {
            x: ot.x < oi.x ? ot.x : oi.x,
            x1: ot.x > oi.x ? ot.x : oi.x,
            y: ot.y < oi.y ? ot.y : oi.y,
            y1: ot.y > oi.y ? ot.y : oi.y
        };

        // create canvas between those points
        var c = $('<canvas/>').attr({
            'width': p.x1 - p.x,
            'height': p.y1 - p.y
        }).css({
            'position': 'absolute',
            'left': p.x,
            'top': p.y,
            'z-index': -1
        }).appendTo($('body'))[0].getContext('2d');
    
        // draw line
        c.strokeStyle = 'blue';
        c.lineWidth = 2;
        c.beginPath();
        c.moveTo(ot.x - p.x, ot.y - p.y);
        c.lineTo(oi.x - p.x, oi.y - p.y);
        c.stroke();
}

function loadAns2(){
	$.ajax({
		url:'func/game2func.php?level=<?php echo $_GET["level"];?>&num='+game2num,
		success:function(res2){
		//console.log(res2);
			var obj2=$.parseJSON(res2);
		console.log(obj2);
// 			$("#correctAns").val(obj.correct);
$.each(obj2.choice1,function(index){
	$("#divsound"+(index+1)).html('');
	$("#i"+(index+1)).removeAttr("correctVal");
	$("#i"+(index+1)).attr("correctVal",obj2.choice1[index].correct);
	$("#divsound"+(index+1)).html("<audio id='sound"+(index+1)+"' controls><source src='sounds/"+obj2.choice1[index].sound+".wav' type='audio/wav'/><source src='sounds/"+obj2.choice1[index].sound+".wav' type='audio/ogg'/></audio> ");
		});


$.each(obj2.choice2,function(index){
	$("#img"+(index+1)).html('');
	$("#img"+(index+1)).removeAttr("correctVal");
	$("#img"+(index+1)).attr("correctVal",obj2.choice2[index].correct);
	$("#pics"+(index+1)).attr("src","images/animal/"+obj2.choice2[index].pics);
		});
		}
		});
	
}

function resetPair(){
	countPair=0;ballL='';
	$('canvas').remove();
	$('.toggleBall,.toggleBall2').attr('src','images/ballgray.png');
	$('.toggleBall,.toggleBall2').attr('checkedImg','0')
	
}
</script>
<!-- <script> -->
<!-- // $(function(){ -->
<!-- // 	alert(distance(14.345368, 100.565577,14.349743, 100.562368)); -->
	
<!-- // }); -->

<!-- // function distance(lat1,lon1,lat2,lon2) { -->
<!-- // 	var R = 6371; // km (change this constant to get miles) -->
<!-- // 	var dLat = (lat2-lat1) * Math.PI / 180; -->
<!-- // 	var dLon = (lon2-lon1) * Math.PI / 180; -->
<!-- // 	var a = Math.sin(dLat/2) * Math.sin(dLat/2) + -->
<!-- // 		Math.cos(lat1 * Math.PI / 180 ) * Math.cos(lat2 * Math.PI / 180 ) * -->
<!-- // 		Math.sin(dLon/2) * Math.sin(dLon/2); -->
<!-- // 	var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a)); -->
<!-- // 	var d = R * c; -->
<!-- // 	if (d>1) return Math.round(d)+"km"; -->
<!-- // 	else if (d<=1) return Math.round(d*1000)+"m"; -->
<!-- // 	return d; -->
<!-- // } -->
<!-- </script> -->