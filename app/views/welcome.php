<script type="text/javascript" src="/components/jquery/jquery.js"></script>
<script type="text/javascript" src="/components/turn/turn.js"></script>
<script type="text/javascript" src="/components/zeroclipboard/ZeroClipboard.js"></script>
<script type="text/javascript" src="/scripts/welcome.js"></script>

<style>
		@import url(//fonts.googleapis.com/css?family=Lato:700);

		.left {
			width: 15%;
			left: 0px;
			top: 0px;
			position: absolute;
		}
		.imagePanel {
			width: 70%;
			left: 15%;
			top: 0px;
			position: absolute;
		}
		.tags{
			width: 15%;
			left: 85%;
			top: 0px;
			position: absolute;
		}


</style>
<script type="text/javascript">
function searchTag(){
   var form = document.getElementById("form");
   form.action = "/tag="+document.getElementById("search").value;
   form.submit();
   return false;
}
</script>

<script>
//this fuction deals with facebook share
(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.3";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

//this function deals with twitter share
window.twttr=(function(d,s,id){
	var js,fjs=d.getElementsByTagName(s)[0],t=window.twttr||{};
	if(d.getElementById(id))return;js=d.createElement(s);
	js.id=id;
	js.src="https://platform.twitter.com/widgets.js";
	fjs.parentNode.insertBefore(js,fjs);t._e=[];
	t.ready=function(f){t._e.push(f);};return t;
}(document,"script","twitter-wjs"));
</script>

<div id="fb-root"></div>
	<form action="" name="form" id="form">
		<input type="text" name="search" id="search"/><input type="button" value="Search" onclick="searchTag()"/>
	</form>
	<div class="left">

	</div>
	
	<div class="imagePanel">
		<div id="flipbook">
			<div  style="background: white;">
			<?php include 'postView.php'?>
			</div>
		</div>
		<!-- Facebook Share Button below images-->
		<div class="fb-share-button" data-href="" data-layout="button"></div>
		<!-- Twitter Button below images-->
		<a class="twitter-share-button" data-url="" data-related="twitterdev" data-size="large" data-count="none"/>Tweet</a>
		 <br/><br/>
		 <!--  Button to copy the image link below images-->
		<button id="copy-button">Copy Link</button>
		<br/>
	</div>
	<div class="tags"></div>
	