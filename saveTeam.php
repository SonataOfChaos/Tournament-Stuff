<?php
// Receive form Post data and Saving it in variables

$name = @$_POST['name'];
$nick = @$_POST['nick'];
$email = @$_POST['email'];
$profile = @$_POST['steamurl'];

//testiamo il json
	$filename = "teamContact.json";
	
	if(file_exists($filename) && $string=file_get_contents($filename) !== false){
		$string = file_get_contents($filename);
	}
	if(empty($name) || empty($email)) exit("Variabili non valide"); //controllo del non vuoto
	//controllo che la stringa non sia vuota
	if (isset($string)){
	    //decodifico il file
		$json = json_decode($string, true);
		//controllo che la chiave equivalente a json[name] non sia giù usata
		if (!empty($json[$name])) exit("$name gia' registrato");
		//assegno la chiave
        $json[$name] = $email;
	}
	else
		$json = array($name => $email);

	$output_json = json_encode($json);

	//scriviamo il json
	$file = fopen($filename, "w");
	fwrite($file,$output_json);
	fclose($file);
		
	echo 'Json data has been saved to '.$filename.'  <br>
		<a href="'.$filename.'">Click here to read </a> <br><br>';
		
	

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

// Merge all the variables with text in a single variable. 
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

?>
