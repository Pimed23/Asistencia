<?php
    require('Mysql.php');

    $correo = $_POST['correo'];

    $conection = new Mysql;
    $conection -> dbConnect();
    $conection -> find('Usuarios', 'correo', $correo )

?>