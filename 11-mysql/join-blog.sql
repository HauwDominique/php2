-- Créer une base de données "blogjoin" dans PHPmyAdmin
-- Créer 2 tables artilce et user
-- Dans article, on créé un id, un titre, un auteur (pourra être null)
-- Dans user, on aura un id et un nom


-- Left Join : récupérer tous les articles, anonymes ou non 
--(2 façon de l'écrire, avec ou sans alias)

-- SELECT * FROM article a
-- LEFT JOIN user ON a.author_id = u.id
SELECT * FROM article
LEFT JOIN user ON article.author_id = user.id; --ATTENTION A LA A.KEY qui correspond à la clef article.author_id

-- Left Join : récupérer tous les articles avec author 
SELECT * FROM article
INNER JOIN user ON article.author_id = user.id;

-- RIGTH JOIN user u ON a.author_id = u.id
SELECT * FROM article
RIGHT JOIN user ON article.author_id = user.id;


-- LEFT Join WHERE : récupérer les articles qui n'ont pas d'auteur (anonyme) 
SELECT * FROM article
LEFT JOIN user ON article.author_id = user.id
WHERE user.id IS NULL;

-- RIGTH Join  WHERE : récupérer les auteurs quin n'ont pas écrit d'article
SELECT * FROM article
RIGHT JOIN user ON article.author_id = user.id
WHERE article.id IS NULL;


