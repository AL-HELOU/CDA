DELIMITER $
CREATE TRIGGER verifier_pays_fournis_client AFTER INSERT ON `order details`
    FOR EACH ROW
    BEGIN
        IF  
        THEN
            SIGNAL SQLSTATE '30000' SET MESSAGE_TEXT = "le client ne réside pas dans le même pays que le fournisseur du produit !";
        END IF;
END;
$
DELIMITER ;


