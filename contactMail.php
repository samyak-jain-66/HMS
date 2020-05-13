<?php
// Import PHPMailer classes into the global namespace
 //These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

session_start();
$email = $_SESSION['email'];
$name = $_SESSION['name'];

// Load Composer's autoloader
require './vendor/autoload.php';
//require 'PHPMailerAutoload.php';
// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    // $mail->SMTPDebug = 4;                      // Enable verbose debug output
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
    $mail->setFrom('binaryhouse2020@gmail.com','Binary House Pvt');
    $mail->addAddress($email);     // Add a recipient
    //$mail->addAddress('ellen@example.com');               // Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    // Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Team Binary House';
   
    $mail->Body = '<div style="border:1px solid black;padding:0px;">
                        <div id="img">
                            <div>
                                <img src="https://github.com/vikas2899/Binary-House-v3.0/blob/master/lo.jpg?raw=true" style="width:1200px;height:200px;">
                                <div style="margin-left:7px;">
                                  <p>Hello <i>'.$name.'</i></p>
                                  <p>Thanks for reaching us.</p>
                                  <p>We will communicate with you as soon as possible regarding your query.</p>
                                  <p>Visit our website for more information and feel free to Explore.</p><br><br>
                                  <p>Thanks and Regards.</p>
                                  <p>Team Binary House.</p>
                                </div>
                            </div>                 
                        </div>
                      </div>';                  
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    ?>
        <script type="text/javascript">
            alert("Successfully Sent");
        </script>
    <?php
        header( "refresh:0.1;url=contactus.php" );
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}