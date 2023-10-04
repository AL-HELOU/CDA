// Excercice 1 - Parité

var nmbr = window.prompt ("Veuillez entrez un nombre :");

if(nmbr % 2 ==  0)
{
    console.log ("le nombre est pair")
}
else if (nmbr > 0)
{
    console.log ("le nombre est impaire")
} 
else
{
    console.log ("Veuillez réessayer et entrez un nombre")
};



// Excercice 2 - Age

var an = window.prompt ("Veuillez entrez votre année de naissance :");
var annee = (new Date()).getFullYear();
var age = annee - an ;

if (age >= 18 && age < 120)
{
    console.log ("Vous avez "+ age + " ans" + "\n" + "\n" + "Vous etês majeur");
}
else if (age < 18 &&  age > 0)
{
    console.log ("Vous avez "+ age + " ans" + "\n" + "\n" + "Vous etês mineur")
}
else {
    console.log ("Veuillez réessayer et entrez votre année de naissance")
}



// Excercice 3 - Calculette


var nmbr1 = window.prompt ("Veuillez Entrez un nombre :");
var nmbr2 = window.prompt ("Veuillez Entrez un deuxième nombre :");
var op = window.prompt ("Veuillez choisissez l'opérateur  + , - , * , /   :");
nmbr1 = parseInt(nmbr1);
nmbr2 = parseInt(nmbr2);
moins = nmbr1-nmbr2;
add = nmbr1+nmbr2;
div = nmbr1/nmbr2;
mult = nmbr1*nmbr2;


if (op == "-" ) {
    console.log (nmbr1 + " " + op + " " + nmbr2 + " = " + moins);
}
else if ( op == "+"){
    console.log (nmbr1 + " " + op + " " + nmbr2 + " = " + add);
}
else if ( op == "*"){
    console.log (nmbr1 + " " + op + " " + nmbr2 + " = " + mult);
}
else if ( op == "/" && nmbr1 != "0" && nmbr2!= "0"){
    console.log (nmbr1 + " " + op + " " + nmbr2 + " = " + div);
}
else if (op == "/" && nmbr1 == "0" || nmbr2 == "0"){
    console.log (nmbr1 + " " + op + " " + nmbr2 + " = " + "ERREUR division par 0");
}

else {
    console.log("ERROR Veuillez réessayer")
}
