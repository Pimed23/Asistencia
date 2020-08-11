<?php

include ($_SERVER['DOCUMENT_ROOT']."/Asistencia/php/connection/Mysql.php");
$var = new Mysql();
$var->dbConnect();
$var->selectAll('Usuarios');
?>
