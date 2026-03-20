<?php
include("examen.php");

$c1 = $_GET['cadena1'];
$c2 = $_GET['cadena2'];

$obj = new examen($c1, $c2);

$obj->cruzar();

?>