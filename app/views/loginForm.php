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
	<a href="#" class="rLink" tabindex="5" onclick="showPopUp()"  style="padding: 0 0 0 3px;">Forgot password?</a> 
	<footer style="margin-top:-28px;">
		<label><input type="checkbox" name="persist" tabindex="3">Remember me</label>
		<input type="submit" class="btnLogin" value="Login" tabindex="4" >
	</footer>
	<a href="/signup" class="rLink" tabindex="5"  style="padding: 0 0 0 9px;font-size:15px"> Click here to register if you are new on flikbuk</a>
	</form>

<div id="dialog" style="width:30px;height:60px;display: none;z-index:10000" title="Forgot Password">
	<table style="width:30%;border: 0px">
		 <tr>
		  <td style="font-size:14px;border: 0px;">Enter Email</td>
		  <td style="border: 0px"><input style="margin-left:30px;" type="text" size="28" id="mailId" name="mailId"> </td>
		 </tr>
		 <tr>
		  <td style="border: 0px"><input style="font-size:18px;margin-top:20px;" type="button" onclick="submit();" value="Submit"> </td>
		  <td style="font-size:14px;border: 0px;"></td>
		 </tr>
	</table>
</div>
	</div>
</div>

<head>
<script>
  $(function() {
    $( "#dialog" ).dialog({
        autoOpen: false,
		modal: true,
		height: 280,
		width: 390,
		top:410,
		closeOnEscape: true,
		open: function(){
			jQuery('.ui-widget-overlay').bind('click',function(){
				jQuery('#dialog').dialog('close');
			});
		}
	   });
 
  });
  function showPopUp(){
		$('#dialog').dialog('open');
  }
  function submit(){
		var mailId = $("#mailId").val();
		 var re = /\S+@\S+\.\S+/;
		  var ret = re.test($("#mailId").val());
		  if(ret == false){
			  alert("Please enter valid Email");
			  return false;
		  }
		$.ajax({
		   	type: "POST",
			url:'forgotPassword?mailId='+mailId,
			success:function(res){
				jQuery('#dialog').dialog('close');
			}
		});
  }
  function cancel(){
	jQuery('#dialog').dialog('close');
  }
  </script>
  </head>

</body>


