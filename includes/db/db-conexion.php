<?php
class DBConexion {
    private $db_link;

    function __construct() {
        $this->db_link = mysqli_connect(SERVER, USER, PASSWORD, DB);
    }

    function close() {
        mysqli_close($this->db_link);
    }

    function getQuery($xsql) {
        $res = mysqli_query($this->db_link, $xsql);
        return mysqli_fetch_all($res, MYSQLI_ASSOC);
    }

    function execute($xsql) {
        $sentencia = mysqli_prepare($this->db_link, $xsql);
        return mysqli_stmt_execute($sentencia);
    }
}
?>