<?php
//include ($_SERVER['DOCUMENT_ROOT'].'/Asistencia/php/connection/Mysql.php');
abstract class Test{
	function Test(){echo 'newTest';}
	abstract function try();
}
class Test2 extends Test{
	function try(){
		echo 'try';
	}
}
$var = new Test2();
$var -> try();
echo 'h';
?>
