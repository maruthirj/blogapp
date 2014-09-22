<?php if(isset($message)){echo $message;} ?><br/>
<form name="addContent" action="saveContent" method="post" enctype="multipart/form-data">
Title: <input type="text" name="title"/>
Post Text:	<textarea rows="3" cols="80" name="postText"></textarea><br/>
Image:	<input type="file" name="postImage"/><br/>
<input type="submit" value="Post It!"/>
</form>
<?php
