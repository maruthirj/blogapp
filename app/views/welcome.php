<script type="text/javascript" src="/components/jquery/jquery.js"></script>
<script type="text/javascript" src="/components/turn/turn.js"></script>
<script type="text/javascript" src="/components/zeroclipboard/ZeroClipboard.js"></script>
<script type="text/javascript" src="/scripts/welcome.js"></script>

<style>
		@import url(//fonts.googleapis.com/css?family=Lato:700);

		.left {
			width: 15%;
			left: 0px;
			top: 0px;
			position: absolute;
		}
		.imagePanel {
			width: 70%;
			left: 15%;
			top: 0px;
			position: absolute;
		}
		.tags{
			width: 15%;
			left: 85%;
			top: 0px;
			position: absolute;
		}
		

</style>
	<form action="">
		<input type="text" name="search"/><input type="submit" value="Search"/>
	</form>
	<div class="left">
		
	</div>
	<div class="imagePanel">
		<div id="flipbook">
			<div  style="background: white;">
			<?php include 'postView.php'?>
			</div>
		</div>
		<button id="copy-button">Copy Link</button>
	</div>
	  <div class="tags">
		
	</div>
