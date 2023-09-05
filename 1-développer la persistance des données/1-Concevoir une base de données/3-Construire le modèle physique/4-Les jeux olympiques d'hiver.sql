DROP DATABASE IF EXISTS test;

CREATE DATABASE test;

CREATE TABLE responsable(
   resp_matricule INT,
   resp_nom VARCHAR(100)  NOT NULL,
   resp_prenom VARCHAR(100)  NOT NULL,
   resp_adresse VARCHAR(250)  NOT NULL,
   resp_cp CHAR(5)  NOT NULL,
   resp_ville VARCHAR(100)  NOT NULL,
   resp_telephone VARCHAR(10)  NOT NULL,
   resp_email VARCHAR(250)  NOT NULL,
   resp_role VARCHAR(100)  NOT NULL,
   resp_superviser INT,
   PRIMARY KEY(resp_matricule),
   FOREIGN KEY(resp_superviser) REFERENCES responsable(resp_matricule)
);

CREATE TABLE discipline(
   discipline_id INT AUTO_INCREMENT,
   epreuve_code VARCHAR(10)  NOT NULL,
   epreuve_type VARCHAR(50)  NOT NULL,
   PRIMARY KEY(discipline_id)
);

CREATE TABLE station(
   station_id INT AUTO_INCREMENT,
   station_nom VARCHAR(100)  NOT NULL,
   station_region VARCHAR(100)  NOT NULL,
   station_altitude VARCHAR(250)  NOT NULL,
   PRIMARY KEY(station_id)
);

CREATE TABLE pays(
   pays_code VARCHAR(5) ,
   pays_nom VARCHAR(100)  NOT NULL,
   PRIMARY KEY(pays_code)
);

CREATE TABLE concurrent(
   concur_num_inscrip INT,
   concur_prenom VARCHAR(100)  NOT NULL,
   concur_nom VARCHAR(100)  NOT NULL,
   concur_ddnaissance DATE NOT NULL,
   concur_adresse VARCHAR(250)  NOT NULL,
   concur_cp CHAR(5)  NOT NULL,
   concur_ville VARCHAR(100)  NOT NULL,
   concur_telephone VARCHAR(20)  NOT NULL,
   concur_sexe CHAR(1)  NOT NULL,
   pays_code VARCHAR(5)  NOT NULL,
   PRIMARY KEY(concur_num_inscrip),
   FOREIGN KEY(pays_code) REFERENCES pays(pays_code)
);

CREATE TABLE se_déroule(
   discipline_id INT,
   station_id INT,
   epreuve_date DATE NOT NULL,
   PRIMARY KEY(discipline_id, station_id),
   FOREIGN KEY(discipline_id) REFERENCES discipline(discipline_id),
   FOREIGN KEY(station_id) REFERENCES station(station_id)
);

CREATE TABLE s_occuper(
   resp_matricule INT,
   discipline_id INT,
   PRIMARY KEY(resp_matricule, discipline_id),
   FOREIGN KEY(resp_matricule) REFERENCES responsable(resp_matricule),
   FOREIGN KEY(discipline_id) REFERENCES discipline(discipline_id)
);

CREATE TABLE participer(
   discipline_id INT,
   concur_num_inscrip INT,
   concur_num_dossard VARCHAR(50)  NOT NULL,
   epreuve_temps DECIMAL(4,2)   NOT NULL,
   concur_nombrepoints INT NOT NULL,
   concur_place VARCHAR(50)  NOT NULL,
   concur_medaille VARCHAR(20)  NOT NULL,
   PRIMARY KEY(discipline_id, concur_num_inscrip),
   FOREIGN KEY(discipline_id) REFERENCES discipline(discipline_id),
   FOREIGN KEY(concur_num_inscrip) REFERENCES concurrent(concur_num_inscrip)
);
