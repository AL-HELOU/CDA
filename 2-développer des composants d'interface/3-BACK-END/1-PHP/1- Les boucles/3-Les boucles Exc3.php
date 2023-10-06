<?php

//----------------------  http://localhost:8080/3-Les%20boucles%20Exc3.php  -----------------------------------------

echo '<pre>
---------------------------------------- Exercice 3 Les boucles----------------------------------------------

3- Ecrire un script qui affiche la table de multiplication totale de {1,...,12} par {1,...,12} dans un tableau HTML.

</pre>';


echo "<table border=\"2\">".
     '<tbody>';

    echo'<tr>'.  
        '<th></th>';
    for ($i=0; $i<=12; $i++){
        echo '<th>' .$i.'</th>';
    } 
    echo '</tr>';


    for ($r = 0; $r <= 12; $r++)
        {
            echo'<tr>'.
                '<th>'.$r.'</th>';
                
                    for ($c = 0; $c <= 12; $c++)
                        echo '<td>' .$c*$r.'</td>';   
            echo'</tr>';
        }

echo '</tbody>';
echo "</table>";


?>