--    EXERCICE 3

--    1. Sélectionnez le prénom des employés qui gagnent plus que le salaire moyen. Tripar prénom ascendant.

SELECT `prenom`
FROM `employe`
WHERE `salaire` > (
    SELECT AVG(`salaire`) FROM `employe`
)
ORDER BY `prenom`;

--        2. Sélectionnez le prénom des employés qui gagnent au moins 40% de plus que le salaire moyen. Tri par prénom ascendant. (moyenne 2237.5€) (3 132,5 €)

SELECT `prenom`
FROM `employe`
WHERE `salaire` >= (
    SELECT AVG(`salaire`)*1.4 FROM `employe`
)
ORDER BY `prenom`;

--        3. Sélectionnez le nom complet (Nom Prénom) alias nomComplet et le nom du service (alias serv) de chaque employé ayant un service. Tri par nom complet ascendant.

SELECT CONCAT(employe.nom,' ',employe.prenom) nomComplet, service.nom serv
FROM `employe`
JOIN `service`
ON employe.idService = service.idService
ORDER BY `nomComplet`;

--        4. Idem -3- mais en affichant l'employé n'ayant pas de service.

SELECT CONCAT(employe.nom,' ',employe.prenom) nomComplet, service.nom serv
FROM `employe`
LEFT JOIN `service`
ON employe.idService = service.idService
ORDER BY `nomComplet`;

--        5. Idem -3- mais en affichant le service qui n'a pas d'employé.

SELECT CONCAT(employe.nom,' ',employe.prenom) nomComplet, service.nom serv
FROM `service`
LEFT JOIN `employe`
ON employe.idService = service.idService
ORDER BY `nomComplet`;

--        6. Idem -3- mais en affichant l'employé qui n'a pas de service et le service qui n'a pas d'employé.

SELECT CONCAT(employe.nom,' ',employe.prenom) nomComplet, service.nom serv
FROM `employe`
LEFT JOIN `service` ON employe.idService = service.idService
UNION
SELECT CONCAT(employe.nom,' ',employe.prenom) nomComplet, service.nom serv
FROM `service`
LEFT JOIN `employe` ON employe.idService = service.idService
ORDER BY `nomComplet`;

--    7. Sélectionnez le prénom des employés (alias emp) et le prénom de leur directeur (alias dir). Tri par prénom des employés.

SELECT employe.prenom emp, directeur.prenom dir
FROM `employe`
JOIN `service`
USING (idService)
JOIN `directeur` 
USING (idDirecteur)
ORDER BY emp;

--    8. Sélectionnez la différence arrondie à un entier entre le salaire moyen des hommes et celui des femmes. Alias diff.

SELECT ROUND(AVG(e1.salaire) - AVG(e2.salaire)) diff
FROM `employe` e1
JOIN `employe` e2
ON e1.sexe = 'H' AND e2.sexe = 'F'

-- ou

SELECT 	ABS(ROUND((
    SELECT AVG(`salaire`) FROM `employe` WHERE `sexe` = 'H'
)-(
    SELECT AVG(`salaire`) FROM `employe` WHERE `sexe` = 'F'
))) diff


--   9. Pour chaque service (sauf celui n'ayant pas d'employé), sélectionnez le nombre d'employés gagnant moins que la moyenne des employés. Alias nb. Tri par nom de service ascendant.

SELECT  service.nom, 
    COUNT(SELECT employe.idEmploye FROM employe WHERE employe.salaire < (
    SELECT AVG(employe.salaire) FROM employe)) nb
FROM service
JOIN employe
USING (idService)
GROUP BY service.nom
ORDER BY  service.nom



--   10. Pour chaque service y compris celui n'ayant pas d'employé, sélectionnez le nombre d'employés. Alias nb. Tri par nom de service ascendant.

SELECT service.idService, service.nom, count(employe.nom) nb
FROM employe
RIGHT JOIN service
ON employe.idService = service.idService
GROUP BY service.nom
ORDER BY  service.nom