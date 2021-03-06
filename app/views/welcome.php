<script type="text/javascript" src="/scripts/welcome.js"></script>
<!--<link href="img/style.css" rel="stylesheet">-->
<link href='http://fonts.googleapis.com/css?family=Audiowide'
	rel='stylesheet' type='text/css'>

<!--<link href="../../public/css/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css">-->


<script src="/scripts/tagcanvas.min.js" type="text/javascript"></script>
<script type="text/javascript">
      $(document).ready(function(){
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
		  if(document.getElementById('myCanvasContainer') != null){
			document.getElementById('myCanvasContainer').style.display = 'none';
		  }
        }
      });
	function turnPrevPage(){
		$("#flipbook").turn("previous");
	}
	
	function turnNextPage(){
		$("#flipbook").turn("next");
	}
</script>

<div class="row">
	<!-- Logo -->
	<div class="col-md-2">
		<img src="img/logo.png" />
		<!-- 1. Search -->
		<form action="/" name="form" id="form">
			<input type="text" name="search" id="search" class="sreachtab" /> <input
				type="button" value="" onClick="searchTag()" class="searchbtn" />
		</form>
		<hr>
		Engross and Engage the world. Show off your pictures and knowledge.
		<a href="/addContent" style="text-decoration: none;">
			<h1>Contribute</h1>
		</a>
	</div>
	<div class="imagePanel col-md-8 banner">
		<div id="flipbook">
			<div style="background: white;">
			<?php include 'postView.php'?>
			</div>
		</div>

		<div class="controlBtn">
			<div class="left">
				<img src="img/left.jpg" onclick="turnPrevPage()" />
			</div>
			<div class="right">
				<img src="img/right.jpg" onclick="turnNextPage()" />
			</div>
		</div>
	</div>
	<!-- Tags -->
	<div class="col-md-2 clouds">
		<div class="tags">

			<img src="img/hr.png" />

		</div>
	</div>
</div>



<script type="text/javascript">
	function searchTag(){
	   var form = document.getElementById("form");
	   //form.action = "/tag="+document.getElementById("search").value;
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
