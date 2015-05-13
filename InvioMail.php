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
    $jsonData = '{"marco":"marco@test.it", "giovanni":"giovanni@mail.it"}';
    $json = json_decode($jsonData, true);
	
	$opts = '';
	foreach($json as $name => $email)
	{
	$opts .= '<option value="'.$email.'">'.$name.'</option>';
	}
	
	echo ' <select name="Team1">'.$opts.'</select> <br> ';
	echo ' <select name="Team2">'.$opts.'</select> <br>';
	
?>
<br>
Soggetto: <input type="text" name="soggetto" required><br>
<br>
Messaggio: <input type="text" name="messaggio" style="width: 300px" required><br>
<br>
<center><input type="submit" value=" Invia "></center><br>
</form>

</body>
</html>