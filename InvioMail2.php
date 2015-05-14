<?php

$team1 = @$_POST['Team1'];
$team2 = @$_POST['Team2'];
$subject = @$_POST['soggetto'];
$message = @$_POST['messaggio'];

$team1_temp = explode("_",$team1);
$mail1 = $team1_temp[1];
$team2_temp = explode("_",$team2);
$mail2 = $team2_temp[1];

echo '<center>Mail inviate con successo!</center>';

$headers = 'From: noreply@titadota2.com' . "\r\n" .
    'Reply-To: postmaster@titadota2.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($mail1, $subject, $message, $headers);
mail($mail2, $subject, $message, $headers);


?>