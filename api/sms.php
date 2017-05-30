<?php

require '/usr/share/php/libphp-phpmailer/PHPMailerAutoload.php';

class sms {
	private $phone_number = "";
	private $carrier_address = "";

	private $carrier_lookup = [
		"alltel" => "message.alltel.com",
		"at&t" => "txt.att.net",
		"att" => "txt.att.net",
		"boost" => "myboostmobile.com",
		"tmobile" => "tmomail.net",
		"verizon" => "vtext.com"
	];

	function __construct ($number, $carrier) {
		try {
			$carrier_address = $carrier_lookup[strtolower($carrier)];
			if ($carrier_address == null) {
				throw new Exception("No carrier matching $carrier!");
			}

			//eliminate every char except 0-9
			$justNums = preg_replace("/[^0-9]/", '', $number);
			//eliminate leading 1 if its there
			if (strlen($justNums) == 11) $justNums = preg_replace("/^1/", '',$justNums);
			//if we have 10 digits left, it's probably valid.
			if (strlen($justNums) == 10){
				$phone_number = $number;
			} else {
				throw new Exception("Invalid phone number $number. Please note " .
				"that this software was designed with American numbers in mind. " .
				"If you are using this internationally, please file a bug report.");
			}
		} catch (Exception $e) {
			echo $e;
		}

	}

	function sendSMS () {
		//PHPMailer Object
		$mail = new PHPMailer;

		//From email address and name
		$mail->From = "test@fakedomainnameihope.com";
		$mail->FromName = "Full Name";

		//To address and name
		$mail->addAddress("nathanmvarner@gmail.com", "Nathan Varner");

		//Address to which recipient will reply
		$mail->addReplyTo("reply@fakedomainnameihope.com", "Reply");

		//Send HTML or Plain Text email
		$mail->isHTML(true);

		$mail->Subject = "Subject Text";
		$mail->Body = "<i>Mail body in HTML</i>";
		$mail->AltBody = "This is the plain text version of the email content";

		if(!$mail->send())
		{
		    echo "Mailer Error: " . $mail->ErrorInfo;
		}
		else
		{
		    echo "Message has been sent successfully";
		}
	}
}

?>
