<?php session_start(); ?>
<a href="inicio.html" >Inicio</a><br><br>

<form action="procesar3.php" method="POST">
Nombre <input name="nombre">
Tel <input name="tel">
Correo <input name="correo">
<button name="accion" value="agregar">Agregar</button>
</form>

<form action="procesar3.php" method="POST">
Nombre <input name="nombre">
<button name="accion" value="eliminar">Eliminar</button>
</form>

<form action="procesar3.php" method="POST">
Buscar: <input name="nombre">
<button name="accion" value="buscar">Buscar</button>
</form>

<form action="procesar3.php" method="POST">
<button name="accion" value="mostrar">Mostrar Todos</button>
</form>
