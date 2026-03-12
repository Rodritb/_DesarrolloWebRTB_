<?php
$operacion = $_POST['operacion'];
$n = $_POST['n'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultado - <?php echo $operacion; ?></title>
    <style>
        table { border-collapse: collapse; margin: 20px; }
        td { border: 1px solid #F79646; width: 40px; height: 40px; text-align: center; }
        .cabecera { background-color: #F79646; color: white; font-weight: bold; }
        h2 { font-family: Arial; margin-left: 20px; }
    </style>
</head>
<body>

    <h2>Tabla de <?php echo $operacion; ?></h2>

    <table>
        <tr>
            <td class="cabecera"></td>
            <?php for($j=1; $j<=$n; $j++) { ?>
                <td class="cabecera"><?php echo $j; ?></td>
            <?php } ?>
        </tr>

        <?php 
        for($i=1; $i<=$n; $i++) { 
            echo "<tr>";
            echo "<td class='cabecera'>$i</td>";
            for($j=1; $j<=$n; $j++) {
                $resultado = 0;

                if($operacion == "Suma") {
                    $resultado = $i + $j;
                } elseif($operacion == "Resta") {
                    $resultado = $i - $j;
                } elseif($operacion == "Multiplicacion") {
                    $resultado = $i * $j;
                } elseif($operacion == "Division") {
                    $resultado = ($j != 0) ? round($i / $j, 2) : "Error";
                }

                echo "<td>$resultado</td>";
            }
            echo "</tr>";
        } 
        ?>
    </table>

</body>
</html>