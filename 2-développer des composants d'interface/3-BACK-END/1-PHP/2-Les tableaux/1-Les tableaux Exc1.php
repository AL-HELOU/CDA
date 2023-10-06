<?php

//-------------------------  http://localhost:8080/1-Les%20tableaux%20Exc1.php  --------------------------------------

echo '<pre>

----------------------------------------------------- Exercice 1 Les tableaux------------------------------------------------------


<strong>1. Mois de l\'année non bissextile</strong>

Créez un tableau associant à chaque mois de l’année le nombre de jours du mois.

Utilisez le nom des mois comme clés de votre tableau associatif.

Affichez votre tableau (dans un tableau HTML) pour faire apparaitre sur chaque ligne le nom du mois et le nombre de jours du mois.


</pre>';


$mois= array(
    "Janvier" => 31,
    "fevrier" => 28,
    "Mars" => 31,
    "Avril" => 30,
    "Mai" => 31,
    "Juin" => 30,
    "Juillet" => 31,
    "Aout" => 31,
    "Septembre" => 30,
    "Octobre" => 31,
    "Novembre" => 30,
    "Decembre" => 31
);

echo"<table>";
foreach ($mois as $moiss => $jours)
{
        echo"<tr>".
                "<th>". $moiss. " : ". "</th>".
                "<td>". $jours. " jours". "</td>".
            "</tr>";

}
echo"</table> <br> <br>";


echo "<p>Triez ensuite votre tableau en utilisant comme critère le nombre de jours, puis affichez le résultat. </p>";
arsort($mois);

echo"<table>";
foreach ($mois as $moiss => $jours)
{
        echo"<tr>".
                "<th>". $moiss. " : ". "</th>".
                "<td>". $jours. " jours". "</td>".
            "</tr>";

}
echo"</table>";
?>