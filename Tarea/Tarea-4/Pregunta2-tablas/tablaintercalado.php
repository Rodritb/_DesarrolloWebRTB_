<link rel="stylesheet" href="estilos.css">
<?php
$f = $_GET['filas'];
$c = $_GET['columnas'];

echo "<table>";
for ($i = 1; $i <= $f; $i++) {
    // Decidimos el color según el residuo de la división entre 3
    if ($i % 3 == 1) 
        { $clase = "rojo"; 
    }
    elseif ($i % 3 == 2) 
        {
         $clase = "amarillo"; 
        }
    else 
        { 
            $clase = "verde"; 
            
     }

    echo "<tr class='$clase'>";
    for ($j = 1; $j <= $c; $j++) 
    {
        echo "<td></td>";
    }
    echo "</tr>";
}
echo "</table>";
?>