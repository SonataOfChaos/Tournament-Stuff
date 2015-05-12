<?php

$vincitore = @$_POST['vincitore'];
$sconfitto = @$_POST['sconfitto'];
$ora = date("H,i,s");
$data = date("d,m,Y"); 

if(isset($_FILES['image'])){
		$errors= array();
		$file_size =$_FILES['image']['size'];
		$file_tmp =$_FILES['image']['tmp_name'];
		$file_type=$_FILES['image']['type'];   
		$exploded = explode('.',$_FILES['image']['name']);
		$file_ext=strtolower(end($exploded));
		$file_name = ''.$vincitore.'-'.$sconfitto.'_'.$ora.'_'.$data.'.'.$file_ext.'';
		
		$expensions= array("jpeg","jpg","png"); 		
		if(in_array($file_ext,$expensions)=== false){
			$errors[]="Formato non corretto! Riprova con un'immagine jpg/jpeg o png!";
		}
		if($file_size > 1024000){
		$errors[]='File troppo grande!';
		}				
		if(empty($errors)==true){
			move_uploaded_file($file_tmp,"screenshoots/".$file_name);
			$url = 'http://www.titadota2.com/screenshoots/';
			$path = $url.$file_name;
			echo 'Risultati inviati correttamente! <br>';
			echo 'Screenshoot salvato!  <br>
				<a href="'.$path.'">Premi qui per visualizzarlo </a> <br><br>';
				
				$to      = 'titadota2@gmail.com';
				$subject = 'W: '.$vincitore.' - L: '.$sconfitto.'';
				$message = 'Team vincitore: '.$vincitore.'
							Team sconfitto: '.$sconfitto.'
							Screenshoot: '.$path.' ';

				$headers = 	'From: newresult@titadota2.com' . "\r\n" .
							'Reply-To: webmaster@example.com' . "\r\n" .
							'X-Mailer: PHP/' . phpversion();

				mail($to, $subject, $message, $headers);
				
		}else{
			print_r($errors);
		}
	}
?>