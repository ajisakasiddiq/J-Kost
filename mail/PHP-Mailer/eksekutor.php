<?php
$tujuan="email_tujuan@gmail.com";
include "classes/class.phpmailer.php";

$mail = new PHPMailer; 
$mail->IsSMTP();
$mail->SMTPSecure = 'ssl'; 
$mail->Host = "localhost"; //host email
$mail->SMTPDebug = 2;
$mail->Port = 465;
$mail->SMTPAuth = true;
$mail->Username = "email_server@gmail.com"; //user email server
$mail->Password = "password_email_server"; //password email server
$mail->SetFrom("email_server@gmail.com","Nama Server"); //set email pengirim / server
$mail->Subject = "Layanan Notifikasi"; //subyek email
$mail->AddAddress($tujuan);  // email tujuan
$mail->MsgHTML("Selamat, anda berhasil menerima Pesan Notifikasi ini");


if(!$mail->Send()) {
    echo "Eror: ".$mail->ErrorInfo;
    exit;
}else {
    echo "<div class='alert alert-success'><strong>Berhasil.</strong> Email telah dikirim.</div>";
}

?>

<!-- Elseif Channel -->