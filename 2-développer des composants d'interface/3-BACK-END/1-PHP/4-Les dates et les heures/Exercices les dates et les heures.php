<?php

//------------------------------------   http://localhost:8080/Exercices%20les%20dates%20et%20les%20heures.php   -------------------------------------------


echo "<pre><strong>----------------------------Exercices Les Dates et les heures----------------------------------------------------------------


1- Trouvez le numéro de semaine de la date suivante : 14/07/2019.</strong></pre>";

$dt0= new Datetime("14-07-2019");
echo '<p>Le numéro de la semaine de la date 14/07/2019 est : '. $dt0->format("W").'</p>';




echo "<p>__________________________________________________________________________________________________________________________________<br>
<strong>2-Combien reste-t-il de jours avant la fin de votre formation ?</strong></p>";

$dt1= new Datetime();
$dt2 = new Datetime("11-04-2024");

$jr = date_diff($dt1,$dt2);

echo "<p>".$jr->format('%R%a') . " jours</p>";




echo "<p>__________________________________________________________________________________________________________________________________<br>
<strong>3-Comment déterminer si une année est bissextile ?</strong></p>";


$dt3 = new Datetime("15-09-2020");
$annee0 = $dt3->format("Y"); 
$bisxtl =  $dt3->format('L');

if($bisxtl == true){
   echo "<p>l'année ".$annee0. " est bissextile</p>";
}else{
   echo "<p>l'année ".$annee0. " n'est pas bissextile</p>";
}




echo "<p>__________________________________________________________________________________________________________________________________<br>
<strong>4-Montrez que la date du 32/17/2019 est erronée.</strong></p>";

$jour1 = 32;
$mois1 = 17;
$annee1 = 2019;

$chckdt = checkdate($mois1,$jour1,$annee1);

if($chckdt == true){
   echo "<p>La date ".$jour1."/".$mois1."/".$annee1. " est correcte.</p>";
}else{
   echo "<p>La date ".$jour1."/".$mois1."/".$annee1. " est erronée.</p>";
}




echo "<p>__________________________________________________________________________________________________________________________________<br>
<strong>5-Affichez l'heure courante sous cette forme : 11h25.</strong></p>";

$dtact = new Datetime();
echo "<p>".$dtact->format("H\hi")."</p>";



echo "<p>__________________________________________________________________________________________________________________________________<br>
<strong>6-Ajoutez 1 mois à la date courante.</strong></p>";

$dtplus = Date('d/m/Y',strtotime('+1 month'));

echo "<p>". $dtplus ."</p>";



echo "<p>__________________________________________________________________________________________________________________________________<br>
<strong>7-Que s'est-il passé le 1000200000 ?</strong></p>";

$dt4 = Date('d/m/Y','1000200000');

echo "<p>Attentats du ".$dt4 ." aux USA</p>";


?>