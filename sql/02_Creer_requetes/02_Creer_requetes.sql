-- Exercice SQL 
-- 1. Les 10 derniers msg de l'utilisateur d'id =  10  

SELECT *
FROM message
WHERE m_auteur_fk=10
ORDER BY m_date DESC
LIMIT 10

-- ou

SELECT m.m_id, m.m_contenu, m.m_date , m.m_auteur_fk, m.m_conversation_fk
FROM message m
LEFT JOIN user u
ON (u.u_id = m.m_auteur_fk)
WHERE m_auteur_fk=10
ORDER BY m.m_date DESC
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

SELECT m.m_contenu, u.u_login, r.r_libelle
FROM message m
JOIN user u
ON m.m_auteur_fk = u.u_id
JOIN rang r
ON u.u_rang_fk = r.r_id
ORDER BY m.m_date DESC
LIMIT 20

-- 5. Les 5 derniers messages des utilisateurs de rang admin de plus de 18ans  

SELECT *
FROM message m
JOIN user u
ON m.m_auteur_fk = u.u_id AND TIMESTAMPDIFF(YEAR, u.u_date_naissance, CURDATE()) >= 18
JOIN rang r
ON u.u_rang_fk = r.r_id AND r.r_libelle = 'admin'
ORDER BY m.m_date DESC
LIMIT 5

-- 6. Les 10 derniers messages avec login+N° de conversation des user agés de 18 à 30 ans 



-- 7. Afficher la conversation c_id=X avec msg + date msg + prenom + nom   



-- 8. Afficher les n° de conversations auxquelles a participé l'utilisateur u_id=X entre le DATE et le DATE  



-- 9. Afficher tous les contacts qui ont pris part aux meme conversation que l'utilisateur u_id=X  



-- 10. Liste des users avec le total des msg écrits par conversation  



-- 11. Afficher tous les messages écrits avant la date de conversation 



-- 12. Afficher la liste des users qui n'ont jamais pris part à une conversation non terminée 



-- 13. Afficher les messages écrits par des admins inscrits en 2010 dans une conversation non terminée 



-- 14. 5 messages au hasard d'utilisateurs de rang 'none' de moins de 18 ans qui ont écrit un message comportant 3 fois la lettre 'o'  



-- 15. Afficher les messages écrits après l'écriture du dernier message de l'utilisateur dans les conversations auxquelles il a participé


