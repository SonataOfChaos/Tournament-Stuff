<?php
// Receive form Post data and Saving it in variables

$name = @$_POST['name'];
$nick = @$_POST['nick'];
$email = @$_POST['email'];
$profile = @$_POST['steamurl'];
$url = @$_POST['sito'];
$commento = @$_POST['commento'];

// Write the name of text file where data will be store
$filename = "Casters.txt";

// Marge all the variables with text in a single variable. 
$f_data= '
Nome Team: '.$name.'
Nickname:  '.$nick.'
Profile: '.$profile.'
Email: '.$email.' 
Sito: '.$url.'
Commento: '.$commento.'

==============================================================================
';

echo 'Form data has been saved to '.$filename.'  <br>

<a href="'.$filename.'">Click here to read </a> <br><br>';

$file = fopen($filename, "a");
fwrite($file,$f_data);
fclose($file);

$to      = 'titadota2@gmail.com';
$subject = 'Nuovo Caster - '.$nick.'';
$message = '
Nome Team: '.$name.'
Nickname:  '.$nick.'
Profile: '.$profile.'
Email: '.$email.'
Sito: '.$url.'
Commento: '.$commento.'

Tutti gli iscritti si trovano a questo link: http://www.titadota2.com/Casters.txt';

$headers = 'From: newcaster@titadota2.com' . "\r\n" .
    'Reply-To: webmaster@example.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);

//mail al tizio
$to      = ''.$email.'';
$subject = 'Congratulazioni, sei iscritto!';
$message = 'Congratulazioni!
La procedura di iscrizione si è conclusa correttamente!
Nei prossimi giorni controlla la mail per ricevere dettagli e comunicazioni riguardo al torneo!';

$headers = 'From: info@titadota2.com' . "\r\n" .
    'Reply-To: postmaster@titadota2.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);

?>
