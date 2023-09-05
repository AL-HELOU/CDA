DROP DATABASE IF EXISTS test;

CREATE DATABASE test;

CREATE TABLE personne(
    per_id  INT AUTO_INCREMENT NOT NULL,
    per_nom VARCHAR(50) NOT NULL,
    per_prenom VARCHAR(50) NOT NULL,
    per_adresse VARCHAR(255) NOT NULL,
    per_ville VARCHAR(50) NOT NULL,
    per_cp CHAR(5) NOT NULL,
    PRIMARY KEY(per_id)
);


CREATE TABLE groupe(
    gro_id INT AUTO_INCREMENT NOT NULL,
    gro_libelle VARCHAR(50),
    PRIMARY KEY(gro_id)
);

CREATE TABLE appartient(
    per_id INT,
    gro_id INT,
    FOREIGN KEY(per_id) REFERENCES personne(per_id),
    FOREIGN KEY(gro_id) REFERENCES groupe(gro_id)
);
