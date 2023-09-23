<?php

require_once 'request/nuevoRequest.php';
require_once 'responses/nuevoResponse.php';
require_once '../../modelo/Direccion.php';
require_once '../../modelo/Titular.php';

header('Content-Type: application/json');

$resp = new NuevoResponse();

$json = file_get_contents('php://input',true);
$req = json_decode($json);

$resp->IsOk=true;
$resp->Mensaje='Titular agregado correctamente';


if ($req->Direccion==null) {
    $resp->IsOk=false;
    $resp->Mensaje='la direccion es obligatoria.';
}

if ($req->NroDocumento==null or $req->NombreApellido==null) {
    $resp->IsOk=false;
    $resp->Mensaje= $resp->Mensaje.' El NroDocumento / NombreApellido es obligatorio.';
}


echo json_encode($resp);