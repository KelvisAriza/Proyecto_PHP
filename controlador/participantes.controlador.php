<?php

class ctrParticipantes{

    static public function ctrMostrarParticipantes(){

        $tabla="participantesevento";
   
        $respuesta=mdlParticipantes::mdlMostrarParticipantes($tabla);
   
        return $respuesta;
    }

    static public function ctrMostrarVinculacion1(){

        $tabla="tipovinculacion";

        $respuesta=mdlParticipantes::mdlMostrarVinculacion1($tabla);

        return $respuesta;
    }

    static public function ctrMostrarVinculacion($item , $valor){

        $tabla="tipovinculacion";

        $respuesta = mdlParticipantes::mdlMostrarVinculacion($tabla, $item , $valor);
        return $respuesta;
    }

    static public function ctrGuardarparticipantes(){

        if(isset($_POST["identV"])){

            $datos = array("ident_V"=>$_POST["identV"],
                            "name_com_V"=>$_POST["name_comV"],
                            "vin_V"=>$_POST["vin"],
                            "eve_V"=>$_POST["eve"]);
                    	echo "</pre>"; print_r($datos); echo "</pre>";

            $tabla="participantesevento";

            $respuesta=mdlParticipantes::mdlguardarParticipantes($tabla,$datos); 
		
            if($respuesta == "ok"){

				echo'<script>

					swal({
						type:"success",
						title: "¡CORRECTO!",
						text: "El paricipante ha sido creado correctamente",
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