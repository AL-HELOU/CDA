/*
--------------------------------------------Exercice 4 : total d'une commande---------------------------------------------

A partir de la saisie du prix unitaire noté PU d'un produit et de la quantité commandée QTECOM, afficher le prix à payer PAP, en détaillant la remise REM et le port PORT, sachant que :

TOT = ( PU * QTECOM )
la remise est de 5% si TOT est compris entre 100 et 200 € et de 10% au-delà
le port est gratuit si le prix des produits ( le total remisé ) est supérieur à 500 €. Dans le cas contraire, le port est de 2%
la valeur minimale du port à payer est de 6 €
Testez tous les cas possibles afin de vous assurez que votre script fonctionne.

Ci-dessous, un jeu de tests :

Saisir 600 € et quantité = 1 : remise 10% (-60 €) soit 540,00 et frais port = 0; à payer : 540 €
Saisir 501 € et quantité = 1 : remise 10% (-50,1 €) soit 450,90 et frais port 2% (de 450,90 €) soit +9,01 € ; à payer : 450,90+9.01 = 459,91 €.
Saisir 100 € et quantité = 2 : 200 € donc remise 5% soit 190 € et frais de port 2% soit 3,8 € mini 6 €; à payer : 190+6 = 196 €
Saisir 3 € et quantité = 1 : remise 0, frais de port 2% soit 0.06 € donc le minimum de 6 € s'applique; à payer : 3+6 = 9 €
*/


let pu = parseInt(window.prompt("Saisissez le prix unitaire d'un produit"));
let qtecom = parseInt(window.prompt("Saisissez la quantité des produits"));
let strong = document.getElementById('strong');
let tot = pu*qtecom;
let rem = 0;
let port = 0;

if(tot >=100 && tot<=200)
{
    let clc = tot * (5/100);
    rem = clc.toFixed(2);
    txt = "Remise 5%" + '-(' + rem +')'+ '€';
}
else if(tot > 200)
{
    let clc = tot * (10/100);
    rem = clc.toFixed(2);
    txt = "Remise 10%" + '-(' + rem + ')' + '€';
}
else if (tot<100)
{
    rem = 0;
    txt = "Remise 0%" + '-(' + rem + ')' + '€';
}
else{
    alert("ERREUR -- Veuillez Réessayer !")
}
tot = tot - rem;



if(tot < 500)
{
    let clc = tot * (2/100);
    port = clc.toFixed(2);
    port = Number(port);
    if(port < 6 && tot <500)
    {
        port = 6;
    }
}
tot = tot + port;
tot = tot.toFixed(2);


strong.innerHTML =  '<div>la remise est : ' + txt + '</div> <br>' +
                    '<div> Les frais de port est : ' + port + '</div> <br>' +
                    '<div> Le prix à payer est : ' + tot + '</div>';