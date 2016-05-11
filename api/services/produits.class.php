<?php

Class Produits{

    function GETProduits($id){
        return array('status' => 'Not implemented','id' => $id);
    }

    function POSTProduits($params){
        return array('status' => 'Not implemented');
    }

    function PUTProduits($params){
        return array('status' => 'Not implemented');
    }

    function DELETEProduits($id = NULL){
        $result = new StdClass();
        if($id == NULL){
            $result->error = "Aucun ID n'a été donné!";
        }else{
            $result->success = "Element supprimé!";
        }
        return $result;
    }


}
