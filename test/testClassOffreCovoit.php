<?php

include '../entity/OffreCovoit.php';
include '../entity/CovoitUser.php';

$LeUser = new CovoitUser(1,"Jose","Jean-Edme","0699499985", "j.j@gmail.com", "jsuisunmdp");


$PremierTest = new OffreCovoit();
$PremierTest->setId(1);
$PremierTest->setCovoitUser($LeUser);
$PremierTest->setJour("Lundi");
$PremierTest->setHeure("08:00:00");
$PremierTest->setDate("2024-09-09");
$PremierTest->setLieu("Athis-Mons");


// var_dump($PremierTest);

$DeuxiemeTest = new OffreCovoit(1,"Lundi","08:00:00","2024-09-09","Athis-Mons",$LeUser);

// var_dump($DeuxiemeTest);