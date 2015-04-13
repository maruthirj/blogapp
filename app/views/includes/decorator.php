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
	</style>
	<link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap/bootstrap-theme.min.css">
	<script src="scripts/js/jquery.min.js"></script>
	<script src="scripts/js/bootstrap/bootstrap.min.js"></script>
	<script src="scripts/js/jquery.ui.autocomplete.js" type="text/javascript"></script>
	
	<script src="scripts/js/jquery.js" type="text/javascript"></script>
	<script src="scripts/js/jquery-ui-custom.min.js" type="text/javascript"></script>
	<script src="scripts/js/jquery.layout.js" type="text/javascript"></script>
	<script src="scripts/js/grid.locale-en.js" type="text/javascript"></script>
</head>
<body>
<div class="container">
	     <div class="row">
<div class="col-md-2"><img src="img/logo.png" width="162px;" height="68px;"/></div>
<?php echo $contentView; ?>

</body>
</html>

