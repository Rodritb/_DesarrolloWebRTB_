<?php

$metodo = $_GET["REQUEST_METHOD"];

if ($metodo == "GET") {
    $datos = $_GET;
} else {
    $datos = $_POST;
}

function limpiar($dato) {
    return htmlspecialchars(trim($dato));
}

// Recibir datos
$nombre = limpiar($datos["nombre"] ?? "");
$correo = limpiar($datos["correo"] ?? "");
$carrera = limpiar($datos["carrera"] ?? "");
$semestre = limpiar($datos["semestre"] ?? "");
$turno = limpiar($datos["turno"] ?? "");
$comentarios = limpiar($datos["comentarios"] ?? "");

$materias = $datos["materias"] ?? [];

// Validaciones
$errores = [];

if (empty($nombre)) {
    $errores[] = "El nombre no puede estar vacío";
}

if ($semestre < 1 || $semestre > 10) {
    $errores[] = "El semestre debe estar entre 1 y 10";
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultados</title>
    <style>
        body { font-family: Arial; }
        table { border-collapse: collapse; width: 50%; }
        th, td { border: 1px solid black; padding: 8px; }
        th { background: #ccc; }
        .error { color: red; font-weight: bold; }
    </style>
</head>
<body>

<h2>Método usado: <?php echo $metodo; ?></h2>

<?php
// Mostrar errores
if (!empty($errores)) {
    echo "<div class='error'>";
    foreach ($errores as $e) {
        echo "<p>$e</p>";
    }
    echo "</div>";
} else {
?>

<h2>Datos recibidos</h2>

<table>
    <tr><th>Campo</th><th>Valor</th></tr>
    <tr><td>Nombre</td><td><?php echo $nombre; ?></td></tr>
    <tr><td>Correo</td><td><?php echo $correo; ?></td></tr>
    <tr><td>Carrera</td><td><?php echo $carrera; ?></td></tr>
    <tr><td>Semestre</td><td><?php echo $semestre; ?></td></tr>
    <tr><td>Turno</td><td><?php echo $turno; ?></td></tr>
    <tr><td>Materias</td>
        <td>
            <?php 
            if (!empty($materias)) {
                echo implode(", ", $materias);
            } else {
                echo "Ninguna";
            }
            ?>
        </td>
    </tr>
    <tr><td>Comentarios</td><td><?php echo $comentarios; ?></td></tr>
</table>

<?php } ?>

</body>
</html>