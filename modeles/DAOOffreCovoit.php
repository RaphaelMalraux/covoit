<?php
include_once '../entity/OffreCovoit.php';
include_once  '../entity/CovoitUser.php';

include '../global/config.php';
include '../'.CHEMIN_LIB.'pdo2.php';
/**
 * R�cup�re toutes les informations des OffresCovoit (sauf le chauffeur)
 * @return un tableau d'objet OffreCovoit
 */
function getLesOffresCovoitAnonyme(){
	$pdo = PDO2::getInstance();
	$sth = $pdo->prepare('SELECT `id`,`jour`, `heure`, `date`, `lieu` FROM `OffreCovoit`;');
	$sth->execute();
	$value = $sth->fetchAll();
	if($value == false){
		throw new ErrorException("La valeur demandé n'existe pas !");
	}
	return $value;
}

/**
 * R�cup�re toutes les informations des OffresCovoit, y compris les chauffeurs
 * @return un tableau d'objet OffreCovoit (chaque objet OffreCovoit contient l'objet CovoitUser correspondant )
 */
function getLesOffresCovoit(){
	$pdo = PDO2::getInstance();

	$pdo = PDO2::getInstance();
	$sth = $pdo->prepare('SELECT `id`,`jour`, `heure`, `date`, `lieu`, `chauffeur` FROM `OffreCovoit`;');
	$sth->execute();
	$value = $sth->fetchAll();
	if($value == false){
		throw new ErrorException("La valeur demandé n'existe pas !");
	}
	
	return $value;

}


function addOffreCovoit($uneOffreCovoit){
	$pdo = PDO2::getInstance();
	$sth = $pdo->prepare("INSERT INTO `OffreCovoit`(`jour`, `heure`, `date`, `lieu`, `chauffeur`) VALUES (:jour,:heure,:ladate,:lieu,:chauffeur)");
	if(empty($uneOffreCovoit->getJour())){
		throw new ErrorException("L'objet donné n'est pas valide");
	}
	elseif(empty($uneOffreCovoit->getHeure())){
		throw new ErrorException("L'objet donné n'est pas valide");
	}
	elseif(empty($uneOffreCovoit->getDate())){
		throw new ErrorException("L'objet donné n'est pas valide");
	}
	elseif(empty($uneOffreCovoit->getLieu())){
		throw new ErrorException("L'objet donné n'est pas valide");
	}
	elseif(empty($uneOffreCovoit->getCovoitUser())){
		throw new ErrorException("L'objet donné n'est pas valide");
	}
	$jour = $uneOffreCovoit->getJour();
	$heure  = $uneOffreCovoit->getHeure();
	$ladate = $uneOffreCovoit->getDate();
	$lieu = $uneOffreCovoit->getLieu();
	$chauffeur = $uneOffreCovoit->getCovoitUser()->getId();
	$sth->bindValue('jour',$jour);
	$sth->bindValue('heure',$heure);
	$sth->bindValue('ladate',$ladate);
	$sth->bindValue('lieu',$lieu);
	$sth->bindValue('chauffeur',$chauffeur );
	$sth->execute();

	$value = $sth->fetch();

	return $value;
}

function getUneOffreCovoit($id){
	$pdo = PDO2::getInstance();
	$sth = $pdo->prepare('SELECT `jour`, `heure`, `date`, `lieu` FROM `OffreCovoit` WHERE id=:id');
	$sth->bindValue('id', $id);
	$sth->execute();
	$value = $sth->fetch();
	if($value == false){
		throw new ErrorException("La valeur demandé n'existe pas !");
	}
	return $value;
}



?>
