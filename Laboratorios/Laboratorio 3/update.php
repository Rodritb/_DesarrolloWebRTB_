<?php
include("conexion.php");
$id = $_POST['id'];
$nombre = $_POST['nombre'];
$raza = $_POST['raza'];
$propietario = $_POST['propietario'];
$fecha = $_POST['fecha_nacimiento'];
$peso = $_POST['peso'];
$sexo = $_POST['sexo'];
$especie = $_POST['especie_id']; 
$foto_actual = $_POST['foto_actual'] ?? ""; 

if($_FILES['fotografia']['name'] != "")
{
    $nuevaImagen = uniqid() . "_" . $_FILES['fotografia']['name'];
    $ruta = "images/" . $nuevaImagen;

    move_uploaded_file($_FILES['fotografia']['tmp_name'], $ruta);

    if(file_exists("images/".$foto_actual)){
        unlink("images/".$foto_actual);
    }
} else {
    $nuevaImagen = $foto_actual;
}
$sql = "UPDATE mascotas SET 
fotografia=?, nombre=?, raza=?, fecha_nacimiento=?, peso=?, sexo=?, propietario=?, especie_id=?
WHERE id=?";

$stmt = $con->prepare($sql);

$stmt->bind_param("ssssdsdii",
    $nuevaImagen,
    $nombre,
    $raza,
    $fecha,
    $peso,
    $sexo,
    $propietario,
    $especie,
    $id
);

$stmt->execute();

echo "Registro actualizado correctamente";
echo '<meta http-equiv="refresh" content="2;url=read.php">';
?>