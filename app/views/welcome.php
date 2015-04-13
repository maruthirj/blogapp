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
	<div class="imagePanel col-md-7">
		<div id="flipbook">
			<div  style="background: white;">
				<?php include 'postView.php'?>
			</div>
		</div>
	</div>
	<!-- Tags -->
	<div class="col-md-3">
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