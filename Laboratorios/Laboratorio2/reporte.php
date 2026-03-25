<?php
$nombresProcesados = [];
$totalNombres = 0;

if (isset($_POST["lista_nombres"])) {
    $cadena = $_POST["lista_nombres"];

    // Separar por comas
    $nombres = explode(",", $cadena);

    foreach ($nombres as $n) {
        $n = trim($n); 
        $n = strtolower($n); 
        $n = ucwords($n); 
        if (!empty($n)) {
            $nombresProcesados[] = $n;
        }
    }

    $totalNombres = count($nombresProcesados);
}

$estudiantes = [
    "Juan" => [7, 8, 6, 9],
    "Ana" => [5, 6, 5, 4],
    "Luis" => [9, 9, 8, 10],
    "Maria" => [6, 7, 6, 6],
    "Pedro" => [4, 5, 5, 6]
];

$promedios = [];

foreach ($estudiantes as $nombre => $notas) {
    $promedios[$nombre] = array_sum($notas) / count($notas);
}

$mejor = max($promedios);
$peor = min($promedios);

$textoResultado = "";
$totalCoincidencias = 0;

if (isset($_POST["texto"]) && isset($_POST["palabra"])) {
    $texto = $_POST["texto"];
    $palabra = $_POST["palabra"];

    if (!empty($palabra)) {
        $totalCoincidencias = substr_count(strtolower($texto), strtolower($palabra));

        $textoResultado = str_ireplace(
            $palabra,
            "<mark>$palabra</mark>",
            $texto
        );
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Reporte</title>
<style>
body { font-family: Arial; }
table { border-collapse: collapse; width: 70%; }
td, th { border: 1px solid black; padding: 6px; }
.mejor { background: lightgreen; }
.peor { background: lightcoral; }
</style>
</head>
<body>

<h2>Procesador de Nombres</h2>

<form method="POST">
<textarea name="lista_nombres" placeholder="Ej: juan, ana, luis"></textarea><br>
<button type="submit">Procesar</button>
</form>

<?php if ($totalNombres > 0): ?>
    <h3>Lista:</h3>
    <ol>
        <?php foreach ($nombresProcesados as $n): ?>
            <li><?php echo $n; ?></li>
        <?php endforeach; ?>
    </ol>
    <p>Total: <?php echo $totalNombres; ?></p>
<?php endif; ?>

<hr>

<h2>Tabla de Calificaciones</h2>

<table>
<tr>
    <th>Nombre</th>
    <th>Notas</th>
    <th>Promedio</th>
    <th>Estado</th>
</tr>

<?php foreach ($estudiantes as $nombre => $notas): 
    $prom = $promedios[$nombre];

    $clase = "";
    if ($prom == $mejor) $clase = "mejor";
    if ($prom == $peor) $clase = "peor";
?>
<tr class="<?php echo $clase; ?>">
    <td><?php echo $nombre; ?></td>
    <td><?php echo implode(", ", $notas); ?></td>
    <td><?php echo number_format($prom, 2); ?></td>
    <td><?php echo ($prom >= 6) ? "Aprobado" : "Reprobado"; ?></td>
</tr>
<?php endforeach; ?>

</table>

<hr>

<h2>Buscador de Palabras</h2>

<form method="POST">
<textarea name="texto" placeholder="Escribe un texto largo"></textarea><br>
<input type="text" name="palabra" placeholder="Palabra a buscar"><br>
<button type="submit">Buscar</button>
</form>

<?php if ($totalCoincidencias > 0): ?>
    <p><b>Coincidencias:</b> <?php echo $totalCoincidencias; ?></p>
    <p><?php echo $textoResultado; ?></p>
<?php endif; ?>

</body>
</html>