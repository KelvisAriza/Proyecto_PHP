<?php 


class ctrEventos{

    static public function  ctrEliminarEventos($id){	

        $tabla = "eventos";

        $respuesta = mdlEventos::mdlEliminarEventos($tabla, $id);

        return $respuesta;
    }

    static public function ctrMostrarEventos1($item, $valor){

		$tabla = "eventos";

		$respuesta = mdlEventos::MdlMostrarEventos1($tabla, $item, $valor);

		return $respuesta;
	}


    static public function ctrMostrarEventos(){

        $tabla="eventos";

        $respuesta=mdlEventos::mdlMostrarEventos($tabla);

        return $respuesta;
    }

    static public function ctrEditareventos(){

    if(isset($_POST["idEventoE"])){

        $datos =array("idEv"=>$_POST["idEventoE"],
                    "tipo_Ev"=>$_POST["tipoE"],
                    "name_Ev"=>$_POST["nameE"],
                    "fecha_Ev"=>$_POST["fechaE"],
                    "asignado_Ev"=>$_POST["asignadoE"]);

                    $tabla="eventos";
                    $respuesta = mdlEventos::mdlEditarEventos($tabla,$datos);
        // echo "<pre>"; print_r($datos); echo "<pre>";
        if($respuesta == "ok"){
            echo'<script>
                    swal({
                        type:"success",
                        title: "¡CORRECTO!",
                        text: "El evento ha sido editado correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                        
                    }).then(function(result){

                        if(result.value){   
                            history.back();
                        } 
                    });

                </script>';

        }else{
            echo "<div class='alert alert-danger mt-3 small'>editada fallida</div>";
        }	
    }
    }



    static public function ctrGuardareventos(){

        if(isset($_POST["tipoA"])){
            
            $datos = array("tipo"=>$_POST["tipoA"],
                            "name"=>$_POST["name_a"],
                            "fecha_a"=>$_POST["fecha"],
                            "asig"=>$_POST["asignado"]);
                    echo "</pre>"; print_r($datos); echo "</pre>";

            $tabla="eventos";

            $respuesta=mdlEventos::mdlguardarEventos($tabla,$datos); 

            if($respuesta == "ok"){

                echo'<script>

                    swal({
                        type:"success",
                        title: "¡CORRECTO!",
                        text: "El evento ha sido creado correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                            
                    }).then(function(result){

                            if(result.value){   
                                history.back();
                            } 
                        });

                </script>';

            }else{

                echo "<div class='alert alert-danger mt-3 small'>registro fallido</div>";
            }
        }
    }
}


?>