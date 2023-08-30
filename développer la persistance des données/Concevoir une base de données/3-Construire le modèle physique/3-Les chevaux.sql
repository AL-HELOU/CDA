DROP DATABASE IF EXISTS test;

CREATE DATABASE test;

CREATE TABLE cheval(
   Id_cheval INT AUTO_INCREMENT,
   cheval_nom VARCHAR(50) ,
   cheval_ddnaissance DATE NOT NULL,
   cheval_mere VARCHAR(50)  NOT NULL,
   cheval_race VARCHAR(255)  NOT NULL,
   cheval_couleur VARCHAR(50)  NOT NULL,
   cheval_sexe CHAR(1)  NOT NULL,
   cheval_lieudnaissance VARCHAR(255)  NOT NULL,
   PRIMARY KEY(Id_cheval)
);

CREATE TABLE proprietaire(
   Id_proprietaire INT AUTO_INCREMENT,
   prop_nom VARCHAR(255)  NOT NULL,
   prop_adresse VARCHAR(255)  NOT NULL,
   prop_ville VARCHAR(255)  NOT NULL,
   prop_cp CHAR(5)  NOT NULL,
   PRIMARY KEY(Id_proprietaire)
);

CREATE TABLE entraineur(
   Id_entraineur INT AUTO_INCREMENT,
   entraineur_nom VARCHAR(255)  NOT NULL,
   entraineur_adresse VARCHAR(255)  NOT NULL,
   entraineur_ville VARCHAR(255)  NOT NULL,
   entraineur_cp CHAR(5)  NOT NULL,
   PRIMARY KEY(Id_entraineur)
);

CREATE TABLE veterinaire(
   Id_veterinaire INT AUTO_INCREMENT,
   veterinaire_nom VARCHAR(255)  NOT NULL,
   veterinaire_adresse VARCHAR(255)  NOT NULL,
   veterinaire_ville VARCHAR(255)  NOT NULL,
   veterinaire_cp CHAR(5)  NOT NULL,
   PRIMARY KEY(Id_veterinaire)
);

CREATE TABLE propriete(
   Id_cheval INT,
   Id_proprietaire INT,
   cheval_dateachat DATE NOT NULL,
   PRIMARY KEY(Id_cheval, Id_proprietaire),
   FOREIGN KEY(Id_cheval) REFERENCES cheval(Id_cheval),
   FOREIGN KEY(Id_proprietaire) REFERENCES proprietaire(Id_proprietaire)
);

CREATE TABLE entrainement(
   Id_cheval INT,
   Id_entraineur INT,
   entrainement_date DATE NOT NULL,
   PRIMARY KEY(Id_cheval, Id_entraineur),
   FOREIGN KEY(Id_cheval) REFERENCES cheval(Id_cheval),
   FOREIGN KEY(Id_entraineur) REFERENCES entraineur(Id_entraineur)
);

CREATE TABLE soigne(
   Id_cheval INT,
   Id_veterinaire INT,
   soins_date DATE NOT NULL,
   soins_type VARCHAR(50)  NOT NULL,
   PRIMARY KEY(Id_cheval, Id_veterinaire),
   FOREIGN KEY(Id_cheval) REFERENCES cheval(Id_cheval),
   FOREIGN KEY(Id_veterinaire) REFERENCES veterinaire(Id_veterinaire)
);
