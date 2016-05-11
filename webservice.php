<?php
 
// On récupére la classe et les paramétres
$method = $_SERVER['REQUEST_METHOD'];
$request = explode('/', trim($_SERVER['PATH_INFO'],'/'));
 
// On appel la méthode de redirection
redirect($request);

function redirect($request){
    $class = ucfirst($request[0]);
    $service = new $class();
    $requete = ucfirst($method).  strtoupper($request[1]).'/';
    $result = $service->$requete();
    var_dump($result);
}

function export_json(){
    
}
