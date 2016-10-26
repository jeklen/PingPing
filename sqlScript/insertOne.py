import MySQLdb

db = MySQLdb.connect("localhost", "zhang", "zhang", "pingping")

cursor = db.cursor

sql = """INSERT INTO activity (activity_name , activity_population,
activity_place, activity_describe)
VALUES("eat",  8, "jiaotong", "find a place to eat")"""

sql2 = """Insert INTO activity(activity_name, activity_time, activity_population,
activity_place, activity_describe)
VALUES("浪", NOW(), 8, "南京东路", "逛逛有名的南京路")"""

try:
    cursor.execute(sql)
    cursor.execute(sql2)
    db.commit()
except:
    db.rollback()

db.close()


