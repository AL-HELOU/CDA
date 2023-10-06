<?php

//----------------------  http://localhost:8080/1-Les%20boucles%20Exc1.php  -----------------------------------------

echo '<pre> 
---------------------------------------- Exercice 1 Les boucles----------------------------------------------

1-Ecrire un script PHP qui affiche tous les nombres impairs entre 0 et 150, par ordre croissant : 1 3 5 7...

</pre>';


for ($i=1; $i<=150; $i = $i+2){
    echo "- &emsp; ". $i . "<br>";
}

?>