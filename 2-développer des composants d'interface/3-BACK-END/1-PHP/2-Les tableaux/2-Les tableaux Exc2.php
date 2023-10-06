<?php
//-------------------------  http://localhost:8080/2-Les%20tableaux%20Exc2.php  --------------------------------------

echo '<pre>

----------------------------------------------------- Exercice 2 Les tableaux------------------------------------------------------


1- Affichez la liste des capitales (par ordre alphabétique) suivie du nom du pays.

</pre>';

$capitales = array(
    "Bucarest" => "Roumanie",
    "Bruxelles" => "Belgique",
    "Oslo" => "Norvège",
    "Ottawa" => "Canada",
    "Paris" => "France",
    "Port-au-Prince" => "Haïti",
    "Port-d'Espagne" => "Trinité-et-Tobago",
    "Prague" => "République tchèque",
    "Rabat" => "Maroc",
    "Riga" => "Lettonie",
    "Rome" => "Italie",
    "San José" => "Costa Rica",
    "Santiago" => "Chili",
    "Sofia" => "Bulgarie",
    "Alger" => "Algérie",
    "Amsterdam" => "Pays-Bas",
    "Andorre-la-Vieille" => "Andorre",
    "Asuncion" => "Paraguay",
    "Athènes" => "Grèce",
    "Bagdad" => "Irak",
    "Bamako" => "Mali",
    "Berlin" => "Allemagne",
    "Bogota" => "Colombie",
    "Brasilia" => "Brésil",
    "Bratislava" => "Slovaquie",
    "Varsovie" => "Pologne",
    "Budapest" => "Hongrie",
    "Le Caire" => "Egypte",
    "Canberra" => "Australie",
    "Caracas" => "Venezuela",
    "Jakarta" => "Indonésie",
    "Kiev" => "Ukraine",
    "Kigali" => "Rwanda",
    "Kingston" => "Jamaïque",
    "Lima" => "Pérou",
    "Londres" => "Royaume-Uni",
    "Madrid" => "Espagne",
    "Malé" => "Maldives",
    "Mexico" => "Mexique",
    "Minsk" => "Biélorussie",
    "Moscou" => "Russie",
    "Nairobi" => "Kenya",
    "New Delhi" => "Inde",
    "Stockholm" => "Suède",
    "Téhéran" => "Iran",
    "Tokyo" => "Japon",
    "Tunis" => "Tunisie",
    "Copenhague" => "Danemark",
    "Dakar" => "Sénégal",
    "Damas" => "Syrie",
    "Dublin" => "Irlande",
    "Erevan" => "Arménie",
    "La Havane" => "Cuba",
    "Helsinki" => "Finlande",
    "Islamabad" => "Pakistan",
    "Vienne" => "Autriche",
    "Vilnius" => "Lituanie",
    "Zagreb" => "Croatie"
);
//Affichez la liste des capitales (par ordre alphabétique) suivie du nom du pays.
ksort($capitales);
foreach ($capitales as $cap => $pays){
    echo "&emsp;". $cap. " :&emsp;". $pays. "<br>";
}
echo "<br> <br> <br>";



echo "<p> 2- Affichez la liste des pays (par ordre alphabétique) suivie du nom de la capitale. </p>";
asort($capitales);
foreach ($capitales as $cap => $pays){
    echo "&emsp;". $pays. " :&emsp;". $cap. "<br>";
}
echo "<br> <br> <br>



3- Affichez le nombre de pays dans le tableau.<br><br>";

$nmbrpays = count($capitales);
echo "&emsp; Le nombre de pays est ".$nmbrpays.'.';
echo "<br> <br> <br> <br>



4- Supprimer du tableau toutes les capitales commençant par la lettre 'B', puis affichez le contenu du tableau. <br><br>";
foreach ($capitales as $cap => $pays){
    if (substr($cap,0,1 ) == 'B'){
        $capitales[$pays] = '--'; // commentez cette ligne pour supprimer les capitales qui commence par 'B' ((et leurs pays)).
        unset ($capitales[$cap]);
    }
}

asort($capitales);
foreach ($capitales as $cap => $pays){
    echo "&emsp;". $pays. " :&emsp;". $cap. "<br>";
}
?>