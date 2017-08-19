Simple User Manager!
===================

**Using Laravel 5.4 Framework**

----------

Links
-------------
github link - [project on github](https://github.com/hashk99/laravel_userlist_app)
  

Basic Intigration
-------------

download the project and run the composer install / update to get the dependencies into your local environment

Rename **.env.example** file into **.env** 

create a database using your desired software. (use the name mentioned as in .env file. or create a new one and replace the `DB_DATABASE` variable)
update database username & password details on `.env` file `DB_USERNAME` / `DB_PASSWORD` .

run **`php artisan migrate --seed`** to update tables and make a test user profile.

open the project using a virtual host or using the full path. (ex: *localhost/folderpath/public*)

> **Login First:**
> -  login to the system using the test user details or use the Register    function to create a new user profile and start working 
 > -  (Test user email :- testuser@xyz.com)
> -  (Test user password :- secret) 


#### <i class="icon-file"></i> Function Description

List All Users

	This page will show all the Users which currently recorded in the database ordered by ID DESC.

Create new User 

	You can create a new User . Validation rules added as name  field  required.

Edit / Destroy Users

	You can edit / delete Users which you have created. But you won't be able to do these on others Users. Those Edit / Delete buttons will get hide on others Users.

**Contact me if you have any issues.**
Email [hashk99@gmail.com](hashk99@gmail.com)

Some Screenshots
[Screenshots](https://drive.google.com/drive/folders/0B9jxlIpg86p4bS1YTXB6S3NiQnM?usp=sharing)
     
