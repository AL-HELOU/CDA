<?php

include "../Velvet-scripts/connectDB.php";

$db = ConnexionBase();

$requete = $db->query("SELECT * FROM disc D JOIN artist A ON D.artist_id = A.artist_id");

$tab = $requete->fetchAll(PDO::FETCH_OBJ);

$requete->closeCursor();

if(isset($_GET['id'])){
    $disc_id = htmlentities($_GET['id']);
}else{
    $disc_id ='';
}

foreach ($tab as $discart){
    if($disc_id == $discart->disc_id){
    $artist_id = $discart->artist_id;
    $discart_pc =  $discart->disc_picture;
    $discart_title = $discart->disc_title;
    $artist_nom = $discart->artist_name;
    $discart_label = $discart->disc_label;
    $discart_year = $discart->disc_year;
    $discart_genre = $discart->disc_genre;
    $discart_prix = $discart->disc_price;
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
    <title>Velvet Records - Détails</title>
    <?php
        include "../header-footer/header.php";
    ?>

    <div class="divbodydetail">
        <div class="box-detail">
            <div class="form-detail">
                <h1>Dètails du disque</h1>

                <form action="" method="post">

                    <div class="inputboxdetail">
                        <label for="title">Le titre : &emsp;</label>
                        <input type="text" name="title" placeholder="<?=$discart_title?>" readonly>
                    </div>
                    <br>
                    
                    <div class="inputboxdetail">
                        <label for="artist">L'artiste : &ensp;</label>
                        <input type="text" name="artiste" placeholder="<?=$artist_nom?>" readonly>
                    </div>
                    <br>

                    <div class="inputboxdetail">
                        <label for="year" >L'annèe : &ensp;</label>
                        <input type="text" name="year" placeholder="<?=$discart_year?>" readonly>
                    </div>
                    <br>

                    <div class="inputboxdetail">
                        <label for="genre">Le genre : &ensp;</label>
                        <input type="text" name="genre" placeholder="<?=$discart_genre?>" readonly>
                    </div>
                    <br>

                    <div class="inputboxdetail">
                        <label for="label">Le label : &emsp;</label>
                        <input type="text" name="label" placeholder="<?=$discart_label?>" readonly>
                    </div>
                    <br>

                    <div class="inputboxdetail">
                        <label for="price">Le prix(€) : </label>
                        <input type="text" name="price" placeholder="<?=$discart_prix?>" readonly>
                    <br>
                    </div>

                    <div><img src="../jaquettes-imgs/<?=$discart_pc?>" alt="<?=$discart_pc?>" class="detail-img"></div>

                <div class="buttons-modif">  
                    <button type="submit" formaction="disc_modif.php?id=<?=$disc_id?>&artiste=<?=$artist_id?>" class="submit submitmodif">Modifier</button>
                    
                    </form>


                    <form method="POST" action="../Velvet-scripts/script_disc_delete.php?id=<?=$disc_id?>&title=<?=$discart_title?>&picture=<?=$discart_pc?>" onsubmit = "return submitform(this);">
                        <button type="submit" class="submit">Supprimer</button>
                    </form>
                

                <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script>

                    function submitform(form){
                    Swal.fire({
                        title: "Êtes vous sûr de vouloir supprimer le vinyle (<?=$discart_title?>) ?",
                        text: "",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Oui, supprimez-le!'
                        }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                        });
                        return false;
                    }
                </script>

                <form>
                    <button type="submit" formaction="../discs.php" class="submit">Retour</button>
                </form>
                </div>

            </div>
        </div>
    </div>
    <?php
    include "../header-footer/footer.php";
    ?>

</body>
</html>