let num = 1;
let tab = [];
let somme = 0;
let nmbr = 0;
let moyen = 0;

while(num != 0 )
{
    num = parseInt(window.prompt('Saissisez un nombre : '+ '\n' + 'Ou saissisez 0 pour arrêter la saisie'));
    if(num == 0) break;
    tab.push(num);
    nmbr++;
    somme = somme+num;
}
   moyen = somme/2;

console.log('le nombre de valeurs saisies est ' + nmbr + '\n la somme est ' + somme + '\n et la moyen est ' + moyen);
console.log(tab);