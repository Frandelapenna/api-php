<?php
class EstadosModel {
    public function get($xArgs = "") {
        $objBD = new DBConexion();
        $sql = "SELECT 
                    * 
                FROM 
                    estados ";

        if ($xArgs != "")
            $sql .= "WHERE " . $xArgs["filter"];

        $result = $objBD->getQuery($sql);
        $objBD->close();
        return $result;
    }

    public function insert($xdata) {
        $aResponse = [];
        $objBD = new DBConexion();

        try {
            $descripcion = $xdata["descripcion"];

            $sql = "INSERT INTO estados (
                        descripcion)
                    VALUES (
                        '$descripcion')";
            
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