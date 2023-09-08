--A partir de la base hotel, créez les vues suivantes :

--1 Afficher la liste des hôtels avec leur station
CREATE VIEW hotels_stations
AS
SELECT sta_nom AS 'le nom de la station', hot_nom AS 'le nom de l’hôtel', hot_categorie AS 'Categorie', hot_ville AS "La ville"
FROM station
JOIN hotel ON hotel.hot_sta_id = station.sta_id;

--2 Afficher la liste des chambres et leur hôtel
CREATE VIEW hotel_chambres
AS
SELECT cha_numero  AS 'Le numéro de la chambre', hot_nom AS 'Le nom de l’hôtel', hot_categorie AS 'Categorie', hot_ville AS 'Ville'
FROM hotel
JOIN chambre ON chambre.cha_hot_id = hotel.hot_id
ORDER BY hot_nom;

--3 Afficher la liste des réservations avec le nom des clients
CREATE VIEW liste_reservation
AS
SELECT res_id AS 'ID de la réservation', cli_nom AS ' Client Nom', hot_nom AS 'Le nom de l’hôtel',
res_date AS 'La date de réservation'
FROM client
JOIN reservation ON reservation.res_cli_id = client.cli_id
JOIN chambre ON chambre.cha_hot_id = reservation.res_cha_id
JOIN hotel ON hotel.hot_id = chambre.cha_hot_id
GROUP BY res_id,cli_nom
ORDER BY res_id,cli_nom DESC;

--4 Afficher la liste des chambres avec le nom de l’hôtel et le nom de la station
CREATE VIEW chambres_hotel_station
AS
SELECT sta_nom AS 'Le nom de la station', hot_nom AS 'Le nom de l’hôtel',
cha_numero  AS 'Le numéro de la chambre', cha_capacite AS 'la capacité'
FROM station
JOIN hotel ON hotel.hot_sta_id = station.sta_id
JOIN chambre ON chambre.cha_hot_id = hotel.hot_id
GROUP BY sta_nom ,hot_nom, cha_numero;

--5 Afficher les réservations avec le nom du client et le nom de l’hôtel
CREATE VIEW reservation_info
AS
SELECT cli_nom AS 'Nom', hot_nom AS 'Le nom de l’hôtel',
res_date_debut AS 'La date de début du séjour', DATEDIFF(res_date_fin, res_date_debut) AS 'La durée du séjour'
FROM client
JOIN reservation on reservation.res_cli_id = client.cli_id
JOIN chambre ON chambre.cha_id = reservation.res_cha_id
JOIN hotel ON hotel.hot_id = chambre.cha_hot_id;