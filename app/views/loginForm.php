<?php
if(isset($errors)){
	foreach ($errors->all('<li>:message</li>') as $message)
	{
	    echo $message;
	}
}
?>
<?php echo Form::open(array('url' => '/login', 'class' => 'box login')); ?>
<html>
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
<body>
	<fieldset class="boxBody">
		<label>User Email</label> <input type="text" tabindex="1"
			name="email" required><br>
		<label> Password
		</label> <input type="password" name="password" tabindex="2" required>
	</fieldset>
	<a href="#" class="rLink" tabindex="5" onclick="showPopUp()">Forget your password?</a>
	<footer>
		<label><input type="checkbox" name="persist" tabindex="3">Remember me</label>
		<input type="submit" class="btnLogin" value="Login" tabindex="4">
	</footer>
	</form>
<div id="dialog" style="width:30px;height:60px;display: none;z-index:10000" title="Forgot Password">
	<table style="width:30%;border: 0px">
		 <tr>
		  <td style="font-size:14px;border: 0px;">Enter Email ID</td>
		  <td style="border: 0px"><input style="margin-left:30px;" type="text" size="28" id="mailId" name="mailId"> </td>
		 </tr>
		 <tr>
		  <td style="border: 0px"><input style="font-size:18px;margin-top:20px;" type="button" onclick="submit();" value="Submit"> </td>
		  <td style="font-size:14px;border: 0px;"></td>
		 </tr>
	</table>
</div>
</body>
</html>
