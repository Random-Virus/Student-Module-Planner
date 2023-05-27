# Student-Module-Planner
Student Module Planner: An HTML, CSS, and PHP website helping students calculate remaining study hours. Plan, track progress, customize study time, and receive reminders. User-friendly interface for efficient time management. Enhance productivity and achieve academic goals.
How to run the website?

1.Take the whole website to htdocs of xampps
2.Put this statements in the xampp 

-Create a database 

create database scheduleapp;

-Create a table called users

create table users(
name varchar(100),
surname varchar(100),
studentNo varchar(100),
password varchar(100)

);

-Create table courseinfo

create table courseinfo(
studentNo varchar(100),
courseName varchar(100),
courseCode varchar(100),
creds varchar(100),
weeks varchar(100),
startDate date,
classHours varchar(100),
selfStudy varchar(100),
hoursStudied varchar(10)
);



3.Use this link to access the website:localhost/website/index.php


4. once you open the program, the connection between the database and the app will open.


5. IMPORTANT! If you haven't created a profile, locate the link at the bottom of the form writtien "New registration" to create a new profile. If you already have a profile with us,
type in the required credentials on the login page. 

6. Capture your information on the register form and select sign up.

7. Login again. 

8. Once you see the dashboard, select the add new modules on the left to add your modules. 

9. After adding the module, select the my modules tab to see if the changes have propergated. 


