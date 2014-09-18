<html>
<head>
<script type="text/javascript" src="/components/jquery/jquery.js"></script>
<script type="text/javascript" src="/components/turn/turn.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	// Create the flipbook

	$('.flipbook').turn({
			width:1000,
			height:600,
			elevation: 50,
			gradients: true,
			autoCenter: true,
			display: 'single'

	});
}
);
</script>
</head>
<body>
	<div class="flipbook-viewport">
		<div class="container">
			<div class="flipbook">
				<div style="background-image: url(/img/amg.jpg)"></div>
				<div style="background-image: url(/img/cla.jpg)"></div>
				<div style="background-image: url(/img/Mercedes_Benz_Logo.jpg)"></div>
				<div style="background-image: url(/img/mercedes-benz-concept-style-coupe.jpg)"></div>
				<div style="background-image: url(/img/mercedes-f400-carving.jpg)"></div>
				<div style="background-image: url(/img/mercedes-interior.jpg)"></div>
			</div>
		</div>
	</div>

</body>
</html>
