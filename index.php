<?php
// echo function_exists('proc_open') ? "Yep, that will work" : "Sorry, that won't work";
    ini_set('display_errors',1);
    ini_set('display_startup_errors',1);
    error_reporting(-1);
	require_once 'vendor/autoload.php';

    // Create the message
    $message = Swift_Message::newInstance()

        // Give the message a subject
        ->setSubject('Spam mail haha!!!')

        // Set the From address with an associative array
        ->setFrom(array('hohoho@gmail.com' => 'JBala'))

        // Set the To addresses with an associative array
        ->setTo(array('quangphuc789@yahoo.com'))

        // Give it a body
        ->setBody('KKKKKKKKKKKKK')

        // And optionally an alternative body
        ->addPart('<q>Message is here!!!!!!</q>', 'text/html')

        // // Optionally add any attachments
        // ->attach(Swift_Attachment::fromPath('my-document.pdf'))
        ;

    // Fetch the HeaderSet from a Message object
    $headers = $message->getHeaders();

    $attachment = Swift_Attachment::fromPath('document.pdf');

    // Fetch the HeaderSet from an attachment object
    $headers = $attachment->getHeaders();

    // Create the Transport
    $transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, 'ssl')
        ->setUsername('tim.qp.nguyen@gmail.com')
        ->setPassword('pp1011190101')
        ;

    // You could alternatively use a different transport such as Sendmail or Mail:

    // // Sendmail
    // $transport = Swift_SendmailTransport::newInstance('/usr/sbin/sendmail -bs');

    // // Mail
    // $transport = Swift_MailTransport::newInstance();

    // Create the Mailer using your created Transport
    $mailer = Swift_Mailer::newInstance($transport);

    // Send the message
    for ($i = 0; $i < 100; $i++) {
        $result = $mailer->send($message);
        sleep(1);
    }

    var_dump($result);