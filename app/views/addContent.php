<?php if(isset($message)){echo $message;} ?>
<style>
#cropImage {
	margin-left: 200px;
	width: 900px;
	height: 600px;
	position: relative; /*relative or fixed or absolute */
}
</style>
<script type="text/javascript" src="/scripts/welcome.js"></script>
<div class="top"> </div>
<div class="container">
  <div class="row"> 
    <!-- Logo -->
    <div class="col-md-3 logobrand"> <img src="img/logo.png" /> </div>
    <!-- 1. Search -->
    <div class="col-md-9 form1">
      
    </div>
  </div>
</div>
<div class="bottom"> </div>
<form name="addContent" action="saveContent" method="post" enctype="multipart/form-data" onsubmit="return validateSubmit();">
  <div class="container addContent">
    <div class="row">
      <div class="col-md-12"><label>Title:</label>
        <input id="titleText" type="text" class="loginTxtbx" name="title"/>
      </div>
      <div class="col-md-12"><label>Related Tags:</label>
        <input class="loginTxtbx" type="text" name="addTag" id="addTagTxt"/>
        <input type="button" class="btnLogin" value="Add Tag" id="addTagBtn"/>
      </div>
      <div class="col-md-12">
        <div id="selectedTagsDiv">
          <ul>
          </ul>
        </div>
      </div>
    </div>
  <div class="row">
    <!-- Post Text -->
    <div class="col-md-12"><label>Post Text:</label>
      <textarea rows="3" cols="80" name="postText" id="postText"></textarea>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div id="hiddenFieldsDiv"> 
        <!-- Hidden fields with name "tags" for selected tags appear here --> 
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div id="cropImage"></div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <input type="hidden" id="uploadedUrl" name="imageUrl" value="">
     <p> By posting this content, you here by state and agree that you are not performing any kind of copyright violation with respect to this content. Copyright violations could lead to suspension of your account on this site. ALL CONTENT WILL BE MODERATED before it is available for public viewing to make sure that the content is not abusive/offensive or voilate norms of this site.</p>
      <p><input type="submit" value="Post It!" class="btnLogin"/></p>
    </div>
  </div>
  </div>
  <!-- The image uploader goes into this div -->
</form>
<?php

