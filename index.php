<?php
// echo function_exists('proc_open') ? "Yep, that will work" : "Sorry, that won't work";
    ini_set('display_errors',1);
    ini_set('display_startup_errors',1);
    error_reporting(-1);
	require_once 'vendor/autoload.php';
    echo '1';
    // Create the message
    $message = Swift_Message::newInstance()

        // Give the message a subject
        ->setSubject('Test New Email')

        // Set the From address with an associative array
        ->setFrom(array('quangphuc789@gmail.com' => 'JBala'))

        // Set the To addresses with an associative array
        ->setTo(array('quangphuc789@gmail.com', 'qp@powerme.com.sg' => 'Timothy'))

        // Give it a body
        ->setBody('KKKKKKKKKKKKK')

        // And optionally an alternative body
        ->addPart('<q>Message is here!!!!!!</q>', 'text/html')

        // // Optionally add any attachments
        // ->attach(Swift_Attachment::fromPath('my-document.pdf'))
        ;

    echo '2';

    // Fetch the HeaderSet from a Message object
    $headers = $message->getHeaders();

    $attachment = Swift_Attachment::fromPath('document.pdf');

    // Fetch the HeaderSet from an attachment object
    $headers = $attachment->getHeaders();

    // Create the Transport
    $transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, 'ssl')
        ->setUsername('aaa@gmail.com')
        ->setPassword('bbb')
        ;

    echo '3';

    // You could alternatively use a different transport such as Sendmail or Mail:

    // // Sendmail
    // $transport = Swift_SendmailTransport::newInstance('/usr/sbin/sendmail -bs');

    // // Mail
    // $transport = Swift_MailTransport::newInstance();

    // Create the Mailer using your created Transport
    $mailer = Swift_Mailer::newInstance($transport);

    echo '4';

    // // Create a message
    // $message = Swift_Message::newInstance('Wonderful Subject')
    //     ->setFrom(array('john@doe.com' => 'John Doe'))
    //     ->setTo(array('receiver@domain.org', 'other@domain.org' => 'A name'))
    //     ->setBody('Here is the message itself')
    //     ;

    // Send the message
    $result = $mailer->send($message);
    var_dump($result);

    echo '5';