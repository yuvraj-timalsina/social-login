
# Laravel Socialite (Social Login)

 Laravel Socialite Login Demo.



## Installation

Clone the project using SSH or HTTPS.

```bash
git@github.com:yuvraj-timalsina/social-login.git
```
    
## Run Locally

Go to the Project Directory

```bash
cd social-login
```
Create and configure the Database

```bash
sudo mysql -u <username> -p
create database social_login;
```
Install Dependencies

```bash
composer install
```

Generate Application Key

```bash
php artisan key:generate
```

Run the Database Migrations

```bash
php artisan migrate
```

Run the Server

```bash
php artisan serve
  
http://127.0.0.1:8000
```


## Creating OAuth App (Links)
GitHub
```bash
https://docs.github.com/en/developers/apps/building-oauth-apps/creating-an-oauth-app
```
Facebook
```bash
https://developers.facebook.com/docs/development/create-an-app
```
Twitter
```bash
https://developer.twitter.com/en/apps
```
## Adding Other Providers

Add following details in config/services.php
```bash
'facebook' => [
            'client_id' => env('FACEBOOK_CLIENT_ID'),
            'client_secret' => env('FACEBOOK_CLIENT_SECRET'),
            'redirect' => env('FACEBOOK_CALLBACK_URL'),
        ],
'twitter' => [
            'client_id' => env('TWITTER_CLIENT_ID'),
            'client_secret' => env('TWITTER_CLIENT_SECRET'),
            'redirect' => env('TWITTER_CALLBACK_URL'),
        ],
```
## Configure .env
Add the following credentials from the OAuth App in .env file

```bash
FACEBOOK_CLIENT_ID=
FACEBOOK_CLIENT_SECRET=
FACEBOOK_CALLBACK_URL=

TWITTER_CLIENT_ID=
TWITTER_CLIENT_SECRET=
TWITTER_CALLBACK_URL=
```
## Add Route with Provider
```bash
<a href="{{route('oauth.redirect', ['provider'=>'facebook'])}}">Login via Facebook</a>
```
## Author

- [@yuvraj-timalsina](https://www.github.com/yuvraj-timalsina)
