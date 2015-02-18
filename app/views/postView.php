<input name="postKeyUrl" type="hidden" value="<?php echo $post->keyForLink() ?>"/>
<input name="postKey" type="hidden" value="<?php echo $post->post_key ?>"/>
<input name="title" type="hidden" value="<?php echo $post->title ?>"/>
<div class="posttitle">
<?php echo $post->title ?>
</div>
<div class="postImage">
<img src="/img/content/<?php echo $post->post_key?>"/>
</div>
<div class="postText">
<?php echo $post->post_text ?>
</div>
<div>
<input type="hidden" value="http://<?php echo $_SERVER['HTTP_HOST']?>/<?php echo $post->post_key?>" name="postLink" id="postLinkInput"/>
</div>
