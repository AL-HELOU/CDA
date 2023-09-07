DROP DATABASE IF EXISTS eval_mysql_ex1;
CREATE DATABASE eval_mysql_ex1;
use eval_mysql_ex1;

CREATE TABLE client(
	cli_id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    cli_nom VARCHAR(50) NOT NULL,
    cli_adresse varchar(50) NOT NULL,
    cli_tel VARCHAR (30) NOT NULL
);

CREATE TABLE commande(
	com_id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	com_cli_id INT NOT NULL,
    com_date DATETIME NOT NULL,
    com_obs VARCHAR(50),
    FOREIGN KEY (com_cli_id) REFERENCES client(cli_id)
);

CREATE TABLE produit(
	pro_id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	pro_libelle VARCHAR(50) NOT NULL,
    pro_description VARCHAR(50)
);

CREATE TABLE est_compose(
	com_id INT NOT NULL,
    pro_id INT NOT NULL,
    est_qte INT NOT NULL,
    FOREIGN KEY (com_id) REFERENCES commande (com_id),
    FOREIGN KEY (pro_id) REFERENCES produit (pro_id),
    PRIMARY KEY (com_id,pro_id)
);

CREATE INDEX nom ON client (cli_nom);