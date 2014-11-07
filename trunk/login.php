<div id="logindiv"> <form action="Javascript:fnc_login();" class="sign-up">
    <h1 class="sign-up-title"><?php echo "**";?>Login Systems<?php echo "**";?></h1>
    <input type="text" id="txt_user" name="txt_user" class="sign-up-input" placeholder="Username" required="required" autofocus>
    <input type="password" id="txt_pass" name="txt_pass" class="sign-up-input" placeholder="Password" required="required">
    <input type="submit" value="Login" class="sign-up-button">
  </form>
  <div style="background: #c0c0c0;width: 100%;"></div>
  <script>
$(function(){
//$("html,body").css({background:"rgb(41, 48, 12)"});
//#F8EF12;
$( "html,body" ).animate({
    background: "#F8EF12"
		
  }, 1500);
		

setTimeout(function() {
	$("#logindiv").fadeOut();
	$("#logindiv").remove();
	$("body").load("main.php");
}, 1500);
});

function fnc_login(){
$.ajax({
url:"login2.php",
type:"POST",
data:$(".sign-up").serialize()+"&ajax=1",
success:function(msg){
	if(msg=="true") {$("#logindiv").fadeOut(1000,function(){
		$("#logindiv").remove();
		$("html,body").css({background:""});
		 $( "html,body" ).animate({
	          background: "#F8EF12"
				
	        }, 1500);
				
		});
	setTimeout(function() {
		$("body").load("main.php");
	}, 1500);

	}
			
	else{ alert(msg);}
	
}
});
	
}
  </script>
  </div>