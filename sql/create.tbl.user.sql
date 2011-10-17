
CREATE TABLE user (
  id INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT,
  username  VARCHAR(32) NOT NULL,
  real_name VARCHAR(64),
  email VARCHAR(90),
  date_created TIMESTAMP
);



