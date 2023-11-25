<?php 


class ctrUsuarios{

	static public function ctrIngresoUsuarios(){

		if(isset($_POST["log_user"])){

			$encriptarPass=crypt($_POST["log_pass"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

			$tabla="crearusuario";
			$item="nombreUsuario";
			$valor=$_POST["log_user"];

			$respuesta=mdlUsuarios::mdlMostrarUsuariosl($tabla, $item, $valor);

			if($respuesta["nombreUsuario"] == $_POST["log_user"]  && $respuesta["contrasena"] == $encriptarPass){

			$_SESSION["validarSession"] = "ok";
			$_SESSION["idBackend"] = $respuesta["registroId"];


						echo '<script>

							window.location = "eventos";

				 		</script>';

			}else{

				echo "<div class='alert alert-danger mt-3 small'>ERROR: Usuario y/o contraseña incorrectos</div>";

			}
		}
	}


	static public function  ctrEliminarUsuarios($id){	

		$tabla = "crearusuario";

		$respuesta = mdlUsuarios::mdlEliminarUsuarios($tabla, $id);

		return $respuesta;
	}

	static public function ctrMostrarUsuarios1($item, $valor){

		$tabla = "crearusuario";

		$respuesta = mdlUsuarios::MdlMostrarUsuarios1($tabla, $item, $valor);

		return $respuesta;
	}

	static public function ctrMostrarNombre2($item, $valor){

		$tabla="crearusuario";

        $respuesta = mdlUsuarios::mdlMostrarNombre2($tabla);

        return $respuesta;
	}

	static public function ctrMostrarNombre($item , $valor){

        $tabla="crearusuario";

        $respuesta = mdlUsuarios::mdlMostrarNombre($tabla,$item ,$valor);

        return $respuesta;
    }

    static public function ctrMostrarUsuarios(){

     $tabla="crearusuario";

     $respuesta=mdlUsuarios::mdlMostrarUsuarios($tabla);

     return $respuesta;
    }

	static public function ctrEditarusuarios(){

		if(isset($_POST["idPerfilE"])){

			if($_POST["pass_userE"] != ""){

				$password = crypt($_POST["pass_userE"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$'); 

			}else{

			$password = $_POST["pass_userActualE"];

			}

			$datos =array("idE" => $_POST["idPerfilE"],
						"idenE"=> $_POST["identE"],
						"nom_usuarioE" => $_POST["name_comE"],
						"nom_userE" => $_POST["user_nameE"],
						"passE" => $password,
						"rol_userE" => $_POST["rol_userE"]);

						$tabla="crearusuario";

						$respuesta = mdlUsuarios::mdlEditarUsuarios($tabla,$datos);

					//	echo "<pre>"; print_r($datos); echo "<pre>";
					
			if($respuesta == "ok"){

				echo'<script>

				swal({
						type:"success",
						title: "¡CORRECTO!",
						text: "El usuario ha sido editado correctamente",
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
	


    static public function ctrGuardarUsuarios(){

        if(isset($_POST["ident"])){
            $encriptarPassword = crypt($_POST["pass_user"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

            $datos = array("identi"=>$_POST["ident"],
                            "name"=>$_POST["name_com"],
                            "user"=>$_POST["user_name"],
                            "pass"=>$encriptarPassword,
                            "rol"=>$_POST["rol_user"]);
                    	echo "</pre>"; print_r($datos); echo "</pre>";

            $tabla="crearusuario";

            $respuesta=mdlUsuarios::mdlguardarUsuarios($tabla,$datos); 
		
            if($respuesta == "ok"){

				echo'<script>

					swal({
						type:"success",
						title: "¡CORRECTO!",
						text: "El usuario ha sido creado correctamente",
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