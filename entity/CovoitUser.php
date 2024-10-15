<?php
class CovoitUser implements JsonSerializable {
    private $id; 
    private $nom;
    private $prenom;
    private $tel;
    private $mail;
    private $mdp;


    public function __construct() {
        $num_args = func_num_args();
        switch ($num_args)
        {
            case '0' :
                
                break;
            case '6' :
                $this->id = func_get_arg(0); 
                $this->nom = func_get_arg(1); 
                $this->prenom = func_get_arg(2); 
                $this->tel = func_get_arg(3); 
                $this->mail = func_get_arg(4); 
                $this->mdp= func_get_arg(5); 
                break;
        }
    }

    // Getter et Setter pour id
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
        return $this; //proposé par ChatGPT pour créer des objets 
    }

    // Getter et Setter pour nom
    public function getNom() {
        return $this->nom;
    }

    public function setNom($nom) {
        $this->nom = $nom;
        return $this;
    }

    // Getter et Setter pour prenom
    public function getPrenom() {
        return $this->prenom;
    }

    public function setPrenom($prenom) {
        $this->prenom = $prenom;
        return $this;
    }

    // Getter et Setter pour tel
    public function getTel() {
        return $this->tel;
    }

    public function setTel($tel) {
        $this->tel = $tel;
        return $this;
    }

    // Getter et Setter pour mail
    public function getMail() {
        return $this->mail;
    }

    public function setMail($mail) {
        $this->mail = $mail;
        return $this;
    }

    // Getter et Setter pour mdp
    public function getMdp() {
        return $this->mdp;
    }

    public function setMdp($mdp) {
        $this->mdp = $mdp;
        return $this;
    }

    public function jsonSerialize() {
        return [
        'id' => $this->id,
        'nom' => $this->nom,
        'prenom' => $this->prenom,
        'tel' => $this->tel,
        'mail' => $this->mail,
        ];
    }

}
?>
