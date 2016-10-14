import MySQLdb

# open the database
db = MySQLdb.connect("localhost", username, passwd, dbname)

# use cursor to get handle
cursor = db.cursor()
# sql command
# insert multi rows
# do not need to add semicolon like standard mysql commands
sql = """INSERT INTO categories
            (cat)
         VALUES
            ("Life"),
            ("Work"),
            ("Music"),
            ("Food")
      """
try:
    cursor.execute(sql)
    db.commit()
except:
    # Rollback in case is any error
    db.rollback()
# close the database
db.close()
