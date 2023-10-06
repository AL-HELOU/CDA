<?php
require_once ('Personnage.class.php');

$p = new Personnage();
$p->setNom("Lebowski");
$p->setPrenom("Jeff");

var_dump ($p);

?>