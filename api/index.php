<?php

// Autoload des class

function __autoload($name) {
    $file = 'services/'.$name. '.class.php';
    if (file_exists($file))
    {
        include $file;
    } 
    throw new Exception("Impossible de charger la classe $name.");
}

// On récupére la méthode, la classe et les paramétres
$method = $_SERVER['REQUEST_METHOD'];
$request = explode('/', trim($_SERVER['REQUEST_URI'],'/'));
array_shift($request);

if(sizeof($request) == 0){
    echo "Vous êtes sur l'accueil !";
    die();
}

// On appel la méthode de redirection
$class = ucfirst($request[0]);

try {
    $service = new $class();
} catch (Exception $e) {
    die($e->getMessage());
}
$requete = $method. $request[0];

switch($method){
    case 'GET' : $requete =  $method. $request[0]; if(!empty($request[1])){$params = $request[1];}break;
    case 'POST' : $params = $_REQUEST; break;
    case 'PUT' : $params = $_REQUEST; break;
    case 'DELETE' : $requete = $method. $request[0];if(sizeof($request) == 2){$params = $request[1];}break;
}
if(isset($params)){
    $result = $service->$requete($params);
}else{
    $result = $service->$requete();
}
// Print result in JSON
export_json($result);

// Fonction qui retourne le resultat au format json
function export_json($result){
    header('Content-Type: application/json');
    echo json_encode($result);
}
