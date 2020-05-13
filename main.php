<?php
// Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

session_start();
$email = $_SESSION['email'];
$name = $_SESSION['fname'];
$building = $_SESSION['building'];
$floor = $_SESSION['floor'];
$room = $_SESSION['room'];
$food = $_SESSION['food'];
// Load Composer's autoloader
require './vendor/autoload.php';
//require 'PHPMailerAutoload.php';
// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    // $mail->SMTPDebug = 4;                     // Enable verbose debug output
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
    $mail->Subject = 'Successfull Registration!!';
    // $mail->Body    = '<h3>Welcome '.$name.'</h3><br>
    //                   <p>Thanks for your Registration in Binary House. </p>
    //                   <p>Here are details regarding your stay in Binary House.</p> 
    //                   <p>Building Number : '.$building.'</p>
    //                   <p>Floor Number : '.$floor.'</p>
    //                   <p>Room Number : '.$room.'</p>
    //                   <p>Opted for Mess : '.$food.'<p>
    //                   <br><br><br>

    //                   <p>Thanks and Regards.</p>
    //                   <p>Team Binary House.</p>'; 
    $mail->Body = '<div style="border:1px solid black;padding:0px;">
                        <div id="img">
                            <div>
                                <img src="https://github.com/vikas2899/Binary-House-v3.0/blob/master/lo.jpg?raw=true" style="width:1200px;height:200px;">
                                <div style="margin-left:7px;">
                                <p>Hello <i>'.$name.'</i></p>
                                <p>We are so happy to have you in our house.</p>
                                <p>Here are the details regarding your stay in Binary House.</p>
                                <p><b>Building Number : </b><i>'.$building.'</i></p>
                                <p><b>Floor Number : </b><i>'.$floor.'</i></p>
                                <p><b>Room Number : </b><i>'.$room.'</i></p>
                                <p><b>Opted for Mess : </b><i>'.$food.'</i><p>
                                <p>You can login to our online portal for more information.</p>
                                <p>The UserId and password for login is Email and Phone Number provided by you during Registration.</p>
                                <br><br><br>
                                <p>We’re Looking Forward To Having You Again As Our Guest</p>
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
            alert("Successfully Recorded Student Data");
        </script>
    <?php
        header( "refresh:0.1;url=student_form.php" );
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    echo"Redirecting to home page";
    header( "refresh:5; url=login_configure.php" ); 
}