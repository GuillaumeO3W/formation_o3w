/*
    Exercice : 
        1. Sélectionnez le nom et le prénom du ou des employé masculin qui gagne plus de 1800
        2. Sélectionnez le nom et le prénom des 3 employés  qui gagne plus et trier par salaire descendant.
        3. Sélectionnez le plus petit salaire aliasé en 'salaireMin'.
        4. Sélectionnez les 4 noms différents des employés et trier par nom ascendant.
        5. Sélectionnez le salaire de l'employé qui n'a pas de service.
        6. Sélectionnez les noms et les prénoms des employés triès par ancienneté, du plus ancien au plus récemment embauché.
        7. Sélectionnez les noms et prénoms des employés du service IT, trié par nom puis prénom.
        8. Sélectionnez le prénom du second employé qui gagne le plus.
        9. Sélectionnez le service de l'employé qui gagne 1800.
        10. Sélectionnez le service dans lequel travaille l'employé qui gagne le plus.
*/ 

-- 1
SELECT `nom`, `prenom` 
FROM `employe`
WHERE `sexe` = 'H' AND `salaire` > 1800;

--2
SELECT `nom`, `prenom` 
FROM `employe`
ORDER BY `salaire` DESC
LIMIT 3;

--3
SELECT `salaire` AS `salaireMin`
FROM `employe`
ORDER BY `salaire` 
LIMIT 1;

--4
SELECT DISTINCT `nom`
FROM `employe`
ORDER BY `nom`;

--5
SELECT `salaire`
FROM `employe`
WHERE  ISNULL(`service`);

--6
SELECT `nom`, `prenom` 
FROM `employe`
ORDER BY `dateContrat`;

--7
SELECT `nom`, `prenom` 
FROM `employe`
WHERE `service` = 'IT'
ORDER BY `nom`, `prenom`;

--8
SELECT `prenom`
FROM `employe`
ORDER BY `salaire` DESC
LIMIT 1,1;

--9
SELECT `service`
FROM `employe`
WHERE `salaire` = 1800;

--10
SELECT `service`
FROM `employe`
ORDER BY `salaire` DESC
LIMIT 1;