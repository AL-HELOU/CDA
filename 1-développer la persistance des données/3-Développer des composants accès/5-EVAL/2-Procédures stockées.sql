/*
2) Procédures stockées
Codez deux procédures stockées correspondant aux requêtes 9 et 10. Les procédures stockées doivent prendre en compte les éventuels paramètres.
*/


--1- --9- Depuis quelle date le client n’a plus commandé ?
DELIMITER |

CREATE PROCEDURE Date_de_derniere_commande(
    IN companyname VARCHAR(50)
    )

BEGIN
    SELECT MAX(OrderDate) AS 'Date de dernière commande'
    FROM orders O
    JOIN customers C ON C.CustomerID = O.CustomerID
    WHERE CompanyName = companyname;
END |

DELIMITER ;




--2- --10- Quel est le délai moyen de livraison en jours ?
DELIMITER |

CREATE PROCEDURE le_delai_moyen_de_livraison()

BEGIN
    SELECT ROUND(AVG(DATEDIFF(ShippedDate,OrderDate))) AS 'Délai moyen de livraison en jours'
    FROM orders;
END |

DELIMITER ;