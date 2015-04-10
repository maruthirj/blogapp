<script type="text/javascript" src="/components/jquery/jquery.js"></script>
<script type="text/javascript" src="/components/turn/turn.js"></script>
<script type="text/javascript" src="/components/zeroclipboard/ZeroClipboard.js"></script>
<script type="text/javascript" src="/scripts/welcome.js"></script>

<style>
		@import url(//fonts.googleapis.com/css?family=Lato:700);

		body {
			margin:0;
			font-family:'Lato', sans-serif;
			color: #999;
		}

		a, a:visited {
			text-decoration:none;
		}

		h1 {
			font-size: 32px;
			margin: 16px 0 0 0;
		}


</style>
	<div class="container">
	     <div class="row">
	<!-- 1. Search -->	 
	<div class="col-md-4">
	<form action="" name="form" id="form" style="margin-left:-252px;margin-top:6px;">
		<input type="text" name="search" id="search" size="50"/>
		<input type="button" value="Search" onclick="searchTag()"/>
	</form>
	</div>
	</div>
	<!-- End Search -->
	<div class="row">
	<!-- 2. Image Pannel -->
	<div class="col-md-4">
	<div class="imagePanel" style="margin-top:10px; margin-left:-252px;">
		<div id="flipbook">
			<div  style="background: white;">
			<?php include 'postView.php'?>
			</div>
		</div>
		</div>
	<!-- End image Pannel -->
	</div>
	</div>
	
	<div class="row" style="margin-left:-266px;">
    <div class="col-md-4">
	<input type="hidden" id="ratingVal" value="0"/>
		<div id="ratingTable">
		  <tr>
		    <td><img id="img1" src="img/star_empty.png" onmouseover="fillImg(1)" onmouseout="normalImg(1)" 
			onClick="giveRating(1)" height="42" width="42"></td>
			<td><img id="img2" src="img/star_empty.png" onmouseover="fillImg(2)" onmouseout="normalImg(2)" 
			onClick="giveRating(2)" height="42" width="42"></td>
			<td><img id="img3" src="img/star_empty.png" onmouseover="fillImg(3)" onmouseout="normalImg(3)" 
			onClick="giveRating(3)" height="42" width="42"></td>
			<td><img id="img4" src="img/star_empty.png" onmouseover="fillImg(4)" onmouseout="normalImg(4)" 
			 onClick="giveRating(4)" height="42" width="42"></td>
			<td><img id="img5" src="img/star_empty.png" onmouseover="fillImg(5)" onmouseout="normalImg(5)" 
			onClick="giveRating(5)" height="42" width="42"></td>
		  </tr>
		</div>
		</div>
		</div>
		<div class="row">
		<div class="col-md-4" style="margin-left:-249px;">
		<!-- Facebook Share Button below images-->
		<div class="fb-share-button" data-href="" data-layout="button"></div>
		
		<!-- Twitter Button below images-->
		<a class="twitter-share-button" data-url="" data-related="twitterdev" data-size="large" data-count="none"/>Tweet</a>
		
		<!--  Button to copy the image link below images-->
		<button id="copy-button">Copy Link</button>
		</div>
		
		<!-- 3. Tags -->
		<div class="row">
		<div class="col-md-4">	
		<div class="tags"></div>
		</div>
		<!-- End of Tags -->
		</div>
		</div>
	</div>
	
<script type="text/javascript">
function searchTag(){
   var form = document.getElementById("form");
   form.action = "/tag="+document.getElementById("search").value;
   form.submit();
   return false;
}
//this fuction deals with facebook share..
(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.3";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

//this function deals with twitter share..
window.twttr=(function(d,s,id){
	var js,fjs=d.getElementsByTagName(s)[0],t=window.twttr||{};
	if(d.getElementById(id))return;js=d.createElement(s);
	js.id=id;
	js.src="https://platform.twitter.com/widgets.js";
	fjs.parentNode.insertBefore(js,fjs);t._e=[];
	t.ready=function(f){t._e.push(f);};return t;
}(document,"script","twitter-wjs"));

//Below codes deal with image ratings..
function giveRating(imgNo) {
	for(var i=1;i<=imgNo;i++){
	  document.getElementById("img"+i).src = "img/star_filled.png";
	}
	for(var i=imgNo+1;i<=5;i++){
	  document.getElementById("img"+i).src = "img/star_empty.png";
	}
	document.getElementById("ratingVal").value=imgNo;
	if(confirm("Click on 'Ok' to save your rating..")==true){
		saveRating();
   }
}

//script to save ratings
function saveRating(){
    if(document.getElementById("ratingVal").value>0){
		var imgNo = document.getElementById("ratingVal").value;
		var pageCollection = $("input[id='postId']");
		var postId = "";
		if(pageCollection.size()>0){
			var lastPostInput = pageCollection.get(pageCollection.size()-2);
			var postId = $(lastPostInput).val();
		}
		$.ajax({
			url:'saveRating?rating='+imgNo+'&postId='+postId,
			type:'post',
			success:function(val){
			}
		});
		document.getElementById("ratingTable").style.display="none";
	}
	}
	
function fillImg(imgNo) {
    var ratingVal = document.getElementById("ratingVal").value;
	if(imgNo <= ratingVal){
	  return false;
	}
	for(var i=1;i<=imgNo;i++){
	  document.getElementById("img"+i).src = "img/star_filled.png";
	}
}

function normalImg(imgNo) {
	var ratingVal = document.getElementById("ratingVal").value;
	if(imgNo <= ratingVal){
	  return false;
	}
	var val = 1;
	if(ratingVal>0){
		val = parseInt(ratingVal)+1;
	}
	for(var i=val;i<=imgNo;i++){
	  document.getElementById("img"+i).src = "img/star_empty.png";
	}
}
</script>