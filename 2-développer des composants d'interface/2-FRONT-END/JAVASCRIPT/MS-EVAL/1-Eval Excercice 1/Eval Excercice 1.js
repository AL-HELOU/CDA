/*Exercice 1 - Calcul du nombre de jeunes, de moyens et de vieux

    Il s'agit de dénombrer les personnes d'âge strictement inférieur à 20 ans, les personnes d'âge strictement supérieur à 40 ans et celles dont l'âge est compris entre 20 ans et 40 ans (20 ans et 40 ans y compris).

    Le programme doit demander les âges successifs.

    Le comptage est arrêté dès la saisie d'un centenaire. Le centenaire est compté.

    Donnez le programme Javascript correspondant qui affiche les résultats.*/

let age = 0;
let jeune = [];
let vieux = [];
let moy = [];
    
while (age < 100)
    {
        age = parseInt(window.prompt('Saisissez les âges ; \n  OU : (Saisissez un age de plus de 100ans pour arrêter le saisie)'));
        if (age < 20 && age > 0)
            {
                jeune.push(age);
            }
        else if (age > 40 && age < 130)
            {
                vieux.push(age);
            }
        else if (age <= 40 && age >= 20)
            {
                moy.push(age);
            }
        else{
                alert ('Saisissez un age S.V.P !')
            }
    }
    
document.getElementById('str1').innerHTML = " Le nombre des personnes d'âge inférieur à 20 ans est : "+ jeune.length;
document.getElementById('str2').innerHTML = "Le nombre des personnes d'âge supérieur à 40 ans est : " + vieux.length;
document.getElementById('str3').innerHTML = "Le nombre des personnes dont l'âge est compris entre 20 ans et 40 ans est : " + moy.length;