<?php 

require_once "conexion.php";



class mdlUsuarios{

    static public function mdlMostrarUsuariosl($tabla , $item , $valor){

	        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

           $stmt-> close();

	    	$stmt = null;
    }

    static public function mdlEliminarUsuarios($tabla , $id){

        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE registroId =:id");

        $stmt -> bindParam(":id", $id, PDO::PARAM_INT);

        if($stmt -> execute()){

			return "ok";
		
		}else{

			echo "\nPDO::errorInfo():\n";
    		print_r(Conexion::conectar()->errorInfo());

		}

		$stmt -> close();

		$stmt = null;
    }


    static public function mdlEditarUsuarios($tabla , $datos){

        $stmt= Conexion::conectar()->prepare("UPDATE $tabla SET identificacion=:ID, nombresCompletos=:NOM_E, nombreUsuario=:NOMUSER_E, contrasena=:PASSER_E, nomRol=:ROL_E WHERE registroId=:IDE");

        $stmt->bindParam(":IDE", $datos["idE"], PDO::PARAM_INT);
        $stmt->bindParam(":ID", $datos["idenE"], PDO::PARAM_INT);
        $stmt->bindParam(":NOM_E", $datos["nom_usuarioE"], PDO::PARAM_STR);
        $stmt->bindParam(":NOMUSER_E", $datos["nom_userE"], PDO::PARAM_STR);
        $stmt->bindParam(":PASSER_E", $datos["passE"], PDO::PARAM_STR);
        $stmt->bindParam(":ROL_E", $datos["rol_userE"], PDO::PARAM_STR);

        if($stmt -> execute()){

			return "ok";

		}else{

			echo "error";

		}

		$stmt-> close();

		$stmt = null;
    }

    
    static public function MdlMostrarUsuarios1($tabla,$item ,$valor){

        $stmt= Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item =:$item");

        $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetch();

        $stmt -> close();

		$stmt = null;
    }

    static public function mdlMostrarUsuarios($tabla){

        $stmt= Conexion::conectar()->prepare("SELECT * FROM $tabla");

        $stmt ->execute();

        return $stmt->fetchAll();

        $stmt->close();

        $stmt =null;
    }

    static public function mdlMostrarNombre2($tabla){

        $stmt= Conexion::conectar()->prepare("SELECT * FROM $tabla");

		$stmt -> execute();

		return $stmt -> fetchAll();
    }

    static public function mdlMostrarNombre($tabla,$item ,$valor){

        $stmt= Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item =:$item");
    
        $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
    
        $stmt -> execute();
    
        return $stmt -> fetch();
      }

    static public function mdlguardarUsuarios($tabla ,$datos){

        $stmt= Conexion::conectar()->prepare("INSERT INTO $tabla(identificacion, nombresCompletos, nombreUsuario, contrasena, nomRol) VALUES (:IDENTI, :NOMBRES, :NOMBRE_u, :CONTRAS, :ROL_u)");

        $stmt->bindParam(":IDENTI", $datos["identi"], PDO::PARAM_INT);
        $stmt->bindParam(":NOMBRES", $datos["name"], PDO::PARAM_STR);
        $stmt->bindParam(":NOMBRE_u", $datos["user"], PDO::PARAM_STR);
        $stmt->bindParam(":CONTRAS", $datos["pass"], PDO::PARAM_STR);
        $stmt->bindParam(":ROL_u", $datos["rol"], PDO::PARAM_INT);

        if($stmt->execute()){

            return "ok";
        }else{

            echo "error";
        }

        $stmt->close();
		$stmt = null;
    }
}
?>