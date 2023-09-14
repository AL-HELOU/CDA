/*
Exercice 1 : création d'une procédure stockée sans paramètre

-Créez la procédure stockée Lst_fournis
-afficher le code des fournisseurs pour lesquels une commande a été passée.
*/

DELIMITER |

CREATE PROCEDURE Lst_fournis()
BEGIN
    SELECT DISTINCT numfou FROM entcom;
END |

DELIMITER ;