<?php

require_once "conexion.php";

class mdlroles{

  static public function mdlEliminarRoles($tabla , $valor){

    $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE usuarioId =:idE");

    $stmt -> bindParam(":idE", $valor, PDO::PARAM_INT);

    if($stmt -> execute()){

		  return "ok";
		
		}else{

			echo "\nPDO::errorInfo():\n";
    	print_r(Conexion::conectar()->errorInfo());

		}

		$stmt -> close();

		$stmt = null;


  }


    static public function mdlMostrarRoles($tabla,$item ,$valor){

        $stmt= Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item =:$item");

        $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetch();
    }

    static public function mdlMostrarRoles2($tabla){

        $stmt= Conexion::conectar()->prepare("SELECT * FROM $tabla");

		$stmt -> execute();

		return $stmt -> fetchAll();
    }



    static public function mdlGuardarRoles($tabla,$nomRol){

        $stmt= Conexion::conectar()->prepare("INSERT INTO $tabla(nom_rol) VALUES(:NOMBRE_ROL)");

        $stmt->bindParam(":NOMBRE_ROL", $nomRol, PDO::PARAM_STR);


        if($stmt->execute()){

            return "ok";
        }else{

            echo "error";
        }

        $stmt->close();
		$stmt = null;
    }

    static public function mdlVerRoles($tabla , $item ,$valor ){

        $stmt= Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item=:$item");

        $stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);        
        	
        $stmt -> execute();

	      return $stmt -> fetch();
        $stmt -> close();

		    $stmt = null;
    }


  static public function mdlEditarRoles($tabla, $nomRolE , $idrol){

      $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nom_rol=:rol_nom WHERE usuarioId =:usuarioID");

      $stmt->bindParam(":usuarioID", $idrol, PDO::PARAM_INT);
	    $stmt->bindParam(":rol_nom", $nomRolE, PDO::PARAM_STR);

      if($stmt -> execute()){

		      return "ok";

		  }else{

		    echo "error";
		  }

		  $stmt-> close();

		  $stmt = null;
  }

}
?>