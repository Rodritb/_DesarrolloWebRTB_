<?php
include("conexion.php");
$id = $_GET['id'];
$res = $con->query("SELECT fotografia FROM mascotas WHERE id=$id");
$data = $res->fetch_assoc();
if($data['fotografia'] != ""){
    unlink("images/" . $data['fotografia']);
}

$con->query("DELETE FROM mascotas WHERE id=$id");
header("Location: read.php");
?>