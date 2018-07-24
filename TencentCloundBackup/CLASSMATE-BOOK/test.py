# -*- coding: utf-8 -*-
from flask import Flask, request
import MySQLdb
import json
app = Flask(__name__)


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

        listdata = []
        # print "one"
        for row in results:
            one_record = {}
            one_record['name'] = row[0]
            one_record['address'] = row[1]
            one_record['wechat'] = row[2]
            one_record['mail'] = row[3]
            one_record['QQ'] = row[4]
            one_record['personalLang'] = row[5]
            one_record['telephone'] = row[6]
            listdata.append(one_record)
    except:
        print "Error: unable to fecth data"

    db.close()
    return listdata

@app.route('/')
def hello_world():
    listdata = mysql_select()
    senddata = {}
    senddata['data'] = listdata
    columns = []
    onecolumn = {}
    onecolumn['field'] = 'name'
    onecolumn['title'] = 'name'
    columns.append(onecolumn)
    onecolumn = {}
    onecolumn['field'] = 'address'
    onecolumn['title'] = 'address'
    columns.append(onecolumn)
    onecolumn = {}
    onecolumn['field'] = 'telephone'
    onecolumn['title'] = 'telephone'
    columns.append(onecolumn)
    onecolumn = {}
    onecolumn['field'] = 'wechat'
    onecolumn['title'] = 'wechat'
    columns.append(onecolumn)
    onecolumn = {}
    onecolumn['field'] = 'mail'
    onecolumn['title'] = 'mail'
    columns.append(onecolumn)
    onecolumn = {}
    onecolumn['field'] = 'QQ'
    onecolumn['title'] = 'QQ'
    columns.append(onecolumn)
    onecolumn = {}
    onecolumn['field'] = 'personalLang'
    onecolumn['title'] = 'personalLang'
    columns.append(onecolumn)
    senddata['columns'] = columns
    print json.dumps(senddata)
    return 'flightHandler(' + json.dumps(senddata) + ')'

if __name__ == '__main__':
    app.run(debug=True)