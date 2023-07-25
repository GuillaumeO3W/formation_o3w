 /*Exercices WWW.SQL.SH – Base de données des villes de France*/

-- EXOS 1
/* 1- Obtenir la liste des 10 villes les plus peuplées en 2012 */

SELECT `ville_nom ,ville_population_2012 `
FROM `villes_france `
ORDER BY `ville_population_2012` DESC 
LIMIT 10;

/* 2- Obtenir la liste des 50 villes ayant la plus faible superficie */

SELECT `ville_nom, ville_surface` 
FROM `villes_france `
ORDER BY `ville_surface` ASC 
LIMIT 50;

/* 3- Obtenir la liste des départements d’outres-mer, c’est-à-dire ceux dont le numéro de département commencent par “97” */

SELECT `ville_nom, ville_departement `
FROM `villes_france `
WHERE `ville_departement` LIKE '97%';

/* 4- Obtenir le nom des 10 villes les plus peuplées en 2012, ainsi que le nom du département associé */

SELECT `ville_nom`, `ville_population_2012`, `ville_departement, departement_nom` 
FROM `villes_france `
INNER JOIN `departement` ON `ville_departement` = `departement_code` 
ORDER BY `ville_population_2012` DESC 
LIMIT 10;

/* 5- Obtenir la liste du nom de chaque département, associé à son code et du nombre de commune au sein de ces département, en triant afin d’obtenir en priorité les départements qui possèdent le plus de communes */

SELECT `departement_nom`, `ville_departement`,count(`ville_id`) 
FROM `villes_france`
INNER JOIN `departement` ON `ville_departement` = `departement_code ` 
GROUP BY `ville_departement`
ORDER BY count(`ville_id`) DESC;

/* 6- Obtenir la liste des 10 plus grands départements, en terme de superficie */

SELECT  `departement_nom`,`ville_departement`, SUM(`ville_surface`) AS `dep_surface`
FROM `villes_france`
INNER JOIN `departement` ON `ville_departement` = `departement_code ` 
GROUP BY `ville_departement`
ORDER BY `dep_surface` DESC
LIMIT 10

/* 7- Compter le nombre de villes dont le nom commence par “Saint” */

SELECT count(`ville_nom`) AS 'villes_commançant_par_saint'
FROM `villes_france`
WHERE `ville_nom_reel` LIKE 'Saint%'

/* 8- Obtenir la liste des villes qui ont un nom existants plusieurs fois, et trier afin d’obtenir en premier celles dont le nom est le plus souvent utilisé par plusieurs communes */

SELECT count(`ville_nom`), `ville_nom`
FROM `villes_france`
GROUP BY `ville_nom`
ORDER BY count(`ville_nom`) DESC

/* 9- Obtenir en une seule requête SQL la liste des villes dont la superficie est supérieur à la superficie moyenne */

SELECT `ville_nom`,`ville_surface`
FROM `villes_france`
WHERE `ville_surface` > (SELECT AVG(`ville_surface`) FROM `villes_france`)

/* 10- Obtenir la liste des départements qui possèdent plus de 2 millions d’habitants */

SELECT `ville_departement`, SUM(`ville_population_2012`) AS `population_dep`
FROM `villes_france`
GROUP BY `ville_departement`
HAVING `population_dep` > 2000000

/* 11- Remplacez les tirets par un espace vide, pour toutes les villes commençant par “SAINT-” (dans la colonne qui contient les noms en majuscule) */
UPDATE `villes_france` 
SET `ville_nom` = REPLACE(`ville_nom`,'-',' ');


----------------------------------
-- EXOS 2---Système de commandes
--1.    Obtenir l’utilisateur ayant le prénom “Muriel” et le mot de passe “test11”, sachant que l’encodage du mot de passe est effectué avec l’algorithme Sha1.
SELECT * 
FROM `client` 
WHERE `prenom`='Muriel' AND `password`=SHA1('test11');

--2.    Obtenir la liste de tous les produits qui sont présent sur plusieurs commandes.
SELECT `nom` 
FROM `commande_ligne`
GROUP BY `nom`
HAVING count(`nom`) > 1;

--3.    Obtenir la liste de tous les produits qui sont présent sur plusieurs commandes et y ajouter une colonne qui liste les identifiants des commandes associées.
SELECT `nom`, GROUP_CONCAT(`reference`)
FROM `commande_ligne`, `commande`
GROUP BY `nom`
HAVING count(`nom`) > 1;

--4.    Enregistrer le prix total à l’intérieur de chaque ligne des commandes, en fonction du prix unitaire et de la quantité.
UPDATE `commande_ligne` 
SET `prix_total`= `quantite`*`prix_unitaire`

--5.    Obtenir le montant total pour chaque commande et y voir facilement la date associée à cette commande ainsi que le prénom et nom du client associé.
SELECT `prenom`,`client`.`nom`,`date_achat`, SUM(`prix_total`)
FROM `commande_ligne`
INNER JOIN `commande` ON `commande`.`id` = `commande_id`
INNER JOIN `client` ON `client`.`id` = `commande_id`
GROUP BY `commande_id`;

--6.    (difficulté très haute) Enregistrer le montant total de chaque commande dans le champ intitulé “cache_prix_total”.


--7.    Obtenir le montant global de toutes les commandes, pour chaque mois.


--8.    Obtenir la liste des 10 clients qui ont effectué le plus grand montant de commandes, et obtenir ce montant total pour chaque client.


--9.    Obtenir le montant total des commandes pour chaque date.


--10.   Ajouter une colonne intitulée “category” à la table contenant les commandes. Cette colonne contiendra une valeur numérique.


/*11.   Enregistrer la valeur de la catégorie, en suivant les règles suivantes :
            “1” pour les commandes de moins de 200€
            “2” pour les commandes entre 200€ et 500€
            “3” pour les commandes entre 500€ et 1.000€
            “4” pour les commandes supérieures à 1.000€.  */


--12.   Créer une table intitulée “commande_category” qui contiendra le descriptif de ces catégories.


--13.   Insérer les 4 descriptifs de chaque catégorie au sein de la table précédemment créée.


--14.   Supprimer toutes les commandes (et les lignes des commandes) inférieur au 1er février 2019. Cela doit être effectué en 2 requêtes maximum.
