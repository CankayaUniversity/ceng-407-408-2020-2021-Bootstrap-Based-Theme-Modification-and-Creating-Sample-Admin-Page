# Installation Guide

1.  Download XAMPP for Windows from their official site: [https://www.apachefriends.org/download.html](https://www.apachefriends.org/download.html)
2.  Run the installer and select Apache, MySQL and phpMyAdmin
3.  It’s recommended to make the installation in C:\ to avoid issues with Windows User permissions  (or the drive where your Windows is installed)
4.  Open Advanced System Settings  (`System Properties  -> Advanced`)
5.  Open Environment Variables
6.  On the top window select Path and click on Edit
7.  In the new window click on New
8.  We need to enter the path to XAMPP’s PHP  (`C:\xampp\php`)
9.  We will also add MySQL’s Path, click on New again and enter  (`C:\xampp\mysql\bin`)
10.  Download Composer’s Windows .exe installer: [https://getcomposer.org/download/](https://getcomposer.org/download/)
11.  Place the installer and run it from the added to Path directory – `C:\xampp\php`
12.  Open Window’s CMD or PowerShell  (`cd C:\xampp\htdocs`)
13.  Access the MySQL CLI  (`mysql  -u root  -p`)
14.  Create Database for Laravel  (`CREATE DATABASE srmav DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;`)
15.  Edit `.env` file
16.  Clear caches  (`php artisan config:clear`)
17.  Run migartions  (`php artisan migrate`)