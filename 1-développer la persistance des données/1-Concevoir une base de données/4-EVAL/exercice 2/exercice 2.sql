DROP DATABASE IF EXISTS test;

CREATE DATABASE test;

CREATE TABLE client(
   Id_client INT AUTO_INCREMENT,
   nom_client VARCHAR(100)  NOT NULL,
   prenom_client VARCHAR(100)  NOT NULL,
   PRIMARY KEY(Id_client)
);

CREATE TABLE commande(
   Id_commande INT AUTO_INCREMENT,
   date_commande DATE NOT NULL,
   montant_commande INT NOT NULL,
   Id_client INT NOT NULL,
   PRIMARY KEY(Id_commande),
   FOREIGN KEY(Id_client) REFERENCES client(Id_client)
);

CREATE TABLE article(
   Id_article INT AUTO_INCREMENT,
   designation_article VARCHAR(100)  NOT NULL,
   pu_article DECIMAL(4,2)   NOT NULL,
   PRIMARY KEY(Id_article)
);

CREATE TABLE secomposede(
   Id_commande INT,
   Id_article INT,
   qte INT NOT NULL,
   tauxtva DECIMAL(4,2)   NOT NULL,
   PRIMARY KEY(Id_commande, Id_article),
   FOREIGN KEY(Id_commande) REFERENCES commande(Id_commande),
   FOREIGN KEY(Id_article) REFERENCES article(Id_article)
);
