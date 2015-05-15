<?php

class CustomMailer {

  

  /////////////////////////////////////////////////
  // CONSTANTS
  /////////////////////////////////////////////////

  const STOP_MESSAGE  = 0; // message only, continue processing
  const STOP_CONTINUE = 1; // message?, likely ok to continue processing
  const STOP_CRITICAL = 2; // message, plus full stop, critical error reached

  /////////////////////////////////////////////////
  // METHODS, VARIABLES
  /////////////////////////////////////////////////

  /**
   * Constructor
   * @param boolean $exceptions Should we throw external exceptions?
   */
  public function __construct($exceptions = false) {
    $this->exceptions = ($exceptions == true);
  }

  /**
   * Sets message type to HTML.
   * @param bool $ishtml
   * @return void
   */
  public function sendMail($to, $from, $body){

  	ini_set("include_path", ".:/var/www/vhosts/manageproac.com/httpdocs/app/include_auto");
	require_once('class.phpmailer.php');
	$mail           = new PHPMailer();
	$mail->IsSMTP();  // telling the class to use SMTP
	$mail->Host     = "smtp.sendgrid.net"; // SMTP server
	$mail->SMTPAuth   = true;
	$mail->Username   = "manageproac"; // SMTP account username
	$mail->Password   = "Password123";        // SMTP account password
	$mail->SMTPDebug  = 2;
	$mail->SetFrom('support@manageproac.com', 'Manageproac Support');;
	$mail->AddAddress("maruthi@leviossa.com");
	
	$mail->Subject  = "First PHPMailer Message";
	$mail->MsgHTML("Hi! \n\n This is my first e-mail sent through PHPMailer.");
	$mail->WordWrap = 50;
	
	if(!$mail->Send()) {
	        echo 'Message was not sent.';
	        echo 'Mailer error: ' . $mail->ErrorInfo;
	} else {
	        echo 'Message has been sent.';
	}
	echo "Done";
	  	
	  }
	
	}


?>