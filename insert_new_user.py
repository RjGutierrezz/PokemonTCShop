import sys
import traceback
import logging
import python_db


mysql_username = 'rbg002'  # please change to your username
mysql_password = 'Chu6Tu7a'  # please change to your MySQL password

try:
    python_db.open_database('localhost', mysql_username,
                            mysql_password, mysql_username)  # open database
    res = python_db.executeSelect('SELECT * FROM ITEM;')
    res = res.split('\n')  # split the header and data for printing
    print("<br/>" + "Table ITEM before:"+"<br/>" +
          res[0] + "<br/>"+res[1] + "<br/>")
    for i in range(len(res)-2):
        print(res[i+2]+"<br/>")
        
    # insert into item tables by getting the values passed from PHP
    name = sys.argv[1]
    age = sys.argv[2]
    email = sys.argv[3]

    # Insert new user
    values = "'" + name + "','" + age + "','" + email + "'"
    python_db.insert("User", values)

    print("<br>User successfully added: " + name)

    python_db.close_db()  # close db
except Exception as e:
    logging.error(traceback.format_exc())

