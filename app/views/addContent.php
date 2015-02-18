<?php if(isset($message)){echo $message;} ?><br/>
<script src="components/jquery.googleSuggest.js"></script>
<script src="components/croppic/croppic.js"></script>
<script src="scripts/addContent.js"></script>
<link href="components/croppic/croppic.css" type="text/css" rel="stylesheet"/>
<style>
	#cropImage {
			margin-left: 200px;
			width: 900px;
			height: 600px;
			position:relative; /*relative or fixed or absolute */
	}
</style>
<form name="addContent" action="saveContent" method="post" enctype="multipart/form-data" onsubmit="return validateSubmit();">
Title: <input id="titleText" type="text" name="title"/>
Post Text:	<textarea rows="3" cols="80" name="postText" id="postText"></textarea><br/>
Related Tags: <input type="text" name="addTag" id="addTagTxt"/><input type="button" value="Add Tag" id="addTagBtn"/> <br/>
<div id="selectedTagsDiv">
	<ul>
		<!-- LI elements for selected tags appear here -->
	</ul>
</div>
<div id="hiddenFieldsDiv">
	<!-- Hidden fields with name "tags" for selected tags appear here -->
</div>
<!-- The image uploader goes into this div -->
<div id="cropImage"></div>
<input type="hidden" id="uploadedUrl" name="imageUrl" value="">
By posting this content, you here by state and agree that you are not performing any kind of copyright violation with respect to this content. Copyright violations could lead to suspension of your account on this site. ALL CONTENT WILL BE MODERATED before it is available for public viewing to make sure that the content is not abusive/offensive or voilate norms of this site.
<input type="submit" value="Post It!"/>
</form>
<?php
