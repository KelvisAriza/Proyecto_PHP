<?php 

require_once "../controlador/eventos.controlador.php";
require_once "../modelo/eventos.modelo.php";

class AjaxEventos{

    public $idEvento;

    public function ajaxEditarEventos(){

        $item = "eventoId";
        $valor = $this->idEvento;

        $respuesta = ctrEventos::ctrMostrarEventos1($item,$valor);        

        echo json_encode($respuesta);
    }

    public $idEliminarE;

     public function ajaxEliminarEventos(){

        $respuesta = ctrEventos::ctrEliminarEventos($this->idEliminarE);
        echo $respuesta;
    }
}

//editar evento
if(isset($_POST["idEvento"])){

    $editarE = new AjaxEventos();
    $editarE->idEvento = $_POST["idEvento"];
    $editarE->ajaxEditarEventos();
}

//eliminar evento
if(isset($_POST["idEventoE"])){

    $eliminarE = new AjaxEventos();
    $eliminarE->idEliminarE = $_POST["idEventoE"];
    $eliminarE->ajaxEliminarEventos();
}

?>