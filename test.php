<?
ini_set("SMTP","deltatrainapp@gmail.com");
ini_set("smtp_port","587");
ini_set("smtp_auth","true");
ini_set("username","DeltaTrain");
ini_set("password","DeltaTrain1202005");

$to = 'drakuzz19@gmail.com';
$subject = 'Prueba de correo electrónico';
$message = 'Este es un mensaje de prueba enviado desde PHP';
$headers = 'From: deltatrainapp@gmail.com' . "\r\n" .
           'Reply-To: deltatrainapp@gmail.com' . "\r\n" .
           'X-Mailer: PHP/' . phpversion();

// Enviamos el correo electrónico
if (mail($to, $subject, $message, $headers)) {
   echo "Correo electrónico enviado satisfactoriamente";
} else {
   echo "Error al enviar el correo electrónico";
}

?>


<?php
use google\appengine\api\mail\Message;

// Notice that $image_content_id is the optional Content-ID header value of the
// attachment. Must be enclosed by angle brackets (<>)

// Pull in the raw file data of the image file to attach it to the message.

try {
    $message = new Message();
    $message->setSender('deltatrainapp@gmail.com');
    $message->addTo('drakuzz19@gmail.com');
    $message->setSubject('Example email');
    $message->setTextBody('Hello, world!');
    $message->send();
    echo 'Mail Sent';
} catch (InvalidArgumentException $e) {
    echo 'There was an error';
}
?>