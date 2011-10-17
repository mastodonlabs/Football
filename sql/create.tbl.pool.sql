/*
CREATE TABLE pool (
	id INTEGER PRIMARY KEY AUTO_INCREMENT,
	name VARCHAR(50) NOT NULL,
	date_created DATE,
	created_by INTEGER
);
*/
CREATE TRIGGER trig_pool_insert BEFORE INSERT ON `pool`
    FOR EACH ROW SET NEW.date_created = DEFAULT_DATE;

