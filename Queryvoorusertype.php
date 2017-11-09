SELECT users.name AS "Gebruikersnaam", users.email AS "Emailadres", user_types.name AS "Gebruikers type" 
FROM users, user_types
WHERE users.user_type_id = user_types.ID;