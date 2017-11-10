<?php
// Pear Mail Library
require_once "./Mail-1.4.1/Mail.php";
//
$nombre = $_POST["nombre"];
$notas = $_POST["notas"];
$emailcliente=$_POST["email"];
$area=$_POST["area"];
$copia=$_POST["copia"];
if ($area === "administrativa") {
    $correodesalida = "mnogueira@usa.com";
} elseif ($area === "compras") {
    $correodesalida = "learners@emaildodo.com";
} elseif ($area === "gerencia") {
    $correodesalida = "dataf5l@gmail.com";
}

$from = '<2017cuentaloka@gmail.com>';
$to = $correodesalida;

//$to = '<learners@emaildodo.com>';
$subject = 'Correo de Contacto de '. $nombre." ". date("Y-m-d H:i:s");


$body = $nombre." Desea recibir la siguiente información: ".$notas;

$headers = array(
    'From' =>"2017cuentaloka@gmail.com",
    'To' =>$to,
    'Subject' => $subject
);

$smtp = Mail::factory('smtp', array(
        'host' => 'ssl://smtp.gmail.com',
        'port' => '465',
        'auth' => true,
        'username' => '2017cuentaloka@gmail.com',
        'password' => 'pepito2017'
    ));

$mail = $smtp->send($to, $headers, $body);

// esto se llama correo de notificación al cliente

$from = '<2017cuentaloka@gmail.com>';
$to = $emailcliente;

//$to = '<learners@emaildodo.com>';
$subject = 'Correo de Contacto';

if($copia=="1"){
    $body = $nombre." Pronto recibirá información de nosotros "."Su pregunta es: ".notas;
}else{
$body = $nombre." Pronto recibirá información de nosotros ";}

$headers = array(
    'From' =>"2017cuentaloka@gmail.com",
    'To' =>$emailcliente,
    'Subject' => "Gracias por contactarnos"
);


$mail = $smtp->send($to, $headers, $body);


if (PEAR::isError($mail)) {
    echo('<p>' . $mail->getMessage() . '</p>');
} else {
    echo('<p>Hemos recibido su contacto.</p>');
}
