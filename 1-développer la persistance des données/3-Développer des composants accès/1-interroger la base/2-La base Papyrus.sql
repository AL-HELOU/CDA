--1- Quelles sont les commandes du fournisseur 09120 ?
SELECT numcom  as 'les commandes du fournisseur n°9120'
FROM entcom
WHERE numfou = 09120;


--2- Afficher le code des fournisseurs pour lesquels des commandes ont été passées.
SELECT DISTINCT numfou as 'le code des fournisseurs ont passé des commandes' FROM entcom;


--3- Afficher le nombre de commandes fournisseurs passées, et le nombre de fournisseur concernés.
SELECT  COUNT(numcom) as 'le nombre de commandes', COUNT(DISTINCT numfou) as 'le nombre de fournisseurs' FROM entcom;


--4- Editer les produits ayant un stock inférieur ou égal au stock d'alerte et dont la quantité annuelle est inférieur est inférieure à 1000
--(informations à fournir : n° produit, libellé produit, stock, stock actuel d'alerte, quantité annuelle)
SELECT codart AS 'N° produit' , libart AS 'Libellé produit' ,
	stkphy AS 'Stock', stkale AS "Stock actuel d'alerte" ,
	qteann AS 'Quantité annuell' FROM produit
	WHERE stkphy <= stkale AND qteann < 1000;


--5- Quels sont les fournisseurs situés dans les départements 75, 78, 92, 77 ?
--L’affichage (département, nom fournisseur) sera effectué par département décroissant, puis par ordre alphabétique
SELECT posfou AS Département, nomfou AS 'Nom fournisseur'  FROM fournis
WHERE --posfou LIKE '75%' || posfou LIKE'78%' || posfou LIKE '92%' || posfou LIKE '77%'||
LEFT(posfou,2) = 75 || LEFT(posfou,2)= 78 || LEFT(posfou,2) = 92 || LEFT(posfou,2) = 77
ORDER BY posfou DESC , numfou;


--6- Quelles sont les commandes passées au mois de mars et avril ?
SELECT numcom AS 'Commandes passé au mois de mars et avril' FROM entcom
WHERE MONTH (datcom) = 03 OR MONTH (datcom) = 04;


--7- Quelles sont les commandes du jour qui ont des observations particulières ?
--(Affichage numéro de commande, date de commande)
SELECT numcom AS 'Numéro de commande', datcom AS 'Date de commande' FROM entcom
WHERE obscom<>''; --IS NOT NULL; --&& datcom = CURDATE();


--8- Lister le total de chaque commande par total décroissant.
--(Affichage numéro de commande et total)
SELECT numcom AS 'Numéro de commande',
SUM(qtecde*priuni) AS Total
FROM ligcom
GROUP BY numcom
ORDER BY Total DESC;


--9- Lister les commandes dont le total est supérieur à 10000€ ; on exclura dans le calcul du total les articles commandés en quantité supérieure ou égale à 1000.
--(Affichage numéro de commande et total)
SELECT numcom AS 'Numéro de commande',
SUM(qtecde*priuni) AS Total
FROM ligcom
WHERE qtecde < 1000
GROUP BY numcom
HAVING Total > 10000;


--10- Lister les commandes par nom fournisseur
--(Afficher le nom du fournisseur, le numéro de commande et la date)
SELECT nomfou AS "Nom du fournisseur",
numcom AS "Numéro de commande",
datcom AS "Date de commande"
FROM fournis F
JOIN entcom E ON E.numfou = F.numfou
ORDER BY nomfou;


--11- Sortir les produits des commandes ayant le mot "urgent' en observation.
--(Afficher le numéro de commande, le nom du fournisseur, le libellé du produit et le sous total = quantité commandée * Prix unitaire)
SELECT ligcom.numcom AS 'Numéro de commande',
nomfou AS 'Nom du fournisseur',
libart AS 'Libellé de produit',
qtecde * priuni AS 'Le sous total'
FROM ligcom
JOIN produit ON produit.codart = ligcom.codart
JOIN entcom ON entcom.numcom = ligcom.numcom
JOIN fournis ON fournis.numfou = entcom.numfou
WHERE entcom.obscom LIKE '%urgent%';


--12- Coder de 2 manières différentes la requête suivante : Lister le nom des fournisseurs susceptibles de livrer au moins un article.
SELECT nomfou AS 'Nom du fournisseur' , qteliv AS 'Quntité livré'
FROM fournis F
JOIN entcom  E ON E.numfou = F.numfou
JOIN ligcom L ON L.numcom = E.numcom
WHERE qteliv > 0
GROUP BY nomfou
ORDER BY qteliv DESC;

SELECT nomfou AS 'Nom du fournisseur' , qteliv AS 'Quntité livré'
FROM fournis F
JOIN entcom  E ON E.numfou = F.numfou
JOIN ligcom L ON L.numcom = E.numcom
WHERE qteliv IN (SELECT qteliv FROM ligcom WHERE qteliv>0)
GROUP BY nomfou
ORDER BY qteliv DESC;


--13- Coder de 2 manières différentes la requête suivante : Lister les commandes (Numéro et date) dont le fournisseur est celui de la commande 70210 :
SELECT numcom AS 'Numéro de commande' ,
datcom AS 'Date de commande' FROM entcom
WHERE numfou = 120;

SELECT numcom AS 'Numéro de commande' ,
datcom AS 'Date de commande' FROM entcom E
JOIN fournis F ON F.numfou = E.numfou
WHERE nomfou IN (SELECT nomfou FROM fournis F JOIN entcom E ON E.numfou = F.numfou WHERE numcom = 70210)/* = 'GROBRIGAN'*/ ;


--14- Dans les articles susceptibles d’être vendus, lister les articles moins chers (basés sur Prix1) que le moins cher des rubans
--(article dont le premier caractère commence par R).
--On affichera le libellé de l’article et prix1
SELECT libart AS "Libellé de l'article", prix1 FROM produit P
JOIN vente V ON V.codart = P.codart
WHERE P.libart LIKE 'R%'
ORDER BY prix1;


--15- Editer la liste des fournisseurs susceptibles de livrer les produits dont le stock est inférieur ou égal à 150 % du stock d'alerte.
--La liste est triée par produit puis fournisseur
SELECT libart AS 'Libellé de produit', nomfou AS 'Nom du fournisseur'
FROM produit P
JOIN vente V ON V.codart = P.codart
JOIN fournis F ON F.numfou = V.numfou
WHERE stkphy <= stkale*1.5
GROUP BY libart,nomfou
ORDER BY libart , nomfou;


--16- Éditer la liste des fournisseurs susceptibles de livrer les produit dont le stock est inférieur ou égal à 150 % du stock d'alerte et un délai de livraison d'au plus 30 jours.
--La liste est triée par fournisseur puis produit
SELECT  nomfou AS 'Nom du fournisseur', libart AS 'Libellé de produit'
FROM produit P
JOIN vente V ON V.codart = P.codart
JOIN fournis F ON F.numfou = V.numfou
WHERE stkphy <= stkale*1.5 && delliv <= 30
GROUP BY nomfou,libart
ORDER BY nomfou, libart;


--17- Avec le même type de sélection que ci-dessus, sortir un total des stocks par fournisseur, triés par total décroissant.
SELECT nomfou , SUM(stkphy) AS 'Total des stocks'
FROM produit P
JOIN ligcom L ON L.codart = P.codart
JOIN entcom E ON E.numcom = L.numcom
JOIN fournis F ON F.numfou = E.numfou
JOIN vente V ON V.numfou = F.numfou
GROUP BY nomfou
ORDER BY `Total des stocks` DESC;


--18- En fin d'année, sortir la liste des produits dont la quantité réellement commandée dépasse 90% de la quantité annuelle prévue.
SELECT libart  AS 'Les produits',
produit.qteann AS 'Quantité annuelle prévue', ligcom.qtecde AS 'la Quantité réellement commandée'
FROM produit
JOIN ligcom ON ligcom.codart = produit.codart
WHERE ligcom.qtecde > produit.qteann * 0.9
GROUP BY libart
ORDER BY `Quantité annuelle prévue`;


--19- Calculer le chiffre d'affaire par fournisseur pour l'année (93!!!) 2018 sachant
--que les prix indiqués sont hors taxes et que le taux de TVA est 20%.

SELECT nomfou AS 'Nom du fournisseur',
SUM((priuni+(priuni*0.2))*qtecde) AS 'CA 2018'
FROM fournis F
JOIN entcom E ON E.numfou = F.numfou
JOIN ligcom L ON L.numcom = E.numcom
WHERE datcom LIKE '2018%'
GROUP BY nomfou
ORDER BY `CA 2018` DESC;

--20. Existe-t-il des lignes de commande non cohérentes avec les produits vendus par les fournisseurs. ?
--NON
SELECT DISTINCT numlig AS 'le numéro du linge de commande', numfou AS 'Le numéro du fournisseur'
FROM ligcom L
LEFT JOIN entcom E ON E.numcom = L.numcom
ORDER BY numlig;

-----------------------------FIN---------------------------------------------------------------------------------------------------------------------------


/*
Exercices

Les besoins de mise à jour
*/

--1- Appliquer une augmentation de tarif de 4% pour le prix 1, et de 2% pour le prix2, pour le fournisseur 9180.
UPDATE vente
SET prix1 = prix1+(prix1*0.04) ,prix2 = prix2+(prix2*0.02)
WHERE numfou = 9180;

--2- Dans la table vente, mettre à jour le prix2 des articles dont le prix2 est nul, en affectant la valeur du prix1.
UPDATE vente
SET prix2 = prix1
WHERE prix2 = 0 || prix2 IS NULL;

--3- Mettre à jour le champ obscom, en renseignant ***** pour toutes les commandes dont le fournisseur a un indice de satisfaction inférieur à 5.
UPDATE entcom
SET obscom = '*****'
WHERE numfou
IN (SELECT numfou FROM fournis WHERE satisf<5);

--4- Supprimer le produit "I110".
DELETE FROM vente
WHERE codart = 'I110';
DELETE FROM produit
WHERE codart = 'I110';