$(document).ready(function(){
	$('#flipbook').turn({
		width:900,
		height:700,
		elevation: 50,
		gradients: true,
		autoCenter: true,
		display: 'single',
		acceleration: true

	});
	addNewPages();
	
	$("#flipbook").bind("turned", function(event, page, view) {
		//Update the page title and url
		var key = $("div.p"+page+" input[name='postKeyUrl']").val();
		var title = "Flikbuk:: "+$("div.p"+page+" input[name='title']").val();
		document.title = title;
		window.history.pushState({"html":"","pageTitle":''},"", key);
		addNewPages();
	});
	$(".tags").load("/tags");
	//Setup copy to clipboard functionality
	setupCopyToClipboard();
});
/**
 * Find the latest page available and pre load another page to improve speed
 */
function addNewPages(){
	//REVISIT: make this add pages only when fliking forward and the user is towards the end of the pages list
	//Find the last post and load next few posts
	document.getElementById("ratingVal").value = 0;
	normalImg(5);
	var pageCollection = $("input[name='postKey']");
	if(pageCollection.size()>0){
		var lastPostInput = pageCollection.get(pageCollection.size()-1);
		var postKey = $(lastPostInput).val();
		var pageElement = $("<div  style=\"background: white;\"/>").html("Loading...");
		if ($("#flipbook").turn("addPage", pageElement)) {
			pageElement.load("/getNextPost/"+postKey);
			//Without this call the added page shows up on top instead of current page.. found this the hard way!
			$("#flipbook").turn('update');
			$(".tags").load("/tags/"+postKey);
		}
	}
}

/**
 * Function sets up the copy to clip board function
 */
function setupCopyToClipboard(){
	var client = new ZeroClipboard( $("#copy-button") );

	client.on( "ready", function( readyEvent ) {
		// alert( "ZeroClipboard SWF is ready!" );
		client.on( "copy", function (event) {
		  var clipboard = event.clipboardData;
		  clipboard.setData( "text/plain", $("#postLinkInput").val());
		});

		client.on( "aftercopy", function( event ) {
			// `this` === `client`
			// `event.target` === the element that was clicked
			//event.target.style.display = "none";
			//alert("Copied text to clipboard: " + event.data["text/plain"] );
			alert("Copied link: " + event.data["text/plain"] );
		});
	});	
}

function searchTag(){
   var form = document.getElementById("form");
   form.action = "/tag="+document.getElementById("search").value;
   form.submit();
   return false;
}
//this fuction deals with facebook share..
(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.3";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

//this function deals with twitter share..
window.twttr=(function(d,s,id){
	var js,fjs=d.getElementsByTagName(s)[0],t=window.twttr||{};
	if(d.getElementById(id))return;js=d.createElement(s);
	js.id=id;
	js.src="https://platform.twitter.com/widgets.js";
	fjs.parentNode.insertBefore(js,fjs);t._e=[];
	t.ready=function(f){t._e.push(f);};return t;
}(document,"script","twitter-wjs"));

//Below codes deal with image ratings..
function giveRating(imgNo) {
	for(var i=1;i<=imgNo;i++){
	  document.getElementById("img"+i).src = "img/star_filled.png";
	}
	for(var i=imgNo+1;i<=5;i++){
	  document.getElementById("img"+i).src = "img/star_empty.png";
	}
	document.getElementById("ratingVal").value=imgNo;
	if(confirm("Click on 'Ok' to save your rating..")==true){
		saveRating();
   }
}

//script to save ratings
function saveRating(){
    if(document.getElementById("ratingVal").value>0){
		var imgNo = document.getElementById("ratingVal").value;
		var pageCollection = $("input[id='postId']");
		var postId = "";
		if(pageCollection.size()>0){
			var lastPostInput = pageCollection.get(pageCollection.size()-2);
			var postId = $(lastPostInput).val();
		}
		$.ajax({
			url:'saveRating?rating='+imgNo+'&postId='+postId,
			type:'post',
			success:function(val){
			}
		});
		document.getElementById("ratingTable").style.display="none";
	}
	}
	
function fillImg(imgNo) {
    var ratingVal = document.getElementById("ratingVal").value;
	if(imgNo <= ratingVal){
	  return false;
	}
	for(var i=1;i<=imgNo;i++){
	  document.getElementById("img"+i).src = "img/star_filled.png";
	}
}

function normalImg(imgNo) {
	var ratingVal = document.getElementById("ratingVal").value;
	if(imgNo <= ratingVal){
	  return false;
	}
	var val = 1;
	if(ratingVal>0){
		val = parseInt(ratingVal)+1;
	}
	for(var i=val;i<=imgNo;i++){
	  document.getElementById("img"+i).src = "img/star_empty.png";
	}
}