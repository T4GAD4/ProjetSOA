<?php

Class Ventes{
    
    protected $db;
    protected $table = "ventes";
    
    function __construct() {
        $this->db = Database::initialize();
    }


    function GETVentes($id = 0){
        foreach($this->db->query('SELECT * from gdp__users') as $row) {
            print_r($row);
        }
        if($id == 0){
            //On va chercher tout les produits
            echo "On va chercher toutes les ventes !";
        }else{
            //On va chercher le produit correspondant à id
            echo "On va chercher la vente !";
        }
        return array('status' => 'Not implemented','id' => $id);
    }

    function POSTVentes($id){
        return array('method' => 'POST', 'status' => 'Not implemented');
    }

    function PUTVentes($id){
        return array('method' => 'PUT', 'status' => 'Not implemented');
    }

    function DELETEVentes($id){
        return array('method' => 'DELETE', 'status' => 'Not implemented');
    }

}
