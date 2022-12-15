<?php
include_once("../autoload.php");

// Pongo los encabezados por si me conecto desde javascript de otro servidor,
// me autorice la política CORS.
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");

$aResponse = []; // Array para devolver un protocolo JSON.

// Recupero la URL y obtengo el nombre del método a ejecutar
$url = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
$aUrl = explode("/", $url);
$method_name = $aUrl[sizeof($aUrl) - 1];

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    $aResponse["success"] = false;
    $aResponse["values"] = "Método " . $_SERVER["REQUEST_METHOD"] . " no se puede usar";
    echo json_encode($aResponse);
    exit;
}

// Recupero los parámetros que vienen como Raw Data en
// formato JSON.
$rawDataRequest = file_get_contents("php://input"); // Obtengo el raw data
$aParametros = json_decode($rawDataRequest, true); // Decodifico el json.


// Instancio la clase modelo y luego llamó al método que viene dado en la
// URL.
$objEstados = new ActividadesModel();
$aResult = call_user_func_array(array($objEstados, $method_name), array($aParametros));
$aResponse["success"] = true;
$aResponse["values"] = $aResult;
echo json_encode($aResponse);


?>