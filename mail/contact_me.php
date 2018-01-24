<?php
// Check for empty fields
if(empty($_POST['name'])  		||
   empty($_POST['email']) 		||
   empty($_POST['phone']) 		||
   empty($_POST['message'])	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	echo "Nema unijetih stavki!";
	return false;
   }
	
$name = strip_tags(htmlspecialchars($_POST['name']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$message = strip_tags(htmlspecialchars($_POST['message']));
	
// Create the email and send the message
$to = 'hassped@hotmail.com'; // Add your email address inbetween the '' replacing. This is where the form will send a message to.
$email_subject = "HAS Šped:  $name";
$email_body = "Dobili ste novu poruku...\n\n"."Ovdje su detalji pošaljiaoca:\n\nIme: $name\n\nEmail: $email_address\n\nTelefon: $phone\n\nPoruka:\n$message";
$headers = "From: samirmuric78@gmail.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Odgovori na: $email_address";	
mail($to,$email_subject,$email_body,$headers);
return true;			
?>
