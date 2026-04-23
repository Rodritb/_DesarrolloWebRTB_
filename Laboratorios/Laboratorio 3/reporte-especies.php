<?php
include("conexion.php");
$iconos = [
    "Perro"  => "🐶",
    "Gato"   => "🐱",
    "Ave"    => "🐦",
    "Roedor" => "🐹",
    "Reptil" => "🦎"
];
$sql_esp = "SELECT e.nombre, COUNT(m.id) AS total 
            FROM especies e 
            LEFT JOIN mascotas m ON m.especie_id = e.id 
            GROUP BY e.id";
$res_esp = $con->query($sql_esp);
$res_m = $con->query("SELECT COUNT(*) as total FROM mascotas WHERE sexo='M'")->fetch_assoc();
$res_h = $con->query("SELECT COUNT(*) as total FROM mascotas WHERE sexo='H'")->fetch_assoc();

$total_general = $res_m['total'] + $res_h['total'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte de Mascotas</title>
    <style>
        body { font-family: sans-serif; margin: 20px; }
        table { border-collapse: collapse; width: 50%; margin-bottom: 20px; }
        th, td { border: 1px solid #ccc; padding: 10px; text-align: center; }
        th { background-color: #f4f4f4; }
        
    </style>
</head>
<body>
    <a href="read.php" class="btn-volver">⬅ Volver al Listado</a>
    
    <h3>Mascotas por Especie</h3>
    <table>
        <thead>
            <tr>
                <th>Icono</th>
                <th>Especie</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = $res_esp->fetch_assoc()): 
                $nombre_especie = $row['nombre'];
                $icono_mostrar = isset($iconos[$nombre_especie]) ? $iconos[$nombre_especie] : "🐾";
            ?>
            <tr>
                <td class="icon"><?php echo $icono_mostrar; ?></td>
                <td><?php echo $nombre_especie; ?></td>
                <td><strong><?php echo $row['total']; ?></strong></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <h3>Mascotas por Sexo</h3>
    <table>
        <tr>
            <th>Sexo</th>
            <th>Total</th>
        </tr>
        <tr>
            <td>♂ Machos</td>
            <td><?php echo $res_m['total']; ?></td>
        </tr>
        <tr>
            <td>♀ Hembras</td>
            <td><?php echo $res_h['total']; ?></td>
        </tr>
        <tr style="background-color: #eee;">
            <td><strong>TOTAL GENERAL</strong></td>
            <td><strong><?php echo $total_general; ?></strong></td>
        </tr>
    </table>
</body>
</html>