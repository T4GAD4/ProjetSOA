<?php

Class Database{

    private $db;
    private $user = "soa";
    private $pass = "mysoa";
    private $name = 'mysql:host=brzepka.ovh;dbname=soa';

    public function __construct(){
        self::initialize();
    }

    public function initialize(){
        try {
            $this->db = new PDO($this->name, $this->user, $this->pass);
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
         return $this->db;
    }

    public function get($table,$param = NULL){
        if($param == NULL){
            $sth = $this->db->prepare("Select * from ".$table);
        }else{
            $sth = $this->db->prepare("Select * from ".$table." where Id". ucfirst($table) ."=".$param);
        }
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function post($table,$champs, $valeurs){
        $sth = $this->db->prepare("INSERT INTO `".$table."`(".$champs.") VALUES(".$valeurs.")");
        var_dump($sth);
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    
    public function put($table,$valeurs,$id){
        $sth = $this->db->prepare("UPDATE ".$table." SET ".$valeurs." WHERE Id".ucfirst($$table)." = ".$id);
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function delete($table,$param = NULL){
        if($param != NULL){
            $sth = $this->db->prepare("Delete from `".$table."` where `Id". ucfirst($table) ."`=".$param);
        }
        $sth->execute();
        $result = $sth->fetchAll();
        return $result;
    }

    public function request($table, $param = NULL,$value = NULL){
        $method = strtolower($_SERVER['REQUEST_METHOD']);
        $result = $this->$method($table,$param,$value);
        return $result;
    }

}

?>
