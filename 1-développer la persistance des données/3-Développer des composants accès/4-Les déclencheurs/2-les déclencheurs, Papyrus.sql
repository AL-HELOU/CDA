/*
----------------------------------------------------------MySql : les déclencheurs, Papyrus---------------------------------------------------------------------

Création d'un déclencheur AFTER UPDATE
Créer une table ARTICLES_A_COMMANDER avec les colonnes :

CODART : Code de l'article, voir la table produit
DATE : date du jour (par défaut)
QTE : à calculer
Créer un déclencheur UPDATE sur la table produit : 
lorsque le stock physique devient inférieur ou égal au stock d'alerte, une nouvelle ligne est insérée dans la table ARTICLES_A_COMMANDER.

Attention, il faut prendre en compte les quantités déjà commandées dans la table ARTICLES_A_COMMANDER .

Pour comprendre le problème :

Soit l'article I120, le stock d'alerte = 5, le stock physique = 20

Nous retirons 15 produits du stock. stock d'alerte = 5, le stock physique = 5, le stock physique n'est pas inférieur au stock d'alerte, on ne fait rien.

Nous retirons 1 produit du stock. stock d'alerte = 5, le stock physique = 4, le stock physique est inférieur au stock d'alerte, nous devons recommander des produits.
Nous insérons une ligne dans la table ARTICLES_A_COMMANDER avec QTE = (stock alerte - stock physique) = 1

Nous retirons 2 produit du stock. stock d'alerte = 5, le stock physique = 2. le stock physique est inférieur au stock d'alerte, nous devons recommander des produits.
Nous insérons une ligne dans la table ARTICLES_A_COMMANDER avec QTE = (stock alerte - stock physique) – quantité déjà commandée dans ARTICLES_A_COMMANDER : QTE = (5 - 2) – 1 = 2
*/


CREATE TABLE articles_a_commander (
	aac_codart char(4) NOT NULL,
    aac_date timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
    aac_qte INT,
    FOREIGN KEY (aac_codart) REFERENCES produit (codart)
);


DELIMITER $
CREATE TRIGGER articles_acommander AFTER UPDATE ON produit
    FOR EACH ROW   
    BEGIN    
        DECLARE qte INT;
        DECLARE dejacommande INT;
        DECLARE qte_a_commander INT;

        SET qte = (SELECT stkale - stkphy FROM produit WHERE codart = NEW.codart);
        SET dejacommande = (SELECT aac_qte FROM articles_a_commander AAC JOIN produit PR ON PR.codart = AAC.aac_codart WHERE codart = NEW.codart);
        IF (dejacommande != null) THEN SET qte_a_commander = qte - dejacommande; ELSE SET qte_a_commander = qte;
        END IF;

        IF (SELECT stkphy FROM produit WHERE codart = NEW.codart)  < (SELECT stkale FROM produit WHERE codart = NEW.codart)
        THEN
            DELETE FROM articles_a_commander WHERE aac_codart = NEW.codart;

            INSERT INTO articles_a_commander (aac_codart, aac_qte)
            VALUES (NEW.codart, qte_a_commander);
        END IF;
END;
$
DELIMITER ;