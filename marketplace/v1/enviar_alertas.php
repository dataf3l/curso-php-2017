<?php
require_once "./Mail-1.4.1/Mail.php";
require_once ('conexion.php');

function runSQL($SQL) {
    global $pdo;
    $getData = $pdo->prepare($SQL);
    $getData->execute();
    return $getData->fetchAll();
}

$fecha = date('Y-m-d');
$a = runSQL("SELECT * from alert");
foreach ($a as $alert) {
    $c = $alert['query'];
    $m = $alert['email'];
    send($c, $m);
}

function mail_contents($records) {
    global $tabla;
    $html = '';

    $html .= "<h1> {$tabla}s </h1> <table cellspacing=0 cellpadding=3 border=1>";
    $once = 0;
    foreach ($records as $row) {
        if ($once == 0) {
            $once = 1;
            $html .= "<tr>";
            foreach ($row as $field => $cell) {
                $html .= "<th>" . $field . "</th>";
            }
            $html .= "</tr>";
        }
        $html .= "<tr>";
        foreach ($row as $field => $cell) {
            $html .= "<td>" . $cell . "</td>";
        }
        $html .= "</tr>";
    }
    $html .= "</table>";
    return $html;
}

function send($c, $m) {
    global $tabla, $fecha;
    $sql = "SELECT * from $tabla where $c and fecha_creacion>='$fecha'";
    echo $sql;
    $r = runSQL($sql);
    $html = mail_contents($r);
    echo '<h2>' . $m . '</h2>';
    echo $html;


    $from = '<2017cuentaloka@gmail.com>';
    $to = $m;

//$to = '<learners@emaildodo.com>';
    $subject = 'Listado de ' . $tabla . 's';


    $body = $html;

    $headers = array(
        'From' => "2017cuentaloka@gmail.com",
        'To' => $to,
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


    if (PEAR::isError($mail)) {
        echo('<p>' . $mail->getMessage() . '</p>');
    } else {
        echo('<p></p>');
    }
}
