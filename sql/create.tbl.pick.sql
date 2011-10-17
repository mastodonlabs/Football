
CREATE TABLE pick (
	a3m_account_id INTEGER REFERENCES a3m_account(id) ,
	game_id INTEGER REFERENCES game(id),
	team_id VARCHAR(3) REFERENCES team(id),
	date TIMESTAMP DEFAULT CURRENT_TIMESTAMP 
);

