<?php
if(isset($errors)){
	foreach ($errors->all('<li>:message</li>') as $message)
	{
	    echo $message;
	}
}
?>
<?php echo Form::open(array('url' => '/login', 'class' => 'box login')); ?>
	<fieldset class="boxBody">
		<label>User Email</label> <input type="text" tabindex="1"
			name="email" required><br> 
		<label> Password
		</label> <input type="password" name="password" tabindex="2" required>
	</fieldset>
	<a href="#" class="rLink"
			tabindex="5">Forget your password?</a>
	<footer>
		<label><input type="checkbox" name="persist" tabindex="3">Remember me</label>
		<input type="submit" class="btnLogin" value="Login" tabindex="4">
	</footer>
	</form>
