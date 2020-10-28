# PA1414
repository for my project in the course PA1414 at bth

description:
This is a meeting scheduling web-application. Its goal is to make it easier and faster to schedule a meeting. 

functions:
*register
*login
*create event
*see overview of past/upcoming events

instructions to use this project:
download this github repository 
download xampp at: https://www.apachefriends.org/xampp-files/7.2.34/xampp-windows-x64-7.2.34-0-VC15-installer.exe
navigate to a folder named 'htdocs'. (the default directory is C:\xampp\htdocs)
place the repository under the htdocs folder

open up xampp
start Apache and MySQL
open a browser and go to: http://localhost/phpmyadmin
in the left taskbar, click on the correct repository (mine is called project)
click on SQL (located on the upper left)
copy-paste everything from the file called ddl.sql (located in subfolder databas)
click run (located in the bottom right)

open a browser and go to: http://localhost/project/php/index.php
then it should be clear how to use the web-scheduler
