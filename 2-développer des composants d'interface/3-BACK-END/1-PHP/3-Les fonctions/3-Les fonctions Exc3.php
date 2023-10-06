<?php
//-------------------------  http://localhost:8080/3-Les%20fonctions%20Exc3.php  --------------------------------------

echo "<pre>

--------------------------------------------------- Exercice 3 Les fonctions------------------------------------------------------


<strong>Créer une fonction qui vérifie le niveau de complexité d'un mot de passe</strong>

Elle doit prendra un paramètre de type chaîne de caractères. Elle retournera une valeur booléenne qui vaut true si le paramètre (le mot de passe) respecte les règles suivantes :

Faire au moins 8 caractères de long
Avoir au moins 1 chiffre
Avoir au moins une majuscule et une minuscule

----------------------------------------------------------------------------------------------------------------------------------



\$complex_password = \"TopSecret42\";



function verifmdp(\$mdp){
    
    \$filtre = \"/^(?=.*[0-9])(?=.*[A-Z])([a-zA-Z0-9\.@-_\+!&%\*;:\?=,'#']+){8,25}$/\";

    if (preg_match(\$filtre, \$mdp)){
        echo '<strong>Votre mot de passe est fort (:</strong>';
    }
    else {
        echo '<strong>Le mot de passe doit comporter au moins 8 caractères et doit contenir au moins un chiffre, une lettre majuscule et une lettre minuscule</strong>';
    }
}


verifmdp(\$complex_password);

----------------------------------------------------------------------------------------------------------------------------------


</pre>";



$complex_password = "TopSecret42";


function verifmdp($mdp){
    
    $filtre = "/^(?=.*[0-9])(?=.*[A-Z])([a-zA-Z0-9\.@-_\+!&%\*;:\?=,'#']+){8,25}$/";

    
    if (preg_match($filtre, $mdp)){
        echo '<strong>Votre mot de passe est fort (:</strong>';
    }
    else {
        echo '<strong>Le mot de passe doit comporter au moins 8 caractères et doit contenir au moins un chiffre, une lettre majuscule et une lettre minuscule</strong>';
    }
}


verifmdp($complex_password);