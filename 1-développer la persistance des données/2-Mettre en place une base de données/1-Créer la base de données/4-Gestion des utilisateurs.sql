USE papyrus;

DROP USER IF EXISTS 'util1'@'%','util2'@'%','util3'@'%';

CREATE USER 'util1'@'%' IDENTIFIED BY 'util1';
CREATE USER 'util2'@'%' IDENTIFIED BY 'util2';
CREATE USER 'util3'@'%' IDENTIFIED BY 'util3';


GRANT ALL PRIVILEGES ON papyrus.* TO 'util1'@'%' WITH GRANT OPTION;
GRANT SELECT ON papyrus.* TO 'util2'@'%';
GRANT SELECT ON papyrus.fournis TO 'util3'@'%';

FLUSH PRIVILEGES;