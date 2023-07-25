/*
    Exercice : 
        1. Sélectionnez le salaire moyen du service IT. Alias salaireMoyenIT
        2. Sélectionnez le salaire moyen (arrondi à un entier) par service. Alias salaireMoyen. Triez par salaire moyen descendant.
        3. Idem -2- mais sans le service NULL.
        4. Sélectionnez le nombre d'employés par service. Alias nb. Tri par nombre descendant puis service ascendant.
        5. Idem -4- mais sans le service NULL.
        6. Idem -5- mais uniquement pour les employés gagnant moins de 15000.
        7. Idem -5- mais uniquement si le nombre est au moins 2.
        8. sélectionnez les employés dont le nom commence par 'Mo'.
*/

--1
SELECT AVG(`salaire`) `salaireMoyenIT`
FROM `employe`
WHERE `service`='IT';

--2
SELECT `service` , ROUND(AVG(`salaire`)) `salaireMoyen`
FROM `employe`
GROUP BY `service`
ORDER BY `salaireMoyen` DESC;

--3
SELECT `service` , ROUND(AVG(`salaire`)) `salaireMoyen`
FROM `employe`
WHERE `service` IS NOT NULL
GROUP BY `service`
ORDER BY `salaireMoyen` DESC;

--4
SELECT `service`,count(*) `nb`
FROM `employe`
GROUP BY `service`
ORDER BY `nb` DESC, `service`;

--5
SELECT `service`,count(*) `nb`
FROM `employe`
WHERE `service` IS NOT NULL
GROUP BY `service`
ORDER BY `nb` DESC, `service`;

--6
SELECT `service`,count(*) `nb`
FROM `employe`
WHERE `service` IS NOT NULL AND `salaire`*12 < 15000
GROUP BY `service`
ORDER BY `nb` DESC, `service`;

--7
SELECT `service`,count(*) `nb`
FROM `employe`
GROUP BY `service`
HAVING `service` IS NOT NULL AND `nb` > 1
ORDER BY `nb` DESC, `service`;

--8
SELECT *
FROM `employe`
WHERE `nom` LIKE 'Mo%';
