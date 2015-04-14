<?php if(isset($message)){echo $message;} ?><br/>
<head>
<script src="components/jquery.googleSuggest.js"></script>
<script src="components/croppic/croppic.js"></script>
<script src="scripts/addContent.js"></script>
<link href="components/croppic/croppic.css" type="text/css" rel="stylesheet"/>
</head>
<style>
	#cropImage {
			margin-left: 200px;
			width: 900px;
			height: 600px;
			position:relative; /*relative or fixed or absolute */
	}
</style>
<script type="text/javascript" src="/scripts/welcome.js"></script>
<div class="row">
	<!-- Logo -->
	<div class="col-md-2">
		<img src="img/logo.png" width="162px;" height="68px;"/>
	</div>
		 
		<form name="addContent" action="saveContent" method="post" enctype="multipart/form-data" onsubmit="return validateSubmit();">
		<!-- Title -->
		<div class="col-md-2">
		Title: <input id="titleText" type="text" name="title"/>
		</div>
		</div>
		
		<div class="row">
		 <div class="col-md-2"> 
	 </div>
		<!-- Post Text -->
		<div class="col-md-5">Post Text: <textarea rows="3" cols="80" name="postText" id="postText"></textarea><br/>
		</div>
		<div class="col-md-4">
		Related Tags: <input type="text" name="addTag" id="addTagTxt"/><input type="button" value="Add Tag" id="addTagBtn"/> <br/>
		</div>
		<div class="col-md-9">
		<div id="selectedTagsDiv">
			<ul>
				<!-- LI elements for selected tags appear here -->
			</ul>
		</div>
		</div>
		
		<div class="row">
		<div class="col-md-9">
		<div id="hiddenFieldsDiv">
			<!-- Hidden fields with name "tags" for selected tags appear here -->
		</div>
		</div>
		</div>
		<!-- The image uploader goes into this div -->
		<div class="row">
		<div class="col-md-3">
		<div id="cropImage"></div>
		</div>
		</div>
		<div class="row">
		<div class="col-md-12">
		<input type="hidden" id="uploadedUrl" name="imageUrl" value="">
		By posting this content, you here by state and agree that you are not performing any kind of copyright violation with respect to this content. Copyright violations could lead to suspension of your account on this site. ALL CONTENT WILL BE MODERATED before it is available for public viewing to make sure that the content is not abusive/offensive or voilate norms of this site.
		<input type="submit" value="Post It!"/>
		</div>
		
		</form>
	</div>
<?php
