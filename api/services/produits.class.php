<?php

Class Produits{
    
    protected $db;
    protected $table = "produit";
    
    function __construct() {
        $this->db = new Database();
    }

    function GETProduits($id = 0){
        if($id == 0){
            $result = $this->db->request($this->table);
        }else{
            $result = $this->db->request($this->table,$id);
        }
        return array('id' => $id,"result" => $result);
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
            $result = $this->db->request($this->table);
        }else{
            //On supprime l'élément
            $result = $this->db->request($this->table,$id);
        }
        return $result;
    }

}
