<?php
if(isset($errors)){
	foreach ($errors->all('<li>:message</li>') as $message)
	{
	    echo $message;
	}
}
?>
<?php echo Form::open(array('url' => '/signup', 'class' => 'box login')); ?>
	<fieldset class="boxBody">
		<label> User Email</label> <input type="text" tabindex="1" name="email" required><br>
		<label> Full Name</label> <input type="text" tabindex="2" name="name" required><br>
		<label> Password</label> <input type="password" name="password" tabindex="3" required><br>
		<label> Confirm Password</label> <input type="password" name="confirmPassword" tabindex="4" required><br>
	</fieldset>
	<footer>
		<input type="submit" class="btnLogin" value="Sign Up" tabindex="5">
	</footer>
	</form>
