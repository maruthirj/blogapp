<input name="postKeyUrl" type="hidden" value="<?php echo $post->keyForLink() ?>"/>
<input name="postKey" type="hidden" value="<?php echo $post->post_key ?>"/>
<input name="title" type="hidden" value="<?php echo $post->title ?>"/>
<!--<link href="style.css" rel="stylesheet"> -->
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
<div id="fb-root"></div>
<script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
<script>
var pageCollection = $("input[id='rating']");
if(pageCollection.size()>0){
	var lastPostInput = pageCollection.get(pageCollection.size()-2);
	var rating = $(lastPostInput).val();
	if(document.getElementById("ratingVal") != null){
		document.getElementById("ratingVal").value=rating;
	}
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
</div>
<div>
<input type="hidden" value="http://<?php echo $_SERVER['HTTP_HOST']?>/<?php echo $post->post_key?>" name="postLink" id="postLinkInput"/>
</div>
<div  style="margin-top:60px;margin-left:622px;">

<!-- Facebook Share Button below images
			<span class="fb-share-button" data-href="" data-layout="button"></span>-->
		<!-- Twitter Button below images
		<a class="twitter-share-button" data-url="" data-related="twitterdev" data-size="large" data-count="none">Tweet</a>-->
	
		<!--  Button to copy the image link below images
		<button id="copy-button">Copy Link</button>-->
        <div class="socialicon">
		
        <div class="social" ><a class="socialicon1" href="https://www.facebook.com/login.php?next=https%3A%2F%2Fwww.facebook.com%2Fsharer%2Fsharer.php%3Fapp_id%3D309437425817038%26sdk%3Djoey%26u%3Dhttp%253A%252F%252Fwww.flikbuk.com%2Fimg%2Fcontent%2F<?php echo $post->post_key ?>%26display%3Dpopup%26ref%3Dplugin%26src%3Dshare_button%26ret%3Dlogin&display=popup" target="_blank"></a></div>
        <div class="social"><a class="socialicon2" href="https://twitter.com/intent/tweet?original_referer=http%3A%2F%2Fwww.flikbuk.com%2F<?php echo $post->post_key ?>&related=twitterdev&text=Flikbuk&tw_p=tweetbutton&url=http%3A%2F%2Fwww.flikbuk.com%2F" target="_blank"></a></div>
        <div class="social"><a class="socialicon3" href="#" target="_blank"></a></div>
       <!-- <div class="social"><a class="socialicon4" href="#" target="_blank"></a></div>
        <div class="social"><a class="socialicon5" href="#" target="_blank"></a></div> -->
        </div>
		
</div>

