<?php

require_once("libraries/swift_mailer_lib/swift_required.php");
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

// Create the SMTP configuration
$transport = Swift_SmtpTransport::newInstance("smtp.pangia.biz", 587);
$transport->setUsername("support@mycouper.com");
$transport->setPassword("support123");

// Create the message
$message = Swift_Message::newInstance();
//$message->setCc(array("a.derosa@audero.it" => "Aurelio De Rosa"));
//$message->setBcc(array("boss@bank.com" => "Bank Boss"));
$message->setFrom($from, $fromName);
$message->setTo(array(
    "techchannel24h@gmail.com" => "Aurelio De Rosa"
));
$message->setSubject("This email is sent using Swift Mailer");
$message->setBody("You're our best client ever.");
//$message->attach(Swift_Attachment::fromPath("path/to/file/file.zip"));
// Send the email
$mailer = Swift_Mailer::newInstance($transport);
$mailer->send($message, $failedRecipients);

// Show failed recipients
print_r($failedRecipients);
