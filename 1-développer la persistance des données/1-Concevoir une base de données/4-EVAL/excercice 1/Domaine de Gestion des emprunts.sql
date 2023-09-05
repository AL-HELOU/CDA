DROP DATABASE IF EXISTS test;

CREATE DATABASE test;

CREATE TABLE abonne(
   abonne_id INT AUTO_INCREMENT,
   abonne_nom VARCHAR(100)  NOT NULL,
   abonne_prenom VARCHAR(100)  NOT NULL,
   abonne_adresse VARCHAR(250)  NOT NULL,
   abonne_cp CHAR(5)  NOT NULL,
   abonne_telephone VARCHAR(20)  NOT NULL,
   abonne_date_inscri DATE NOT NULL,
   PRIMARY KEY(abonne_id)
);

CREATE TABLE livre(
   livre_id INT AUTO_INCREMENT,
   livre_titre VARCHAR(250)  NOT NULL,
   livre_auteur VARCHAR(250)  NOT NULL,
   livre_editeur VARCHAR(250)  NOT NULL,
   livre_theme VARCHAR(100)  NOT NULL,
   livre_date_edition DATE NOT NULL,
   livre_date_rebut DATE,
   PRIMARY KEY(livre_id)
);

CREATE TABLE emprunter(
   abonne_id INT,
   livre_id INT,
   livre_date_emprunt DATE NOT NULL,
   livre_date_retour DATE,
   PRIMARY KEY(abonne_id, livre_id),
   FOREIGN KEY(abonne_id) REFERENCES abonne(abonne_id),
   FOREIGN KEY(livre_id) REFERENCES livre(livre_id)
);

CREATE TABLE relance(
   abonne_id INT,
   livre_id INT,
   relance_date DATE,
   PRIMARY KEY(abonne_id, livre_id),
   FOREIGN KEY(abonne_id) REFERENCES abonne(abonne_id),
   FOREIGN KEY(livre_id) REFERENCES livre(livre_id)
);
