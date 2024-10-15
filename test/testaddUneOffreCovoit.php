<?php 

include '../entity/OffreCovoit.php';
include '../entity/CovoitUser.php';
include '../modeles/DAOOffreCovoit.php';

$LeUser = new CovoitUser(1,"Jose","Jean-Edme","0699499985", "j.j@gmail.com", "jsuisunmdp");


$PremierTest = new OffreCovoit();
$PremierTest->setId(1);
$PremierTest->setCovoitUser($LeUser);
$PremierTest->setJour("Lundi");
$PremierTest->setHeure("08:00:00");
$PremierTest->setDate("2024-09-09");
$PremierTest->setLieu("Athis-Mons");

var_dump(addOffreCovoit($PremierTest));