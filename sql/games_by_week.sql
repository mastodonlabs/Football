
SELECT game.id, CONCAT(away.id, ' - ', away.name) AS Away, 'vs.', CONCAT(home.id, ' - ', home.name) AS home, game.date_time 
FROM game 
JOIN team away ON game.away = away.id 
JOIN team home ON game.home = home.id  
WHERE week = 1;
