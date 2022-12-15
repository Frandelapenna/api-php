<?php
class ActividadesModel {
    public function get($xArgs = "") {
        $objBD = new DBConexion();
        $sql = "SELECT 
                    * 
                FROM 
                    actividades ";

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
            $id_materia = $xdata["id_materia"];
            $id_estado = $xdata["id_estado"];
            $descripcion = $xdata["descripcion"];
            $fecha_entrega = $xdata["fecha_entrega"];            
            $notas = $xdata["notas"];

            $sql = "INSERT INTO actividades (
                        id_materia, id_estado ,descripcion, fecha_entrega, notas)
                    VALUES (
                        '$id_materia','$id_estado','$descripcion','$fecha_entrega','$notas')";
            var_dump($sql);
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