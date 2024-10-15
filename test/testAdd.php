<?php

include_once '../global/config.php';
include_once '../'.CHEMIN_LIB.'pdo2.php';
include_once '../'.CHEMIN_MODELE.'DAOCovoitUser.php';

$UnCovoit = new CovoitUser(null, "Jean", "Martin", "0686975843","jean@martin.mail", "1234");

var_dump(addCovoitUser($UnCovoit));

?>