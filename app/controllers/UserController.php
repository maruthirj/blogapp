<?php
class UserController extends BaseController {

	public function login()
	{
		// get POST data
		$userdata = array(
				'email' => Input::get('email'),
				'password' => Input::get('password')
		);

		if(Auth::attempt($userdata))
		{
			// we are now logged in, go to admin
			return Redirect::to('addContent');
		}
		else
		{
			$messages = new Illuminate\Support\MessageBag;
			$messages->add('Login Error', "Invalid email or password");
			return Redirect::to('login')->withErrors($messages)->withInput();;
		}
	}
	
	public function signup()
	{
		$rules = array(
						'name' => 'required',
						'password' => 'required',
						'confirmPassword' => 'required|same:password',
						'email' => 'required|email|unique:users'
				);
		$validator = Validator::make(Input::all(), $rules);
		if ($validator->fails())
		{
			return Redirect::to('signup')->withErrors($validator);
		}
		$user = new User();
		$user->name = Input::get("name");
		$user->email = Input::get("email");
		$password = Hash::make(Input::get("password"));
		$user->password = $password;
		$user->save();	
		return Redirect::to('login');
	}
	//code to reset Password.. A Mail will be sent to the user that consits of password reset link..
	public function forgotPassword(){
		$mailId = Input::get("mailId");
		//$user = User::where("email",$userName)->get();
		$message = "Dear Recipient,<br>We have received your request to reset password.To reset, please click the link below:<br> 
					<a href='localhost/reset?userName=".$mailId."'>Reset Password</a>";
		
		$mail = new PHPMailer();
		$mail->IsSMTP();  // telling the class to use SMTP
		$mail->Host     = "smtp.sendgrid.net"; // SMTP server
		$mail->SMTPAuth   = true;
		$mail->Username   = "flikbuk_123"; // SMTP account username
		$mail->Password   = "flikbuk123";        // SMTP account password
		$mail->SMTPDebug  = 2;
		$mail->SetFrom('support@flikbuk.com', 'Flikbuk');;
		$mail->AddAddress($mailId);
		$mail->Subject  = "Flikbuk- Reset you password";
		$mail->MsgHTML($message);
		$mail->WordWrap = 50;
		
		if(!$mail->Send()) {
				echo 'Message was not sent.';
				echo 'Mailer error: ' . $mail->ErrorInfo;
		} else {
				echo 'Message has been sent.';
		}
		echo "Done";
	}
	//This code will Update the user table with new password
	public function updatePassword(){
		$userName = Input::get("userName");
		$user = User::where("email",$userName)->get();
		$password = Hash::make(Input::get("newPassword"));
		$user[0]->password = $password;
		$user[0]->save();
	}
}