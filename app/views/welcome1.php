<script type="text/javascript" src="/scripts/welcome.js"></script>
<div class="row">
	<!-- Logo -->
	<div class="col-md-3"><img src="img/logo.png" width="162px;" height="68px;"/></div>
	<!-- 1. Search -->	 
	<div class="col-md-9">
		<form action="" name="form" id="form" style="margin-left:0px;margin-top:10px;">
			<input type="text" name="search" id="search" size="50"/>
			<input type="button" value="Search" onclick="searchTag()" style="margin-left:0px;margin-top:10px;"/>
		</form>
	</div>
</div>

<div class="row">
	 <div class="col-md-2"> 
	 </div>
	<div class="imagePanel col-md-8">
		<div id="flipbook">
			<div  style="background: white;">
				<?php include 'postView.php'?>
			</div>
		</div>
	</div>
	<!-- Tags -->
	<div class="col-md-2">
		<div class="tags">
			<!-- End of Tags -->
		</div>
	</div>
</div>
<!-- Rating, facebook, twitter and copy -->
<div class="row">
	<div class="col-md-12">
		<input type="hidden" id="ratingVal" value="0"></input>
		<div id="ratingTable">
			<span><img id="img1" src="img/star_empty.png" onmouseover="fillImg(1)" onmouseout="normalImg(1)" 
				onClick="giveRating(1)" height="42" width="42"></span>
			<span><img id="img2" src="img/star_empty.png" onmouseover="fillImg(2)" onmouseout="normalImg(2)" 
				onClick="giveRating(2)" height="42" width="42"></span>
			<span><img id="img3" src="img/star_empty.png" onmouseover="fillImg(3)" onmouseout="normalImg(3)" 
				onClick="giveRating(3)" height="42" width="42"></span>
			<span><img id="img4" src="img/star_empty.png" onmouseover="fillImg(4)" onmouseout="normalImg(4)" 
				 onClick="giveRating(4)" height="42" width="42"></span>
			<span><img id="img5" src="img/star_empty.png" onmouseover="fillImg(5)" onmouseout="normalImg(5)" 
				onClick="giveRating(5)" height="42" width="42"></span>
			<!-- Facebook Share Button below images-->
			<span class="fb-share-button" data-href="" data-layout="button"></span>
		</div>
	
		<!-- Twitter Button below images-->
		<a class="twitter-share-button" data-url="" data-related="twitterdev" data-size="large" data-count="none">Tweet</a>
	
		<!--  Button to copy the image link below images-->
		<button id="copy-button">Copy Link</button>
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