/*
3) Mise en place d'une règle de gestion
L'entreprise souhaite mettre en place cette règle de gestion:

Pour tenir compte des coûts liés au transport, on vérifiera que pour chaque produit d’une commande, le client réside dans le même pays que le fournisseur du même produit

Il s'agit d'interdire l'insertion de produits dans les commandes ne satisfaisants pas à ce critère.

Décrivez par quel moyen et avec quels outils (procédures stockées, trigger...) vous pourriez implémenter la règle de gestion suivante.
*/


DELIMITER $
CREATE TRIGGER verifier_pays_fournis_client BEFORE INSERT ON `order details`
    FOR EACH ROW
    BEGIN
        DECLARE client_pays VARCHAR(15);
        DECLARE fournis_pays VARCHAR(15);

        SET client_pays = 
        (SELECT Country from customers C 
        JOIN orders O ON NEW.OrderID = O.OrderID 
        WHERE C.CustomerID = O.CustomerID);

        SET fournis_pays =
        (SELECT S.Country FROM suppliers S
        JOIN products P ON NEW.ProductID = P.ProductID
        WHERE P.SupplierID = S.SupplierID);


        IF client_pays != fournis_pays
        THEN
            SIGNAL SQLSTATE '30000' SET MESSAGE_TEXT = "le client ne réside pas dans le même pays que le fournisseur du produit !";
        END IF;
END;
$
DELIMITER ;