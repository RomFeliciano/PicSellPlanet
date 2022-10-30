<?php

    use \PHPMailer\PHPMailer\PHPMailer;
    use \PHPMailer\PHPMailer\Exception;

    function sendMail($email, $v_code)
    {
        require 'PHPMailer/vendor/autoload.php';

        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.mail.yahoo.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'picsellplanet@yahoo.com';                     //SMTP username
            $mail->Password   = 'nvvnqmgjotyqaiqk';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
            $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        
            $mail->setFrom('picsellplanet@yahoo.com', 'Pic-Sell Planet');
            $mail->addAddress($email);     //Add a recipient

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Email Verification for Pic-Sell Planet Account';
            $mail->Body    = "Thanks for making an account on our website,
                Please click the link below to verify your account
                <a href='http://localhost/PicSellPlanet/registration/user_verification.php?email=$email&v_code=$v_code'>Verify Account</a>";
        
            $mail->send();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }