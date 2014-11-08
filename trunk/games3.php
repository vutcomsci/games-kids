<?php 
require_once 'func/connect.php';
require_once 'func/prename.php';
$sqltemp="select * from children where ch_id=".$_GET["temp"];
$querytemp=mysql_query($sqltemp);
$resulttemp=mysql_fetch_array($querytemp);
?>
 <script>
     //  .// var 
        var random1;
        var random2;
        var multic=["monster","monkey","elephant"];
		var num;
		var i=7;
        // Get a random number between 1-10 and add 3, to get one between 4-13:
        $(function () {
        	
            $("html,body").css({"background":"#24aecd"});
            $(".site-header").hide();
        	startGame(i);
        });

        var countclick;

        function dltTimes(){
        $("#timesout").remove();
        }

        function startGame(thisstart){
        	
        	$("#timesout").remove();
         	$("#imgg").remove();
         	var txtmp3;
         	var txtimages;
         	switch (thisstart) {
        	case 1:
        		txtmp3="start";
         		txtimages="start";
         		break;
         	case 2:
         		txtmp3="2";
         		txtimages="2";
         		break;
        	case 3:
        		txtmp3="3";
         		txtimages="3";
        		break;
        	case 4:
        		txtmp3="4";
        		txtimages="4";
         		break;
        	case 5:
        		txtmp3="5";
        		txtimages="5";
         		break;
       	case 6:txtmp3="gamestart";
        		break;
       	case 7:txtmp3="game31";
				break;
        	default:startGameClick();
         		break;
         	}
         	if(thisstart<6&&thisstart>0){
       	  $("body").append("<img src='images/"+txtimages+".png' id='imgg' style='position:absolute;margin-left:30%;margin-top:10%' width='300' height='300' />");
        	}
        	if(thisstart!=0){
  $("body").append("<audio autoplay controls src='longsound/"+txtmp3+".mp3' style='display:none;' id='timesout' onended='setTimeout(function(){startGame("+(thisstart-1)+")},400);'></audio>");
        	}  
  	}

        function startGameClick(){
        	 $("body").append("<audio autoplay controls loop src='longsound/songplay.mp3' style='display:none;' id='songplays' onended='$(this).remove();'></audio>");
        	var dt = new Date();
        	dt.setMinutes(dt.getMinutes()+1);
        	$('#clock').countdown(dt, function(event) {
        		  var totalHours = event.offset.totalDays * 24 + event.offset.hours;
        		  $(this).html(event.strftime('%M:%S'));
        		  if($(this).html()=="00:00"){
        			  $(".monster").remove();
        			  $("#songplays").stop();
        			  $("#songplays").remove();
        			  clearInterval(imgadd);
        			  $("html,body").css({"background-color":"#F8EF12"});
        			  $(".site-header").show();
        			 // $("#btnnext").remove();
        			  $("#clockimg").remove(); 
        			  $("body").append("<audio autoplay controls src='longsound/timeout.mp3' style='display:none;' id='timesout' onended='dltTimes();'></audio>");
        			  setTimeout(function(){$("#showdiv").load("games2.php?level=1&type=1&temp=<?php echo $_GET["temp"]?>")},2000);
        			  //$("body").append('<div style="margin-left:40%;margin-top:6%"><button id="btnnext" class="btn btn-success" onclick="childlink(5,\"games2.php?level=1&type=1&temp=\",1);" >ข้อต่อไป</button></div>');
        			 
        			  }
        		 });


           // alert(Math.ceil(Math.random() * 2)-1);
           // alert($(window).height());
            $("#div1").css({"max-height":($(window).height()*50)/100+"px","min-height":($(window).height()*50)/100+"px"});
            imgadd=setInterval(function () {
                random1 = Math.ceil(Math.random() * 100);
                random2 = Math.ceil(Math.random() * 40);
                $("#div1").append('<div class="monster" style="cursor:pointer;position: absolute;margin-left:' + random1 + '%;margin-top:' + random2 + '%;"></div>');
             //   console.log($('.monster').length);
                 monsterclick();
                setTimeout(function () {
                    $(".monster:first").remove();
                }, 2000);
            }, 1500);
            
        	
        }
        
        function monsterclick() {
            $(".monster").click(function () {
            	 $("body").append("<audio autoplay controls src='longsound/funny.wav' style='display:none;' id='funny' onended='$(this).remove();'></audio>");
                if ($('.monster').length <= 2) {
                    random1 = Math.ceil(Math.random() * 100);
                    random2 = Math.ceil(Math.random() * 40);
                    countclick++;
                    $("#div1").append('<div class="monster" style="cursor:pointer;position: absolute;margin-left:' + random1 + '%;margin-top:' + random2 + '%;"></div>');
                    monsterclick();
                }
                $(this).remove();
                num=Number($("#score").text());
                num=num+1;
                $("#score").text(num);
            });
            //monsterclick();
        }
    </script>
<style>
body {
  background: #24aecd;
}

.monster {
  width: 190px;
  height: 240px;
  margin: 2% auto;
  background: url('images/monkey.png') left center;
  animation: play 0.8s steps(10) infinite;
  -webkit-animation:play 0.8s steps(10) infinite;
}

@keyframes play {
	100% { background-position: -1900px; }
}
@-webkit-keyframes play {
	100% { background-position: -1900px; }
}
</style>
<div style="font-size: 30px;color: black;">
กำลังทดสอบ : <?php echo  prename($resulttemp["ch_prename"])." ".$resulttemp["ch_name"]. " ".$resulttemp["ch_lastname"]?></div>
</div>
<div style="width: 90%.;margin-left: 5%">

<div>
        <h1 style="font-size:30px">Score : <span id="score">0</span></h1>
            <img src="images/clock.png" id="clockimg" style="position: absolute;right: 0px;top :0px;" />
<div id="clock" style="color:black;font-size: 30px;position: absolute;right: 60px;top :70px;"></div>
    </div>
  

   <div style="width:70%;margin-left:15%;position:relative;" id="div1">
  
    </div>
<script type="text/javascript">
   
    </script>
  