<?php

$frase = $_POST['frase'];

echo "<style>
table {
    border-collapse: collapse;
}
td, th {
    border: 1px solid black;
    padding: 5px;
    text-align: center;
}
</style>";

echo "<h3>Frase: $frase</h3>";
$palabras = str_word_count($frase);
$caracteres = strlen(str_replace(" ", "", $frase));

echo "Palabras: $palabras | Caracteres: $caracteres <br><br>";

$lista = explode(" ", $frase);

$max = 0;
foreach ($lista as $p) {
    if (strlen($p) > $max) {
        $max = strlen($p);
    }
}

echo "<table>";
echo "<tr><th>Palabra</th><th>Longitud</th><th>Invertida</th></tr>";

foreach ($lista as $p) {
    $long = strlen($p);
    $color = ($long == $max) ? "style='background:#00B050;color:white'" : "";

    echo "<tr $color>";
    echo "<td>$p</td>";
    echo "<td>$long</td>";
    echo "<td>" . strrev($p) . "</td>";
    echo "</tr>";
}

echo "</table><br>";
echo "<b>Formato:</b> " . ucwords(strtolower($frase));

?>