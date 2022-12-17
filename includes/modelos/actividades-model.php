<?php
class ActividadesModel {
    public function get($xArgs = "") {
        $objBD = new DBConexion();
        $sql = "SELECT 
                    * 
                FROM 
                    actividades ";

        if ($xArgs != "")
            $sql .= "WHERE id_actividad = " . $xArgs["id_actividad"];

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

    public function update($xdata){
        $aResponse = [];
        $objBD = new DBConexion();

        try {
            $id_actividad = $xdata["id_actividad"];
            $id_materia = $xdata["id_materia"];
            $id_estado = $xdata["id_estado"];
            $descripcion = $xdata["descripcion"];
            $fecha_entrega = $xdata["fecha_entrega"];            
            $notas = $xdata["notas"];

            $sql = "UPDATE actividades SET 
                        id_materia = '$id_materia',
                        id_estado = '$id_estado',
                        descripcion = '$descripcion',
                        fecha_entrega = '$fecha_entrega',
                        notas = '$notas'
                    WHERE id_actividad = '$id_actividad'";
            var_dump($sql);
            $res = $objBD->execute($sql);
            $objBD->close();
            
            if ($res)
                $aResponse["mensaje"] = "El registro se actualizó satisfactoriamente";
            else
                $aResponse["mensaje"] = "Error al actualizar el registro";
        } catch (Exception $ex) {
            $aResponse["mensaje"] = $ex->getMessage();
        }

        return $aResponse;
    }
}
?>