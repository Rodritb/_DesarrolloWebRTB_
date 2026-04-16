<?php
class Agenda {
    public $contactos = [];

    function agregar($n,$t,$c){
        $this->contactos[] = ["nombre"=>$n,"telefono"=>$t,"correo"=>$c];
    }

    function eliminar($nombre){
        foreach($this->contactos as $i=>$c){
            if($c["nombre"]==$nombre){
                unset($this->contactos[$i]);
                return "Eliminado";
            }
        }
        return "No encontrado";
    }
    function buscar($texto){
    echo "<style>
    table { border-collapse: collapse; margin-top:10px; }
    td, th { border:1px solid #999; padding:6px; }
    </style>";

    $encontrados = false;

    echo "<table>";
    echo "<tr><th>#</th><th>Nombre</th><th>Teléfono</th><th>Correo</th></tr>";

    $i = 1;
    foreach($this->contactos as $c){
        // búsqueda parcial sin importar mayúsculas
        if (strpos(strtolower($c['nombre']), strtolower($texto)) !== false){
            echo "<tr>
            <td>$i</td>
            <td>{$c['nombre']}</td>
            <td>{$c['telefono']}</td>
            <td>{$c['correo']}</td>
            </tr>";
            $encontrados = true;
            $i++;
        }
    }

    echo "</table>";

    if(!$encontrados){
        echo "<br><b>No se encontraron resultados</b>";
    }
}
    function mostrarTodos(){
        echo "<table border=1>";
        echo "<tr><th>#</th><th>Nombre</th><th>Teléfono</th><th>Correo</th></tr>";
        $i=1;
        foreach($this->contactos as $c){
            echo "<tr>
            <td>$i</td>
            <td>{$c['nombre']}</td>
            <td>{$c['telefono']}</td>
            <td>{$c['correo']}</td>
            </tr>";
            $i++;
        }
        echo "</table>";
    }
}
?>
<style>
    table {
        border-collapse: collapse;
        font-family: Arial;
    }
    th, td {
        padding: 6px;
        text-align: left;
    }
    
</style>