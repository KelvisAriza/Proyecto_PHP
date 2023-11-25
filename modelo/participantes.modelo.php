<?php

require_once "conexion.php";

class mdlParticipantes{

    static public function mdlguardarParticipantes($tabla ,$datos){

        $stmt= Conexion::conectar()->prepare("INSERT INTO $tabla(identificacion, nombresCompletos, vinculacion, evento) VALUES (:IDENT_V, :NAME_COM_V, :VIN_V, :EVE_V)");

        $stmt->bindParam(":IDENT_V", $datos["ident_V"], PDO::PARAM_INT);
        $stmt->bindParam(":NAME_COM_V", $datos["name_com_V"], PDO::PARAM_STR);
        $stmt->bindParam(":VIN_V", $datos["vin_V"], PDO::PARAM_INT);
        $stmt->bindParam(":EVE_V", $datos["eve_V"], PDO::PARAM_INT);

        if($stmt->execute()){

            return "ok";
        }else{

            echo "error";
        }

        $stmt->close();
		$stmt = null;
    }

    static public function mdlMostrarParticipantes($tabla){

        $stmt= Conexion::conectar()->prepare("SELECT * FROM $tabla");

        $stmt ->execute();

        return $stmt->fetchAll();

        $stmt->close();

        $stmt =null;
    }

    static public function mdlMostrarVinculacion1($tabla){

        $stmt= Conexion::conectar()->prepare("SELECT * FROM $tabla");

        $stmt ->execute();

        return $stmt->fetchAll();

        $stmt->close();

        $stmt =null;
    }

    static public function mdlMostrarVinculacion($tabla,$item ,$valor){

        $stmt= Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item =:$item");

        $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetch();
    }
}

?>