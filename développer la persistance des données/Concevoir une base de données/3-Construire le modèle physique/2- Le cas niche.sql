DROP DATABASE IF EXISTS test;

CREATE DATABASE test;

CREATE TABLE chien(
   Id_chien INT AUTO_INCREMENT,
   chien_num_matricule VARCHAR(6)  NOT NULL,
   chien_nom VARCHAR(50)  NOT NULL,
   chien_race VARCHAR(50)  NOT NULL,
   chien_sexe CHAR(1)  NOT NULL,
   chien_date_naissance DATE NOT NULL,
   chien_date_deces DATE,
   Id_chien_1 INT,
   Id_chien_2 INT,
   PRIMARY KEY(Id_chien),
   UNIQUE(chien_num_matricule),
   FOREIGN KEY(Id_chien_1) REFERENCES chien(Id_chien),
   FOREIGN KEY(Id_chien_2) REFERENCES chien(Id_chien)
);

CREATE TABLE proprietaire(
   Id_proprietaire INT AUTO_INCREMENT,
   prop_nom VARCHAR(50)  NOT NULL,
   prop_adresse VARCHAR(255)  NOT NULL,
   PRIMARY KEY(Id_proprietaire)
);

CREATE TABLE concours(
   Id_concours INT AUTO_INCREMENT,
   concours_type VARCHAR(50)  NOT NULL,
   concours_ville VARCHAR(50)  NOT NULL,
   concours_date DATE NOT NULL,
   PRIMARY KEY(Id_concours)
);

CREATE TABLE avoir(
   Id_chien INT,
   Id_proprietaire INT,
   chien_date_achat DATE,
   PRIMARY KEY(Id_chien, Id_proprietaire),
   FOREIGN KEY(Id_chien) REFERENCES chien(Id_chien),
   FOREIGN KEY(Id_proprietaire) REFERENCES proprietaire(Id_proprietaire)
);

CREATE TABLE participant(
   Id_chien INT,
   Id_concours INT,
   concours_res DECIMAL(2,0)   NOT NULL,
   PRIMARY KEY(Id_chien, Id_concours),
   FOREIGN KEY(Id_chien) REFERENCES chien(Id_chien),
   FOREIGN KEY(Id_concours) REFERENCES concours(Id_concours)
);
