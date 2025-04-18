import sys
import traceback
import logging
import python_db
import random

mysql_username = 'rbg002'  # please change to your username
mysql_password = 'Chu6Tu7a'  # please change to your MySQL password

try:

    python_db.open_database('localhost', mysql_username, mysql_password, mysql_username)  # open database
    # print("database is open")
    # res = python_db.executeSelect('SELECT * FROM User;')
    # res = res.split('\n')  # split the header and data for printing
    # print("<br/>" + "Table User before:"+"<br/>" +
    #       res[0] + "<br/>"+res[1] + "<br/>")
    # for i in range(len(res)-2):
    #     print(res[i+2]+"<br/>")
        
    # insert into item tables by getting the values passed from PHP

    action = sys.argv[1]
    
    if(action == "add user"):
        userID = random.randint(0, 999)
        formatted = f"{userID:03}"

        name = sys.argv[2]
        age = sys.argv[3]
        email = sys.argv[4]


        # Insert new user
        values = f"{formatted}, '{name}', {age}, '{email}'"
        python_db.insert("User", values)

        print("<br>User successfully added: " + name)

    python_db.close_db()  # close db
except Exception as e:
    logging.error(traceback.format_exc())
