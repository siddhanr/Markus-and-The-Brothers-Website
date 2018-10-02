<?php 
$errors = '';
$myemail = 'markusandthebrothers@gmail.com';//email address here
$webmaster = 'webmaster@markusandthebrothers.co.nz';
if(empty($_POST['name'])  || 
	empty($_POST['phone']) || 
	empty($_POST['email']) ||
	empty($_POST['address']) ||
	empty($_POST['message']))
{
    $errors .= "\n Error: all fields are required";
}

$name = $_POST['name']; 
$phone = $_POST['phone'];
$email_address = $_POST['email']; 
$address = $_POST['address'];
$message = $_POST['message']; 

if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", 
$email_address))
{
    $errors .= "\n Error: Invalid email address";
}

if( empty($errors))
{
	$to = $myemail; 
	$email_subject = "Form submission: $name";
	$email_body = "You have received a new form submission.\n ".
	"Here are the details:\n Name: $name \n Phone: $phone \n Email: $email_address \n Address: $address \n Message: \n $message"; 
	
	$headers = "From: $webmaster\n"; 
	$headers .= "Reply-To: $email_address";
	
	mail($to,$email_subject,$email_body,$headers);
	
	$conf_to = $email_address; 
	$conf_email_subject = "Thank you for contacting Markus and The Brothers";
	$conf_email_body = "Dear $name \n \n Thank you for choosing Markus and The Brothers.\n".
	"We've received your message and will get back to you soon \n \n Kind Regards, \n \n Markus and The Brothers Ltd";
	
	$conf_headers = "From: $webmaster\n";
	$conf_headers .= "Reply-To: $myemail";

	mail($conf_to,$conf_email_subject,$conf_email_body,$headers);
	//redirect to the 'thank you' page
	header('Location: thankyou.html');
} 
?>
