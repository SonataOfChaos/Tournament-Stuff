<?php
// Gets Input value from Input boxes
$team1 = @$_POST['Team1'];
$team2 = @$_POST['Team2'];
$caster = @$_POST['caster'];
$subject = @$_POST['soggetto'];
$message = @$_POST['messaggio'];
$check1 = @$_POST['check1'];
$check2 = @$_POST['check2'];
$check3 = @$_POST['check3'];

$team1_temp = explode("_",$team1);
$mail1 = $team1_temp[1];
$team2_temp = explode("_",$team2);
$mail2 = $team2_temp[1];
$caster_temp = explode("_",$caster);
$mail3 = $caster_temp[1];

echo '<center>Mail inviate con successo!</center>';
// Part that actually sends the mail to the right people
$headers = 'From: noreply@titadota2.com' . "\r\n" .
    'Reply-To: postmaster@titadota2.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
if($check1 == "Yes"){
	mail($mail1, $subject, $message, $headers);
}
if($check2 == "Yes"){
	mail($mail2, $subject, $message, $headers);
}
if($check3 == "Yes"){
	mail($mail3, $subject, $message, $headers);
}

?>
