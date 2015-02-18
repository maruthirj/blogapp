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
