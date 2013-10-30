##  Hyfn's defualt Laravel Project 
Basically what the name states. This can serve as the starter project for all future laravel projects. 

## Setup ##

### Step 1: Get the code
#### Option 1: Git Clone

	git clone git@github.com:hyfn/avon-skeleton.git

#### Option 2: Download the repository

	https://github.com/hyfn/laravel-skeleton/archive/master.zip

### Step 2: Use Composer to install dependencies
#### Option 1: Composer is not installed globally

    cd laravel-skeleton
	curl -s http://getcomposer.org/installer | php
	php composer.phar install
#### Option 2: Composer is installed globally

    cd laravel-skeleton
	composer install

If you haven't already, you might want to make composer be installed globally for future ease of use.

### Step 3: Configure Local Environment

Update VHOST/HOSTS file settings for your project, the domain can be anything you choose as long as it starts or ends with local, this will ensure the use of the local config files you will be creating.

Now that you have Laravel 4 installed, you need to update the file ***app/config/local/database.php***  to contain the db user credentials that are used for this project and  ***app/config/local/app.php*** for basic app settings:
    
    mkdir app/config/local
    cp app/config/database.php app/config/local/
    cp app/config/app.php app/config/local/

Open ***app/config/local/database.php*** and update your db credentials
Open ***app/config/local/app.php***  and update the 'url' config to use whatever url you are using for your environment

### Step 3: Setup permissions ###

Your webserver needs to be able to write to the cache storage

    chown -R youruser:www-data .
    
### Step 4: Run the init (just refreshes the app) ###

    php artisan cms:init --env=local
This will output the randomly generate password for your "admin" user, after the seeder succeeds.
    
## Laravel PHP Framework

[![Latest Stable Version](https://poser.pugx.org/laravel/framework/version.png)](https://packagist.org/packages/laravel/framework) [![Total Downloads](https://poser.pugx.org/laravel/framework/d/total.png)](https://packagist.org/packages/laravel/framework) [![Build Status](https://travis-ci.org/laravel/framework.png)](https://travis-ci.org/laravel/framework)

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as authentication, routing, sessions, and caching.

Laravel aims to make the development process a pleasing one for the developer without sacrificing application functionality. Happy developers make the best code. To this end, we've attempted to combine the very best of what we have seen in other web frameworks, including frameworks implemented in other languages, such as Ruby on Rails, ASP.NET MVC, and Sinatra.

Laravel is accessible, yet powerful, providing powerful tools needed for large, robust applications. A superb inversion of control container, expressive migration system, and tightly integrated unit testing support give you the tools you need to build any application with which you are tasked.

## Official Documentation

Documentation for the entire framework can be found on the [Laravel website](http://laravel.com/docs).

### Contributing To Laravel

**All issues and pull requests should be filed on the [laravel/framework](http://github.com/laravel/framework) repository.**

### License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
