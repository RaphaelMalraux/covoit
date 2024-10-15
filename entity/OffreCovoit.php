<?php

class OffreCovoit {
    private $id; 
    private $jour;
    private $heure;
    private $date;
    private $lieu; // nom orga ou nom ville
    //private $nbPlacesProposees ;
    //private $nbPlacesRestantes ;
   // private $lesPassagers ;
    private $leChauffeur ; 

   
    public function __construct() {
        $num_args = func_num_args();
        switch ($num_args)
        {
            case '0' :
                
                break;
            case '6' :
                $this->id = func_get_arg(0); 
                $this->jour = func_get_arg(1); 
                $this->heure = func_get_arg(2); 
                $this->date = func_get_arg(3); 
                $this->lieu = func_get_arg(4); 
                $this->leChauffeur=func_get_arg(5); 
                break;
        }
    }



 
function getId() {
    return $this->id;
}

public function setId($id) {
    $this->id = $id;
    return $this; //proposé par ChatGPT pour créer des objets 
}

function getCovoitUser() {
    return $this->leChauffeur;
}

function setCovoitUser($objetChauffeur) {
     $this->leChauffeur=$objetChauffeur;
     return $this;
}
function getJour() {
    return $this->jour;
}

function setJour($jour) {
    $this->jour=$jour;
    return $this;
}
public function getHeure() {
    return $this->heure;
}

function setHeure($heure) {
    $this->heure=$heure;
    return $this;
}
function getDate(){
    return $this->date;
}

function setDate($date) {
    $this->date=$date;
    return $this;
}

function getLieu(){
    return $this->lieu ; 
}

function setLieu($lieu) {
    $this->lieu=$lieu;
    return $this;
}



// Méthode magique __get pour accéder aux propriétés privées
/*
public function __get($nomPropriete) {
    // Vérifie si la propriété existe
    if(property_exists($this, $nomPropriete)) {
        return $this->$nomPropriete;
    } else {
        throw new Exception("Propriété '$nomPropriete' non définie.");
    }
}
*/



}
?>
