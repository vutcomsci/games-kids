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
        // Get a random number between 1-10 and add 3, to get one between 4-13:
        $(function () {
            $("html,body").css({"background":"#24aecd"});
            $(".site-header").hide();
           // alert(Math.ceil(Math.random() * 2)-1);
           // alert($(window).height());
            $("#div1").css({"max-height":($(window).height()*50)/100+"px","min-height":($(window).height()*50)/100+"px"});
            setInterval(function () {
                random1 = Math.ceil(Math.random() * 100);
                random2 = Math.ceil(Math.random() * 40);
                $("#div1").append('<div class="monster" style="cursor:pointer;position: absolute;margin-left:' + random1 + '%;margin-top:' + random2 + '%;"></div>');
             //   console.log($('.monster').length);
                 monsterclick();
                setTimeout(function () {
                    $(".monster:first").remove();
                }, 2000);
            }, 1500);
            
        });
        function monsterclick() {
            $(".monster").click(function () {
                if ($('.monster').length <= 2) {
                    random1 = Math.ceil(Math.random() * 100);
                    random2 = Math.ceil(Math.random() * 40);
					
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

    </div>
   <div style="width:70%;margin-left:15%;position:relative;" id="div1">
  
    </div>

  