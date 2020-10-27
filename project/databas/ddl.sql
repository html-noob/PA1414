DROP TABLE IF EXISTS vote_event;
DROP TABLE IF EXISTS event_user;
DROP TABLE IF EXISTS event;
DROP TABLE IF EXISTS users;
DROP VIEW IF EXISTS event_view;

CREATE TABLE users 
(
    user_id INT NOT NULL AUTO_INCREMENT,
    first_name VARCHAR(40) NOT NULL,
    email VARCHAR(200) NOT NULL UNIQUE,
    password VARCHAR(100) NOT NULL,
    
    PRIMARY KEY (user_id)
);

CREATE TABLE event
(
    event_id INT NOT NULL AUTO_INCREMENT,
    creator_id INT, -- NOT NULL eller får vara null?
    event_time TIMESTAMP NOT NULL,
    event_location VARCHAR(230),
    event_additional_info VARCHAR(240),
    
    FOREIGN KEY (creator_id) REFERENCES users(user_id),
    PRIMARY KEY (event_id)
);

CREATE TABLE event_user
(
    event_id INT NOT NULL,
    email VARCHAR(200) NOT NULL,
    preferred_time TIMESTAMP NULL DEFAULT NULL,
    
    PRIMARY KEY (event_id, email),
    FOREIGN KEY (event_id) REFERENCES event(event_id)
);

CREATE VIEW event_view AS
	SELECT
	u.email AS host_email,  e.event_time,  e.event_location, e.event_additional_info, eu.email AS invited_email, eu.preferred_time,
    e.event_id, u.user_id AS host_id
	FROM users u
	JOIN event e ON (u.user_id = e.creator_id)
	INNER JOIN event_user eu ON (e.event_id = eu.event_id);

-- test the tables with some data to help me think
/*INSERT INTO USERS 
(first_name, email, password)
VALUES 
("Emil", "emil-wallin@live.se", "catsanddogs123");

INSERT INTO event 
(creator_id, event_time, event_location, event_additional_info)
VALUES 
(1, "1971-01-01 00:00:01", "zoom", "zoom link: 120313213");

INSERT INTO event 
(creator_id, event_time, event_location, event_additional_info)
VALUES
(1, "2019-01-01", "zoom", "zoom link: 120313213");

INSERT INTO event 
(creator_id, event_time, event_location, event_additional_info)
VALUES 
(1, "2019-12-12 15:30", "zoom", "zoom link: 120313213");*/
