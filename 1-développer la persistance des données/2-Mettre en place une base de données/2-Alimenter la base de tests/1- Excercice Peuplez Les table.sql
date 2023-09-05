/* -----------------------Exercice----------------------------------*/
/*--------------------Peuplez la table Papyrus !------------------------- */

/*----- table produit importé sur SGBD -----------------*/

INSERT INTO fournis (numfou, nomfou, ruefou, posfou, vilfou, confou, satisf)
VALUES
(120, 'GROBRIGAN', '20 rue du papier', 92200, 'papercity' , 'Georges', 8),
(540, 'ECLIPSE', '53 rue laisse flotter les rdaans', 78250, 'Bugbugville', 'Nester,', 7),
(8700, 'MEDICS', '120 rue des plantes', 75001, 'paris', 'lison', 0),
(9120, 'GRIGAN', '20 rue du er', 9220, 'papcity' , 'Grges', 2),
(9180, 'ECLSE', '53 rue rubans', 78880, 'Bville', 'ter,', 1),
(9150, 'PPPCS', '120 rue tes', 80001, 'pttts', 'laeron', 9),
(70010, 'GRRIGAN', '20 rue rupier', 92200, 'pcity' , 'Georges', 8),
(70011, 'ECIPE', '53 rue rubqsns', 78250, 'Bugbugville', 'Nester,', 7),
(70020, 'MECS', '120 rue des sszaantes', 75001, 'parhhis', 'izson', 0),
(70025, 'GRGN', '20 rue du erezr', 9220, 'papuycity' , 'raages', 2),
(70210, 'ELFDE', '53 rue tazbans', 78880, 'Bvizelle', 'tefr,', 1),
(70250, 'PPZRES', '120 rue zerates', 80001, 'ptatts', 'laeron', 9),
(70300, 'PSQPCS', '120 rue qsdtes', 80001, 'pttaazts', 'ertton', 9);

INSERT INTO entcom (obscom, numfou)
VALUES
('', 120),
('Commande urgente', 540),
('', 8700),
('Commande urgente', 8700),
('Commande cadencée', 70010),
('Commande cadencée', 70300),
('', 9150);

INSERT INTO ligcom(numcom, numlig, codart, qtecde, priuni, qteliv, derliv)
VALUES
(1, 1, 'B001', 3000, 470, 3000, '2007-03-15'),
(5, 22, 'I100', 2000, 480, 2000, '2007-07-05'),
(4, 33, 'I100', 1000, 680, 1000, '2007-08-20'),
(1, 48, 'P230', 250, 40, 250, '2007-02-15'),
(2, 55, 'R080', 1000, 600, 1000, '2007-05-16'),
(4, 2, 'B001', 10000, 3500, 10000, '2050-08-31'),
(6, 71, 'R132', 8000, 900, 8000, '1995-03-17');


/*----- table vente importé sur SGBD -----------------*/



/* TABLE vente importe en ligne de commandes SQL*/
/*LOAD DATA LOCAL INFILE '/home/alhelou/MUHANNAD/CDA/1-développer la persistance des données/2-Mettre en place une base de données/2-Alimenter la base de tests/vente.csv'
INTO TABLE vente
FIELDS TERMINATED BY ';'
LINES TERMINATED BY '\r\n'
IGNORE 1 LINES
(numfou,codart,delliv,qte1,prix1,qte2,prix2,qte3,prix3);*/
