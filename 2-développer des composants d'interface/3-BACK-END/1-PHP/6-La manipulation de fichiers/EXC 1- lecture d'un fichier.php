<?php

//-------------------------------   http://localhost:8080/EXC%201-%20lecture%20d'un%20fichier.php -------------------------------------------------------

echo "<pre>

                                        <strong>Lecture d'un fichier</strong>

Téléchargez ce fichier, qui contient une liste de sites indispensables à la compréhension du monde moderne.

Écrire un programme qui lit ce fichier et qui construit une page web contenant une liste de liens hypertextes.

Utilisez la fonction file() qui permet de lire directement un fichier et renvoie son contenu sous forme de tableau.

_____________________________________________________________________________________________________________________________________________________

</pre>";


$tabfile = file('fichiers txt-csv/liens.txt');

foreach ($tabfile as $lien){
    echo "&emsp; <a href='$lien'> $lien</a><br><br>";
}


echo "___________________________________________________________________________________________________________________________________________________"
?>