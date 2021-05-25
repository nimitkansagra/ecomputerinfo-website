<?php
    //Import the PHPMailer class into the global namespace
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    
    
    //SMTP needs accurate times, and the PHP time zone MUST be set
    //This should be done in your php.ini, but this is how to do it if you don't have access to that
    date_default_timezone_set('Etc/UTC');
    require 'vendor/autoload.php';
    
    //Create a new PHPMailer instance
    $mail = new PHPMailer;
    //Tell PHPMailer to use SMTP
    $mail->isSMTP();
    //Enable SMTP debugging
    // SMTP::DEBUG_OFF = off (for production use)
    // SMTP::DEBUG_CLIENT = client messages
    // SMTP::DEBUG_SERVER = client and server messages
    $mail->SMTPAuth = true; // authentication enabled
    $mail->SMTPSecure = 'auto'; // secure transfer enabled REQUIRED for Gmail
    $mail->Host = 'mail.ecomputerinfo.co.in';
    $mail->Port = 587; // TCP port to connect to
    $mail->IsHTML(true);
    $mail->Username = 'noreply@ecomputerinfo.co.in';
    $mail->Password = '?vxyOp]b$o3m';
    $mail->SetFrom('noreply@ecomputerinfo.co.in', 'Computer Info');
    $mail->addReplyTo('noreply@ecomputerinfo.co.in', 'Computer Info');
    if(isset($_POST['send'])){
        $name = $_POST['con_name'];
        $email = $_POST['con_email'];
        $subject = $_POST['con_subject'];
        $message = $_POST['con_message'];

        $mail->addCC('acdlsinfo@gmail.com'); // Add cc
        $mail->isHTML(true);  // Set email format to HTML

        $body="
        <html>
        <body style='padding: 30px; text-align: left;'>
        <p>Name : ".$name."</p>
        <p>Email : ".$email."</p>
        <p>Subject : ".$subject."</p>
        <p>Message : ".$message."</p>
        <p>Feel free to contact support at support@ecomputerinfo.co.in or <br>call us on +91 9163481254.</p>
        </body>
        </html>
        ";
        $mail->AddAddress($email);  // Add a recipient
        $bodyContent = $body;
        $mail->Subject = "Inquiery From Website";
        $mail->Body = $bodyContent;
        if(!$mail->send()) {
            echo "<script>alert('Mailer Error !')</script>";
            echo 'Mailer Error: ' . $mail->ErrorInfo;
            echo "<script>window.location='contact-us.php'</script>";
        } else {
            echo "<script>alert('Mail sent !');</script>";
            echo "<script>window.location='contact-us.php'</script>";
        }
        echo "<script>window.location='contact-us.php'</script>";
    }
    else{
        echo "<script>window.location='contact-us.php'</script>";
    }
?>
