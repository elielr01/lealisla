<?php
function Conectarse(){
    $userdb = 'L3al1sla';
    $passdb = 'yPPWya2dhk2KZHe';
    try {
        $dbo = new PDO("mysql:host=localhost;dbname=lealisla_com_mx_", $userdb, $passdb);
    }
    catch (PDOException $e) {
        die('No se pudo conectar a la base de datos');
    }    
    return $dbo;
}
?>