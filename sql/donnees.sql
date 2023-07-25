

-- Requetes SELECT :
SELECT * FROM `employe`;
SELECT `nom` FROM `employe`;
SELECT `nom`, `prenom`,`salaire` FROM `employe`;
SELECT DISTINCT `service` FROM `employe`;
SELECT DISTINCT `service`,`sexe` FROM `employe`;

-- LIMIT
SELECT `prenom` FROM `employe` LIMIT 2;
SELECT `prenom` FROM `employe` LIMIT 2, 3;

-- WHERE
SELECT `prenom` FROM `employe` WHERE `sexe` = 'F';
SELECT `prenom` FROM `employe` WHERE `sexe` != 'F';
SELECT `prenom`, `salaire` FROM `employe` WHERE `salaire` >= 2000;
SELECT `prenom`, `dateContrat` FROM `employe` WHERE `dateContrat` < '2016-01-01';

-- IS NULL
SELECT `prenom` FROM `employe` WHERE `service` IS NULL;
SELECT `prenom` FROM `employe` WHERE `service` IS NOT NULL;
SELECT `prenom` FROM `employe` WHERE ISNULL(`service`);
SELECT `prenom` FROM `employe` WHERE NOT ISNULL(`service`);
SELECT DISTINCT `service` FROM `employe` WHERE `service` != 'Marketing';

-- BETWEEN
SELECT `prenom`,`salaire` FROM `employe` WHERE `salaire` BETWEEN 1500 AND 3000;
SELECT `prenom` FROM `employe` WHERE `prenom` BETWEEN 'A' AND 'F';
SELECT `prenom` FROM `employe` WHERE `prenom` BETWEEN 'A' AND 'Fb';
SELECT `prenom`,`dateContrat` FROM `employe` WHERE `dateContrat` BETWEEN '2015-01-01' AND '2019-12-31';

-- IN (équivaut a un OR)
SELECT prenom FROM employe WHERE salaire IN (1500, 2500)
SELECT prenom FROM employe WHERE nom IN ('Moscet', 'Tascon')
SELECT prenom FROM employe WHERE dateContrat IN ('2012-11-11', '2013-11-11')


-- LIKE
SELECT `nom`, `prenom`,`salaire` FROM `employe` WHERE `nom` LIKE 'M%';
SELECT `nom`, `prenom`,`salaire` FROM `employe` WHERE `nom` LIKE '%E';
SELECT `nom`, `prenom`,`salaire` FROM `employe` WHERE `nom` LIKE 'M%E';
SELECT `nom`, `prenom`,`salaire` FROM `employe` WHERE `nom` LIKE '%E%';
SELECT `nom`, `prenom`,`salaire` FROM `employe` WHERE `salaire` LIKE '_0__';

-- AND
SELECT `nom`, `prenom`,`salaire` FROM `employe` WHERE `sexe` = 'F' AND `salaire` > 2000;
-- OR
SELECT `nom`, `prenom`,`salaire` FROM `employe` WHERE `sexe` = 'F' OR `salaire` > 2000;
-- +, -,*, /, %
SELECT `nom`, `prenom`,`salaire` FROM `employe` WHERE `salaire`*12 < 25000;

-- CONCAT()
SELECT CONCAT(`nom`,' ',`prenom`) FROM `employe`;

-- ALIAS
SELECT CONCAT(`nom`,' ',`prenom`) AS `nomComplet` FROM `employe`;
SELECT CONCAT(`nom`,' ',`prenom`) `nomComplet` FROM `employe`;
SELECT CONCAT(`nom`,' ',`prenom`) `nomComplet`, `salaire` FROM `employe`;
SELECT CONCAT(`nom`,' ',`prenom`) `nomComplet`, `salaire` `salary` FROM `employe`;

-- ALIAS fonctionnne pas avec le WHERE
SELECT CONCAT(`nom`,' ',`prenom`) `nomComplet` FROM `employe` WHERE `nomComplet` LIKE 'M%';
-- ALIAS Fonctionne avec le HAVING
SELECT CONCAT(`nom`,' ',`prenom`) `nomComplet` FROM `employe` HAVING `nomComplet` LIKE 'M%';

-- ORDER BY
SELECT `nom`, `prenom` FROM `employe` ORDER BY `nom`;
SELECT `nom`, `prenom` FROM `employe` ORDER BY `nom`, `prenom`;
SELECT `nom`, `prenom`,`salaire` FROM `employe` ORDER BY `salaire`;
-- ORDER BY ASC (croissant) / ORDER BY DESC (décroissant)
SELECT `nom`, `prenom`,`salaire` FROM `employe` ORDER BY `salaire` DESC;
SELECT `nom`, `prenom`,`salaire` FROM `employe` ORDER BY `sexe` ASC,`salaire` DESC;


-- Fonctions d'agrégation
-- COUNT(col) ne dénombre pas les NULL
SELECT COUNT(`service`) nbService FROM `employe`;
SELECT COUNT(DISTINCT `service`) nbService FROM `employe`;

-- COUNT(*) denombre les NULL
SELECT COUNT(*) `nbEmployes` FROM `employe`;

-- MIN() / MAX() (nombres, chaines de caractères, dates)
SELECT MIN(`salaire`) `salaireMin` FROM `employe`;

SELECT MAX(`nom`) `nomMax` FROM `employe`;

SELECT MAX(`prenom`) `prenomMax` FROM `employe`;

SELECT MAX(`dateContrat`) `dateContratMax` FROM `employe`;
SELECT MIN(`dateContrat`) `dateContratMin` FROM `employe`;

-- SUM()
SELECT SUM(`salaire`) `totalSalaire` FROM `employe`;
SELECT SUM(`salaire`*12) `totalSalaire` FROM `employe`;

SELECT SUM(`salaire`) / COUNT(*) `moyenne` FROM `employe`;

-- AVG() calcul moyenne resultat en FLOAT
SELECT AVG(`salaire`) `moyenne` FROM `employe`;

-- AVG() calcul moyenne avec changement typage en INT grace au CAST()
SELECT CAST(AVG(`salaire`) AS SIGNED INTEGER) `moyenne` FROM `employe`;

-- AVG() calcul moyenne avec changement typage en INT ROUND() plus adapté 
SELECT ROUND(AVG(`salaire`)) `moyenne` FROM `employe`;

-- avec 2 chiffres apres la décimale
SELECT ROUND(AVG(`salaire`),2) `moyenne` FROM `employe`;

-- GROUP BY 
SELECT `sexe`, AVG(`salaire`) `salaireMoyen` FROM `employe` GROUP BY `sexe`;
SELECT `sexe`, ROUND(AVG(`salaire`),2) `salaireMoyen` FROM `employe` GROUP BY `sexe`;

/*
    Ordre des clauses :
    SELECT FROM
    WHERE
    GROUP BY
    HAVING
    ORDER BY
    LIMIT
*/


-- HAVING
SELECT `service`, AVG(`salaire`) `moyenne` 
FROM `employe` 
WHERE `moyenne` > 20000 
GROUP BY `service`; 

SELECT `service`, AVG(`salaire`) `moyenne` 
FROM `employe` 
GROUP BY `service`
HAVING `moyenne` > 2000;

SELECT `service`, AVG(`salaire`) `moyenne` 
FROM `employe` 
WHERE `salaire` > 1800
GROUP BY `service`
HAVING `moyenne` > 2000;


SELECT `sexe`, AVG(`salaire`) `moyenne` 
FROM `employe` 
WHERE `sexe` = 'F'
GROUP BY `sexe`

SELECT `sexe`, AVG(`salaire`) `moyenne` 
FROM `employe` 
GROUP BY `sexe`
HAVING `sexe` = 'F'


-- JOIN : jointure interne
SELECT employe.nom, employe.prenom, service.nom nomService
FROM `employe`, `service`

SELECT employe.nom, employe.prenom, service.nom nomService
FROM `employe`, `service`
WHERE employe.idService = service.idService;

SELECT employe.nom, employe.prenom, service.nom nomService
FROM `employe`
JOIN `service`
ON employe.idService = service.idService;

-- on peut intervertir le nom des tables pour from et join pour les jointures internes
SELECT employe.nom, employe.prenom, service.nom nomService
FROM `service`
JOIN `employe`
ON employe.idService = service.idService;

-- clé primaire et clé étrangère portent le même nom
SELECT employe.nom, employe.prenom, service.nom nomService
FROM `service`
JOIN `employe`
USING(idService);

-- Ici ne fonctionne pas car nous avons 2 colonnes qui portent le meme nom : idService et nom 
-- fonctionnerait si nous avions préfixé nos colonnes (ex: emp_nom, serv_nom) car il y aurait eu que la colonne idService en commun
SELECT employe.emp_nom, employe.prenom, service.nom nomService
FROM `employe`
NATURAL JOIN `service`



-- jointure externes : LEFT JOIN et RIGHT JOIN

-- LEFT JOIN : on inclut les données communes + les données de la table se trouvant à gauche du mot clé JOIN, ici la table employe 
SELECT employe.nom, employe.prenom, service.nom nomService
FROM `employe`
LEFT JOIN `service`
USING(idService);

-- RIGHT JOIN :  on inclut les données communes + les données de la table se trouvant à droite du mot clé JOIN, ici la table service 
SELECT employe.nom, employe.prenom, service.nom nomService
FROM `employe`
RIGHT JOIN `service`
USING(idService);


-- Dans une jointure externe , l'ordre des tables a une importance et donc les 2 requêtes suivantes produisent le même résultat.
SELECT employe.nom, employe.prenom, service.nom nomService
FROM `employe`
LEFT JOIN `service`
USING(idService);

SELECT employe.nom, employe.prenom, service.nom nomService
FROM `service`
RIGHT JOIN `employe`
USING(idService);

-- Par habitude/usage/général la jointure LEFT est la plus utilisée.
-- Pour avoir les deux (LEFT ET RIGHT en même temps) pour les autres SGBD (ex: oracle) il y a le FULL JOIN mais pas dans MySQL il faudra utiliser UNION.


-- alias de table
SELECT e.nom, e.prenom, s.nom nomService
FROM `employe` e
LEFT JOIN `service` s
USING(idService);


-- jointures externes entre plus de 2 tables
SELECT CONCAT(employe.nom, ' ', employe.prenom) AS emp , service.nom AS nomService, CONCAT(directeur.nom, ' ', directeur.prenom) AS dir
FROM `employe`
LEFT JOIN `service`
USING(idService)
LEFT JOIN directeur
USING(idDirecteur)

-- Attention a l'ordre des jointures. c'est impossible d'aller directement de employe à directeur, il faut obligatoirement passer par service.


-- Jointure réflexive 
SELECT CONCAT(e1.nom, ' ', e1.prenom) AS emp , CONCAT(e2.nom, ' ', e2.prenom) AS dir
FROM `employe` AS e1
JOIN `employe` AS e2
ON e1.idDirecteur = e2.idEmploy


-- sous-requetes
SELECT nom, prenom, salaire
FROM employe
HAVING salaire > (
    SELECT AVG(salaire) FROM employe
)

-- les sous-requetes peuvent quasiment tout le temps remplacer par un JOIN 
SELECT e1.nom, e1.prenom, e1.salaire
FROM employe e1
JOIN employe e2
GROUP BY e1.idEmploye
HAVING e1.salaire > AVG(e2.salaire)

SELECT nom 
FROM employe 
WHERE prenom IN (
    SELECT prenom FROM directeur
)


-- UNION
-- les unions de requetes permettent d'assembler les résultats de plusieurs requetes.
SELECT nom, prenom FROM employe
UNION
SELECT nom, prenom FROM directeur
ORDER BY nom, prenom 

-- REGLES 
-- les différentes clauses SELECT doivent sélectionner le même nombre de colonne
-- une seule clause ORDER BY portant uniquement sur les colonnes de la premiere requete.
-- dans le résultat, le nom des colonnes seront ceux de la premiere requete

-- les doublons sont éliminés 
SELECT nom FROM employe
UNION
SELECT nom FROM directeur
ORDER BY nom

-- Mais pas avec le mot clé ALL
SELECT nom FROM employe
UNION ALL
SELECT nom FROM directeur
ORDER BY nom
