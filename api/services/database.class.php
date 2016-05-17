<?php
header('Content-Type: text/html; charset=utf-8');

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
            $sth = $this->db->prepare("Select * from ".$table." where id=".$param);
        }
        $sth->execute();
        $result = $sth->fetchAll();
        return $result;
    }
    
    public function delete($table,$param = NULL){
        if($param != NULL){
            $result = $this->db->prepare("Delete from ".$table." where id=".$param);
        }
        $sth->execute();
        $result = $sth->fetchAll();
        return $result;
    }
    
    public function request($method, $table, $param = NULL){
        $result = $this->$method($table,$param);
        return $result;
    }
    
}

?>