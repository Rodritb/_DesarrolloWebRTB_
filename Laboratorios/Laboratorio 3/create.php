<?php
include("conexion.php");

$nombre = $_POST['nombre'];
$raza = $_POST['raza'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$peso = $_POST['peso'];
$sexo = $_POST['sexo'];
$propietario = $_POST['propietario'];
$especie_id = $_POST['especie_id'];
$foto_nombre = "";
if(isset($_FILES['fotografia'])){
    $ext = pathinfo($_FILES['fotografia']['name'], PATHINFO_EXTENSION);
    $foto_nombre = uniqid() . "." . $ext;
    move_uploaded_file($_FILES['fotografia']['tmp_name'], "images/" . $foto_nombre);
}

$sql = "INSERT INTO mascotas (fotografia, nombre, raza, fecha_nacimiento, sexo, peso, propietario, especie_id) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $con->prepare($sql);
$stmt->bind_param("sssssdsi", $foto_nombre, $nombre, $raza, $fecha_nacimiento, $sexo, $peso, $propietario, $especie_id);

if($stmt->execute()){
    header("Location: read.php");
} else {
    echo "Error: " . $stmt->error;
}
echo '<meta http-equiv="refresh" content="2;url=read.php">';
?>