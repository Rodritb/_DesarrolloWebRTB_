<?php
include("conexion.php");
$order = isset($_GET['order']) ? $_GET['order'] : 'id';
$search = isset($_GET['search']) ? $_GET['search'] : '';
$sql = "SELECT m.*, e.nombre as especie_nombre 
        FROM mascotas m 
        LEFT JOIN especies e ON m.especie_id = e.id 
        WHERE m.nombre LIKE '%$search%'
        ORDER BY $order";
$result = $con->query($sql);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Listado de Mascotas</title>
    <style>
        table { width: 100%; border-collapse: collapse; }
        th { background-color: blue; color: white; padding: 10px; }
        tr:nth-child(even) { background-color: #f2f2f2; }
        tr:nth-child(odd) { background-color: white; }
        img { width: 50px; height: 50px; border-radius: 5px; }
    </style>
</head>
<body>
    <h2>Gestión de Veterinaria</h2>
    <form method="GET">
        Buscar por nombre: <input type="text" name="search" value="<?php echo $search; ?>">
        <input type="submit" value="Filtrar">
        
    </form>
    <div style="margin-bottom: 20px;">
        <a href="form-insertar.php" class="btn">Insertar Nueva Mascota</a>
        <a href="reporte-especies.php" class="btn btn-reporte">Ver Reporte de Especies</a>
    </div>
    <br>
    <table border="1">
        <thead>
            <tr>
                <th><a href="?order=id" style="color:white">Nro</a></th>
                <th>Fotografía</th>
                <th><a href="?order=nombre" style="color:white">Nombre</a></th>
                <th><a href="?order=raza" style="color:white">Raza</a></th>
                <th><a href="?order=fecha_nacimiento" style="color:white">Fecha Nacimiento</a></th>
                <th><a href="?order=peso" style="color:white">Peso</a></th>
                <th><a href="?order=sexo" style="color:white">Sexo</a></th>
                <th><a href="?order=propietario" style="color:white">Propietario</a></th>
                <th>Especie</th>
                <th>Operaciones</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $contador = 1;
            ?>
        <tr>
            <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $contador++; ?></td>
                <td><img src="images/<?php echo $row['fotografia']; ?>" alt="pet"></td>
                <td><?php echo $row['nombre']; ?></td>
                <td><?php echo $row['raza']; ?></td>
                <td><?php echo $row['fecha_nacimiento']; ?></td>
                <td><?php echo $row['peso']; ?> kg</td>
                <td><?php echo ($row['sexo'] == 'M') ? '♂' : '♀'; ?></td>
                <td><?php echo $row['propietario']; ?></td>
                <td><?php echo $row['especie_nombre']; ?></td>
                <td>
                    <a href="form-editar.php?id=<?php echo $row['id']; ?>">Editar</a> | 
                    <a href="delete.php?id=<?php echo $row['id']; ?>" onclick="return confirm('¿Eliminar?')">Eliminar</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>
