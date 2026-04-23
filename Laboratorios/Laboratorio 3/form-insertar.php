<?php
include("conexion.php"); 
?>
<!DOCTYPE html>
<html>
<head><title>Registro de Mascota</title></head>
<body>
    <h2>Registrar Nueva Mascota</h2>
    <form action="create.php" method="POST" enctype="multipart/form-data">
        Nombre: <input type="text" name="nombre" required><br>
        Raza: <input type="text" name="raza"><br>
        Fecha Nacimiento: <input type="date" name="fecha_nacimiento"><br>
        Peso (Kg): <input type="number" name="peso" step="0.01"><br>
        Sexo: 
        <input type="radio" name="sexo" value="M" checked> Macho
        <input type="radio" name="sexo" value="H"> Hembra<br>
        Propietario: <input type="text" name="propietario"><br>
        Especie: 
        <select name="especie_id">
            <?php
            $res = $con->query("SELECT * FROM especies");
            while($row = $res->fetch_assoc()) {
                echo "<option value='{$row['id']}'>{$row['nombre']}</option>";
            }
            ?>
        </select><br>
        Fotografía: <input type="file" name="fotografia" accept="image/*" required><br>
        <input type="submit" value="Guardar Mascota">
    </form>
</body>
</html>

