<head>
<title> Flikbuk | Signup </title>
<link rel="icon" href="img/favicon.png" type="image/x-icon"/>
<link href="http://www.flikbuk.com/css/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css">
<!--<link href="../../public/css/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css">-->
</head>
<body>
<div class="top"> </div>
<div class="container">
  <div class="row"> 
    <!-- Logo -->
    <div class="col-md-3 logobrand"> <img src="img/logo.png" /> </div>
    <!-- 1. Search -->
    <div class="col-md-9 form1">
      
    </div>
  </div>
</div>
<div class="bottom"> </div>
<div class="loginBx">
<div class="logpanel">
<h1> Signup here </h1>
<?php echo Form::open(array('url' => '/signup', 'class' => 'box login')); ?>
      <?php
if(isset($errors)){
	foreach ($errors->all('<p class="wTxt">:message</p>') as $message)
	{
	    echo $message;
	}
}
?>
	<fieldset class="boxBody">
		<label>User Email</label> <input type="text" tabindex="1" class="loginTxtbx" name="email" required>
		<label>Full Name</label> <input type="text" tabindex="2"  class="loginTxtbx"name="name" required>
		<label>Password</label> <input type="password" name="password" tabindex="3" class="loginTxtbx" required>
		<label>Confirm Password</label> <input type="password" name="confirmPassword" tabindex="4" class="loginTxtbx" required>
	</fieldset>
	<footer>
		<input type="submit" class="btnLogin" value="Sign Up" tabindex="5">
	</footer>
	</form>
	Flikbuk is an engaging experience for one and all. Offers engrossing entertainment, appeals to intellect and raises eye brows. As a contributor, you can use this to show off your photography and knowledge at once. Coming soon on flikbuk will be a home page for yourself for your own posts.
</div>
</div>

</body>