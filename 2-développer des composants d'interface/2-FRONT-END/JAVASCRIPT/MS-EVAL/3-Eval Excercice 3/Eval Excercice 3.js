/*
Exercice 3 : recherche d'un prénom
    Un prénom est saisi au clavier. On le recherche dans le tableau tab donné ci-après.

    Si le prénom est trouvé, on l'élimine du tableau en décalant les cases qui le suivent, et en mettant à blanc la dernière case.
    Si le prénom n'est pas trouvé un message d'erreur apparait et aucun prénom ne se supprime.

    var tab = ["Audrey", "Aurélien", "Flavien", "Jérémy", "Laurent", "Melik", "Nouara", "Salem", "Samuel", "Stéphane"];
    ( exemple : ["Audrey", "Aurélien", "Flavien", "Jérémy", "Laurent", "Melik", "Nouara", "Salem", "Samuel", " "]; )
*/


let tab = ["Audrey", "Aurélien", "Flavien", "Jérémy", "Laurent", "Melik", "Nouara", "Salem", "Samuel", "Stéphane"];
let mot = window.prompt("Saisissez un prenom pour l'éliminer  du tableau :");
let sup = false;

document.getElementById('strong').innerHTML = tab;
for( var i = 0; i < tab.length; i++)
{                                  
    if ( tab[i].toLowerCase() === mot.toLowerCase())
    { 
        tab.splice(i, 1);
        tab.push(" ");
        sup = true;
        document.getElementById('strong2').innerHTML = tab +'" "';
    }
}

if (sup === false )
{
    alert("Le prénom ñ'existe pas dans le tableau");
    document.getElementById('strong2').innerHTML = "ERREUR -- Le prénom ñ'existe pas dans le tableau";
}

console.log(tab);