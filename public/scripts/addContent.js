$(document).ready(function(){
	//Register handler for addTag button
	$("#addTagBtn").click(addTagClick);
	$("a[id^='tagRemove_']").click(removeTagClick);
	$("#addTagTxt").googleSuggest();
	var cropperOptions = {
		uploadUrl:'tempImageUpload',
		cropUrl:'cropTempImage'
	}
	var cropperHeader = new Croppic('cropImage',cropperOptions);
});

/**
 * Array to store the list of selected tags for duplicate checking for new additions
 */
var tagArr = new Array();
/**
 * Function to add the content of the tag text box to the list of hidden tag fields
 */
function addTagClick(){
	var tagVal = $("#addTagTxt").val();
	console.log("Tag: "+tagVal);
	//Make sure tag name does not have commas
	if(tagVal.indexOf(',') != -1){
		alert("Tag names cannot have a comma");
		return;
	}
	tagVal=$.trim(tagVal);
	for(var i=0; i<tagArr.length; i++){
		if(tagArr[i]===tagVal)
			return;
	}
	tagArr.push(tagVal);
	var tagRemoveId = tagVal.replace(/ /g, '_');
	$("#selectedTagsDiv ul").append("<li id='tagLi_"+tagRemoveId+"'><a id='tagRemove_"+tagRemoveId+"' href='#'>X</a> "+tagVal+"</li>");
	$("#hiddenFieldsDiv").append("<input type='hidden' name='tags[]' value='"+tagVal+"'/>");
	$("#tagRemove_"+tagRemoveId).click(removeTagClick);
	$("#addTagTxt").val("");
}

/**
 * Function to remove the tag from the list of tags
 */
function removeTagClick(){
	var tagToRemove = $(this).attr("id");
	tagIdSuffix = tagToRemove.replace(/tagRemove_/g,'');
	tagName = tagIdSuffix.replace(/_/g,' ');
	$("#hiddenFieldsDiv input[value='"+tagName+"']").remove();
	$("#tagLi_"+tagIdSuffix).remove();
}

/**
 * Validate image submission form
 */
function validateSubmit(){
	if($("#titleText").val()==""){
		alert("Post title is required.");
		return false;
	}
	if($("#postText").val()==""){
		alert("Post text is required.");
		return false;
	}
	if($("#uploadedUrl").val()==""){
		alert("Please upload image and click the green crop icon before posting.");
		return false;
	}
	if($("#hiddenFieldsDiv input").size()==0){
		alert("Please add atleast one tag to this post");
		return false;
	}
}