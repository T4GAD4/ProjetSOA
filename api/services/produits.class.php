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
        return array("result" => $result);
    }

    function POSTProduits($params = NULL){
        if($params == NULL){
            $result = array('error' => 'Aucune donnée à ajouter');
        }else{
            var_dump($params);
            $champs = array();
            $valeurs = array();
            foreach($params as $key => $value){
                array_push($champs, $key);
                array_push($valeurs, $value);
            }
            $champs = implode(',',$champs);
            $valeurs = implode(',',$valeurs);
            var_dump($champs);
            var_dump($valeurs);
            $result = $this->db->request($this->table,$champs,$valeurs);
        }
        return $result;
    }

    function PUTProduits($params,$id){
        if($params == NULL){
            $result = array('error' => 'Aucune donnée à ajouter');
        }else{
            $valeurs = array();
            foreach($params as $key => $value){
                array_push("`".$key."`=".$value,$valeurs);
            }
            $valeurs = implode(',',$valeurs);
            $result = $this->db->request($this->table,$valeurs,$id);
        }
        return $result;
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
