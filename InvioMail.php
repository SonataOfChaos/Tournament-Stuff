<html>
<head>
<title> Invio Mail </title>
</head>
<body>

<form name="mail" action="InvioMail2.php" method="post">
<p>
<center><b> Invio mail </b> 
<br>
<br>

<?php
	
	$filename = "teamContact.json";
	$filename2 = "casterContact.json";
	// Controls if filename1 and 2 actually exist and it's not null
	//If files exist, decode them from JSON and add their values to the selection boxes
	if(file_exists($filename) && $string=file_get_contents($filename) !== false && file_exists($filename2) && $string=file_get_contents($filename2) !== false){
		$jsonData = file_get_contents($filename);
		$json = json_decode($jsonData, true);
		
		$jsonData2 = file_get_contents($filename2);
		$json2 = json_decode($jsonData2, true);
		
		$opts = '';
		foreach($json as $name => $email)
		{
			$opts .= '<option value="'.$email.'">'.$name.'</option>';
		}
		
		$opts2 = '';
		foreach($json2 as $name2 => $email2)
		{
			$opts2 .= '<option value="'.$email2.'">'.$name2.'</option>';
		}
		
		echo ' <select name="Team1">'.$opts.'</select> <input type="checkbox" name="check1" checked value="Yes" /> <br> ';
		echo ' <select name="Team2">'.$opts.'</select> <input type="checkbox" name="check2" checked value="Yes" /> <br>';
		echo ' <select name="caster">'.$opts2.'</select> <input type="checkbox" name="check3" value="Yes" /> <br>';
	}
	else
		echo 'Nessuna lista contatti disponibile! <br>';
?>
<!-- Various inputs -->
<br>
Soggetto: <input type="text" name="soggetto" required><br>
<br>
Messaggio: <input type="text" name="messaggio" style="width: 300px" required><br>
<br>
<center><input type="submit" value=" Invia " ></center><br>
</form>

</body>
</html>
