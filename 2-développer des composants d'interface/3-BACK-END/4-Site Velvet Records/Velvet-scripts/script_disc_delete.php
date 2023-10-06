
<?php

    session_start();
    
    // Contrôle de l'ID (si inexistant ou <= 0, retour à la liste) :
    if (!(isset($_GET['id'])) || intval($_GET['id']) <= 0) GOTO TrtRedirection;

    if(isset($_GET['id'])):$disc_id = htmlentities($_GET['id']); endif;
    if(isset($_GET['title'])):$disc_title = $_GET['title']; endif;
    if(isset($_GET['picture'])):$disc_pic = $_GET['picture']; endif;

    // Si la vérification est ok :
    include "connectDB.php";
    $db = ConnexionBase();

    try {
        // Construction de la requête DELETE :
        $requete = $db->prepare("DELETE FROM disc WHERE disc_id = :disc_id ;");
        $requete->bindValue(":disc_id", $disc_id, PDO::PARAM_STR);
        $requete->execute();
        $requete->closeCursor();
    }
    catch (Exception $e) {
        echo "Erreur : " . $requete->errorInfo()[2] . "<br>";
        die("Fin du script (script_disc_delete.php)");
    }
    unlink("../jaquettes-imgs/$disc_pic");

    // Si OK: redirection vers la page discs.php
    $_SESSION['pageopened']= '1';
    TrtRedirection:
    header("Location: ../discs.php?succes=discdeleted&title=$disc_title");
    exit;
?>