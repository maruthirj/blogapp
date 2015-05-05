<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Flikbuk</title>
	<link rel="icon" href="img/favicon.png" type="image/x-icon"/>
	<link href="/components/jquery-ui/themes/smoothness/jquery-ui.css" type="text/css" rel="stylesheet"/>
	<style>
		@import url(//fonts.googleapis.com/css?family=Lato:700);

		body {
			margin:0;
			font-family:'Lato', sans-serif;
			color: #999;
		}

		a, a:visited {
			text-decoration:none;
		}

		h1 {
			font-size: 32px;
			margin: 16px 0 0 0;
		}
		.container-full {
		  margin: 0 auto;
		  width: 100%;
		}
	</style>
	<link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
	  <!-- <link rel="stylesheet" href="css/bootstrap/style.css"> -->
	<link rel="stylesheet" href="css/bootstrap/bootstrap-theme.min.css">
	<script src="scripts/js/jquery.min.js"></script>
	<script src="scripts/js/bootstrap/bootstrap.min.js"></script>
	<script src="scripts/js/jquery.ui.autocomplete.js" type="text/javascript"></script>
	
	<script src="scripts/js/jquery.js" type="text/javascript"></script>
	<script src="scripts/js/jquery-ui-custom.min.js" type="text/javascript"></script>
	<script src="scripts/js/jquery.layout.js" type="text/javascript"></script>
	<script src="scripts/js/grid.locale-en.js" type="text/javascript"></script>
	
	<script type="text/javascript" src="/components/turn/turn.js"></script>
	<script type="text/javascript" src="/components/zeroclipboard/ZeroClipboard.js"></script>
	
	<script src="components/jquery.googleSuggest.js"></script>
	<script src="components/croppic/croppic.js"></script>
	<script src="scripts/addContent.js"></script>
	<link href="components/croppic/croppic.css" type="text/css" rel="stylesheet"/>
	
</head>
<body>
<div class="container-full">
<?php echo $contentView; ?>
</div>
</body>
</html>