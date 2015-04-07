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
<div id="fb-root"></div>
<script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
<script>
var pageCollection = $("input[id='rating']");
if(pageCollection.size()>0){
	var lastPostInput = pageCollection.get(pageCollection.size()-2);
	var rating = $(lastPostInput).val();
	document.getElementById("ratingVal").value=rating;
	if(rating!=""){
		document.getElementById("ratingTable").style.display="none";
	}else{
		document.getElementById("ratingTable").style.display="block";
	}
	/*for(var i=1;i<=rating;i++){
	  document.getElementById("img"+i).src = "img/star_filled.png";
	}*/
}
FB.XFBML.parse();
//$(".twitter-share-button").attr('data-url',document.location.href);
twttr.widgets.load();

</script>
</div>
<div>
<input type="hidden" value="http://<?php echo $_SERVER['HTTP_HOST']?>/<?php echo $post->post_key?>" name="postLink" id="postLinkInput"/>
</div>

