<?php 
$userName =Input::get('userName');
echo '<input type="hidden" id="userName" name="userName" value="'.$userName.'">';
?>
<html>
<head>
<script>
  function submit(){
		var newPassword = $("#newPassword").val();
		var confirmPassword = $("#confirmPassword").val();
		if(newPassword != confirmPassword){
			alert("Passwords are not matching");
			return false;
		}
		var userName = $("#userName").val();
		$("#loadingImg").show();
		$.ajax({
		   	type: "POST",
			url:'updatePassword?newPassword='+newPassword+"&confirmPassword="+confirmPassword+"&userName="+userName,
			success:function(res){
				windows.location='flkbuk.com/login';
			}
		});
  }
</script>
</head>
<body>
<div id="loadingImg" style="display:none;">
<img src="images/loading1.gif"/>
</div>
<table style="width:30%;border: 0px">
	<tr><td></td></tr>
	 <tr>
	  <td style="font-size:14px;border: 0px;">New Password</td>
	  <td style="border: 0px"><input style="margin-left:30px;" type="password" size="28" id="newPassword" name="newPassword"> </td>
	 </tr>
	 <tr>
	  <td style="font-size:14px;border: 0px;">Confirm Password</td>
	  <td style="border: 0px"><input style="margin-left:30px;" type="password" size="28" id="confirmPassword" name="confirmPassword"> </td>
	 </tr>
	 <tr>
	  <td style="border: 0px"><input style="font-size:18px;margin-top:20px;" type="button" onclick="submit();" value="Submit"> </td>
	 </tr>
</table>
</body>
</html>
