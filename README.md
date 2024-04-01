# Highdown Navigator
Are you tired of wandering Highdown School and Sixth Form Centre with no clue where you're going? Too socially inept to ask a fellow pupil or staff member where your building is located? Don't worry! Now you can get a very vague idea of where your classroom is by using this Highdown School Navigator!

Simply click two locations on the campus map and a route will automatically be generated for you! Alternatively, you can select your specific classroom and the map will display a handy marker for which building its in! 

Too lazy to keep checking Class Charts every two minutes for your timetable? Lost your paper list of classes? No problem! Use the built in school timetable generator to create, manage and edit your personal timetable with your subjects, classroom and teacher.

## Building and Install
1. Download this repository
2. Download XAMPP
3. Create a database called 'highdowndb' and create a 'user_form' table, with 'id' (AUTO-INCREMENT), 'name', 'email', 'password' and 'user_type' rows.
4. Launch XAMPP with administrator permissons, and start Apache and MySQL
5. Check connection with localhost

## Bugs
- Problem with Login System; cannot login even with correct password and email
- PHP code warnings shown to the user when incorrect logins / login error occurs
- HTML boxes not centred

## Features to be added
- Replace md5 password hashing with password_hash in PHP for better security
- Send emails to users who register
- 'Forgot Password' email and generator
- Allow users to delete their accounts from the database
- THE ACTUAL TIMETABLE FUNCTIONALITY

Built using Leaflet, Leaflet Routing Machine and XAMPP.

Made for AQA A-Level Computer Science NEA. Put me out of my misery.
