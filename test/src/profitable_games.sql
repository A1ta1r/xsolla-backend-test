SELECT DISTINCT game
FROM users
WHERE
  level > 10
  AND
  users.id IN (
    SELECT user_id
    FROM payments GROUP BY user_id
    HAVING sum(amount) > 100)