<?php

Class Database{
    
    private $user = "root";
    private $pass = "";
    private $database = 'mysql:host=localhost;dbname=gdp';
    
    public static function initialize(){
        $database = new Database();
        try {
            $db = new PDO($database->database, $database->user, $database->pass);
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
         return $db;
    }
    
}

?>