<?php
include ($_SERVER['DOCUMENT_ROOT'].'/Asistencia/php/connection/Mysql.php');
class Test(){
	function Test(){echo 'newTest';}
}
class Test2 extends Test{
	function Test2(){echo 'newTest2';}
}
$var = new Test2();
?>
