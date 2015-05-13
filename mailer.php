<?php

$mail1 = @$_POST['Team1'];
$mail2 = @$_POST['Team2'];
$subject = @$_POST['soggetto'];
$messaggio = @$_POST['messaggio'];

echo 'Mail 1 = '.$mail1.'<br>';
echo 'Mail 2 = '.$mail2.'<br>';

$headers = 'From: info@titadota2.com' . "\r\n" .
    'Reply-To: postmaster@titadota2.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($mail1, $subject, $message, $headers);
mail($mail2, $subject, $message, $headers);


?>