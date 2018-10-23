-- insertion de taille de pizza
-- S(0), M(0.99), L(1.99), XL(2.99)

-- ajouter les relations dans la table "pizza_has_size"
-- pizza_id / size_id
--         1/   1
--         1/   2
--         1/   3
--         1/   4
--         2/   1
--         2/   2
--         2/   3

-- récuperer toutes les pizzas avec leurs différentes tailles

SELECT * FROM pizza
INNER JOIN pizza_has_size ON pizza_has_size.pizza_id = pizza_id
INNER JOIN size ON pizza_has_size.size_id = size_id;

-- on afficher et on classe les pizzas pr prix total (prix pizza + prix taille)

SELECT *, (pizza.price + size.price) as Total FROM pizza
INNER JOIN pizza_has_size ON pizza_has_size.pizza_id = pizza_id
INNER JOIN size ON pizza_has_size.size_id = size_id
ORDER BY pizza.id, size.id ASC;

