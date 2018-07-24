# -*- coding: utf-8 -*-
import easygui as g
import MySQLdb
import Tkinter

def mysql_select():

    db = MySQLdb.connect("localhost", "root", "beijingkaoya", "classmateBook", 3306, charset='utf8')
    cursor = db.cursor()

    sql = "SELECT * FROM classmate"


    try:
        cursor.execute(sql)
        results = cursor.fetchall()
        # print results
        # print type(results)
        # print len(results)
        # print results[0][0]
        for row in results:
            name = row[0]
            address = row[1]
            telephone = row[2]
            wechat = row[3]
            mail = row[4]
            QQ = row[5]
            personalLang = row[6]
        #
            print "name=%s,address=%s,telephone=%s,wechat=%s,mail=%s,QQ=%s,personalLang=%s" % \
                  (name, address, telephone, wechat, mail, QQ, personalLang)
    except:
        print "Error: unable to fecth data"

    db.close()

# def mysql_insert(fieldValues):
#
#     db = MySQLdb.connect("localhost", "root", "beijingkaoya", "classmateBook", 3306, charset='utf8')
#     cursor = db.cursor()
#
#     str_val = ""
#     for i in range(len(fieldValues)):
#         str_val += ('\"' + fieldValues[i] + '\"' + ',')
#     str_val = str_val[:-1]
#     sql = "INSERT INTO classmate(name, address, telephone, wechat, mail, QQ, personalLang) VALUE(" + str_val +")"
#     print sql
#     cursor.execute(sql)
#     db.commit()
#     db.close()

# def add_classmate():
#     msg = "请填写一下信息（其中带*的项为必填)"
#     title = "账号中心"
#     fieldNames = ["*姓名", "*家庭住址", "*电话", "*微信", "*邮箱", "*QQ", "*个性语言"]
#     fieldValues = []
#     fieldValues = g.multenterbox(msg, title, fieldNames)
#
#     while True:
#         if fieldValues == None:
#             break
#         errmsg = ""
#         for i in range(len(fieldNames)):
#             option = fieldNames[i].strip()
#             if fieldValues[i].strip() == "" and option[0] == "*":
#                 errmsg += "【%s】为必填\n" % fieldNames[i]
#         if errmsg == "":
#             break
#         fieldValues = g.multenterbox(errmsg, title, fieldNames, fieldValues)
#     mysql_insert(fieldValues)

mysql_select()
# choice = g.buttonbox(msg="你喜欢下面哪种水果?",title="",choices=("新增同学","查看同学列表"))

# if choice == "新增同学":
#     add_classmate()
# elif choice == "查看同学列表":
#     print "?"

# print "----------------------"


# mysql_select()
# top = Tkinter.Tk()
# Code to add widgets will go here...
# top.mainloop()

print "你好"