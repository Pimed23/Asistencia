<?php

include ($_SERVER['DOCUMENT_ROOT'].'/Asistencia/php/php/entitiesDao.php');

$factory = new factoryDAO();
$do = $_GET['do'];
$entity = $_GET['entity'];

$entityDAO = $factory -> createDAO($entity,$do);
$entityDAO -> ejecutarQuery();


?>
