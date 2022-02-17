<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require 'PHPMailer-master/src/Exception.php';
    require 'PHPMailer-master/src/PHPMailer.php';
    require 'PHPMailer-master/src/SMTP.php';
    
    $nimi = $_POST['name'];
    $sapo = $_POST['e-mail'];
    $msg = $_POST['msg'];

    $mail = new PHPMailer();
    //$mail->IsSMTP();
    //$mail->Mailer = "smtp";
    //$mail->SMTPDebug  = 1;  
    //$mail->SMTPAuth   = TRUE;
    //$mail->SMTPSecure = "tls";
    //$mail->Port       = 587;
    //$mail->Host       = "mail05.domainhotelli.fi";
    //$mail->Username = 'mailer@ollipeltomaa.fi';
    $mail->CharSet = 'UTF-8';
    $mail->Subject   = 'Yhteydenotto ollipeltomaa.fi-sivulta';
    $mail->Body = "Viesti käyttäjältä $nimi\nSähköposti: $sapo\nViesti:\n\n$msg";
    $mail->SetFrom('mailer@ollipeltomaa.fi', '');
    $mail->AddAddress( 'ollipeltomaa@gmail.com' );
    $mail->AddReplyTo($sapo, 'Vastausosoite');



    if (!isset($nimi) || trim($nimi) == '' || !isset($sapo) || trim($sapo) == '' || !isset($msg) || trim($msg) == '') {
        echo '<script>alert("Täytä kaikki kentät!")</script>';
        echo '<script>window.location.href = "index.html";</script>';
    } 
    else {
        if($mail->Send()) {
            echo '<script>alert("Viesti lähetetty!")</script>';
            echo '<script>window.location.href = "index.html";</script>';
        }
        else {
            echo '<script>alert("Viestin lähetys epäonnistui!")</script>';
            echo '<script>window.location.href = "index.html";</script>';
        }
    }
    
    
?>