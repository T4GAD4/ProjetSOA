<?php

Class Utilisateurs{
    
    protected $db;
    protected $table = "gdp__users";
    
    function __construct() {
        $this->db = new Database();
    }

    function GETUtilisateurs($id = 0){
        $method = "get";
        if($id == 0){
            $result = $this->db->request($method,$this->table);
        }else{
            $result = $this->db->request($method,$this->table,$id);
        }
        return array("result" => $result);
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
            $result = $this->db->request($this->table);
        }else{
            //On supprime l'élément
            $result = $this->db->request($this->table,$id);
        }
        return $result;
    }

}
