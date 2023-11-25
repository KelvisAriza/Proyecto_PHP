<?php 

require_once "conexion.php";



class mdlEventos{

    static public function mdlEliminarEventos($tabla , $id){

        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE eventoId =:id");

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


    static public function mdlEditarEventos($tabla, $datos){

        $stmt= Conexion::conectar()->prepare("UPDATE $tabla SET tipoActividad=:TIPO_EV, nombreActividad=:NOM_EV, fecha=:FECHA_EV, asignadoRB=:ASIG_EV WHERE eventoId=:IDEV");

        $stmt->bindParam(":IDEV", $datos["idEv"], PDO::PARAM_INT);
        $stmt->bindParam("TIPO_EV", $datos["tipo_Ev"], PDO::PARAM_STR);
        $stmt->bindParam(":NOM_EV", $datos["name_Ev"], PDO::PARAM_STR);
        $stmt->bindParam(":FECHA_EV", $datos["fecha_Ev"], PDO::PARAM_STR);
        $stmt->bindParam(":ASIG_EV", $datos["asignado_Ev"], PDO::PARAM_STR);

        if($stmt -> execute()){
			return "ok";
		}else{
			echo "error";
		}
		$stmt-> close();
		$stmt = null;
    }

    
    static public function MdlMostrarEventos1($tabla,$item ,$valor){

        $stmt= Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item =:$item");

        $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetch();

        // $stmt -> close();

		// $stmt = null;
    }

    static public function mdlMostrarEventos($tabla){

        $stmt= Conexion::conectar()->prepare("SELECT * FROM $tabla");

        $stmt ->execute();

        return $stmt->fetchAll();

        $stmt->close();

        $stmt =null;
    }


    static public function mdlguardarEventos($tabla ,$datos){

        $stmt= Conexion::conectar()->prepare("INSERT INTO $tabla(tipoActividad, nombreActividad, fecha, asignadoRB) VALUES (:TIPO, :NAME, :FECHA, :ASIG_e)");

        $stmt->bindParam(":TIPO", $datos["tipo"], PDO::PARAM_STR);
        $stmt->bindParam(":NAME", $datos["name"], PDO::PARAM_STR);
        $stmt->bindParam(":FECHA", $datos["fecha_a"], PDO::PARAM_STR);
        $stmt->bindParam(":ASIG_e", $datos["asig"], PDO::PARAM_INT);

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