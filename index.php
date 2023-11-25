<?php 

include "controlador/plantilla.controlador.php";
include "controlador/usuarios.controlador.php";
include "controlador/roles.controlador.php";
include "controlador/eventos.controlador.php";
include "controlador/participantes.controlador.php";


include "modelo/usuarios.modelo.php";
include "modelo/roles.modelo.php";
include "modelo/eventos.modelo.php";
include "modelo/participantes.modelo.php";

$plantilla = new ControladorPlantilla();
$plantilla->ctrPlantilla();




?>