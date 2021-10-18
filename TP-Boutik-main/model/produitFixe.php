<?php
class produitFixe{
    private $codeProduit;
    private $stockProduit;
    private $prixProduit;

    public function __construct($c,$s,$p){
        $this->codeProduit=$c;
        $this->stockProduit=$s;
        $this->prixProduit=$p;
    }

    public function getCode(){
        return $this->codeProduit;
    }

    public function getStock(){
        return $this->stockProduit;
    }

    public function getPrix(){
        return $this->prixProduit;
    }
}