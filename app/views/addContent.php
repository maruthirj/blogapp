<?php if(isset($message)){echo $message;} ?><br/>
<script src="components/jquery.googleSuggest.js"></script>
<script src="scripts/addContent.js"></script>
<form name="addContent" action="saveContent" method="post" enctype="multipart/form-data">
Title: <input type="text" name="title"/>
Post Text:	<textarea rows="3" cols="80" name="postText"></textarea><br/>
Image:	<input type="file" name="postImage"/><br/>
Related Tags: <input type="text" name="addTag" id="addTagTxt"/><input type="button" value="Add Tag" id="addTagBtn"/> <br/>
<div id="selectedTagsDiv">
	<ul>
		<!-- LI elements for selected tags appear here -->
	</ul>
</div>
<div id="hiddenFieldsDiv">
	<!-- Hidden fields with name "tags" for selected tags appear here -->
</div>
<input type="submit" value="Post It!"/>
</form>
<?php
