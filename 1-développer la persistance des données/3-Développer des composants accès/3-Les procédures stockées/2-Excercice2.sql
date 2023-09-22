/*
Exercice 2 : création d'une procédure stockée avec un paramètre en entrée
Créer la procédure stockée Lst_Commandes, qui liste les commandes ayant un libellé particulier dans le champ obscom
*/
DELIMITER |

CREATE PROCEDURE Lst_Commandes(IN observation VARCHAR(50))
BEGIN
    SELECT ligcom.numcom AS 'Numéro de commande',
    nomfou AS 'Nom du fournisseur',
    libart AS 'Libellé de produit',
    qtecde * priuni AS 'Le sous total'
    FROM ligcom
    JOIN produit ON produit.codart = ligcom.codart
    JOIN entcom ON entcom.numcom = ligcom.numcom
    JOIN fournis ON fournis.numfou = entcom.numfou
    WHERE entcom.obscom LIKE CONCAT('%',observation,'%');
END |

DELIMITER ;