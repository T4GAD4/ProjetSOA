<?php

Class Caisse{
    
    protected $db;
    protected $table = "gdp__users";
    
    function __construct() {
        $this->db = new Database();
    }

    function GETCaisse($id = 0){
        $method = "get";
        if($id == 0){
            $result = $this->db->request($method,$this->table);
        }else{
            $result = $this->db->request($method,$this->table,$id);
        }
        return array("result" => $result);
    }

    function POSTCaisse($params = NULL){
        if($params == NULL){
            $result = array('error' => 'Aucune donnée à ajouter');
        }else{
            $champs = array();
            $valeurs = array();
            foreach($params as $key => $value){
                array_push($champs, "`$key`");
                if(is_numeric($value)){
                    array_push($valeurs, $value);
                }else{
                    array_push($valeurs, "\"$value\"");
                }
            }
            $champs = implode(',',$champs);
            $valeurs = implode(',',$valeurs);
            $result = $this->db->request($this->table,$champs,$valeurs);
        }
        return $result;
    }

    function PUTCaisse($params = NULL){
        if($params == NULL){
            $result = array('error' => 'Aucune donnée à modifier !');
        }else{
            $valeurs = array();
            foreach($params as $key => $value){
                if(is_numeric($value)){
                    $value = $value;
                }else{
                    $value = "\"$value\"";
                }
                if($key == "Id".  ucfirst($this->table)){
                    $id = $value;
                }else{
                    array_push($valeurs, "`".$key."`=".$value);
                }
            }
            $valeurs = implode(',',$valeurs);
            $result = $this->db->request($this->table,$valeurs,$id);
        }
        return $result;
    }

    function DELETECaisse($id = 0){
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
