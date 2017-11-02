<?php

//GET EMAIL ADDRESS FROM DATABASE
$formManager = new \Beltoise\Model\FormManager();
$findAddress = $formManager->findAddress();
$setTo = $findAddress->getReceptionAddress();

//CONFIGURE THE EMAIL SENDING
$transport = (new \Swift_SmtpTransport(HOST, PORT, SECURITY))
    ->setUsername(MAIL_ADDRESS)
    ->setPassword(MAIL_PASSWORD);

$mailer = new \Swift_Mailer($transport);

$message = (new \Swift_Message($header))
    ->setFrom([$setFrom => $firstName])
    ->setTo($setTo)
    ->setBody($messageSent);

if (empty($formErrors)) {

    $mailer->send($message);

    $messageAccusingReception = (new \Swift_Message($header))
        ->setFrom($setTo)
        ->setTo([$setFrom => $firstName])
        ->setBody('Nous avons bien reçu votre message, et vous répondrons dans les meilleurs délais.' . "\r\n" . 'Bonne journée à vous.' . "\r\n" . 'Beltoise & Fils' . "\r\n\r\n" . 'sarl.beltoise.fils@orange.fr' . "\r\n\r\n" . 'Message envoyé : ' . "\r\n" . $formMessage . "\r\n\r\n"  . 'Ce mail a été généré automatiquement, merci de ne pas y répondre.');

    $mailer->send($messageAccusingReception);
}
