<?php

use PHPMailer\PHPMailer\PHPMailer;

class ContactController
{
    public function actionIndex()
    {
        // $to = 'saidahmadhosilov1105615@gmail.com';
        // $subject = 'this is test email';
        // $message = 'Hello, it was done successfully';
        // $headers = "From: The sender name <saidahmadhosilov1105615@gmail.com> \r\n";
        // $headers .= "Reply-to: replyto@johnmorisson.com";
        // $headers .= "Content-type: text/html \r\n";
        // mail($to, $subject, $message, $headers);
        // exit;

        // require_once('/template/PHPMailer/src/PHPMailer.php');

        // $mail = new PHPMailer();
        // $mail->isSMTP();
        // $mail->SMTPAuth = true;
        // $mail->SMTPSecure = 'ssl';
        // $mail->Host = 'smtp.gmail.com';
        // $mail->Port = '465';
        // $mail->isHTML();
        // $mail->Username = 'saidahmadhosilov134679@gmail.com';
        // $mail->Password = 'mividatu28';
        // $mail->setFrom('saidahmadhosilov1105615@gmail.com');
        // $mail->Subject = 'Hello world';
        // $mail->Body = 'Test';
        // $mail->addAddress('saidahmadhosilov1105615@gmail.com');

        // $mail->send();

        require_once( ROOT . '/views/site/contact.php' );

        return true;
    }
}