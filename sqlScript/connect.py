import MySQLdb

# open the database
db = MySQLdb.connect("localhost", "zhang", "zhang", "pingping")

# use execute to execute sql
cursor = db.cursor()
# create database

# use cursor to execute sql command

# create database
#cursor.execute("CREATE DATABASE pingping")

# grant the privileges
# cursor.execute("GRANT ALL PRIVILEGES ON pingping.* TO zhang")

# delete table
cursor.execute("DROP TABLE categories")

# create table
sqlActivity = """CREATE TABLE activity(
            id INT(10) NOT NULL AUTO_INCREMENT,
            activity_name VARCHAR(50),
            activity_time DATETIME,
            activity_population INT(10) unsigned,
            activity_place VARCHAR(50),
            activity_describe TEXT,
            picture BLOB,
            PRIMARY KEY(id)
            );
         """
sqlUser= """CREATE TABLE user(
                id INT(10) NOT NULL AUTO_INCREMENT,
                user_name VARCHAR(20),
                tel VARCHAR(11),
                qq VARCHAR(20),
                activity_id_initiate INT(11),
                activity_id_join INT(11),
                PRIMARY KEY(id)
                );
             """
sqlComments = """CREATE TABLE comments(
                 id INT(10) AUTO_INCREMENT,
                 user_id INT(10),
                 time_of_comments DATETIME,
                 content text,
                 PRIMARY KEY(id)
                 );
              """

sqlLogins = """CREATE TABLE logins(
               id TINYINT AUTO_INCREMENT,
               username VARCHAR(10) NOT NULL,
               password VARCHAR(10) NOT NULL,
               PRIMARY KEY(id)
               );
            """

cursor.execute(sqlActivity)
cursor.execute(sqlComments)
cursor.execute(sqlUser)

db.close()
