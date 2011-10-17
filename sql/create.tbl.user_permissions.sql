
--
-- Roles: user, pool_admin, site_admin
--

CREATE TABLE role (
	id INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT,
	name VARCHAR(20) NOT NULL,
	edit_pool ENUM('Y', 'N') DEFAULT 'N'
);

CREATE TABLE user_roles (
  a3m_account_id INTEGER,
  role_id INTEGER
);




