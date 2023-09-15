/*
-----------------------------------------BDD - Evaluation -> Requêtes de BDD----------------------------------------------
------------------------------------------------La base Northwind---------------------------------------------------------
*/


--1- Liste des contacts français :
SELECT CompanyName AS 'Societé', ContactName AS 'Contact',
ContactTitle AS 'Fonction', Phone AS 'Téléphone'
FROM customers
WHERE Country = 'France';


--2- Produits vendus par le fournisseur « Exotic Liquids » :
SELECT ProductName AS 'Produit', UnitPrice AS 'Prix'
FROM products
WHERE SupplierID = 1;


--3- Nombre de produits vendus par les fournisseurs Français dans l’ordre décroissant :
SELECT CompanyName AS 'Fournisseur',COUNT(*) AS 'Nbre produits'
FROM suppliers S
JOIN products P ON P.SupplierID = S.SupplierID
WHERE Country = 'France'
GROUP BY CompanyName
ORDER BY `Nbre produits` DESC;


--4- Liste des clients Français ayant plus de 10 commandes :
SELECT CompanyName AS 'Client', COUNT(*) AS 'Nbre commandes'
FROM customers C
JOIN orders O ON O.CustomerID = C.CustomerID
WHERE Country = 'France'
GROUP BY CompanyName
HAVING `Nbre commandes`>10;


--5- Liste des clients ayant un chiffre d’affaires > 30.000 :
SELECT CompanyName AS 'Client', SUM(Unitprice*Quantity) AS 'CA',Country AS 'Pays'
FROM customers C
JOIN orders O ON O.customerID = C.CustomerID
JOIN `order details` OD ON OD.OrderID = O.OrderID
GROUP BY O.CustomerID
HAVING `CA`>30000
ORDER BY `CA` DESC;


--6- Liste des pays dont les clients ont passé commande de produits fournis par « Exotic Liquids » :
SELECT DISTINCT ShipCountry AS 'Pays'
FROM orders O
JOIN `order details` OD ON OD.OrderID = O.OrderID
JOIN products P ON P.ProductID = OD.ProductID
JOIN suppliers S ON S.SupplierID = P.SupplierID
WHERE S.CompanyName = 'Exotic Liquids'
ORDER BY Pays ASC;


--7- Montant des ventes de 1997 :
SELECT SUM(Unitprice*Quantity) AS 'Montant ventes 97'
FROM `order details` OD
JOIN orders O ON O.OrderID = OD.OrderID
WHERE OrderDate LIKE '1997%';


--8- Montant des ventes de 1997 mois par mois :
SELECT MONTH(OrderDate) AS 'Mois 97', SUM(Unitprice*Quantity) AS 'Montant ventes 97'
FROM `order details` OD
JOIN orders O ON O.OrderID = OD.OrderID
WHERE OrderDate LIKE '1997%'
GROUP BY `Mois 97`
ORDER BY `Mois 97`;


--9- Depuis quelle date le client « Du monde entier » n’a plus commandé ?
SELECT MAX(OrderDate) AS 'Date de dernière commande'
FROM orders O
JOIN customers C ON C.CustomerID = O.CustomerID
WHERE CompanyName = 'Du monde entier';


--10- Quel est le délai moyen de livraison en jours ?
SELECT ROUND(AVG(DATEDIFF(ShippedDate,OrderDate))) AS 'Délai moyen de livraison en jours'
FROM orders;