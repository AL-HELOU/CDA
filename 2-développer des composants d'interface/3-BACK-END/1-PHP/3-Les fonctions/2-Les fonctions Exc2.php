<?php
//-------------------------  http://localhost:8080/2-Les%20fonctions%20Exc2.php  --------------------------------------

echo '<pre>

--------------------------------------------------- Exercice 2 Les fonctions------------------------------------------------------


Ecrivez une fonction qui calcul la somme des valeurs d\'un tableau
La fonction doit prendre un paramètre de type tableau.

----------------------------------------------------------------------------------------------------------------------------------

</pre>';

$tab = array(4, 3, 8, 2);



function sumtab($res){
    echo "la somme des valeurs de le tableau est : ". array_sum($res);
}

sumtab($tab);

?>