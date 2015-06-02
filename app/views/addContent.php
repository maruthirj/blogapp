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
<br/>
<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(isset($_SESSION['actionPerformed'])){
	if($_SESSION['actionPerformed'] =="post"){
	   echo "Hii";
		if(isset($message)){
			echo $message;
		}
		echo '<input type="hidden" id="makeStory" value="false" />';
	}else if($_SESSION['actionPerformed'] =="finish"){
		echo '<input type="hidden" id="makeStory" value="false" />';
	}else if($_SESSION['actionPerformed'] =="addStories"){
		$postkeys = $_SESSION['postkeys'];
		$arr = explode(",",$postkeys);
		echo '<div style="margin-left:10%;width:1000px; height:100px; overflow: auto;" >';
		echo '<table style="margin-left:1%">';
		echo '<tr>';
		foreach($arr as $value){
		$postk=$value;
		echo '<td><img src="/img/content/'.$postk.'" alt="" style="width:82px; height:60px;"></td>';
		echo '<td>&nbsp;&nbsp;</td>';
		}
		echo '</tr>'; 
		echo '</table>';
		echo '</div>';
		echo '<input type="hidden" id="makeStory" value="true" /><br/>';
		echo '<form name="finishStory" id="finishStory" action="saveContent" method="post">';
		echo '<table style="margin-left:10%">';
		echo '<tr>';
		echo '<td><input style="margin-left:10%" type="button" value="Next" onclick="next()" class="btnLogin"/></td>';
		echo '<td>&nbsp; &nbsp; &nbsp;</td>';
		echo '<td><input type="submit" value="Finish" class="btnLogin"/></td>';
		echo '<input type="hidden" id="actionPerformed" name="actionPerformed" value="finish">';
		echo '</tr></table></form>';
		
	 }
 }
 ?>
 <body onload="hideForm()">
<form name="addContent" id="addContent" action="saveContent" method="post" enctype="multipart/form-data" onsubmit="return validateSubmit();">
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
	  <input type="hidden" id="actionPerformed" name="actionPerformed" value="">
     <p> By posting this content, you here by state and agree that you are not performing any kind of copyright violation with respect to this content. Copyright violations could lead to suspension of your account on this site. ALL CONTENT WILL BE MODERATED before it is available for public viewing to make sure that the content is not abusive/offensive or voilate norms of this site.</p>
	 <div class="col-md-1">
      <p><input type="submit" value="Post It!" id="postBtn" onclick="upload('post')" class="btnLogin"/></p>
    </div>
	<div class="col-md-4">
		<p><input type="submit" value="Make Story!" onclick="upload('addStories')" class="btnLogin"/></p>
	</div>
  </div>

  </div>
  <!-- The image uploader goes into this div -->
</form>
</body>
<script type="text/javascript">
 function upload(val){
   document.getElementById("actionPerformed").value= val;
   document.getElementById("addContent").submit();
 }
 function next(){
   document.getElementById("addContent").style.display = "block"
 }
 
 function hideForm(){
	if(document.getElementById("makeStory").value == "true"){
		document.getElementById("addContent").style.display = "none";
		document.getElementById("postBtn").style.display = "none";
	}
 }
</script>
<?php

