--1- Afficher la liste des hôtels
SELECT hot_nom AS 'Le nom de l’hôtel' , hot_ville AS 'La ville' FROM hotel;

--2- Afficher la ville de résidence de Mr White
SELECT cli_nom AS 'Nom', cli_prenom AS 'Prénom', cli_ville AS 'Ville'
FROM client
WHERE cli_nom = 'White';

--3- Afficher la liste des stations dont l’altitude < 1000
SELECT sta_nom AS 'Le nom de la station', sta_altitude AS 'Altitude'
FROM station
WHERE sta_altitude < 1000;

--4- Afficher la liste des chambres ayant une capacité > 1
SELECT DISTINCT cha_numero AS 'Le numéro de la chambre', cha_capacite AS 'la capacité'
FROM chambre
WHERE cha_capacite > 1;

--5- Afficher les clients n’habitant pas à Londres
SELECT cli_nom AS 'Nom', cli_ville AS 'Ville'
FROM client
WHERE cli_ville != 'Londres';

--6- Afficher la liste des hôtels située sur la ville de Bretou et possédant une catégorie > 3
SELECT hot_nom AS "le nom de l'hôtel", hot_ville AS "La ville", hot_categorie AS "Categorie"
FROM hotel
WHERE hot_ville = 'Bretou' && hot_categorie > 3;

--7- Afficher la liste des hôtels avec leur station
SELECT sta_nom AS 'le nom de la station', hot_nom AS 'le nom de l’hôtel', hot_categorie AS 'Categorie', hot_ville AS "La ville"
FROM station
JOIN hotel ON hotel.hot_sta_id = station.sta_id;

--8- Afficher la liste des chambres et leur hôtel
SELECT hot_nom AS 'Le nom de l’hôtel', hot_categorie AS 'Categorie', hot_ville AS 'Ville',cha_numero  AS 'Le numéro de la chambre'
FROM hotel
JOIN chambre ON chambre.cha_hot_id = hotel.hot_id
ORDER BY hot_nom;
--9- Afficher la liste des chambres de plus d'une place dans des hôtels situés sur la ville de Bretou
SELECT hot_nom AS 'Le nom de l’hôtel', hot_categorie AS 'Categorie', hot_ville AS 'Ville', cha_numero  AS 'Le numéro de la chambre', cha_capacite AS 'la capacité'
FROM hotel
JOIN chambre ON chambre.cha_hot_id = hotel.hot_id
WHERE hot_ville = 'Bretou' && cha_capacite > 1;

--10- Afficher la liste des réservations avec le nom des clients
SELECT cli_nom AS 'Nom', hot_nom AS 'Le nom de l’hôtel',
res_date AS 'La date de réservation'
FROM client
JOIN reservation ON reservation.res_cli_id = client.cli_id
JOIN chambre ON chambre.cha_hot_id = reservation.res_cha_id
JOIN hotel ON hotel.hot_id = chambre.cha_hot_id
GROUP BY cli_nom;

--11- Afficher la liste des chambres avec le nom de l’hôtel et le nom de la station
SELECT sta_nom AS 'Le nom de la station', hot_nom AS 'Le nom de l’hôtel',
cha_numero  AS 'Le numéro de la chambre', cha_capacite AS 'la capacité'
FROM station
JOIN hotel ON hotel.hot_sta_id = station.sta_id
JOIN chambre ON chambre.cha_hot_id = hotel.hot_id
GROUP BY sta_nom ,hot_nom, cha_numero;

--12- Afficher les réservations avec le nom du client et le nom de l’hôtel avec datediff
SELECT cli_nom AS 'Nom', hot_nom AS 'Le nom de l’hôtel',
res_date_debut AS 'La date de début du séjour', DATEDIFF(res_date_fin, res_date_debut) AS 'La durée du séjour'
FROM client
JOIN reservation on reservation.res_cli_id = client.cli_id
JOIN chambre ON chambre.cha_id = reservation.res_cha_id
JOIN hotel ON hotel.hot_id = chambre.cha_hot_id;

--13- Compter le nombre d’hôtel par station
SELECT sta_nom AS 'Le nom de la station' ,COUNT(hot_id) AS 'le nombre d’hôtel ' FROM station
JOIN hotel ON hotel.hot_sta_id = station.sta_id
GROUP BY sta_nom;

--14- Compter le nombre de chambres par station
SELECT sta_nom AS 'Le nom de la station',COUNT(cha_id) AS 'Le nombre de la chambres' FROM station
JOIN hotel ON hotel.hot_sta_id = station.sta_id
JOIN chambre ON chambre.cha_hot_id = hotel.hot_id
GROUP BY sta_nom;

--15- Compter le nombre de chambres par station ayant une capacité > 1
SELECT sta_nom AS 'Le nom de la station',COUNT(cha_id) AS 'Le nombre de la chambres' FROM station
JOIN hotel ON hotel.hot_sta_id = station.sta_id
JOIN chambre ON chambre.cha_hot_id = hotel.hot_id
WHERE cha_capacite > 1
GROUP BY sta_nom;

--16- Afficher la liste des hôtels pour lesquels Mr Squire a effectué une réservation
SELECT DISTINCT hot_nom AS 'Le nom des hôtels pour lesquels Mr Squire a effectué une réservation'
FROM hotel
JOIN chambre ON chambre.cha_hot_id = hotel.hot_id
JOIN reservation ON reservation.res_cha_id = chambre.cha_id
JOIN client ON client.cli_id = reservation.res_cli_id
WHERE cli_nom = 'Squire';

--17- Afficher la durée moyenne des réservations par station
SELECT sta_nom AS 'Le nom de la station', ROUND(AVG(DATEDIFF(res_date_fin, res_date_debut))) AS 'la durée moyenne des réservations'
FROM reservation
JOIN chambre ON chambre.cha_id = reservation.res_cha_id
JOIN hotel ON hotel.hot_id = chambre.cha_hot_id
JOIN station ON station.sta_id = hotel.hot_sta_id
GROUP BY sta_nom;