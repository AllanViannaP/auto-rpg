# Auto RPG 
> Status: In development 🕒


## **About**:

The purpose of this website is to create an environment for tabletop RPG games, featuring map control, dice rolling, a chat system, a shared file library among users, user systems with titles, and many other features. 

## **Technologies used**:
* [Laravel](https://laravel.com/)
* [PHPMyAdmin](https://www.phpmyadmin.net/)
* [JQuery](https://jquery.com/)
* [Bootstrap](https://getbootstrap.com/)
* [Composer](https://getcomposer.org/)
  
## **How to connect the server**
>  It is recommended to use [Linux](https://linuxmint.com/) for development.

### Step 1

Clone the project 
```
    git clone https://github.com/AllanViannaP/auto-rpg.git
```
Make sure you're on the desired branch before proceeding.


### Step 2

Rename the .env.example file to .env and enter the required information in it.
> [!WARNING]
> Don't forget to configure the database settings.

### Step 3

Inside the project install the **composer** dependencies
```
   composer install 
```

### Step 4

First, create the database, and then use migrations and seeders to populate it.
Run
```
php artisan migrate
```
And after 
```
php artisan db:seed --class=Titles
```

### Step 5

To finish, start the server using the command:
```
php artisan serve
```
