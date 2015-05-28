<?php

require_once("libraries/php_mailer/class.phpmailer.php");
include("libraries/php_mailer/class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded
include("libraries/configs.php");
include_once 'libraries/GoogleRecaptcha.php';

/* Captcha verify */
$recaptchaVerified = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $recaptchaResponse = $_POST['g-recaptcha-response'];

    if (!empty($recaptchaResponse)) {
        $cap = new GoogleRecaptcha();
        $recaptchaVerified = $cap->VerifyCaptcha($recaptchaResponse);
    }
}

if (!$recaptchaVerified) {
    header("location: " . PATH);
}

try {
    $stmt = $pdo->prepare("select * from options");
    $stmt->execute();
} catch (PDOException $ex) {
    echo $ex->getMessage();
    exit();
}

$row = $stmt->fetch();

$from = $_POST["email"]; // Reply to this email
$fromName = $_POST["name"];
$to = $row["op_Email"]; // Recipients email ID
$toName = $row["op_Name"]; // Recipient's name
$message = $_POST["message"];

$mail = new PHPMailer();

//$message             = file_get_contents('contents.html');

$mail->IsSMTP(); // telling the class to use SMTP
$mail->SMTPDebug = 0;                     // enables SMTP debug information (for testing)
// 1 = errors and messages
// 2 = messages only
$mail->Debugoutput = "html";
$mail->SMTPAuth = true;                  // enable SMTP authentication
//$mail->SMTPSecure = "tls";                 // sets the prefix to the servier
$mail->Host = SMTP_HOST;      // sets GMAIL as the SMTP server
$mail->Port = SMTP_PORT;                   // set the SMTP port for the GMAIL server
$mail->Username = SMTP_USERNAME;  // smtp username
$mail->Password = SMTP_PASSWORD;  // smtp password

$mail->SetFrom($from, $fromName);

$mail->AddReplyTo($from, $fromName);

$mail->AddAddress($to, $toName);

$mail->Subject = "Contact from " . $fromName;

$mail->AltBody = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test

$mail->MsgHTML($message);

//$mail->AddAttachment("images/phpmailer.gif");      // attachment
//$mail->AddAttachment("images/phpmailer_mini.gif"); // attachment

if (!$mail->Send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    header("location: " . PATH);
}