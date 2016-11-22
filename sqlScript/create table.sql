CREATE TABLE activity(
            id INT(10) NOT NULL AUTO_INCREMENT,
            activity_name VARCHAR(50),
            activity_time DATETIME,
            activity_population INT(10) unsigned,
            activity_place VARCHAR(50),
            activity_describe TEXT,
            picture BLOB,
            PRIMARY KEY(id)
            );
			
			
CREATE TABLE user(
                id INT(10) NOT NULL AUTO_INCREMENT,
                user_name VARCHAR(20),
                tel VARCHAR(11),
                qq VARCHAR(20),
                activity_id_initiate INT(11),
                activity_id_join INT(11),
                PRIMARY KEY(id)
                );
				
CREATE TABLE comments(
                 id INT(10) AUTO_INCREMENT,
                 user_id INT(10),
                 time_of_comments DATETIME,
                 content text,
                 PRIMARY KEY(id)
                 );