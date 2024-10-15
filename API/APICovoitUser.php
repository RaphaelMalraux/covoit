<?php
include_once '../global/config.php';
include_once '../'.CHEMIN_LIB.'pdo2.php';
include_once '../'.CHEMIN_ENTITY.'CovoitUser.php';
include_once '../'.CHEMIN_MODELE.'DAOCovoitUser.php';

header('content-type:application/json');

$methode=$_SERVER["REQUEST_METHOD"];
switch ($methode){
	case "GET":
	    if (isset($_GET['id'])){
			$id = $_GET['id'];
			$UnCovoit = getUnCovoitUser( $id );
			echo(json_encode($UnCovoit));
	    } else {
        	echo(json_encode(getLesCovoitUser()));
	    }
	    break;
	case "POST":
      	    if(isset($_POST["nom"]) && isset($_POST["prenom"])){
                $UnUser = new CovoitUser(null,$_POST["nom"],$_POST["prenom"],"0616116116","1234@gmail.com","Rompiche");
                addCovoitUser($UnUser);
            }
	  break;
	  case 'PATCH':
		parse_str(file_get_contents('php://input'), $_PATCH);
		if(isset($_PATCH['nom']) && isset($_PATCH['prenom'])){
			$nom = $_PATCH['nom'];
			$prenom = $_PATCH['prenom'];
			$unCovoitUser = getUnCovoitUser($_PATCH['id']);
			if($unCovoitUser) {
				$unCovoitUser->setNom($nom);
				$unCovoitUser->setPrenom($prenom);
				updateCovoitUser($unCovoitUser);
				echo "Utilisateur changé";
			} else {
				echo "Utilisateur pas trouvé";
			}
		} else {
			echo "Pas possible";
		}
		break;
		case 'DELETE':
			parse_str(file_get_contents('php://input'), $_DELETE);
			if (isset($_DELETE['id'])) {
				$id = $_DELETE['id'];
				$unCovoitUser = getUnCovoitUser($id);
				if ($unCovoitUser) {
					deleteCovoitUser($id);
					echo "Utilisateur supprimé";
				} else {
					echo "Utilisateur pas trouvé";
				}
			} else {
				echo "ID manquant";
			}
			break;
	  	
}