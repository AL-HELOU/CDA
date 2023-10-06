

<!--        http://localhost:8080/EXC%202-R%C3%A9cup%C3%A9ration%20d'un%20fichier%20distant.php             -->

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <title>Tableau</title>
</head>

<body>

<?php
//----------------------------------------------------------------------------------------------------------------------------------

$tabfile = file("fichiers txt-csv/employe.csv");
$thead = preg_split("/[\s,\"]+/",$tabfile[0], -1 ,PREG_SPLIT_NO_EMPTY);


echo'<div class="table-responsive">
    <table class="table table-hover table-bordered table-striped ">


    <thead class="table-dark">
    <tr>';
    foreach ($thead as $th){
        echo "<th>".$th."</th>";
    }
echo'</tr>
    </thead>';

    

echo '<tbody>';
      for ($i=1; $i < count($tabfile); $i++){
        $tbody = preg_split("/[,\"]+/",$tabfile[$i], -1 ,PREG_SPLIT_NO_EMPTY);
        echo "<tr>";
        foreach ($tbody as $td){
            echo "<td> $td </td>";
        }
        echo "</tr>";
    }
echo'</tbody>


     </table>
     </div>';
//-----------------------------------------------------------------------------------------------------------------------------------------------
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
