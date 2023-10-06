<?php
if(isset($_GET['err'])){

    $errverif = htmlentities($_GET['err']);

    if($errverif == "empty"){
        $errmsg = "-- Veuillez remplir tous les champs";
    }
    else if($errverif == "charartist" || $errverif == "charaurl"){
        $errmsg = "-- Format incorrect -- Format accepté : (des lettres, des nombres, des espaces et des caractères spéciaux _ - , . ).";
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
    <title>Ajouter un artiste</title>
    <?php
        include "../header-footer/header.php";
    ?>

    <div class="divbodyajoute">
        <div class="boxartistajoute box">
            <div class="form-ajoute">

                <h1>Ajout d'un artiste</h1>

                <form action="../Velvet-scripts/script_artist_ajout.php" method="post">

                    <div class="inputbox inputboxartistajoute">
                        <label for="artist" >Nom du l'artiste :</label>
                        <?php
                        if(isset($_GET['artist'])){
                            $artist = htmlentities($_GET['artist']);
                            echo '<input type="text" name="artist" placeholder="Ajouter le nom du l\'artiste" value='.$artist.'>';
                        }else{
                            echo '<input type="text" name="artist" placeholder="Ajouter le nom du l\'artiste">';
                        }

                        if(isset($_GET['err']) && ($_GET['err'] == "charartist")){
                            echo "<br><span class=\"span-err\">$errmsg</span>";
                        }
                        ?>
                    </div>
                    <br>

                    <div class="inputbox inputboxartistajoute">
                        <label for="aurl" >URL du l'artiste :</label>
                        <?php
                        if(isset($_GET['aurl'])){
                            $aurl = htmlentities($_GET['aurl']);
                            echo '<input type="text" name="aurl" placeholder="Ajouter l\'URL du l\'artiste (optionnel)" value='.$aurl.'>';
                        }else{
                            echo '<input type="text" name="aurl" placeholder="Ajouter l\'URL du l\'artiste (optionnel)">';
                        }

                        if(isset($_GET['err']) && ($_GET['err'] == "charaurl")){
                                        echo "<br><span class=\"span-err\">$errmsg</span>";
                            }
                        ?>
                    </div>
                    <br><br>
                    <div class="submitartistajoute">
                        <input type="submit" name="submit" value="Ajouter" class="submit">
                    </div>
                    <br><br>
                </form>
            </div>
        </div>
    </div>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>       
    <?php
    if(isset($_GET['err']) && ($_GET['err'] == "empty") ){
        echo "<span class=\"span-err  span-err-empty\">Veuillez saisir le nom de l'artiste</span><br><br>";
    }
        include "../header-footer/footer.php";
    ?>
</body>
</html>