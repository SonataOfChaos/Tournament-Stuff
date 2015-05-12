<?php
// Receive form Post data and Saving it in variables

$name = @$_POST['name'];
$nick = @$_POST['nick'];
$email = @$_POST['email'];
$profile = @$_POST['steamurl'];

// Write the name of text file where data will be store
$filename = "Team.txt";

// Marge all the variables with text in a single variable. 
$f_data= '
Nome Team: '.$name.'
Nickname:  '.$nick.'
Profile: '.$profile.'
Email: '.$email.' 

==============================================================================
';

echo 'Form data has been saved to '.$filename.'  <br>

<a href="'.$filename.'">Click here to read </a> <br><br>';

$file = fopen($filename, "a");
fwrite($file,$f_data);
fclose($file);

/*
$filename = "TeamMail.txt";

// Marge all the variables with text in a single variable. 
$f_data= ''.$email.'  ';

echo 'Email data has been saved to '.$filename.'  <br>

<a href="'.$filename.'">Click here to read </a> ';

$file = fopen($filename, "a");
fwrite($file,$f_data);
fclose($file); */

//mail a crus
$to      = 'titadota2@gmail.com';
$subject = 'Nuovo Team - '.$name.'';
$message = '
Nome Team: '.$name.'
Nickname:  '.$nick.'
Profile: '.$profile.'
Email: '.$email.'

Tutti gli iscritti si trovano a questo link: http://www.titadota2.com/Team.txt
Tutti le mail si trovano a questo link: http://www.titadota2.com/TeamMail.txt';

$headers = 'From: newteam@titadota2.com' . "\r\n" .
    'Reply-To: webmaster@example.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);

//mail al tizio
$to      = ''.$email.'';
$subject = 'Congratulazioni, siete iscritti!';
$message = 'Congratulazioni!
La procedura di iscrizione si è conclusa correttamente!
Nei prossimi giorni controllate la mail per ricevere future comunicazioni riguardo ai dettagli del torneo!';

$headers = 'From: info@titadota2.com' . "\r\n" .
    'Reply-To: postmaster@titadota2.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);

//Scriviamolo su xml
$xml = new DOMDocument('1.0', 'utf-8');
$xml->formatOutput = true;
$xml->preserveWhiteSpace = false;
$xml->load('TeamMail.xml');

$element = $xml->getElementsByTagName('team')->item(0);

$timestamp = $element->getElementsByTagName('timestamp')->item(0);
$name = $element->getElementsByTagName('Team')->item(0);
$nick = $element->getElementsByTagName('Nick')->item(0);
$email = $element->getElementsByTagName('Email')->item(0);
$profile = $element->getElementsByTagName('SteamURL')->item(0);

$newItem = $xml->createElement('team');

$newItem->appendChild($xml->createElement('timestamp', date("F j, Y, g:i a",time())));;
$newItem->appendChild($xml->createElement('Team', $_POST['name']));
$newItem->appendChild($xml->createElement('Nick', $_POST['nick']));
$newItem->appendChild($xml->createElement('Email', $_POST['email']));
$newItem->appendChild($xml->createElement('SteamURL', $_POST['profile']));

$xml->getElementsByTagName('entries')->item(0)->appendChild($newItem);

$xml->save('TeamMail.xml');

echo "XML List has been saved.";


?>
