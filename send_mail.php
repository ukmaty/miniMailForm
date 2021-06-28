<?php
require_once 'PHPMailer/src/PHPMailer.php';
require_once 'PHPMailer/language/phpmailer.lang-ja.php';
require_once ('config.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

$name = htmlspecialchars($_POST['name']);
$email = htmlspecialchars($_POST['email']);
$textarea = htmlspecialchars( $_POST['textarea'] );

$subject = 'message from: '. $name;
$body = <<<EOF
name:
$name

email:
$email

message:
$textarea
EOF;

try {
// Recipients
$mail->setFrom(SENDER_MAIL, SENDER_NAME); // sender mail address and name 
$mail->addAddress(DEST_MAIL, DEST_NAME); // destination mail address and name

$mail->CharSet = "UTF-8";
$mail->Encoding = "base64";
$mail->isHTML(false);

// Content 送信内容
$mail->Subject = $subject; // 件名
$mail->Body = $body; // 本文

$mail->send();

echo <<<EOF
Message has been sent.
<a href="/">back to top</a>
EOF;

} catch(Exception $e) {
  echo 'Message could not be sent. Mailer Error: {$mail->ErrorInfo}';
}
