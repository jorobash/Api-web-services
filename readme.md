Build by Georgi Georgiev.
october 17, 2017.

--------------------------------------------------------------------------------------------------------------------------------
---The technologies I've used for building this project is XAMP,which includes itself PHP 7.1.4,Apache server,phpmyadmin e.g.  -
--------------------------------------------------------------------------------------------------------------------------------
---for the purpose of the testing of Api I'm using postMan App that you can download from this link https://www.getpostman.com/ -
---------------------------------------------------------------------------------------------------------------------------------
---For IDE I'm use SublimeText 3 -
-------------------------------------------------------------
---This is my first written API,and consists of five files. -
-----------------------------------------------------------------------------
---db.php where is the connection with database I'm using PDO to connected  -
-------------------------------------------------------------------------------------------------
---for the purpose of this project I created a database named restfullapi that have three table -
-------------------------------------------------------------------------------------------------
---you just have to import in phpmyadmin the database file restfullapi.sql -
-----------------------------------------------------------------------------------------------------------------------
---index.php is used to autorized the user and back him the token -
----------------------------------------------------------------------------------
---api.php consists skeleton methods that implement some basic operation of CRUD -
----------------------------------------------------------------------------------------------------------------------------------
---To test GET method in index.php the only thing that needs to be done is in the url in postMan app or in the browser to written ---http://localhost/api/visits and the request will return all data from database in json format -
-----------------------------------------------------------------------------------------------------------------------------------
---To test POST method it's need to use postMan app as an in the url in the app if written http://localhost/api/auth and in 	  -
---the body of postMan written {"username":"verify","password":"passtest"} and send POST request thats will be return the Token in ---json format and in the same time to written the token in database thats actualy shows that the user is autorized otherwise will
---return error Unauthorized
-----------------------------------------------------------------------------------------------------------------------------------
---The file .htaccess just take every request sent to the aplication and sends it to the index.php -
----------------------------------------------------------------------------------------------------
