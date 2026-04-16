<?php
include("agenda.php");
session_start();

if(!isset($_SESSION['agenda'])){
    $_SESSION['agenda']= new Agenda();
}

$agenda = $_SESSION['agenda'];

if($_POST['accion']=="agregar"){
    $agenda->agregar($_POST['nombre'],$_POST['tel'],$_POST['correo']);
    echo "Se agrego correctamente";
}
if($_POST['accion']=="eliminar"){
    echo $agenda->eliminar($_POST['nombre']);
}
if($_POST['accion']=="buscar"){
    $agenda->buscar($_POST['nombre']);
}
if($_POST['accion']=="mostrar"){
    $agenda->mostrarTodos();
}

$_SESSION['agenda']=$agenda;
?>
<meta http-equiv="refres" content="1", url="inicio.html">;