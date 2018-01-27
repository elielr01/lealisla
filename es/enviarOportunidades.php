<?php
require("PHPMailer/PHPMailerAutoload.php");
header('Content-type: application/json; charset=iso-8859-1');
$response = array();
if($_POST['nombre'] && $_POST['email'] && $_FILES['cv'])
{
  ini_set("SMTP","ssl://smtp.gmail.com");
  ini_set("smtp_port","465");
  $mail = new PHPMailer();
  $mail->SMTPAuth = true;
  $mail->Host = "smtp.gmail.com"; // SMTP server
  $mail->SMTPSecure = "ssl";
  $mail->CharSet = "UTF-8";
  $mail->SetFrom($_POST['email'], $_POST['nombre']);
  $mail->Username = "javiereskivel.test@gmail.com"; //account with which you want to send mail. Or use this account. i dont care :-P
  $mail->Password = "Airbus123!"; //this account's password.
  $mail->Port = "465";
  $mail->IsSMTP();  // telling the class to use SMTP
  $rec1= "info@lealisla.com.mx"; //receiver. email addresses to which u want to send the mail.
  $mail->AddAddress($rec1);
  $mail->Subject  = "Contacto página web - Oportunidades";
  $mail->Body     = "<h3>Email enviado a través de la página web.</h3><br>Nombre: ".$_POST['nombre']."<br>Email: ".$_POST['email']."<br>Comentario: ".$_POST['comentario'];
  $mail->AddAttachment($_FILES['cv']['tmp_name'],$_FILES['cv']['name']);
  $mail->IsHTML(true);
  $mail->WordWrap = 200;
  if(!$mail->Send()) {
    header("Location: gracias.php?error=1");
  } else {
    header("Location: gracias.php?error=0");
  }
}
else
{
  $data = false;
}
$response[] = array('data'  	=> $data);
echo json_encode($response);
?>
