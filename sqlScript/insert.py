import MySQLdb

# open the database
db = MySQLdb.connect("localhost", "zhang", "zhang", "pingping")

# use cursor to get handle
cursor = db.cursor()
# sql command
# insert multi rows
sqlActivity_name = """INSERT INTO activity
            (activity_name)
         VALUES
            ("Life"),
            ("Work"),
            ("Music"),
            ("Food")
            """
sqlActivity_time = """INSERT INTO activity
            (activity_time)
         VALUES
            (NOW()),
            (NOW()),
            (NOW()),
            (NOW())
      """
sqlActivity_population = """INSERT INTO activity
            (activity_population)
         VALUES
            (1),
            (5),
            (8),
            (2)
            """
sqlActivity_place = """INSERT INTO activity
            (activity_name)
         VALUES
            ("交大"),
            ("华师"),
            ("复旦"),
            ("同济")
      """
sqlActivity_discribe = """INSERT INTO activity_describe
    """
# do not need to add semicolon like standard mysql commands
try:
    #cursor.execute(sqlActivity_time)
    #cursor.execute(sqlActivity_population)
    cursor.execute(sqlActivity_place)
    db.commit()
except:
    # Rollback in case is any error
    db.rollback()
# close the database
db.close()
