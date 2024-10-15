<?php

// Identifiants pour la base de données. Nécessaires à PDO2.
define('SQL_DSN','mysql:dbname=covoit2024;host=localhost');
define('SQL_USERNAME', 'covoitADM');
define('SQL_PASSWORD', '1234');

define('SQL_OPTIONS', 'array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")');

define('CHEMIN_MODELE', 'modeles/');
define('CHEMIN_LIB',    'libs/');
define('CHEMIN_ENTITY',    'entity/');

?>

