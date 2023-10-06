<?php
include "../Velvet-scripts/connectDB.php";

$db = ConnexionBase();

$requete = $db->query("SELECT * FROM disc D JOIN artist A ON D.artist_id = A.artist_id");

$tab = $requete->fetchAll(PDO::FETCH_OBJ);

$requete->closeCursor();


$requeteartiste = $db->query("SELECT artist_name, artist_id FROM `artist` ORDER BY artist_name;");

$tabartiste = $requeteartiste->fetchAll(PDO::FETCH_OBJ);

$requeteartiste->closeCursor();

if(isset($_GET['err'])){

    $errverif = htmlentities($_GET['err']);

    if($errverif == "empty"){
        $errmsg = "-- Veuillez remplir tous les champs";
    }
    else if($errverif == "chargenre" || $errverif == "chartitre" || $errverif == "charlabel"){
        $errmsg = "-- Format incorrect -- Format accepté : (des lettres, des nombres, des espaces et des caractères spéciaux _ - , . ).";
    }
    else if($errverif == "charannee"){
        $errmsg = "-- Format incorrect -- Format accepté : (des nombres \"ex 2020\")";
    }
    else if($errverif == "charprix"){
        $errmsg = "-- Format incorrect -- Format accepté : (des nombres et des points \"ex 11 ou 11.11\")";
    }
    else if($errverif == "ftype"){
        $errmsg = "-- Veuillez télécharger une image !";
    }
    else if($errverif == "fsize"){
        $errmsg = "-- La taille maximale du fichier est de 5 Mo ";
    }
}

if(isset($_GET['id'])){
$disc_id = htmlentities($_GET['id']);
}else{
    $disc_id = '';
}

foreach ($tab as $discart){
    if(isset($_GET['id']) && $_GET['id'] == $discart->disc_id){
    $artist_id = htmlentities($discart->artist_id);
    $discart_pc =  $discart->disc_picture;
    $discart_title = htmlentities($discart->disc_title);
    $artist_nom = htmlentities($discart->artist_name);
    $discart_label = htmlentities($discart->disc_label);
    $discart_year = htmlentities($discart->disc_year);
    $discart_genre = htmlentities($discart->disc_genre);
    $discart_prix = htmlentities($discart->disc_price);
    }
    if(!isset($_GET['id'])){
        $artist_id = '';
        $discart_pc =  '';
        $discart_title = '';
        $artist_nom = '';
        $discart_label = '';
        $discart_year = '';
        $discart_genre = '';
        $discart_prix = '';
    }
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        #nav-h{
        position: static;
        }
    </style>
    <title>Modifier un vinyle</title>
    <?php
        include "../header-footer/header.php";
    ?>
    <div class="divbodymodif">
        <div class="box-modif">
            <div class="form-modif">
                <h1>Modifier un vinyle</h1>

                <form action="../Velvet-scripts/script_disc_modif.php?picture=<?=$discart_pc?>" method="post" enctype="multipart/form-data">

                    <input type="hidden" name="disc_id" value="<?=$disc_id?>">

                    <div class="inputboxmodif">
                        <label for="title">Le titre :&emsp;</label>
                        <input type="text" name="title" value="<?=$discart_title?>">
                        <?php
                            if(isset($_GET['err']) && ($_GET['err'] == "chartitre")){
                                echo "<br><span class=\"span-err\">$errmsg</span>";
                            }
                        ?>
                    </div>
                    <br>

                    <div class="inputboxmodif">
                        <label for="artist">L'artiste :&ensp;</label>
                        <select name="artist" class="select select-fmodif">
                            <?php
                                if(!isset($_GET['artiste']) || $_GET['artiste'] == ""){
                                    echo '<option value="" selected>-- Choisir un artiste --</option>';
                                }
                                foreach ($tabartiste AS $artist){
                                    $artist_id = $artist->artist_id;
                                    $verif = '';
                                    if(isset($_GET['artiste']) && $_GET['artiste'] == $artist_id):$verif = "selected"; endif;
                                    echo "<option value=\"".$artist_id.'"'.$verif.'>'.$artist->artist_name."</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <button type="submit" formaction="artist_new.php" class="b-submit-ajout-artist">Ajouter un nouvel artiste</button>
                    <br>

                    <div class="inputboxmodif">
                        <label for="year" >L'annèe :&ensp;</label>
                        <input type="text" name="year" value="<?=$discart_year?>">
                        <?php
                            if(isset($_GET['err']) && ($_GET['err'] == "charannee")){
                                echo "<br><span class=\"span-err\">$errmsg</span>";
                            }
                        ?>
                    </div>
                    <br>

                    <div class="inputboxmodif">
                        <label for="genre">Le genre :&ensp;</label>
                        <input type="text" name="genre" value="<?=$discart_genre?>">
                        <?php
                            if(isset($_GET['err']) && ($_GET['err'] == "chargenre")){
                                echo "<br><span class=\"span-err\">$errmsg</span>";
                            }
                        ?>
                    </div> 
                    <br>

                    <div class="inputboxmodif">
                        <label for="label">Le label :&ensp;&ensp;</label>
                        <input type="text" name="label" value="<?=$discart_label?>">
                        <?php
                        if(isset($_GET['err']) && ($_GET['err'] == "charlabel")){
                            echo "<br><span class=\"span-err\">$errmsg</span>";
                        }
                        ?>
                    </div>
                    <br>

                    <div class="inputboxmodif">
                        <label for="price">Le prix(€) :</label>
                        <input type="text" name="price" value="<?=$discart_prix?>">
                        <?php
                        if(isset($_GET['err']) && ($_GET['err'] == "charprix")){
                            echo "<br><span class=\"span-err\">$errmsg</span>";
                        }
                        ?>
                    </div>    
                    <br>

                    <div class="inputboxmodif">
                        <label for="file">La photo :&ensp;&ensp;</label><br>
                        <input type="file" name="photo" placeholder="Choisir une photo" id="choixfichier">
                        <?php
                        if(isset($_GET['err']) && ($_GET['err'] == "ftype")){
                            echo "<span class=\"span-err\">$errmsg</span><br>";
                        }else if(isset($_GET['err']) && ($_GET['err'] == "fsize")){
                            echo "<span class=\"span-err\">$errmsg</span><br>";
                        }
                        ?>
                    </div>

                    <div><img src="../jaquettes-imgs/<?=$discart_pc?>" alt="<?=$discart_pc?>" class="detail-img"></div>
                    <div class="buttons-modif">     
                        <input type="submit" name="submit" value="Modifier" class="submit submitmodif">

                        <form >
                            <button type="submit" formaction="../discs.php" class="submit">Retour</button>
                        </form>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php
        if(isset($_GET['err']) && ($_GET['err'] == "empty") ){
            echo "<br><span class=\"span-err  span-err-empty\">$errmsg</span>";
        }

        include "../header-footer/footer.php";
?>
</body>
</html>