import mysql.connector
from mysql.connector import Error
from mysql.connector import errorcode
import pdfplumber
import pandas as pd

# check for all files.
# Open Pdf
pdf = pdfplumber.open("७_१२ENGLISH.pdf")
SurveyNo = int(1)
SurveyNo = -1
flag = int(2)
flag = 0
# read All pages
let = float
i=int
i=0
for page in pdf.pages:
    tables = page.extract_tables()  # Extract all table from each page

    break
c=str
b=str
a=str(10)
a=str(tables)
d=str
b=a[200:400]
c=b[50:100]
d=c[24:40]
e=int(d[13:16])
print(e)
sno=int
#for i in range(50):
 #   print('loop begins')
 #   if(c[i]=='G'):
  #     d=c[i+29:i+31]
   # break
try:
    connection = mysql.connector.connect(host='localhost',
                                         database='agriculture',
                                         user='root',
                                         password='')
    sno=int
    mySql_insert_query = ("select Survey_No from farmerinfo where name='me'")
    cursor = connection.cursor()
    cursor.execute(mySql_insert_query)
    records = cursor.fetchall()
    print("Total number of rows in Laptop is: ", cursor.rowcount)

    print("\nPrinting each laptop record")
    for row in records:
        print("Id = ", row[0], )
        sno=row[0];
        print(sno)
        sno=1
        if e==sno:

            mySql_insert_query = ("update farmerinfo set user='valid' where name='me'")
            cursor = connection.cursor()
            cursor.execute(mySql_insert_query)
        else:
            mySql_insert_query = ("update farmerinfo set user='invalid' where name='me'")
            cursor = connection.cursor()
            cursor.execute(mySql_insert_query)
    connection.commit()
    #print(cursor.rowcount, "Record inserted successfully into pdf tabl

#except mysql.connector.Error as error:
    #print("Failed to insert record into pdf table {}".format(error))

finally:
    if (connection.is_connected()): 
        connection.close()
        print("MySQL connection is closed")

