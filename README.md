# Blogger's Home Page

![Laravel](https://img.shields.io/badge/laravel-%23FF2D20.svg?style=for-the-badge&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/php-%23777BB4.svg?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/mysql-%2300f.svg?style=for-the-badge&logo=mysql&logoColor=white)
![TailwindCSS](https://img.shields.io/badge/tailwindcss-%2338B2AC.svg?style=for-the-badge&logo=tailwind-css&logoColor=white)
![HTML5](https://img.shields.io/badge/html5-%23E34F26.svg?style=for-the-badge&logo=html5&logoColor=white)
![DigitalOcean](https://img.shields.io/badge/DigitalOcean-%230167ff.svg?style=for-the-badge&logo=digitalOcean&logoColor=white)

This is a blogger web app for only one registered user who is both the blogger and admin. Public users can read the articles posted, and select which article he/she wishes to read by navigating on the main page. The admin and blogger can manage categories, tags as well as the articles themselves.

This project is an answer to the **[Laravel Roadmap: Beginner Level Challenge](https://github.com/LaravelDaily/Laravel-Roadmap-Beginner-Challenge)**.

This project has been taken offline on Oct. 17th, 2023. The server is minimal: 10GB SSD, 0.5GB RAM. Yet the queries are performant. Images below:

![main page](/gitimages/image01.png)

![article editing page](/gitimages/image02.png)

## Instalation

### Forge Install

Deploy the server and the code. Run the command `php artisan db:seed`. Schedule the unused image cleansing job with this command (or similar): `php /home/forge/default/artisan app:purge-garbage-images` to run every minute or whenever.

### Local Install

Create a new MySQL schema. Name it according to your .env file. Run the command `php artisan migrate --seed`. Optional: Schedule the unused image cleansing command with `php artisan app:purge-garbage-files` to run every minute or whenever. Run this app as usual.

*It is crucial to run at least the UserSeeder, to seed the database with the only user.* That user is described in the `.env` / `.env.example` file.

*It is not necessary to run the command* `php artisan storage:link`*.*
