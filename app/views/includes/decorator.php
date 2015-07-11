<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	
	<title>Flikbuk</title>
	<meta property="og:type"            content="article" /> 
	<meta property="og:url"             content="http://flikbuk.com/<?php echo $post->post_key?>" /> 
	<meta property="og:title"           content="<?php echo $post->title ?>" /> 
	<meta property="og:image"           content="http://flikbuk.com/img/content/<?php echo $post->post_key?>" /> 
	<meta property="og:description"     content="<?php echo $post->post_text ?>" />
	
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
	
	
	<script src="scripts/js/jquery.js" type="text/javascript"></script>
	<script src="scripts/js/jquery-ui-custom.min.js" type="text/javascript"></script>
	<script src="scripts/js/jquery.ui.autocomplete.js" type="text/javascript"></script>
	<script src="scripts/js/jquery.layout.js" type="text/javascript"></script>
	<script src="scripts/js/grid.locale-en.js" type="text/javascript"></script>
	
	<script type="text/javascript" src="/components/turn/turn.js"></script>
	<script type="text/javascript" src="/components/zeroclipboard/ZeroClipboard.js"></script>
	
	<script src="components/jquery.googleSuggest.js"></script>
	<script src="components/croppic/croppic.js"></script>
	<script src="scripts/addContent.js"></script>
	<link href="components/croppic/croppic.css" type="text/css" rel="stylesheet"/>
	<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		
		  ga('create', 'UA-54552387-2', 'auto');
		  ga('send', 'pageview');
	</script>
</head>
<body>
<div class="container-fluid">
<?php echo $contentView; ?>
</div>
</body>
</html>
