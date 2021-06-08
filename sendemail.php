<?php

    use PHPMailer\PHPMailer\PHPMailer;
    
    require_once 'phpmailer/Exception.php';
    require_once 'phpmailer/PHPMailer.php';
    require_once 'phpmailer/SMTP.php';

    $mail = new PHPMailer(true);
    $alert = '';

    if(isset($_POST['submit'])){

        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['name'];

       try{
           $mail->isSMTP();
           $mail->Host ='ana.smtpserver@gmail.com';
           $mail->SMTPAuth = true;
           $mail->Username = 'ana.smtpserver@gmail.com'; // gmail for (SMTP server)
           # handout: begin-exclude
           $mail->password = 'smptSecure-$erver';
           # handout: end-exclude
           
           $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
           $mail->Port ='578';

            $mail->setFrom('ana.smtpserver@gmail.com'); // gmail of SMTP server
            $mail->addAddress('nayhtetkyaw.dev@gamil.com');  //gmail for receiving messages


            $mail->isHTML(true);
            $mail->Subject = 'Message received (portfolio)';
            $mail->Body = '<h3>Name : $name <br>Email: $email 
            <br>Message : $message</h3>';
            
            $mail->send();
            $alert = '<div class="alert-sucess">
                    <spam>
                    Your Message is sent! Thank you for your feedback.
                     </spam>
                    </div>';

       } catch(Exception $e){
        $alert = '<div class="alert-failed">
                <spam>' .$e->getMessage().'</spam>
                </div>';
       }
    }

?>
