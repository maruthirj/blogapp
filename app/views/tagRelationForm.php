<div id="gvFaqDefaultHeading" class="form.group">
<label style="font-size: 16px;margin-top: 10px;" for="">Tags:</label>
<input type="text" class="form-control Input-sm" name="auto" id="auto" size="20" style="width:35%;margin-top: 10px;">
<input type="hidden"  name="tagId" id="tagId">
<br/>
<div style="margin-left:590px;margin-top:-29px">
<input type="button" value="Add" style="font-size: 18px;" name="add" id="add" onclick="add()">
<br/>
</div>
<br>
</div>
<br/>
<select name="tags" id="tags" multiple style="width:36%;margin-left:2%;">
</select>
<input type="submit" value="Submit" onclick="saveTagRelations()">
// This script is used for autocomplete tags.
<script type="text/javascript">
 $('#auto').autocomplete({
	source: 'searchTags',
	minLength:1,
	select:function(e, ui){
		$('#tagId').val(ui.item.id);
		
	}
});
function add(){
		var newOption = "<option value='"+$("#tagId").val()+"'>"+$("#auto").val()+"</option>"; 
		$("#tags").append(newOption);
		$('#auto').val("");
}
function saveTagRelations(){
	var optVals=[];
	$('#tags option').each(function(){
		optVals.push( $(this).attr('value'));
	});
	$.ajax({
		url:'createTagsRelations?tagIds='+optVals,
		success:function(val){
		   alert("Data Successfully Saved");
			//$('#questionDiv').html(val);
			//$("#loadingImg").hide();
		}
	});
}
</script>
