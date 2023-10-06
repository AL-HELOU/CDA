<?php

class Personnage 
{
    private $_nom;
    private $_prenom;
    private $_age;
    private $_sexe;

    public function setNom($Nom){
        return $this->_nom = $Nom;
    }
    
    public function getNom(){
        return $this->_nom;
    }
    
    public function setPrenom($Prenom){
        return $this->_prenom = $Prenom;
    }
    
    public function getPrenom(){
        return $this->_prenom;
    }
    
    public function setAge($Age){
        return $this->_age = $Age;
    }
    
    public function getAge(){
        return $this->_age;
    }
    
    public function setSexe($Sexe){
        return $this->_sexe = $Sexe;
    }
    
    public function getSexe(){
        return $this->_sexe;
    }
}

?>