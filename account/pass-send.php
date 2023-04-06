<?php   
$email=$_GET['id'];

$to_email = 'kunfirekun@gmail.com';
$subject = 'Testing PHP Mail';
$message = 'This mail is sent using the PHP mail function';
$headers = 'From: noreply @ company . com';
mail($to_email,$subject,$message,$headers);
echo"$email";
?>