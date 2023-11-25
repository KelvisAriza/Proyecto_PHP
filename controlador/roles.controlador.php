<?php 


class ctrRoles{

    static public function ctrEliminarRoles($valor){

        $tabla="usuarios";

        $respuesta=mdlroles::mdlEliminarRoles($tabla,$valor);

        return $respuesta;
    }


    static public function ctrMostrarRoles($item , $valor){

        $tabla="usuarios";

        $respuesta = mdlroles::mdlMostrarRoles($tabla,$item ,$valor);

        return $respuesta;
    }


    static public function ctrMostrarRoles2(){

        $tabla="usuarios";

        $respuesta = mdlroles::mdlMostrarRoles2($tabla);

        return $respuesta;

    }


    static public function ctrGuardarRol(){

        if(isset($_POST["nom_Rol"])){

            $nomRol = ($_POST["nom_Rol"]);
            $tabla="usuarios";
            $respuesta = mdlroles::mdlGuardarRoles($tabla,$nomRol);

            if($respuesta == "ok"){

				echo'<script>

					swal({
							type:"success",
							title: "¡CORRECTO!",
							text: "El rol ha sido guardado correctamente",
							showConfirmButton: true,
							confirmButtonText: "Cerrar"
							  
						}).then(function(result){

							if(result.value){   
								history.back();
							} 
						});

					</script>';

			}else{

                echo "<div class='alert alert-danger mt-3 small'> fallida</div>";
            }
        }
    }


    static public function ctrVerRoles($item,$valor){

        $tabla="usuarios";

        $respuesta = mdlroles::mdlVerRoles($tabla,$item,$valor);

        return $respuesta;
    }


    static public function ctrEditarRol(){

        if(isset($_POST["nom_rolE"])){

            $nomRolE=$_POST["nom_rolE"];

            $idrol=$_POST["id_rolE"];

            $tabla="usuarios";

            $respuesta = mdlroles::mdlEditarRoles($tabla,$nomRolE,$idrol);

            if($respuesta == "ok"){

				echo'<script>

					swal({
							type:"success",
							title: "¡CORRECTO!",
							text: "El rol ha sido actualizado correctamente",
							showConfirmButton: true,
							confirmButtonText: "Cerrar"
							  
						}).then(function(result){

							if(result.value){   
								history.back();
								} 
						});

					</script>';

			}else{

                echo "<div class='alert alert-danger mt-3 small'> fallida</div>";
            }
        }
    }
}

?>