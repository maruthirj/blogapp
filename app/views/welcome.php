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
<div id="fb-root"></div>
<script>
(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.3";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

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
		<div id="fb_share" class="fb-like" data-href="http://www.flikbuk.com/<?php echo $post->post_key?>" data-layout="standard" data-action="like" data-show-faces="true" 
	       data-share="true"></div>
		 <br/><br/>
		 
		<button id="copy-button">Copy Link</button>
		<br/>
	</div>
	  <div class="tags">

	</div>
