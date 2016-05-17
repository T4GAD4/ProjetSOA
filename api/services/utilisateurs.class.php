<?php

Class Utilisateurs{
    
    protected $db;
    
    function __construct() {
        $this->db = Database::initialize();
    }

    function GETUtilisateurs($id = 0){
        foreach($this->db->query('SELECT * from gdp__users') as $row) {
            print_r($row);
        }
        if($id == 0){
            //On va chercher tout les Utilisateurs
            echo "On va chercher tout les Utilisateurs !";
        }else{
            //On va chercher le produit correspondant à id
            echo "On va chercher le produit !";
        }
        return array('status' => 'Not implemented','id' => $id);
    }

    function POSTUtilisateurs($params){
        return array('status' => 'Not implemented');
    }

    function PUTUtilisateurs($params){
        return array('status' => 'Not implemented');
    }

    function DELETEUtilisateurs($id = 0){
        $result = new StdClass();
        if($id == 0){
            $result->error = "Aucun ID n'a été donné!";
        }else{
            //On supprime l'élément
            $result->success = "Element supprimé!";
        }
        return $result;
    }

}
