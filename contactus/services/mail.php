<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once "../../vendor/autoload.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $mail = new PHPMailer(true);

    //Enable SMTP debugging.
    // $mail->SMTPDebug = 3;
    //Set PHPMailer to use SMTP.
    $mail->isSMTP();
    //Set SMTP host name                          
    $mail->Host = "smtp.gmail.com";
    //Set this to true if SMTP host requires authentication to send email
    $mail->SMTPAuth = true;
    //Provide username and password     
    $mail->Username = "";
    $mail->Password = "";
    //If SMTP requires TLS encryption then set it
    $mail->SMTPSecure = "tls";
    //Set TCP port to connect to
    $mail->Port = 587;

    $mailFrom = $_POST['inputEmail'];
    $nameFrom = $_POST['inputName'];
    $phoneFrom = $_POST['inputPhone'];
    $messageFrom = $_POST['inputMessage'];

    $mail->From = "michaelwong306@gmail.com";
    $mail->FromName = "Customer Service";
    $mail->addAddress("mchaelwng@gmail.com", "Michael Wong");
    $mail->addReplyTo("michaelwong306@gmail.com", "Reply");
    $mail->isHTML(false);

    $mail->Subject = "Subject Text";
    $mail->Body = "<i>Mail body in HTML</i>";
    $mail->AltBody = "This is the plain text version of the email content";

    try {
        $mail->send();
        echo "Message has been sent successfully";
    } catch (Exception $e) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }
}