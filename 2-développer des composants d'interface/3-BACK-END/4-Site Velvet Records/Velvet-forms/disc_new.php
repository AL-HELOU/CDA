<?php
include "../Velvet-scripts/connectDB.php";

$db = ConnexionBase();

$requete = $db->query("SELECT artist_name, artist_id FROM `artist` ORDER BY artist_name;");

$tab = $requete->fetchAll(PDO::FETCH_OBJ);

$requete->closeCursor();


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
    <title>Ajouter un vinyle</title>
    <?php
        include "../header-footer/header.php";
    ?>
    <div class="divbodyajoute">
        <div class="box">
            <div class="form-ajoute">
            <h1>Ajout d'un Vinyle</h1>
                <form action ="../Velvet-scripts/script_disc_ajout.php" method="post"  enctype="multipart/form-data">
                        
                        <div class="inputbox">
                            <label for="title">Le titre :&ensp;&ensp;</label>                      
                            <?php
                                if(isset($_GET['titre'])){
                                    $titre = htmlentities($_GET['titre']);
                                    echo '<input type="text" name="title" placeholder="Ajouter un titre" value='.$titre.'>';
                                }else{
                                    echo '<input type="text" name="title" placeholder="Ajouter un titre">';
                                }
                                if(isset($_GET['err']) && ($_GET['err'] == "chartitre")){
                                    echo "<br><span class=\"span-err\">$errmsg</span>";
                                }
                            ?>
                        </div>
                        <br>

                        <div class="inputbox">
                            <label for="artist">L'artiste :&ensp;</label>
                            <select name="artist" class="select">

                                <?php
                                if(!isset($_GET['artiste']) || $_GET['artiste'] == ""){
                                    echo '<option value="" selected>-- Choisir un artiste --</option>';
                                }
                                foreach ($tab AS $artist){
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

                        <div class="inputbox">
                            <label for="year" >L'annèe :&ensp;</label>
                            <?php
                                if(isset($_GET['annee'])){
                                    $annee = htmlentities($_GET['annee']);
                                    echo '<input type="text" name="year" placeholder="Ajouter L\'annèe de Pardution" value='.$annee.'>';
                                }else{
                                    echo '<input type="text" name="year" placeholder="Ajouter L\'annèe de Pardution">';
                                }
                                if(isset($_GET['err']) && ($_GET['err'] == "charannee")){
                                        echo "<br><span class=\"span-err\">$errmsg</span>";
                                }
                            ?>
                        </div>
                        <br>


                        <div class="inputbox">
                            <label for="genre">Le genre :&ensp;</label>
                            <?php
                                if(isset($_GET['genre'])){
                                    $genre = htmlentities($_GET['genre']);
                                    echo '<input type="text" name="genre" placeholder="Ajouter le genre du Disque" value='.$genre.'>';
                                }else{
                                    echo '<input type="text" name="genre" placeholder="Ajouter le genre du Disque">';
                                }
                                if(isset($_GET['err']) && ($_GET['err'] == "chargenre")){
                                    echo "<br><span class=\"span-err\">$errmsg</span>";
                                }
                            ?>
                        </div>
                        <br>

                        <div class="inputbox">
                        <label for="label">Le label :&ensp;</label><br>
                        <?php
                            if(isset($_GET['label'])){
                                $label = htmlentities($_GET['label']);
                                echo '<input type="text" name="label" placeholder="Ajouter le label" value='.$label.'>';
                            }else{
                                echo '<input type="text" name="label" placeholder="Ajouter le label">';
                            }
                            if(isset($_GET['err']) && ($_GET['err'] == "charlabel")){
                                echo "<br><span class=\"span-err\">$errmsg</span>";
                            }
                        ?>
                        </div>
                        <br>


                        <div class="inputbox">
                        <label for="price">Le prix(€) :</label><br>
                        <?php
                            if(isset($_GET['prix'])){
                                $prix = htmlentities($_GET['prix']);
                                echo '<input type="text" name="price" placeholder="Ajouter le prix" value='.$prix.'>';
                            }else{
                                echo '<input type="text" name="price" placeholder="Ajouter le prix">';
                            }
                            if(isset($_GET['err']) && ($_GET['err'] == "charprix")){
                                echo "<br><span class=\"span-err\">$errmsg</span>";
                            }
                        ?>
                        </div>
                        <br>

                        <div class="inputbox">
                        <label for="file">La photo :&ensp;</label><br>
                        <input type="file" name="photo" placeholder="Choisir une photo" id="choixfichier">
                        <br>
                        <?php
                            if(isset($_GET['err']) && ($_GET['err'] == "ftype")){
                                echo "<span class=\"span-err\">$errmsg</span><br>";
                            }
                            else if(isset($_GET['err']) && ($_GET['err'] == "fsize")){
                                echo "<span class=\"span-err\">$errmsg</span><br>";
                            }
                        ?>
                        </div>
                        <br>

                        <div class="buttons">
                            <input type="submit" name="submit" value="Ajouter" class="submit">
                            

                            <form>
                                <button type="submit" formaction="../discs.php" class="submit">Retour</button>
                            </form>
                        </div>
                </form>
            </div>
        </div>
    </div>
    <?php
        if(isset($_GET['err']) && ($_GET['err'] == "empty") ){
            echo "<span class=\"span-err span-err-empty\">$errmsg</span><br>";
        }
        include "../header-footer/footer.php";
    ?>

</body>
</html>