<!--<link href="img/style.css" rel="stylesheet">-->
<link href='http://fonts.googleapis.com/css?family=Audiowide' rel='stylesheet' type='text/css'>
<!--<link href="../../public/css/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css">-->
<link href="http://www.flikbuk.com/css/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css">

<body>
<div class="top">
</div>
<div class="container">
<div class="row">
	<!-- Logo -->
	<div class="col-md-3 logobrand">
    <img src="img/logo.png" />
    </div>
	<!-- 1. Search -->	 
	<div class="col-md-9 form1">
		<!--<form action="" name="form" id="form" style="margin-left:0px;margin-top:0px; float:right">
			<input type="text" name="search" id="search" size="50" class="sreachtab"/>
			<input type="button" value="" onClick="searchTag()" class="searchbtn" />
		</form>-->
	</div>
</div>
</div>
<div class="bottom">
</div>

<div class="loginBx">
	 
	<div class="logpanel">
    <h1> Login here </h1>
    <?php echo Form::open(array('url' => '/login', 'class' => 'box login')); ?>
    <?php
if(isset($errors)){
	foreach ($errors->all('<p class="wTxt">:message</p>') as $message)
	{
	    echo $message;
	}
}
?>
	<fieldset class="boxBody">
		<label>User Email : </label> <input class="loginTxtbx" type="text" tabindex="1" name="email" required><br>
		<label>Password : </label> <input class="loginTxtbx" type="password" name="password" tabindex="2" required>
	</fieldset>
	<a href="#" class="rLink" tabindex="5">Forget your password?</a>
	<footer>
		<label><input type="checkbox" name="persist" tabindex="3">Remember me</label>
		<input type="submit" class="btnLogin" value="Login" tabindex="4" >
	</footer>
	</form>
	</div>
</div>



</body>


