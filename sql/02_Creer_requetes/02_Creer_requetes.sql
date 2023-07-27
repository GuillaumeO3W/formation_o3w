-- Exercice SQL 
-- 1. Les 10 derniers msg de l'utilisateur d'id =  10  

SELECT *
FROM message
WHERE m_auteur_fk=10
ORDER BY m_date DESC
LIMIT 10

-- ou

SELECT m_id, m_contenu, m_date , m_auteur_fk, m_conversation_fk
FROM message 
LEFT JOIN user 
ON u_id = m_auteur_fk
WHERE u_id=10
ORDER BY m_date DESC
LIMIT 10

-- 2. La liste des utilisateurs triés par age  

SELECT u_nom, u_prenom, u_date_naissance
FROM user
ORDER BY u_date_naissance

-- 3. Les 5 derniers inscrits  

SELECT *
FROM user
ORDER BY u_date_inscription DESC
LIMIT 5

-- 4. Les 20 derniers messages avec l'utilisateur(login) associé et son rang 

SELECT m_contenu, u_login, r_libelle
FROM message 
JOIN user ON m_auteur_fk = u_id
JOIN rang r ON u_rang_fk = r_id
ORDER BY m_date DESC
LIMIT 20

-- 5. Les 5 derniers messages des utilisateurs de rang admin de plus de 18ans  

SELECT *
FROM message 
JOIN user ON m_auteur_fk = u_id
JOIN rang ON u_rang_fk = r_id
-- WHERE r_libelle = 'admin' 
WHERE r_id = 2
AND TIMESTAMPDIFF(YEAR, u_date_naissance, CURDATE()) > 18
ORDER BY m_date DESC
LIMIT 5

-- 6. Les 10 derniers messages avec login+N° de conversation des user agés de 18 à 30 ans 

SELECT m_contenu, u_login, m_conversation_fk, TIMESTAMPDIFF(YEAR, u_date_naissance, CURDATE()) age
FROM message 
JOIN user 
ON m_auteur_fk = u_id 
WHERE TIMESTAMPDIFF(YEAR, u_date_naissance, CURDATE()) BETWEEN 18 AND 30 
ORDER BY m_date DESC
LIMIT 10

-- 7. Afficher la conversation c_id=X avec msg + date msg + prenom + nom   

SELECT m_contenu , m_date, u_prenom, u_nom, c_id
FROM user 
JOIN message ON u_id = m_auteur_fk
JOIN conversation ON m_conversation_fk = c_id
WHERE c_id=1;

-- 8. Afficher les n° de conversations auxquelles a participé l'utilisateur u_id=X entre le DATE et le DATE  

SELECT u_id ,m_conversation_fk
FROM message 
JOIN user ON m_auteur_fk = u_id 
WHERE u_id=10 
    AND m_date BETWEEN '2001-01-01' AND '2014-01-01'
GROUP BY m_conversation_fk

-- 9. Afficher tous les contacts qui ont pris part aux meme conversation que l'utilisateur u_id=X  

SELECT m_auteur_fk, u_login
FROM message 
JOIN user ON m_auteur_fk = u_id
WHERE m_conversation_fk IN (
    SELECT m_conversation_fk 
    FROM message
    JOIN user ON m_auteur_fk = u_id
    WHERE u_id=1
    GROUP BY m_conversation_fk
    )
GROUP BY u_login

-- 10. Liste des users avec le total des msg écrits par conversation  

SELECT m_auteur_fk,m_conversation_fk, COUNT(m_id)
FROM message 
GROUP BY m_auteur_fk, m_conversation_fk
HAVING m_auteur_fk IN (
    SELECT u_id
    FROM user
	)
ORDER BY m_auteur_fk

-- 11. Afficher tous les messages écrits avant la date de conversation 

SELECT *
FROM message
JOIN conversation ON m_conversation_fk = c_id
WHERE m_date < c_date

-- 12. Afficher la liste des users qui n'ont jamais pris part à une conversation non terminée 

                                                    SELECT u_prenom, u_nom, u_id
                                                    FROM user
                                                    JOIN message ON u_id = m_auteur_fk
                                                    JOIN conversation ON m_conversation_fk = c_id
                                                    WHERE m_conversation_fk  NOT IN (
                                                        SELECT m_conversation_fk 
                                                        FROM message
                                                        JOIN conversation ON m_conversation_fk = c_id
                                                        WHERE c_termine = 0
                                                        )
                                                    GROUP BY m_auteur_fk

SELECT u_prenom, u_nom, u_id
FROM user
WHERE u_id  NOT IN (
    SELECT u_id 
    FROM user
    JOIN message ON u_id = m_auteur_fk
    JOIN conversation ON m_conversation_fk = c_id
    WHERE c_termine = 0
    )


-- 13. Afficher les messages écrits par des admins inscrits en 2010 dans une conversation non terminée 

SELECT *
FROM rang 
JOIN user ON r_id = u_rang_fk
JOIN message ON u_id = m_auteur_fk
JOIN conversation ON m_conversation_fk = c_id
WHERE r_libelle = 'admin' 
    AND c_termine = 0 
    AND YEAR(u_date_inscription) = '2010'

-- 14. 5 messages au hasard d'utilisateurs de rang 'none' de moins de 18 ans qui ont écrit un message comportant 3 fois la lettre 'o'  

SELECT *
FROM rang 
JOIN user ON r_id = u_rang_fk
JOIN message ON u_id = m_auteur_fk
JOIN conversation ON m_conversation_fk = c_id
HAVING 
	r_libelle = 'none' 
    AND TIMESTAMPDIFF(YEAR, u_date_naissance, CURDATE()) < 18 
    AND m_contenu LIKE '%o%o%o%'
ORDER BY RAND()
LIMIT 5

-- 15. Afficher les messages écrits après l'écriture du dernier message de l'utilisateur dans les conversations auxquelles il a participé

SELECT *
FROM message
WHERE m_date > (
    SELECT m_date 
    FROM message 
    WHERE m_auteur_fk = 1
    ORDER BY m_date DESC
    LIMIT 1
    )
GROUP BY m_conversation_fk