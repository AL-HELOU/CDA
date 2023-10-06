<?php
//-------------------------  http://localhost:8080/3-Les%20tableaux%20Exc3.php  --------------------------------------

echo '<pre>

----------------------------------------------------- Exercice 3 Les tableaux------------------------------------------------------


1- Affichez la liste des régions (par ordre alphabétique) suivie du nom des départements

</pre>';

$departements = array(
    "Hauts-de-france" => array("Aisne", "Nord", "Oise", "Pas-de-Calais", "Somme"),
    "Bretagne" => array("Côtes d'Armor", "Finistère", "Ille-et-Vilaine", "Morbihan"),
    "Grand-Est" => array("Ardennes", "Aube", "Marne", "Haute-Marne", "Meurthe-et-Moselle", "Meuse", "Moselle", "Bas-Rhin", "Haut-Rhin", "Vosges"),
    "Normandie" => array("Calvados", "Eure", "Manche", "Orne", "Seine-Maritime")
);


ksort($departements);
foreach ($departements as $region => $reg){
    echo "<strong>".$region."</strong> <br>";

    foreach ($reg as $depart => $dep){
        echo ' - '.$dep."<br>";
    };echo '<br>';
};
echo '<br> <br>';


echo "<p>2- Affichez la liste des régions suivie du nombre de départements</p>";
foreach ($departements as $region => $reg){
    echo "<strong>".$region."</strong>"."<br>". "  "."Le nombre de départements est : ".count($reg)."<br><br>";
};