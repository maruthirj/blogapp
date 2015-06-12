<script type="text/javascript" src="/scripts/welcome.js"></script>
<!--<link href="img/style.css" rel="stylesheet">-->
<link href='http://fonts.googleapis.com/css?family=Audiowide' rel='stylesheet' type='text/css'>

<!--<link href="../../public/css/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css">-->

<script type="text/javascript">
	$("#flipbook").turn({
		width: 400,
		height: 300,
		autoCenter: true
	});
</script>

<script src="/scripts/tagcanvas.min.js" type="text/javascript"></script>
    <script type="text/javascript">
      window.onload = function() {
        try {
          TagCanvas.Start('myCanvas','tags',{
            textColour: '#ff0000',
            outlineColour: '#ff00ff',
            reverse: true,
            depth: 0.8,
            maxSpeed: 0.05
          });
        } catch(e) {
          // something went wrong, hide the canvas container
          document.getElementById('myCanvasContainer').style.display = 'none';
        }
      };
function turnPrevPage(){
	$("#flipbook").turn("previous");
}

function turnNextPage(){
	$("#flipbook").turn("next");
}
    </script>

<body>

<!--<div class="bottom">
</div>
-->

<div class="container-fluid">
<div class="row">
	 <!-- Logo -->
	<div class="col-md-2 logobrand">
    <img src="img/logo.png" />
    </div>
	<div class="imagePanel col-md-8 banner">
		<div id="flipbook">
			<div  style="background: white;">
				<?php include 'postView.php'?>
                
			</div>
		</div>
        
        <div class="controlBtn"><div class="left"><img src="img/left.jpg" onclick="turnPrevPage()"/></div>
        <div class="right"><img src="img/right.jpg" onclick="turnNextPage()"/></div></div>
	</div>
	<!-- Tags -->
	<div class="col-md-2 clouds">
		<div class="tags">
			
            <img src="img/hr.png" />
            
		</div>
	</div>
</div>
	</div>


<!-- Rating, facebook, twitter and copy -->
<div class="row">
<!-- 1. Search -->	 
	<div class="col-md-2 form">
		<form action="" name="form" id="form" style="margin-left: 10px; margin-top: -658px; float:right">
			<input type="text" name="search" id="search" size="20" class="sreachtab"/>
			<input type="button" style="margin-right: -35px;" value="" onClick="searchTag()" class="searchbtn" />
		</form>
	</div>
	<div class="col-md-2">
	 <div class="logpanel">
	<a href="/addContent" style="text-decoration: none;">
	<h1 style="border-radius: 6px; width:176px;font-family: Audiowide,cursive; font-size: 18px;margin-left: -210px;margin-top: -64px;"> Contribute </h1></a>
    <!-- <div class="add"></div> -->
	 </div>
	 </div>
	<div class="stars">
		<input type="hidden" id="ratingVal" value="0"></input>
		<div id="ratingTable">
			<span><img id="img1" src="img/star_empty.png" onMouseOver="fillImg(1)" onMouseOut="normalImg(1)" 
				onClick="giveRating(1)" height="42" width="42"></span>
			<span><img id="img2" src="img/star_empty.png" onMouseOver="fillImg(2)" onMouseOut="normalImg(2)" 
				onClick="giveRating(2)" height="42" width="42"></span>
			<span><img id="img3" src="img/star_empty.png" onMouseOver="fillImg(3)" onMouseOut="normalImg(3)" 
				onClick="giveRating(3)" height="42" width="42"></span>
			<span><img id="img4" src="img/star_empty.png" onMouseOver="fillImg(4)" onMouseOut="normalImg(4)" 
				 onClick="giveRating(4)" height="42" width="42"></span>
			<span><img id="img5" src="img/star_empty.png" onMouseOver="fillImg(5)" onMouseOut="normalImg(5)" 
				onClick="giveRating(5)" height="42" width="42"></span>
			<!-- Facebook Share Button below images-->
			<!--<span class="fb-share-button" data-href="" data-layout="button"></span>-->
		</div>
	</div>
</div>
<div class="clearfix"></div>
<div class="footer">
<div class="container">
<div class="row">

<!-- Facebook Share Button below images
			<span class="fb-share-button" data-href="" data-layout="button"></span>-->
		<!-- Twitter Button below images
		<a class="twitter-share-button" data-url="" data-related="twitterdev" data-size="large" data-count="none">Tweet</a>-->
	
		<!--  Button to copy the image link below images
		<button id="copy-button">Copy Link</button>-->
        <div class="socialicon">
		
        <div class="social" ><a class="socialicon1" href="https://www.facebook.com/login.php?next=https%3A%2F%2Fwww.facebook.com%2Fsharer%2Fsharer.php%3Fapp_id%3D309437425817038%26sdk%3Djoey%26u%3Dhttp%253A%252F%252Fwww.flikbuk.com%252F%26display%3Dpopup%26ref%3Dplugin%26src%3Dshare_button%26ret%3Dlogin&display=popup" target="_blank"></a></div>
        <div class="social"><a class="socialicon2" href="https://twitter.com/intent/tweet?original_referer=http%3A%2F%2Fwww.flikbuk.com%2F&related=twitterdev&text=Flikbuk&tw_p=tweetbutton&url=http%3A%2F%2Fwww.flikbuk.com%2F" target="_blank"></a></div>
        <div class="social"><a class="socialicon3" href="#" target="_blank"></a></div>
        <div class="social"><a class="socialicon4" href="#" target="_blank"></a></div>
        <div class="social"><a class="socialicon5" href="#" target="_blank"></a></div>
        </div>
		
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
</body>