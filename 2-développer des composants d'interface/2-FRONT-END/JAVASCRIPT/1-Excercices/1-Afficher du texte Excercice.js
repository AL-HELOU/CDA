var nom  = window.prompt ("Entrez votre nom :");
var prenom = window.prompt("Entrez votre prenom :");

if (window.confirm ("Etes vous un homme ?") == true) 
{
alert ("Bonjour Monsieur " + nom + " " + prenom + "\n"+ "Bienvenue sur notre site web !");
}
else 
{
 alert ("Bonjour Madame " + nom + " " + prenom + "\n" + "Bienvenue sur notre site web !");
}