<!doctype html>

<html>
	<head>
		<title><?php echo "Koi: " . $title; ?></title>
		<link rel="stylesheet" href="/hydroponics/styles/style.css" />
		<link rel="stylesheet" href="/hydroponics/styles/typography.css" />
		<link rel="stylesheet" href="/hydroponics/styles/levels.css" />
		<link rel="stylesheet" href="/hydroponics/styles/dropdown.css" />
		<link rel="stylesheet" href="/hydroponics/styles/header-levels.css" />
		<link rel="stylesheet" href="/hydroponics/styles/header.css" />
		<link rel="stylesheet" href="/hydroponics/styles/common-classes.css" />
		<link rel="stylesheet" href="/hydroponics/node_modules/material-components-web/dist/material-components-web.css" />

		<script src="/hydroponics/jquery.js"></script>
		<script src="/hydroponics/jquery-ui.min.js"></script>
		<script src="/hydroponics/node_modules/material-components-web/dist/material-components-web.js"></script>

		<script src="/hydroponics/scripts/functions.js"></script>
		<script src="/hydroponics/dropdown.js"></script>
		<script src="/hydroponics/scripts/ink.js"></script>

		<?php

		if (isset($extra_head)) {
			echo $extra_head;
		}

		?>

		<?php
		require_once(__DIR__ . "/../functions.php");
		require_once(__DIR__ . "/../api/sms.php");

		//PHPMailer Object
		$mail = new PHPMailer;

		//Enable SMTP debugging.
		$mail->SMTPDebug = 3;

		//Set PHPMailer to use SMTP.
		$mail->isSMTP();

		//Set SMTP host name
		$mail->Host = "nathan-laptop";

		//Set this to true if SMTP host requires authentication to send email
		$mail->SMTPAuth = true;

		//From email address and name
		$mail->From = "computer@nathan-laptop";
		$mail->FromName = "Full Name";

		//To address and name
		$mail->addAddress("nathanmvarner@gmail.com", "Not Real");

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
		?>
	</head>
