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
           $mail->SMTPDebug = 2;
           $mail->Host ='gmail-smtp-msa.l.google.com ';
           $mail->SMTPAuth = true;
           $mail->SMTPAutoTLS = true; 
           $mail->Username = 'ana.smtpserver@gmail.com'; // gmail for (SMTP server)
           # handout: begin-exclude
           $mail->password = '';
           # handout: end-exclude
           
           $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
           $mail->Port ='578';
        //receipent 
            $mail->setFrom('ana.smtpserver@gmail.com'); // gmail of SMTP server
            $mail->addAddress('nayhtetkyaw.dev@gamil.com');  //gmail for receiving messages

        //attachments
            // $mail->addAttachment('var/tmp/file.tar.gz');
            // $mail->addAttachment('tmp/image.jpg', 'new.jpg');
            

        //content
            $mail->isHTML(true);
            $mail->Subject = 'Message received!';
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
