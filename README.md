
## About the project

This project is part of UnitedRemote's process hiring, it's a backend test :
- I used the PHP framework Laravel which I'm the most comfortable with.
- For the authentication part I used Laravel's package Passport.
- For the Github API, I used this [endpoint](https://github-trending-api.now.sh/repositories?since=monthly) which I found in this repository : 
 **[github-trending-api](https://github.com/huchenme/github-trending-api)**

 
## How to run the project

 - Clone the project to your machine,
 - Copy the `.env.example` to `.env` and edit the DB config values, like : `port`, `host`, `password` ... (Note: the db is required to store registered users)
 - Run ``composer install``
 - To generate the app key, run `php artisan key:generate`
 - To run the API use : `php artisan serve`

## About the solution implemented
  The github API doesn't include a way to get a list of trending repos, but there are some implementations that use techniques of web scraping
 to get the data from github website's page. I used this [endpoint](https://github-trending-api.now.sh/repositories?since=monthly) which is based on [github trending repos page](https://github.com/trending) .
 This endpoint return only 25 repos, which is not what has been asked (100), but the logic is the same.
 
 ## How to use 
 I have added some screen shots of how to use this API, enjoy :) 
 - [Register](public/img/register.png)
 - [Login](public/img/login.png)
 - [Get list of Languages](public/img/list.png)
