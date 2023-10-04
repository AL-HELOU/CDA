/*Exercice 3 : Tri d’un tableau

Ecrire le programme qui réalise le tri à bulles. */


var tab = [1,155,10,1800,200,400,900,1000,28,33,2,5000];
var tmp = 0;
var permut = true;


while(permut)
	{
        permut = false;
        for(i=0; i<tab.length; i++)
        {
            if(tab[i]>tab[i+1])
            {
                tmp = tab[i];
                tab[i] = tab[i+1];
                tab[i+1] = tmp;
                permut = true;
            }
        }
	}

console.log(tab);