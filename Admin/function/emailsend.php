<?php
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer();

$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'tls';
$mail->Port = 587;

$mail->Username = 'sahanamedicofficial@gmail.com';
$mail->Password = 'oxvkmvljhjsgspop';

$mail->setFrom('sahanamedicofficial@gmail.com');
$mail->isHTML(true); 
$mail->Subject = $sub;
$mail->Body = $body;
$mail->addAddress($userMail);

if ($mail->send()) {
    echo "Send Successfully";
} else {
    echo "<script>
    alert('Sending Failed');
    </script>";
}

?>
