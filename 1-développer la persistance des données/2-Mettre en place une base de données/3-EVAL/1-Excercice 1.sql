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


INSERT INTO client (cli_nom,cli_adresse,cli_tel)
VALUES
('GROBRIGAN','20 rue du er','0777584895'),
('MEDICS','50 rue du aaar','0777518895'),
('saqsasd','120 rue potato','0666518895');

INSERT INTO commande (com_cli_id,com_date,com_obs)
VALUES
(1,'2022-12-18 22:22:18','qsdsqd'),
(2,'2021-12-18 08:36:40','sosospp'),
(3,'2010-12-18 18:28:50','sdfsd');

INSERT INTO produit(pro_libelle,pro_description)
VALUES
('dvd', 'qsdsao o osqdsqd'),
('cd',NULL);

INSERT INTO est_compose(com_id,pro_id,est_qte)
VALUES
(3,1,52),
(1,2,88);