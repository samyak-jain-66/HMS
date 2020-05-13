<style type="text/css">
		.centered {
  position: absolute;
  top: 25%;
  width:100%;
  margin-left:193px;
  color:white;
  transform: translate(-50%, -50%);
  font-family: 'Pacifico', cursive;color:white;
  font-size:28px;
}
</style>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">	

<link href="https://fonts.googleapis.com/css?family=Pacifico&display=swap" rel="stylesheet">
<?php
// Import PHPMailer classes into the global namespace
 //These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


// Load Composer's autoloader
require './vendor/autoload.php';
//require 'PHPMailerAutoload.php';
// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 4;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       =  gethostbyname('smtp.gmail.com');                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'binaryhouse2020@gmail.com';                     // SMTP username
    $mail->Password   = 'binary2020';                               // SMTP password
    $mail->SMTPSecure = 'tls';                          // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;      	// TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
	$mail->SMTPOptions = array(
          'ssl' => array(
          'verify_peer' => false,
          'verify_peer_name' => false,
          'allow_self_signed' => true
        )
    );

    //Recipients
    $mail->setFrom('binaryhouse2020@gmail.com','ABC Hostel PVT. LTD.');
    $mail->addAddress('vikas1pandey020@gmail.com');     // Add a recipient
    //$mail->addAddress('ellen@example.com');               // Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    // Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    // $mail->AddEmbeddedImage('img/mail.png','logo');  
    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = '<div style="border:1px solid black;padding:0px;">
    					<div id="img">
    						<div>
    							<img src="https://github.com/vikas2899/Binary-House-v3.0/blob/master/lo.jpg?raw=true" style="width:1200px;height:200px;">
    							<p style="color:red;position:absolute;top:50%;width:100%;text-align:center;font-size:3rem;">Random text</p>
    						</div>				   
    					</div>
					  </div>';



    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}