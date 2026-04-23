<?php 
include("conexion.php"); 

if (!isset($_GET['id'])) {
    header("Location: read.php");
    exit();
}

$id = $_GET['id'];
$stmt = $con->prepare("SELECT * FROM mascotas WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$resultado = $stmt->get_result();
$mascota = $resultado->fetch_assoc();
if (!$mascota) 
{
    die("Mascota no encontrada.");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Mascota</title>
</head>
<body>
    <h2>Editar Datos de la Mascota</h2>
    <form action="update.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $mascota['id']; ?>">
        
        Nombre: <input type="text" name="nombre" value="<?php echo $mascota['nombre']; ?>" required><br>
        
        Raza: <input type="text" name="raza" value="<?php echo $mascota['raza']; ?>"><br>
        
        Fecha Nacimiento: <input type="date" name="fecha_nacimiento" value="<?php echo $mascota['fecha_nacimiento']; ?>"><br>
        
        Peso (Kg): <input type="number" name="peso" step="0.01" value="<?php echo $mascota['peso']; ?>"><br>
        
        Sexo: 
        <input type="radio" name="sexo" value="M" <?php if($mascota['sexo'] == 'M') echo 'checked'; ?>> Macho
        <input type="radio" name="sexo" value="H" <?php if($mascota['sexo'] == 'H') echo 'checked'; ?>> Hembra<br>
        
        Propietario: <input type="text" name="propietario" value="<?php echo $mascota['propietario']; ?>"><br>
        
        Especie: 
        <select name="especie_id">
            <?php
            $res_esp = $con->query("SELECT * FROM especies");
            while($esp = $res_esp->fetch_assoc()) {
                $selected = ($esp['id'] == $mascota['especie_id']) ? "selected" : "";
                echo "<option value='{$esp['id']}' $selected>{$esp['nombre']}</option>";
            }
            ?>
        </select><br>

        Imagen actual:<br>
        <img src="images/<?php echo $mascota['fotografia']; ?>" width="100"><br>
        Cambiar fotografía: <input type="file" name="fotografia" accept="image/*"><br>
        <input type="hidden" name="foto_actual" value="<?php echo $mascota['fotografia']; ?>">
        <br>
        <input type="submit" value="Actualizar Mascota">
        <a href="read.php">Cancelar</a>
    </form>
</body>
</html>