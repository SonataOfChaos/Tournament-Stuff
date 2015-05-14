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

echo '<center> Grazie per esserti iscritto come caster! <br><br>
Le iscrizioni chiuderanno in data 20 Giugno. <br>
Per favore controllate le mail (Anche nello spam! O aggiungete alla whitelist la mail: noreply@titadota2.com) in quei giorni per confermare la vostra presenza! <br>
Questi sono i dati con cui vi siete registrati: <br><br>

Nome Team: '.$name.'<br>
Nickname:  '.$nick.'<br>
Profile: '.$profile.'<br>
Email: '.$email.'<br>
Sito: '.$url.'<br>
Commento: '.$commento.'</center>';


$file = fopen($filename, "a");
fwrite($file,$f_data);
fclose($file);

$filename = "mailingCasters.txt";

$f_data = ''.$email.' ';

$file = fopen($filename, "a");
fwrite($file,$f_data);
fclose($file);

$to      = 'titadota2@gmail.com';
$subject = 'Nuovo Caster - '.$nick.'';
$message = '
Questi sono i dati con cui si è registrato:

Nome Team: '.$name.'
Nickname:  '.$nick.'
Profile: '.$profile.'
Email: '.$email.' 
Sito/Stream: '.$url.'
Commento: '.$commento.'

Tutti gli iscritti si trovano a questo link: http://www.titadota2.com/Casters.txt';

$headers = 'From: newcaster@titadota2.com' . "\r\n" .
    'Reply-To: webmaster@example.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);

//mail al tizio
$to2      = ''.$email.'';
$subject = 'Congratulazioni, sei iscritto!';
$message = ' Grazie per esserti iscritto come caster!
Le iscrizioni chiuderanno in data 20 Giugno.
Per favore controllate le mail (Anche nello spam! O aggiungete alla whitelist la mail: noreply@titadota2.com) in quei giorni per confermare la vostra presenza!

Questi sono i dati con cui vi siete registrati:

Nome Team: '.$name.'
Nickname:  '.$nick.'
Profile: '.$profile.'
Email: '.$email.' 
Sito/Stream: '.$url.'
Commento: '.$commento.'';

$headers = 'From: noreply@titadota2.com' . "\r\n" .
    'Reply-To: postmaster@titadota2.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to2, $subject, $message, $headers);

?>
