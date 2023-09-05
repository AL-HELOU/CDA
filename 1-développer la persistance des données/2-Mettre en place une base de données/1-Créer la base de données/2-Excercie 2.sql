DROP DATABASE IF EXISTS test;

CREATE DATABASE test;

CREATE TABLE client(
    client_id INT AUTO_INCREMENT NOT NULL,
    client_nom VARCHAR(50) NOT NULL,
    client_prenom VARCHAR(50) NULL NULL,
    client_adresse VARCHAR(255) NOT NULL,
    PRIMARY KEY(client_id)
);

CREATE TABLE station(
    station_id INT AUTO_INCREMENT NOT NULL,
    station_nom VARCHAR (50) NOT NULL,
    PRIMARY KEY(station_id)
);

CREATE TABLE hotel(
    hotel_id INT AUTO_INCREMENT NOT NULL,
    hotel_nom VARCHAR(50) NOT NULL,
    hotel_adresse VARCHAR(255) NOT NULL,
    hotel_categorie VARCHAR (50) NOT NULL,
    hotel_capacite INT NOT NULL,
    hotel_station_id INT,
    PRIMARY KEY(hotel_id),
    Foreign Key (hotel_station_id) REFERENCES station(station_id)
);

CREATE Table chambre(
    chambre_id INT AUTO_INCREMENT NOT NULL,
    chambre_type VARCHAR(50) NOT NULL,
    chambre_capacite INT NOT NULL,
    chambre_degre_confort DECIMAL(4,2) NOT NULL,
    chambre_exposition TEXT NOT NULL,
    chambre_hotel_id INT,
    PRIMARY KEY(chambre_id),
    Foreign Key (chambre_hotel_id) REFERENCES hotel(hotel_id)
);

CREATE TABLE reservation(
    reserv_chambre_id INT,
    reserv_client_id INT,
    reserv_date DATE NOT NULL,
    reserv_datedebut DATE NOT NULL,
    reserv_datefin DATE NOT NULL,
    reserv_arrhes DECIMAL(6,2) NOT NULL,
    reserv_prixtot DECIMAL(6,2) NOT NULL,
    Foreign Key (reserv_chambre_id) REFERENCES chambre(chambre_id),
    Foreign Key (reserv_client_id) REFERENCES client(client_id)
);
