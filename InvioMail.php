<html>
<head>
<title> Invio Mail </title>
</head>
<body>

<form name="mail" action="mailer.php" method="post">
<p>
<center><b> Invio mail </b> 
<br>
<br>

<?php
	
	$filename = "teamContact.json";
	if(file_exists($filename) && $string=file_get_contents($filename) !== false){
		$jsonData = file_get_contents($filename);
		$json = json_decode($jsonData, true);
	
		$opts = '';
		foreach($json as $name => $email)
		{
			$opts .= '<option value="'.$email.'">'.$name.'</option>';
		}
		
		echo ' <select name="Team1">'.$opts.'</select> <br> ';
		echo ' <select name="Team2">'.$opts.'</select> <br>';
	}
	else
		echo 'Nessuna lista contatti disponibile! <br>';
?>
<br>
Soggetto: <input type="text" name="soggetto" required><br>
<br>
Messaggio: <input type="text" name="messaggio" style="width: 300px" required><br>
<br>
<center><input type="submit" value=" Invia " ></center><br>
</form>

</body>
</html>