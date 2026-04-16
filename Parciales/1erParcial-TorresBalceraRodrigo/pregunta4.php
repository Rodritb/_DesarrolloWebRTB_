<?php include("conexion.php"); ?>

<a href="form-insertar.html">Nuevo Libro</a><br><br>

<table border="1">
<tr>
<th>Titulo</th><th>Autor</th><th>Año</th><th>Editorial</th><th>Op</th>
</tr>

<?php
$res = $conn->query("SELECT * FROM libros");

while($row=$res->fetch_assoc()){
echo "<tr>
<td>{$row['titulo']}</td>
<td>{$row['autor']}</td>
<td>{$row['anio']}</td>
<td>{$row['editorial']}</td>
<td><a href='eliminar.php?id={$row['id']}'>Eliminar</a></td>
</tr>";
}
?>
</table>