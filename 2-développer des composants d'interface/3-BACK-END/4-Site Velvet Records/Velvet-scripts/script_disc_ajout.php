<?php
session_start();

$verif_ok = false;

if(isset($_POST['title'])):$titre = $_POST['title']; endif;

if(isset($_POST['artist'])):$artiste = $_POST['artist']; endif;

if(isset($_POST['year'])):$annee = $_POST['year']; endif;

if(isset($_POST['genre'])):$genre = $_POST['genre']; endif;

if(isset($_POST['label'])):$label = $_POST['label']; endif;

if(isset($_POST['price'])):$prix = $_POST['price']; endif;


if(isset($_POST['submit'])){

    if (!preg_match("/^[\wáàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ\s\-,\.]*$/",$titre)){
        header("Location: ../Velvet-forms/disc_new.php?err=chartitre&titre=$titre&artiste=$artiste&annee=$annee&genre=$genre&label=$label&prix=$prix");
        exit();
    }

    if (!preg_match("/^[\wáàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ\s\-,\.]*$/",$genre)){
        header("Location: ../Velvet-forms/disc_new.php?err=chargenre&titre=$titre&artiste=$artiste&annee=$annee&genre=$genre&label=$label&prix=$prix");
        exit();
    }

    if (!preg_match("/^[\wáàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ\s\-,\.]*$/",$label)){
        header("Location: ../Velvet-forms/disc_new.php?err=charlabel&titre=$titre&artiste=$artiste&annee=$annee&genre=$genre&label=$label&prix=$prix");
        exit();
    }

    if (!preg_match("/^[\d]*$/",$annee)){
        header("Location: ../Velvet-forms/disc_new.php?err=charannee&titre=$titre&artiste=$artiste&annee=$annee&genre=$genre&label=$label&prix=$prix");
        exit();
    }

    if (!preg_match("/^[\d\.]*$/",$prix)){
        header("Location: ../Velvet-forms/disc_new.php?err=charprix&titre=$titre&artiste=$artiste&annee=$annee&genre=$genre&label=$label&prix=$prix");
        exit();
    }

    if(empty($titre) || empty($artiste) || empty($annee) || empty($genre) || empty($label) || empty($prix)){
        header("Location: ../Velvet-forms/disc_new.php?err=empty&titre=$titre&artiste=$artiste&annee=$annee&genre=$genre&label=$label&prix=$prix");
        exit();
    }

    if (is_uploaded_file($_FILES['photo']['tmp_name'])) {

        $photoName = $_FILES['photo']['name'];
        $photoTmpName = $_FILES['photo']['tmp_name'];
        $photoType = $_FILES['photo']['type'];
        $photoSize = $_FILES['photo']['size'];

        $uploadto = "../jaquettes-imgs/";
        $allowed = ['jpg','jpeg','png','gif','bmp','cod','ras','fif','ief','svg','tiff','tif','mcf','wbmp','ico','pnm','pbm','pgm','ppm','rgb','xwd','xbm','xpm'];
       
        $ext = pathinfo($photoName,PATHINFO_EXTENSION);
        $photoNewName =  $titre .'.'. $ext;

        if($photoSize > 5242880){
            header("Location: ../Velvet-forms/disc_modif.php?id=$disc_id&err=fsize&titre=$titre&artiste=$artiste&annee=$annee&genre=$genre&label=$label&prix=$prix");
            exit();
        }

        if(in_array($ext, $allowed)){
            move_uploaded_file($photoTmpName, $uploadto . $photoNewName);
            $verif_ok =true;
            $ajoutok = 'ajoutok';
        }else {
            header("Location: ../Velvet-forms/disc_new.php?err=ftype&titre=$titre&artiste=$artiste&annee=$annee&genre=$genre&label=$label&prix=$prix");
            exit();
        }
    }else {
        header("Location: ../Velvet-forms/disc_new.php?err=ftype&titre=$titre&artiste=$artiste&annee=$annee&genre=$genre&label=$label&prix=$prix");
        exit();
    }

    if($verif_ok){

        require "connectDB.php"; 
        $db = connexionBase();

        try {
            $requete = $db->prepare("INSERT INTO disc (disc_title, artist_id, disc_year, disc_genre, disc_label, disc_price, disc_picture) 
                                     VALUES (:titre, :artiste, :annee, :genre, :label, :prix, :photo);");

            // Association des valeurs aux paramètres via bindValue() :
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
                var_dump($requete->errorInfo());
                echo "Erreur : " . $requete->errorInfo()[2] . "<br>";
                die("Fin du script");
            }

            $_SESSION['pageopened']= '1';
            header("Location: ../discs.php?succes=$ajoutok&titre=$titre");

            exit();
    }
}
?>