<?php
session_start();

if(isset($_POST['artist'])):$artist = $_POST['artist']; endif;

if(isset($_POST['aurl'])):$aurl = $_POST['aurl']; endif;


if(isset($_POST['submit'])){

    if (!preg_match("/^[\wáàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ\s\-,\.]*$/",$artist)){
        header("Location: ../Velvet-forms/artist_new.php?err=charartist&artist=$artist&aurl=$aurl");
        exit();
    }
    if (!preg_match("/^[\w\-\.]*$/",$aurl)){
        header("Location: ../Velvet-forms/artist_new.php?err=charaurl&artist=$artist&aurl=$aurl");
        exit();
    }

    if(empty($artist)){
        header("Location: ../Velvet-forms/artist_new.php?err=empty&artist=$artist&aurl=$aurl");
        exit();
    }

        require "connectDB.php"; 
        $db = connexionBase();

        try {
        $requete = $db->prepare("INSERT INTO artist (artist_name, artist_url) 
                                VALUES (:artist, :aurl);");

            // Association des valeurs aux paramètres via bindValue() :
        $requete->bindValue(":artist", $artist, PDO::PARAM_STR);
        $requete->bindValue(":aurl", $aurl, PDO::PARAM_STR);

        // Lancement de la requête :
        $requete->execute();

        // Libération de la requête :
        $requete->closeCursor();
        }

        catch (Exception $e) {
            var_dump($requete->queryString);
            var_dump($requete->errorInfo());
            echo "Erreur : " . $requete->errorInfo()[2] . "<br>";
            die("Fin du script");
        }

        $_SESSION['pageopened']= '1';
        header("Location: ../discs.php?succes=ajoutartistok&artist=$artist");

        exit();
}
?>