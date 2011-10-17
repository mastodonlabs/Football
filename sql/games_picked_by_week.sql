
SELECT game.id, a3m_account.username, user_pick.id, CONCAT(away.id, '-', away.name, ' vs. ', home.id, '-', home.name) AS teams, game.date_time 
FROM game 
JOIN team away ON game.away = away.id 
JOIN team home ON game.home = home.id  
JOIN pick ON game.id = pick.game_id  
JOIN team user_pick ON user_pick.id = pick.team_id  
JOIN a3m_account ON pick.a3m_account_id = a3m_account.id  
WHERE week = 1;
