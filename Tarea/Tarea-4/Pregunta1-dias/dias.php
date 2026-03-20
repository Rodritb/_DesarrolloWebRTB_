<h1>El día seleccionado es:</h1>
<?php
$n = $_GET['n'];

$dias = ["Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado", "Domingo"];

echo "<select>";
for ($i = 0; $i < 7; $i++) {
    
    if (($i + 1) == $n) {
        echo "<option value='".($i+1)."' selected>" . $dias[$i] . "</option>";
    } else {
        echo "<option value='".($i+1)."'>" . $dias[$i] . "</option>";
    }
}
echo "</select>";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dias seleccionada</title>
    <style>
        select{
            border: 1px solid #ee1515;
            padding: 10px;
        }
        h1{
            color: red;
        }
    </style>
</head>
<body>

</body>
</html>
<meta http-equiv="refresh" content="3; url=formulario3.html">