<?php

// 🔹 Arreglo multidimensional (mínimo 5 productos)
$productos = [
    [
        "nombre" => "Laptop HP",
        "categoria" => "Computadoras",
        "precio" => 3500.50,
        "disponible" => true,
        "caracteristicas" => ["16GB RAM", "512GB SSD", "Intel i5"]
    ],
    [
        "nombre" => "Mouse Gamer",
        "categoria" => "Accesorios",
        "precio" => 150.99,
        "disponible" => true,
        "caracteristicas" => ["RGB", "8000 DPI", "USB"]
    ],
    [
        "nombre" => "Teclado Mecánico",
        "categoria" => "Accesorios",
        "precio" => 300.00,
        "disponible" => false,
        "caracteristicas" => ["Switch Blue", "Retroiluminado", "USB"]
    ],
    [
        "nombre" => "Monitor Samsung",
        "categoria" => "Pantallas",
        "precio" => 1200.75,
        "disponible" => true,
        "caracteristicas" => ["24 pulgadas", "Full HD", "HDMI"]
    ],
    [
        "nombre" => "Disco Duro Externo",
        "categoria" => "Almacenamiento",
        "precio" => 500.20,
        "disponible" => false,
        "caracteristicas" => ["1TB", "USB 3.0", "Portátil"]
    ]
];

// 🔹 Ordenar por precio (menor a mayor)
usort($productos, function($a, $b) {
    return $a["precio"] <=> $b["precio"];
});

// 🔹 Variables de control
$totalInventario = 0;
$disponibles = 0;
$agotados = 0;

// 🔹 Categoría a filtrar
$categoriaFiltro = "Accesorios";

?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Catálogo</title>

<style>
body { font-family: Arial; background: #f4f4f4; }
.container { display: flex; flex-wrap: wrap; gap: 15px; }
.card {
    background: white;
    padding: 15px;
    width: 250px;
    border-radius: 10px;
    box-shadow: 0 0 5px gray;
}
.disponible { color: green; font-weight: bold; }
.agotado { color: red; font-weight: bold; }
</style>

</head>
<body>

<h1>Catálogo de Productos</h1>

<div class="container">

<?php
// 🔹 Mostrar productos
foreach ($productos as $p) {

    // Sumar inventario
    $totalInventario += $p["precio"];

    // Contar estado
    if ($p["disponible"]) {
        $disponibles++;
    } else {
        $agotados++;
    }
?>

<div class="card">
    <h3><?php echo $p["nombre"]; ?></h3>
    <p><b>Categoría:</b> <?php echo $p["categoria"]; ?></p>
    <p><b>Precio:</b> Bs <?php echo number_format($p["precio"], 2); ?></p>

    <p class="<?php echo $p["disponible"] ? 'disponible' : 'agotado'; ?>">
        <?php echo $p["disponible"] ? "Disponible" : "Agotado"; ?>
    </p>

    <b>Características:</b>
    <ul>
        <?php
        // 🔹 Recorrido anidado
        foreach ($p["caracteristicas"] as $c) {
            echo "<li>$c</li>";
        }
        ?>
    </ul>
</div>

<?php } ?>

</div>

<hr>

<!-- 🔹 Resumen -->
<h2>Resumen</h2>
<p>Total del inventario: <b>Bs <?php echo number_format($totalInventario, 2); ?></b></p>
<p>Disponibles: <?php echo $disponibles; ?></p>
<p>Agotados: <?php echo $agotados; ?></p>

<hr>

//filtro correcto por categoría
<h2>Productos de la categoría: <?php echo $categoriaFiltro; ?></h2>

<div class="container">
<?php
foreach ($productos as $p) {
    if ($p["categoria"] == $categoriaFiltro) {
?>
    <div class="card">
        <h3><?php echo $p["nombre"]; ?></h3>
        <p>Bs <?php echo number_format($p["precio"], 2); ?></p>
    </div>
<?php
    }
}
?>
</div>

</body>
</html>