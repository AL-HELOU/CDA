<?php

session_start();

$verif_ok = false;

if(isset($_POST['title'])):$titre = $_POST['title']; endif;

if(isset($_POST['artist'])):$artiste = $_POST['artist']; endif;

if(isset($_POST['year'])):$annee = $_POST['year']; endif;

if(isset($_POST['genre'])):$genre = $_POST['genre']; endif;

if(isset($_POST['label'])):$label = $_POST['label']; endif;

if(isset($_POST['price'])):$prix = $_POST['price']; endif;

if(isset($_POST['disc_id'])):$disc_id = $_POST['disc_id']; endif;

if(isset($_GET['picture'])):$disc_pc = $_GET['picture']; endif;


if(isset($_POST['submit'])){

    if (!preg_match("/^[\wáàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ\s\-,\.]*$/",$titre)){
        header("Location: ../Velvet-forms/disc_modif.php?id=$disc_id&err=chartitre&titre=$titre&artiste=$artiste&annee=$annee&genre=$genre&label=$label&prix=$prix");
        exit();
    }

    if (!preg_match("/^[\wáàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ\s\-,\.]*$/",$genre)){
        header("Location: ../Velvet-forms/disc_modif.php?id=$disc_id&err=chargenre&titre=$titre&artiste=$artiste&annee=$annee&genre=$genre&label=$label&prix=$prix");
        exit();
    }

    if (!preg_match("/^[\wáàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ\s\-,\.]*$/",$label)){
        header("Location: ../Velvet-forms/disc_modif.php?id=$disc_id&err=charlabel&titre=$titre&artiste=$artiste&annee=$annee&genre=$genre&label=$label&prix=$prix");
        exit();
    }

    if (!preg_match("/^[\d]*$/",$annee)){
        header("Location: ../Velvet-forms/disc_modif.php?id=$disc_id&err=charannee&titre=$titre&artiste=$artiste&annee=$annee&genre=$genre&label=$label&prix=$prix");
        exit();
    }

    if (!preg_match("/^[\d\.]*$/",$prix)){
        header("Location: ../Velvet-forms/disc_modif.php?id=$disc_id&err=charprix&titre=$titre&artiste=$artiste&annee=$annee&genre=$genre&label=$label&prix=$prix");
        exit();
    }

    if(empty($titre) || empty($artiste) || empty($annee) || empty($genre) || empty($label) || empty($prix)){
        header("Location: ../Velvet-forms/disc_modif.php?id=$disc_id&err=empty&titre=$titre&artiste=$artiste&annee=$annee&genre=$genre&label=$label&prix=$prix");
        exit();
    }


    if (is_uploaded_file($_FILES['photo']['tmp_name'])){

        unlink("../jaquettes-imgs/$disc_pc");

        $photoName = $_FILES['photo']['name'];
        $photoTmpName = $_FILES['photo']['tmp_name'];
        $photoType = $_FILES['photo']['type'];
        $photoSize = $_FILES['photo']['size'];

        if($photoSize > 5242880){
            header("Location: ../Velvet-forms/disc_modif.php?id=$disc_id&err=fsize&titre=$titre&artiste=$artiste&annee=$annee&genre=$genre&label=$label&prix=$prix");
            exit();
        }

        $uploadto = "/home/stag15/Bureau/MUHANNAD/BACKEND/BDD/PHP/Velvet Records/jaquettes-imgs/";
        $allowed = ['jpg','jpeg','png','gif','bmp','cod','ras','fif','ief','svg','tiff','tif','mcf','wbmp','ico','pnm','pbm','pgm','ppm','rgb','xwd','xbm','xpm'];
       
        $ext = pathinfo($photoName,PATHINFO_EXTENSION);
        $photoNewName =  $titre .'.'. $ext;

        if(in_array($ext, $allowed)){
            move_uploaded_file($photoTmpName, $uploadto . $photoNewName);
            $verif_ok =true;
        }else{
            header("Location: ../Velvet-forms/disc_new.php?err=ftype&titre=$titre&artiste=$artiste&annee=$annee&genre=$genre&label=$label&prix=$prix");
            exit();
        }
    }else{
        $verif_ok =true;
        $photoNewName = $disc_pc;
    }

    if($verif_ok){
        require "connectDB.php"; 
        $db = connexionBase();

        try {
            $requete = $db->prepare(
            "UPDATE disc
            SET disc_title = :titre, artist_id = :artiste, disc_year = :annee,
            disc_genre = :genre, disc_label = :label, disc_price =:prix, disc_picture = :photo
            where  disc_id = :disc_id;");

            // Association des valeurs aux paramètres via bindValue() :
            $requete->bindValue(":disc_id", $disc_id, PDO::PARAM_STR);
            $requete->bindValue(":titre", $titre, PDO::PARAM_STR);
            $requete->bindValue(":artiste", $artiste, PDO::PARAM_STR);
            $requete->bindValue(":annee", $annee, PDO::PARAM_STR);
            $requete->bindValue(":genre", $genre, PDO::PARAM_STR);
            $requete->bindValue(":label", $label, PDO::PARAM_STR);
            $requete->bindValue(":prix", $prix, PDO::PARAM_STR);
            $requete->bindValue(":photo", $photoNewName, PDO::PARAM_STR);

            // Lancement de la requête :
            $requete->execute();

            // Libération de la requête :
            $requete->closeCursor();
            }
            catch (Exception $e) {
                var_dump($requete->queryString);
                var_dump($requete->id=$disc_id&errorInfo());
                echo "id=$disc_id&Erreur : " . $requete->id=$disc_id&errorInfo()[2] . "<br>";
                die("Fin du script");
            }
            $_SESSION['pageopened']= '1';
            header("Location: ../discs.php?succes=modifok&titre=$titre");

            exit();
    }
}

?>