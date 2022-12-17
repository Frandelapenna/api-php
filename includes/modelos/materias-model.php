<?php
class MateriasModel {
    public function get($xArgs = "") {
        $objBD = new DBConexion();
        $sql = "SELECT 
                    * 
                FROM 
                    materias ";

        if ($xArgs != "")
            $sql .= "WHERE id_materia = " . $xArgs["id_materia"];

        $result = $objBD->getQuery($sql);
        $objBD->close();
        return $result;
    }

    public function insert($xdata) {
        $aResponse = [];
        $objBD = new DBConexion();

        try {
            $nombre = $xdata["nombre"];

            $sql = "INSERT INTO materias (
                        nombre)
                    VALUES (
                        '$nombre')";
            
            $res = $objBD->execute($sql);
            $objBD->close();
            
            if ($res)
                $aResponse["mensaje"] = "El registro se grabó satisfactoriamente";
            else
                $aResponse["mensaje"] = "Error al grabar el registro";
        } catch (Exception $ex) {
            $aResponse["mensaje"] = $ex->getMessage();
        }

        return $aResponse;
    }
}
?>