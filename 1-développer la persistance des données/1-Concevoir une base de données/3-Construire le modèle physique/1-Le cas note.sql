DROP DATABASE IF EXISTS test;

CREATE DATABASE test;

CREATE TABLE classe(
   Id_classe INT AUTO_INCREMENT,
   classe_nom VARCHAR(255)  NOT NULL,
   classe_salle_num INT NOT NULL,
   PRIMARY KEY(Id_classe)
);

CREATE TABLE eleve(
   Id_eleve INT AUTO_INCREMENT,
   eleve_nom VARCHAR(50)  NOT NULL,
   eleve_prenom VARCHAR(50)  NOT NULL,
   Id_classe INT NOT NULL,
   PRIMARY KEY(Id_eleve),
   FOREIGN KEY(Id_classe) REFERENCES classe(Id_classe)
);

CREATE TABLE professeur(
   Id_prof INT AUTO_INCREMENT,
   prof_nom VARCHAR(50)  NOT NULL,
   prof_prenom VARCHAR(50)  NOT NULL,
   PRIMARY KEY(Id_prof)
);

CREATE TABLE matiere(
   Id_matiere INT AUTO_INCREMENT,
   matiere_nom VARCHAR(255)  NOT NULL,
   Id_prof INT NOT NULL,
   PRIMARY KEY(Id_matiere),
   FOREIGN KEY(Id_prof) REFERENCES professeur(Id_prof)
);

CREATE TABLE suit(
   Id_classe INT,
   Id_matiere INT,
   classe_nombre_heures INT NOT NULL,
   PRIMARY KEY(Id_classe, Id_matiere),
   FOREIGN KEY(Id_classe) REFERENCES classe(Id_classe),
   FOREIGN KEY(Id_matiere) REFERENCES matiere(Id_matiere)
);

CREATE TABLE evalue(
   Id_eleve INT,
   Id_matiere INT,
   eleve_note DECIMAL(2,2)   NOT NULL,
   PRIMARY KEY(Id_eleve, Id_matiere),
   FOREIGN KEY(Id_eleve) REFERENCES eleve(Id_eleve),
   FOREIGN KEY(Id_matiere) REFERENCES matiere(Id_matiere)
);