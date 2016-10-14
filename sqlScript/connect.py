import MySQLdb

# open the database
db = MySQLdb.connect("localhost", username, passwd, dbname)

# use execute to execute sql
cursor = db.cursor()

# use cursor to execute sql command

# create table
# cursor.execute("CREATE DATABASE blogtastic")

# grant the privileges
#cursor.execute("GRANT ALL PRIVILEGES ON blogtastic.* TO zhang")

# create table
sqlCat = """CREATE TABLE categories(
            id TINYINT NOT NULL AUTO_INCREMENT,
            cat VARCHAR(20) NOT NULL,
            PRIMARY KEY(id)
            );
         """
sqlEntries = """CREATE TABLE entries(
                id INT NOT NULL AUTO_INCREMENT,
                cat_id TINYINT NOT NULL,
                dateposted DATETIME,
                subject VARCHAR(100),
                body TEXT,
                PRIMARY KEY(id)
                );
             """
sqlComments = """CREATE TABLE comments(
                 id INT AUTO_INCREMENT,
                 blog_id INT NOT NULL,
                 dateposted DATETIME,
                 name VARCHAR(50),
                 comment TEXT,
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

#cursor.execute(sqlEntries)
#cursor.execute(sqlComments)
#cursor.execute(sqlLogins)

db.close()
