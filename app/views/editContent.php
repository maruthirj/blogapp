<!doctype html>
<html lang="en">
<head>
<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 5px;
    text-align: left;
}
</style>
  <script>
  $(function() {
    $( "#dialog" ).dialog({
        autoOpen: false,
		modal: true,
		height: 280,
		width: 390,
		top:410,
		closeOnEscape: true,
		open: function(){
			jQuery('.ui-widget-overlay').bind('click',function(){
				jQuery('#dialog').dialog('close');
			});
		}
	   });
 
  });
  function editContent(title,postText,tag,pid,tid){
		$("#titleId").val(title);
		$("#postTextId").val(postText);
		$("#addTagTxt").val(tag);
		$("#pid").val(pid);
		$("#tid").val(tid);
		$('#dialog').dialog('open');
  }
  function submit(){
		var title = $("#titleId").val();
		var postText = $("#postTextId").val();
		var tag= $("#addTagTxt").val();
		var pid = $("#pid").val();
		var tid = $("#tid").val();
		$.ajax({
		   	type: "POST",
			url:'saveEditContent?title='+title+"&postText="+postText+"&tag="+tag+"&pid="+pid+"&tid="+tid,
			success:function(res){
				jQuery('#dialog').dialog('close');
				window.location="/editContent";
			}
		});
  }
  function cancel(){
	jQuery('#dialog').dialog('close');
  }
  </script>
</head>
<body>
<div class="row">
	<!-- Logo -->
	<div class="col-md-2">
		<img src="img/logo.png" width="162px;" height="68px;"/>
	</div> 
<div id="dialog" style="width:30px;height:60px;display: none;z-index:10000" title="Edit Content">
		<table style="width:30%;border: 0px">
		 <tr>
		  <td style="font-size:14px;border: 0px">Title</td>
		  <td style="border: 0px"><input type="text" id="titleId" name="titleId"> </td>
		 </tr>
		 <tr>
		  <td style="font-size:14px;border: 0px">Post Text</td>
		  <td style="border: 0px"><input type="text" id="postTextId" name="postTextId"> </td>
		 </tr>
		 <tr>
		  <td style="font-size:14px;border: 0px">Tag</td>
		  <td style="border: 0px"><input type="text"  name="addTagTxt" id="addTagTxt"> </td>
		 </tr>
		 <tr>
		  <td style="font-size:14px;border: 0px"></td>
		  <td style="border: 0px"></td>
		 </tr>
		 <tr>
		  <td style="border: 0px"><input style="font-size:18px" type="button" onclick="submit();" value="Submit"> </td>
		  <td style="border: 0px"><input style="font-size:18px" type="button" onclick="cancel();" value="Cancel"> </td>
		  <td style="border: 0px"><input type="hidden" id="pid" name="pid"> </td>
		  <td style="border: 0px"><input type="hidden" id="tid" name="tid"> </td>
		 </tr>
		</table>
</div>
 
 <table style="width:70%">
  <caption>Posts Lists</caption>
<tr>
<th>Post Key</th>
<th>Title</th>
<th>Post Text</th>
<th>Tag</th>
</tr>
<?php 
$userId = Auth::id();
$results = array(DB::select('select p.id as pid,p.post_key,p.title,p.post_text,t.id as tid,t.name from posts p join posttagranks pt on p.id=pt.post_id
 join tags t on pt.tag_id=t.id where p.user_id=?' ,array($userId)));
foreach($results as $data){
  foreach($data as $value){
	echo '<tr>';
    echo '<td>'.$value->post_key.'</td>';
	echo '<td>'.$value->title.'</td>';
	echo '<td>'.$value->post_text.'</td>';
	echo '<td>'.$value->name.'</td>';
	echo '<td><a href="#" onclick="editContent(\''.$value->title.'\',\''.$value->post_text.'\',\''.$value->name.'\',\''.$value->pid.'\',\''.$value->tid.'\')">Edit</a></td>';
	echo '</tr>';
   
  }
}
?>
</table>
 </div>
</body>
</html>