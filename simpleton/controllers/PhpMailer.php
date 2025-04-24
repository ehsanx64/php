<?php
use PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Dotenv\Dotenv;

class PhpMailerController extends Controller {
    public function __construct() {
    }

    public function index() {
		$mail = new PHPMailer\PHPMailer();
		$dotenv = new Dotenv(__DIR__);
		$dotenv->safeLoad();

		$username = getenv('PHPMAILER_USERNAME');
		$password = getenv('PHPMAILER_PASSWORD');
		$hostname = getenv('PHPMAILER_HOSTNAME');
		$target = getenv('PHPMAILER_TARGET');

		// Set mailer to use SMTP
		$mail->isSMTP();

		// Enable debugging for SMTP
//		$mail->SMTPDebug = 2;

		// Specify main and backup SMTP servers
		$mail->Host = $hostname;

		// Enable SMTP authentication
		$mail->SMTPAuth = true;

		// SMTP username and password
		$mail->Username = $username;
		$mail->Password = $password;

		// Enable encryption, only 'tls' is accepted
		$mail->SMTPSecure = 'tls';

		// Set 'from' address and 'from name'
		$mail->From = $username;
		$mail->FromName = 'Test Account';

		// Add a recipient
		$mail->addAddress($target);

		// Set word wrap to 50 characters
//		$mail->WordWrap = 50;

		$mail->Subject = 'Hello';
		$mail->Body = 'Testing some Mailgun awesomness';

		if(!$mail->send()) {
			echo 'Message could not be sent.';
			echo 'Mailer Error: ' . $mail->ErrorInfo;
		} else {
			echo 'Message has been sent';
		}
    }
}
