# devchallenge
1 - Install Xampp Server for Windows from https://www.apachefriends.org/xampp-files/7.3.7/xampp-windows-x64-7.3.7-0-VC15-installer.exe

2 - After Xampp has downloaded and installed press start on the Apache server and start on the MySQL server.

3 - Once the MySQL Server has started press on the admin button to go to phpmyadmin window. This is where we will set-up the MySQL database for our dev challenge blog site

4 - Once on the phpmyadmin page, click on the import button at the top, then select choose file and the file you will choose is called devchallenge.sql in this Github Repository

5 - Make sure to select these on the import page
-- Check box the Allow the interruption of an import in case the script detects it is close to the PHP timeout limit
-- Check box the Enable foreign key checks
-- Select SQL as the format in the dropdown menu
-- Select SQL Compatability mode is none
-- Check box the Do not use AUTO_INCREMENT for zero values

6 - Now you can press GO at the bottom and if all goes well it created the tables and columns for devchallenge blog site.

7 - Now there is a folder called devchallenge folder you should download that and move it to a folder on your computer called C://xampp/htdocs/

8 - This is the folder that the apache server we started earlier will be using

9 - Now open up Google Chrome browser and go to http://localhost/devchallenge and you should see a page with a directory this was intentional as a debugging method. Now Click on the myhome.php file and the website will open for you and you already have some premade blog posts from our earlier MySQL Import.


Ruby on Rails Developer challenge - OSG
