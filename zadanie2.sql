-- На выборку всех категорий верхнего уровня, начинающихся на “авто”
SELECT *
FROM category
WHERE name LIKE 'авто%'
AND parent_category_id IS NULL;


-- На выборку всех категорий, имеющих не более трёх подкатегорий следующего уровня (без глубины)
-- даже если ноль подкатегорий
SELECT c.*
FROM category c
LEFT JOIN category p ON c.id=p.parent_category_id
GROUP BY c.id
HAVING count(p.id) <= 3;
-- хотя бы одна подкатегория
SELECT c.*
FROM category c
LEFT JOIN category p ON c.id=p.parent_category_id
WHERE p.id IS NOT NULL
GROUP BY c.id
HAVING count(p.id) <= 3


-- На выборку всех категорий нижнего уровня (т.е. не имеющих детей)
-- возвращает так же категории верхнего уровня если у них нет потомков
SELECT c.*
FROM category c
LEFT JOIN category p ON c.id=p.parent_category_id
WHERE p.id IS NULL
-- Исключает категории верхнего уровня даже если у них нет потомков
SELECT c.*
FROM category c
LEFT JOIN category p ON c.id=p.parent_category_id
WHERE p.id IS NULL AND c.parent_category_id IS NOT NULL