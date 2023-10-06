<?php

/*
<strong>        ---------------------------Exercice-------------------------------</strong>


Reprenez le formulaire que vous avez réalisé dans la séance précédente (JavaScript).

Dans ce formulaire, vous devez modifier l\'attribut action de la balise form pour indiquer l\'adresse d\'un script PHP.

    form action="monscript.php"

Puis créer un script PHP permettant d\'afficher l\'ensemble des valeurs transmises.

    $_REQUEST["nom_du_input"] 

Cette instruction permet de récupérer la valeur du paramètre nom_du_input.

____________________________________________________________________________________________________________________________

*/


if(isset($_REQUEST['soc'])){
    $socvalue = $_REQUEST['soc'];
    echo "<strong> Société :&emsp; </strong> $socvalue <br><br><br>";
}

if(isset($_POST['pac'])){
    $pacvalue = $_POST['pac'];
    echo "<strong> Personne à contacter :&emsp; </strong> $pacvalue <br><br><br>";
}

if(isset($_REQUEST['entrep'])){
    $entrepvalue = $_REQUEST['entrep'];
    echo "<strong> Addresse de l'entreprise :&emsp; </strong> $entrepvalue <br><br><br>";
}

if(isset($_REQUEST['cp'])){
    $cpvalue = $_REQUEST['cp'];
    echo "<strong> Code postal :&emsp; </strong> $cpvalue <br><br><br>";
}


if(isset($_REQUEST['ville'])){
    $villevalue = $_REQUEST['ville'];
    echo "<strong> Ville :&emsp; </strong> $villevalue <br><br><br>";
}

if(isset($_REQUEST['email'])){
    $emailvalue = $_REQUEST['email'];
    echo "<strong> E-mail :&emsp; </strong> $emailvalue <br><br><br>";
}

if(isset($_REQUEST['tel'])){
    $telvalue = $_REQUEST['tel'];
    echo "<strong> Téléphone :&emsp; </strong> $telvalue <br><br><br>";
}

if(isset($_REQUEST['etdp'])){
    $etdpvalue = $_REQUEST['etdp'];
    echo "<strong> l'environnement technique du projet :  $etdpvalue </strong> &emsp;";
}

if(isset($_REQUEST['txtarea'])){
    $txtareavalue = $_REQUEST['txtarea'];
    echo "&emsp; $txtareavalue <br><br>";
}

echo "____________________________________________________________________________________________________________________________";
?>

