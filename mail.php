<?php
    require("PHPMailer/src/PHPMailer.php");
    require("PHPMailer/src/SMTP.php");
    require("PHPMailer/src/Exception.php");
    function sendMail($to, $subject, $message) {
        $h = "mail.fussionhq.com";
        $u = "broov@fussionhq.com";
        $p = "Broov123@#";
        $mail = new PHPMailer\PHPMailer\PHPMailer(true);
        $mail->IsSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = "ssl";
        $mail->CharSet = 'UTF-8';
        $mail->Host = $h;
        $mail->Port = 465;
        $mail->IsHTML(true);
        $mail->Username = $u;
        $mail->Password = $p;
        $mail->SetFrom($u, "Broov Team");
        $mail->Subject = $subject;
        $contenthtml = '<html><head><meta name="viewport" content="user-scalable=0,initial-scale:0.9,width=device-width"><title>Broov</title></head><body style="padding:15px;font-size:15px;background-color:#E5E5E5;padding-top:50px;font-family:segoe ui"><div style="text-align:left;width:500px;background-color:white;border-radius:5px;max-width:100%;box-sizing:border-box;padding:20px;box-shadow: 0px 8px 20px cornflowerblue;padding-top:30px;padding-bottom:40px;border:none"><center><h5 style="margin-top:20px;font-weight:bold;"><a href="https://fussionhq.com/broov" style="text-decoration:none;color:cornflowerblue;">Broov</a></h5></center><br/><p class="content">**********</p><br/><h6 style="text-align:right;">Tel: <a href="tel:+2348032645840" style="text-decoration:none;color:cornflowerblue;">+234 8032645840</a><br/>Email: <a href="mailto:broov@fussionhq.com" style="text-decoration:none;color:cornflowerblue;">broov@fussionhq.com</a><br/>';
        $mail->Body = str_replace("**********", $message, $contenthtml);
        $mail->AddAddress($to);
        if (!$mail->Send()) {
            return false;
        }
        else {
            return true;
        }
    }
?>