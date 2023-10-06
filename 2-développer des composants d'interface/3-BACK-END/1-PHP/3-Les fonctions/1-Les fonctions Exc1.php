<?php
//-------------------------  http://localhost:8080/1-Les%20fonctions%20Exc1.php  --------------------------------------

echo '<pre>

--------------------------------------------------- Exercice 1 Les fonctions------------------------------------------------------


    Ecrivez une fonction qui permette de générer un lien.
    La fonction doit prendre deux paramètres, le lien et le titre.

----------------------------------------------------------------------------------------------------------------------------------

</pre>';


function lien($lien, $titre){
    echo '<a href='.$lien.'>'.$titre.'</a>';
}


lien("https://www.google.com","GOOGLE");
?>