<?php
//include('services/produits.class.php');
//include('services/database.class.php');
// Autoload des class

function __autoload($name) {
    $file = 'services/'.$name. '.class.php';
    if (file_exists($file))
    {
        include $file;
    }else{
        throw new Exception("Impossible de charger la classe $name.");
    }
}

// On récupére la méthode, la classe et les paramétres
$method = $_SERVER['REQUEST_METHOD'];
$request = explode('/', trim($_SERVER['REQUEST_URI'],'/'));
array_shift($request);

if($method == "POST" || $method == "PUT"){
    // On récupére les paramétres
    $class = explode('?',$request[0])[0];
    $params = explode('?',$request[0]);
    if(isset($params[1])){
        $params = $params[1];
    }
    $params = explode('&',$params);

    //On va les récupérer dans un tableau
    $parametres = array();
    foreach($params as $param){
        $parametres[explode('=', $param)[0]] = (isset(explode('=', $param)[1])) ? explode('=', $param)[1] : null;
    }
}else{
    $class = $request[0];
    if(isset($request[1])){
        $parametres = $request[1];
    }else{
        $parametres = null;
    }
}


if(sizeof($request) == 0){
    echo "Vous êtes sur l'accueil !";
    die();
}

// On appel la méthode de redirection
try {
    $service = new $class();
} catch (Exception $e) {
    die($e->getMessage());
}
$class = ucfirst($class);
$requete = $method. $class;

switch($method){
    case 'GET' : if(!empty($request[1])){$params = $request[1];}break;
    case 'POST' : $params = $parametres; break;
    case 'PUT' : $params = $parametres; break;
    case 'DELETE' : if(sizeof($request) == 2){$params = $request[1];}break;
}

if(isset($parametres)){
    $result = $service->$requete($parametres);
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
