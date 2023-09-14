-- 1-modif_reservation : interdire la modification des réservations (on autorise l'ajout et la suppression).
DELIMITER $
CREATE TRIGGER modif_reservation AFTER UPDATE ON reservation
    FOR EACH ROW
    BEGIN
    SIGNAL SQLSTATE '45000'
    SET MESSAGE_TEXT = 'la modification des réservations n\'est pas autorisé !';
    END;
$
DELIMITER ;

UPDATE reservation set res_prix = 40.00 WHERE res_id = 8;



-- 2-insert_reservation : interdire l'ajout de réservation pour les hôtels possédant déjà 10 réservations.
DELIMITER $
CREATE TRIGGER insert_reservation AFTER INSERT ON reservation
    FOR EACH ROW
    BEGIN
        IF (SELECT COUNT(`Le nom de l’hôtel`) FROM `liste_reservation` LR/*liste_reservation est une VUE*/ 
        JOIN reservation R ON R.res_id = LR.`ID de la réservation` 
        WHERE R.res_cha_id = NEW.res_cha_id)  > 10
        THEN
            SIGNAL SQLSTATE '40000' SET MESSAGE_TEXT = "l'hôtels posséde déjà 10 réservations!";
        END IF;
END;
$
DELIMITER ;

INSERT INTO reservation (res_cha_id, res_cli_id, res_date, res_date_debut, res_date_fin, res_prix, res_arrhes)
VALUES (1, 1, '2023-03-20', '2023-03-25', '2023-03-30', 1000, 333);




-- 3-insert_reservation2 : interdire les réservations si le client possède déjà 3 réservations.
DELIMITER $
CREATE TRIGGER insert_reservation2 AFTER INSERT ON reservation
    FOR EACH ROW
    BEGIN
        IF (SELECT COUNT(res_cli_id) FROM reservation WHERE res_cli_id = NEW.res_cli_id)  > 3
        THEN
            SIGNAL SQLSTATE '35000' SET MESSAGE_TEXT = "le client possède déjà 3 réservations !";
        END IF;
END;
$
DELIMITER ;

INSERT INTO reservation (res_cha_id, res_cli_id, res_date, res_date_debut, res_date_fin, res_prix, res_arrhes)
VALUES (1, 1, '2023-03-20', '2023-03-25', '2023-03-30', 1000, 333);






-- 4-insert_chambre : lors d'une insertion, on calcule le total des capacités des chambres pour l'hôtel
-- si ce total est supérieur à 50, on interdit l'insertion de la chambre.
DELIMITER $
CREATE TRIGGER insert_chambre AFTER INSERT ON chambre
    FOR EACH ROW
    BEGIN
        IF (
            SELECT SUM(`cha_capacite`) FROM chambre CH
            JOIN hotel H ON H.hot_id = CH.cha_hot_id
            WHERE CH.cha_hot_id = NEW.cha_hot_id
        ) > 50
        THEN
            SIGNAL SQLSTATE '30000' SET MESSAGE_TEXT = "le total des capacités des chambres de cet hotel est supérieur à 50 !";
        END IF;
END;
$
DELIMITER ;

INSERT INTO chambre (cha_hot_id, cha_numero, cha_capacite, cha_type)
VALUES (1, 333, 30, 1);





/*
Cas pratique
Création de la base de données de test.

Travail à réaliser
Mettez en place ce trigger, puis ajoutez un produit dans une commande, vérifiez que le champ total est bien mis à jour.

Ce trigger ne fonctionne que lorsque l'on ajoute des produits dans la commande, les modifications ou suppressions ne permettent pas de recalculer le total. Modifiez le code ci-dessus pour faire en sorte que la modification ou la suppression de produit recalcul le total de la commande.

Un champ remise était prévu dans la table commande. Prenez en compte ce champ dans le code de votre trigger.
*/
DELIMITER $
CREATE TRIGGER maj_total_afterinsert AFTER INSERT ON lignedecommande
    FOR EACH ROW
    BEGIN
        DECLARE id_c INT;
        DECLARE tot DOUBLE;
        SET id_c = NEW.id_commande; -- nous captons le numéro de commande concerné
        SET tot = (SELECT sum(prix*quantite) FROM lignedecommande WHERE id_commande=id_c); -- on recalcul le total
        UPDATE commande SET total=tot WHERE id=id_c; -- on stocke le total dans la table commande
        UPDATE commande SET remise = 10 WHERE id=id_c;
END;
$
DELIMITER ;

DELIMITER $
CREATE TRIGGER maj_total_afterupdate AFTER UPDATE ON lignedecommande
    FOR EACH ROW
    BEGIN
        DECLARE id_c INT;
        DECLARE tot DOUBLE;
        SET id_c = NEW.id_commande; -- nous captons le numéro de commande concerné
        SET tot = (SELECT sum(prix*quantite) FROM lignedecommande WHERE id_commande=id_c); -- on recalcul le total
        UPDATE commande SET total=tot WHERE id=id_c; -- on stocke le total dans la table commande
        UPDATE commande SET remise = 10 WHERE id=id_c;
END;
$
DELIMITER ;

DELIMITER $
CREATE TRIGGER maj_total_afterdelete AFTER DELETE ON lignedecommande
    FOR EACH ROW
    BEGIN
        DECLARE id_c INT;
        DECLARE tot DOUBLE;
        SET id_c = OLD.id_commande; -- nous captons le numéro de commande concerné
        SET tot = (SELECT sum(prix*quantite) FROM lignedecommande WHERE id_commande=id_c); -- on recalcul le total
        UPDATE commande SET total=tot WHERE id=id_c; -- on stocke le total dans la table commande
        UPDATE commande SET remise = 10 WHERE id=id_c;
END;
$
DELIMITER ;


INSERT INTO lignedecommande (id_commande, id_produit, quantite, prix) 
VALUES(2,2,3,20);

UPDATE lignedecommande
SET quantite = 4 WHERE id_commande = 1;

DELETE FROM lignedecommande
WHERE id_produit = 3;