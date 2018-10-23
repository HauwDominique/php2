-- Liste des pizzas à insérer dans la BDD:
-- - Reine (img/pizzas/reine.jpd), 8€
-- - Texan, 10€
-- - 4 fromages (img/pizzas/4_fromages.jpg), 9€
-- -végétarienne (img/pizzas/vegetarienne.jpg), 11€
-- -savoyarde, 13€
-- -bolognaise, 10€
-- -cannibale, 11€

--------------select pizza----------------
-- récupère toutes les pizzas
SELECT * FROM `pizza`;

--  récupérer les pizzas dont le prix est inférieur à 10
SELECT name FROM pizza WHERE price<10;
SELECT name FROM pizza HAVING price<10;

--  récupérer les pizzas qui n'ont pas d'image
SELECT name FROM pizza WHERE image is NULL;

--  trier les pizzas de la plus cher à la moins cher
SELECT name FROM pizza ORDER BY price DESC;

--  récupérer 3 pizzas dans un ordre aléatoire
SELECT name FROM pizza ORDER BY RAND() LIMIT 3;

--  compter le nombre de pizzas
SELECT COUNT(id) FROM pizza;

--  récupérer la pizza la plus cher
SELECT name FROM pizza WHERE price = (SELECT MAX(price) FROM pizza);
-- celle ci récupère toutes les pizza les plus cher

SELECT * FROM pizza ORDER BY price DESC LIMIT 1; -- ici ne fonctionne que si 
-- une seule pizza est la plus cher.

--  calculer la moyenne de prix des pizzas
SELECT AVG(price) From pizza;
