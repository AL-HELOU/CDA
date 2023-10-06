<?php
session_start();

include "Velvet-scripts/connectDB.php";

$db = ConnexionBase();

$requete = $db->query("SELECT * FROM disc D JOIN artist A ON D.artist_id = A.artist_id ORDER BY disc_id DESC");

$tab = $requete->fetchAll(PDO::FETCH_OBJ);

$requete->closeCursor();


$requetecount = $db->query("SELECT COUNT(disc_id) AS nmbrdesc FROM disc");

$tabnmbrdesc = $requetecount->fetch(PDO::FETCH_ASSOC);

$nmbrdesc = $tabnmbrdesc['nmbrdesc'];

$requetecount->closeCursor();


$requeteartist = $db->query("SELECT disc_title , disc_picture FROM disc ORDER BY disc_id DESC LIMIT 5");

$tabrecent = $requeteartist->fetchAll(PDO::FETCH_OBJ);

$requeteartist->closeCursor();
?>



<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Velvet Records</title>
    <?php
    include "header-footer/header.php";
    ?>

    <div class="divbodydiscs">
        <div class="p-container">
            <p class = "p-rec-ajoute">Récemment ajoutés :</p>
        </div>
        <div class="rec-ajoute">
            <?php foreach($tabrecent AS $discrecent){echo "<div class=\"div-rec-ajoute\"><img src=\"jaquettes-imgs/$discrecent->disc_picture\" alt=\"$discrecent->disc_title\" class=\"img-rec-ajoute\">" . ' ' ."<p>$discrecent->disc_title</p></div>";} ?>
        </div>

        <p class = "nmbr-discs">Liste des disques (<?= $nmbrdesc ?>)</p>
        <div  class="discs-container">
            <?php
            foreach ($tab as $discart){
            $artist_id = htmlentities($discart->artist_id);
            $discart_pc =  htmlentities($discart->disc_picture);
            $discart_title = htmlentities($discart->disc_title);
            $artist_nom = htmlentities($discart->artist_name);
            $discart_label = htmlentities($discart->disc_label);
            $discart_year = htmlentities($discart->disc_year);
            $discart_genre = htmlentities($discart->disc_genre);
            $disc_id = htmlentities($discart->disc_id);

            echo"<div class=\"card\">                    
                    <img src=\"jaquettes-imgs/$discart_pc\" alt=\"$discart_title\" class=\"discs-imgs\">
                   
                    <div class= \"disc-details\">
                        <div class =\"div-disc-details div-disc-title\">$discart_title</div>
                        <div class =\"div-disc-details\"> $artist_nom </div>
                        <div class =\"div-disc-details\"> <span>Label</span> : $discart_label </div>
                        <div class =\"div-disc-details\"> <span>Annèe</span> : $discart_year </div>
                        <div class =\"div-disc-details\"> <span>Genre</span> : $discart_genre </div>
                        <div class =\"div-disc-details div-button-details\"> <a href=\"Velvet-forms/disc_detail.php?id="."$disc_id\"><button class = \"button-details\">Détails</button></a> </div>
                    </div>
                </div>";
            }
            ?>
        </div>
    </div>
    
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
    include "header-footer/footer.php";

    if (isset($_SESSION["pageopened"]) && $_SESSION["pageopened"])
    {
        if(isset($_GET['succes']) && $_GET['succes'] == 'ajoutok'){
            $titre = htmlentities($_GET['titre']);
            $message = "Le vinyle : (" . $titre . ") a été ajouté";
            echo 
            "<script>
                Swal.fire(
                    'Ajouté',
                    '$message',
                    'success'
                )
            </script>";
        }
        else if(isset($_GET['succes']) && $_GET['succes'] == 'modifok'){
            $titre = htmlentities($_GET['titre']);
            $message = "Le vinyle : (" . $titre . ") a été modifié";
            echo 
            "<script>
                Swal.fire(
                    'Modifié',
                    '$message',
                    'success'
                )
            </script>";
        }
        else if(isset($_GET['succes']) && $_GET['succes'] == 'discdeleted'){
            $titre = htmlentities($_GET['title']);
            $message = "Le vinyle : (" . $titre . ") a été supprimé";
            echo 
            "<script>
                Swal.fire(
                    'supprimé',
                    '$message',
                    'success'
                )
            </script>";
        }
        else if(isset($_GET['succes']) && $_GET['succes'] == 'deleted'){
            $titre = htmlentities($_GET['title']);
            $message = "L\'artiste : (" . $titre . ") a été supprimé";
            echo 
            "<script>
                Swal.fire(
                    'supprimé',
                    '$message',
                    'success'
                )
            </script>";
        }

        else if(isset($_GET['succes']) && $_GET['succes'] == 'ajoutartistok'){
            $artistnom = htmlentities($_GET['artist']);
            $message = "L\'artiste : (" . $artistnom . ") a été ajouté";
            echo 
            "<script>
                Swal.fire(
                    'Ajouté',
                    '$message',
                    'success'
                )
                </script>";
        }
 
        unset($_SESSION["1"]);
    
        session_destroy();
    }   
?>
</body>
</html>