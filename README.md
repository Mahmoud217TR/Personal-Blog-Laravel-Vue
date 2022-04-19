# Personal Bloger using Laravel & Vue

This project is a simple CRUD bloger were you have an Admin who can post and users which they can comment on posts.


**Table of Contents:**
* [Features](#features)
* [How to Start](#how-to-start)
* [Notes](#notes)


***

![photo 1](/gallery/PB-1.png)
![photo 2](/gallery/PB-2.png)
![photo 3](/gallery/PB-3.png)
![photo 4](/gallery/PB-4.png)
![photo 5](/gallery/PB-5.png)
![photo 6](/gallery/PB-6.png)
![photo 7](/gallery/PB-7.png)
![photo 8](/gallery/PB-8.png)
![photo 9](/gallery/PB-9.png)

***


## Features

* Admin can Create, Update and Delete Posts.
* Users can Create, Update and Delete **Their Own** Comments.
* Admin can Update his own Comments and Delete any Comment.
* CKEditor for Posts & Comments.
* Users & Admin can Update **their Own** Informations in profile.
* Admin has a small dashboard.
* Users & Admin can Like or Favorite a **Post**.
* Users & Admin can Like a **Comment**.


## How to Start

1. First clone this repo, *(you can remove gallery folder it's only for GitHub)*
2. Config the `.env` file.
3. Generate App key using `php artisan key:generate `.
4. Run `composer install` .
5. Run `npm install && npm run dev`.
6. Run `php artisan migrate --seed`.

Now the app is working fine, to login as admin use the email: `admin@users.test` with the following password: `password`.


# Notes

- If you have any modifications feel free to make a pull request.