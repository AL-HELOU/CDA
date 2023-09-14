/*
Exercice 3 : création d'une procédure stockée avec plusieurs paramètres

Créer la procédure stockée CA_ Fournisseur, qui pour un code fournisseur et une année entrée en paramètre
calcule et restitue le CA potentiel de ce fournisseur pour l'année souhaitée
(cette requête sera construite à partir de la requête n°19).

*/

DELIMITER |

CREATE PROCEDURE CA_Fournisseur(
    IN numfourni INT,
    IN annee VARCHAR(50)
    )

BEGIN
    SELECT nomfou AS 'Nom du fournisseur',
    SUM((priuni+(priuni*0.2))*qtecde) AS 'CA 2018'
    FROM fournis F
    JOIN entcom E ON E.numfou = F.numfou
    JOIN ligcom L ON L.numcom = E.numcom
    WHERE F.numfou = numfourni && datcom LIKE CONCAT(annee,'%')
    GROUP BY nomfou
    ORDER BY `CA 2018` DESC;
END |

DELIMITER ;