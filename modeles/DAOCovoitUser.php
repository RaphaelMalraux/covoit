<?php

include_once '../entity/CovoitUser.php';

function getLesCovoitUser(){
	$pdo = PDO2::getInstance();
	$requete=$pdo->prepare('SELECT id, nom, prenom, tel, mail FROM CovoitUser');
        $requete->execute();
        $tab = $requete->fetchAll(PDO::FETCH_CLASS, "CovoitUser");
        $requete->closeCursor();
	 return $tab;
}

function getUnCovoitUser($id){
	$pdo = PDO2::getInstance();
 	$requete=$pdo->prepare('SELECT id, nom, prenom, tel, mail FROM CovoitUser WHERE id = :id');
 		$bv1=$requete->bindValue(':id',$id);
	$requete->execute();
	$requete->setFetchMode(PDO::FETCH_CLASS, 'CovoitUser');
 	$unCovoitUser = $requete->fetch();
 	$requete->closeCursor();
 	return $unCovoitUser;
}

function addCovoitUser($unCovoitUser){
   	$pdo = PDO2::getInstance();
	   $requete=$pdo->prepare('INSERT INTO CovoitUser(nom, prenom, tel, mail, mdp) VALUES(:nom, :prenom, :tel, :mail, :mdp)');
	   $bv1 = $requete->bindValue(':nom',$unCovoitUser->getNom());
	   $bv2 = $requete->bindValue(':prenom', $unCovoitUser->getPrenom());
	   $bv3 = $requete->bindValue(':tel', $unCovoitUser->getTel());
	   $bv4 = $requete->bindValue(':mail', $unCovoitUser->getMail());
	   $bv5 = $requete->bindValue(':mdp', password_hash($unCovoitUser->getMdp(), PASSWORD_DEFAULT));
	   $requete->execute();
	return $requete->rowCount();
}

function updateCovoitUser($unCovoitUser){
	$pdo = PDO2::getInstance();
	$requete=$pdo->prepare('UPDATE CovoitUser 
	SET nom=:nom, prenom = :prenom, tel = :tel, 
	mail = :mail, mdp = :mdp WHERE id = :id ');
		$bv1 = $requete->bindValue(':id', $unCovoitUser->getId());
		$bv2 = $requete->bindValue(':nom', $unCovoitUser->getNom());
		$bv3 = $requete->bindValue(':prenom', $unCovoitUser->getPrenom());
		$bv4 = $requete->bindValue(':tel', $unCovoitUser->getTel());
		$bv5 = $requete->bindValue(':mail', $unCovoitUser->getMail());
		$bv6 = $requete->bindValue(':mdp', $unCovoitUser->getMdp());
		$requete->execute();
	return $requete->rowCount();
}

function deleteCovoitUser($unCovoitUser){
	$pdo = PDO2::getInstance();
	$requete=$pdo->prepare('DELETE FROM CovoitUser WHERE id = :id');
		$bv1 = $requete->bindValue(':id', $unCovoitUser->getId());
		$requete->execute();
	return $requete->rowCount();
}
?>
