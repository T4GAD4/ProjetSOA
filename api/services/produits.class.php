<?php

Class Produits{
    
    protected $db;
    protected $table = "produits";
    
    function __construct() {
        $this->db = Database::initialize();
    }

    function GETProduits($id = 0){
        foreach($this->db->query('SELECT * from gdp__users') as $row) {
            print_r($row);
        }
        if($id == 0){
            //On va chercher tout les produits
            echo "On va chercher tout les produits !";
        }else{
            //On va chercher le produit correspondant à id
            echo "On va chercher le produit !";
        }
        return array('status' => 'Not implemented','id' => $id);
    }

    function POSTProduits($params){
        return array('status' => 'Not implemented');
    }

    function PUTProduits($params){
        return array('status' => 'Not implemented');
    }

    function DELETEProduits($id = 0){
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
