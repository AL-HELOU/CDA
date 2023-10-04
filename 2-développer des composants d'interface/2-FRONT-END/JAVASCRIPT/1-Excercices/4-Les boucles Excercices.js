//Les boucles Exercice 2 - Entiers inférieurs à N
//Ecrire un programme qui affiche les nombres inférieurs à N.
var N= window.prompt("Saissisez un nombre :");

while (N > 0)
{
console.log (N);
--N;
}




//Les boucles Exercice 3 - Moyenne
//Ecrire un programme qui saisit des entiers et en affiche la somme et la moyenne (on arrête la saisie avec la valeur 0).
var num = parseInt(window.prompt("Saissisez un nombre :" + "\n" + "Saissisez 0 pour arrêter le saisie"));
var somme = 0;
var moyen = 0;

while (num != 0)
{
    if(isNaN(num))     { break; }

    somme = somme + num;
    moyen = somme / 2;
    num = parseInt(window.prompt("Saissisez un nombre :" + "\n" + "Saissisez 0 pour arrêter le saisie"));
}
console.log("La somme des nombre = " + somme + "\n" + "La moyen des nombres = " + moyen);



//Les boucles Exercice 4 - Multiples
//Ecrire un programme qui calcule les N premiers multiples d'un nombre entier X, N et X étant entrés au clavier.
var N = window.prompt("Saissisez un nombre");
var X = window.prompt("Saissisez un deuxième nombre");

for (i=1; i<=N; i++)
{
    console.log(i + " x " + X + " = " + i*X )
}



//Exercice 5 - Nombre de voyelles.
//Ecrire le programme qui compte le nombre de voyelles d’un mot saisi au clavier
var mot=window.prompt("Saissisez un mot :");
var voyelles = 'auoyeiAUOYEI';
var som = -1;

for(i=0; i<=mot.length; i++)
{
    var lettre = mot.substring(i,i+1)
    if (voyelles.indexOf(lettre) != -1)
    {
        som++
    } 
}
console.log("Le nombre de voyelles est " + som);
