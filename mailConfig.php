<?php

//GET EMAIL ADDRESS FROM DATABASE
$formManager = new \Beltoise\Model\FormManager();
$findAddress = $formManager->findAddress();
$setTo = $findAddress->getReceptionAddress();

//CONFIGURE THE EMAIL SENDING
$transport = (new \Swift_SmtpTransport(HOST, PORT, SECURITY))
    ->setUsername(USERNAME) //TODO
    ->setPassword(PASSWORD); //TODO

$mailer = new \Swift_Mailer($transport);

$message = (new \Swift_Message($header))
    ->setFrom([$setFrom => $firstName])
    ->setTo($setTo)
    ->setBody($messageSent);

if (empty($errors)) {

    $mailer->send($message);

    $messageAccusingReception = (new \Swift_Message($header))
        ->setFrom($setTo)
        ->setTo([$setFrom => $firstName])
        ->setBody('Nous avons bien reçu votre message, et vous répondrons dans les meilleurs délais.' . "\r\n" . 'Bonne journée à vous.' . "\r\n\r\n" . 'Beltoise & Fils' . "\r\n\r\n" . 'Message envoyé : ' . "\r\n" . $formMessage);

    $mailer->send($messageAccusingReception);
}
