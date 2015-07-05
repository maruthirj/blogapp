<input name="postKeyUrl" type="hidden" value="<?php echo $post->keyForLink() ?>"/>
<input name="postKey" type="hidden" value="<?php echo $post->post_key ?>"/>
<input name="title" type="hidden" value="<?php echo $post->title ?>"/>
<div class="posttitle">
<?php echo $post->title ?>
</div>
<div class="postImage" id="postImage">
<img src="/img/content/<?php echo $post->post_key?>"/>
</div>
<input type="hidden" id="rating" value="<?php echo $post->overall_rating ?>"/>
<input type="hidden" id="postId" value="<?php echo $post->id ?>"/>
<div class="postText">
<?php echo $post->post_text ?>
	<div>
	        <a class="socialicon1" href="https://www.facebook.com/login.php?next=https%3A%2F%2Fwww.facebook.com%2Fsharer%2Fsharer.php%3Fapp_id%3D309437425817038%26sdk%3Djoey%26u%3Dhttp%253A%252F%252Fwww.flikbuk.com%2Fimg%2Fcontent%2F<?php echo $post->post_key ?>%26display%3Dpopup%26ref%3Dplugin%26src%3Dshare_button%26ret%3Dlogin&display=popup" target="_blank"></a>
	        <a class="socialicon2" href="https://twitter.com/intent/tweet?original_referer=http%3A%2F%2Fwww.flikbuk.com%2F<?php echo $post->post_key ?>&related=twitterdev&text=Flikbuk&tw_p=tweetbutton&url=http%3A%2F%2Fwww.flikbuk.com%2F" target="_blank"></a>
			<input type="hidden" id="ratingVal" value="0"></input>
			
				<span style="float: left;"><img id="img1" src="img/star_empty.png"
							onMouseOver="fillImg(1)" onMouseOut="normalImg(1)"
					onClick="giveRating(1)" height="42" width="42"></span> 
				<span style="float: left;"><img
					id="img2" src="img/star_empty.png" onMouseOver="fillImg(2)"
					onMouseOut="normalImg(2)" onClick="giveRating(2)" height="42"
					width="42"></span> 
				<span  style="float: left;"><img id="img3" src="img/star_empty.png"
					onMouseOver="fillImg(3)" onMouseOut="normalImg(3)"
					onClick="giveRating(3)" height="42" width="42"></span> 
				<span style="float: left;"><img
					id="img4" src="img/star_empty.png" onMouseOver="fillImg(4)"
					onMouseOut="normalImg(4)" onClick="giveRating(4)" height="42"
					width="42"></span> 
				<span style="float: left;"><img id="img5" src="img/star_empty.png"
					onMouseOver="fillImg(5)" onMouseOut="normalImg(5)"
					onClick="giveRating(5)" height="42" width="42"></span>
	</div>	
	<input type="hidden" value="http://<?php echo $_SERVER['HTTP_HOST']?>/<?php echo $post->post_key?>" name="postLink" id="postLinkInput"/>
</div>
<script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
<script>
var pageCollection = $("input[id='rating']");
if(pageCollection.size()>0){
	var lastPostInput = pageCollection.get(pageCollection.size()-2);
	var rating = $(lastPostInput).val();
	if(document.getElementById("ratingVal") != null){
		document.getElementById("ratingVal").value=rating;
	}
	//This code has to change. ratingTable is gone
	if(document.getElementById("ratingTable") != null){
		if(rating!=""){
			document.getElementById("ratingTable").style.display="none";
		}else{
			document.getElementById("ratingTable").style.display="block";
		}
	}
	/*for(var i=1;i<=rating;i++){
	  document.getElementById("img"+i).src = "img/star_filled.png";
	}*/
}
if (typeof(FB) != 'undefined' && FB != null ) {
	FB.XFBML.parse();
}
//$(".twitter-share-button").attr('data-url',document.location.href);
if (typeof(twttr.widgets) != 'undefined' && twttr.widgets != null ) {
	twttr.widgets.load();
}

</script>
