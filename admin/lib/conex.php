<?php
function Conectarse(){
    $userdb = 'root';
    $passdb = '';
    try {
        $dbo = new PDO("mysql:host=localhost;dbname=lealisla_com_mx_;", $userdb, $passdb);
    }
    catch (PDOException $e) {
        die('No se pudo conectar a la base de datos');
    }
    return $dbo;
}
?>
