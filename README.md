# Volunteering Wales (Laravel 9)

Repository: [volunteering-wales](https://github.com/3ev/volunteering-wales)

We are using [laravel sail](https://laravel.com/docs/9.x/sail), click on the link for full documentation for sail.

Php version is 8.1, MySQL version 8.0

We will be updating the packages throughout development and also once in production.

---

## Table of Contents
1. [Introduction](#section-1)
2. [Prerequisites](#section-2)
    + 2.1 [Download Docker](#section-2-1)
    + 2.2 [Git Prehooks](#section-2-2)
    + 2.3 [Sail Alias](#section-2-3)
3. [Installation](#section-3)
    + 3.1 [Composer](#section-3-1)
    + 3.2 [Env file](#section-3-2)
    + 3.3 [Starting Sail](#section-3-3)
    + 3.4 [Composer & NPM](#section-3-4)
    + 3.5 [Additional Notes](#section-3-5)
4. [MySQL Client Set-Up](#section-4)
    + 4.1 [Local Databases](#section-4-1)
5. [Xdebug Set-Up](#section-5)
6. [Redis](#section-6)
7. [Mail](#section-7)
8. [MeiliSearch](#section-8)
9. [File Storage](#section-9)
10. [Testing](#section-10)
11. [Sharing](#section-11)
12. [SSR](#section-12)
13. [Deployment](#section-13)
    + 13.1 [Connecting to Vapor/AWS](#section-13-1)
    + 13.2 [ENV](#section-13-2)
    + 13.3 [Deploying](#section-13-3)
---

<a name="section-2"></a>
## 2. Prerequisites

<a name="section-2-1"></a>
### 2.1 Download Docker:

Download docker desktop: https://www.docker.com/products/docker-desktop

<a name="section-2-2"></a>
### 2.2 Git prehooks:

run

```bash
nano .git/hooks/pre-commit
```

and then add:

```
#!/bin/bash
./artisan git:pre-commit
```

and save the file.

This will ensure when you are about to commit, it will run linter & tests before you commit the code to the repository.

<a name="section-2-2"></a>
### 2.3 Sail Alias (Optional):

Sail has already been installed. Almost all commands to Laravel need to be prefixed with ./vendor/bin/sail
or consider adding aliases to your local env.

**Important:** the file you need to add/edit may be different depending on your shell that's installed on your computer

```bash
sudo nano  ~/.zshrc
```

then add on a new line:

```alias sail='bash vendor/bin/sail'```

save, quit and then run

```bash
source ~/.zshrc
```

---

<a name="section-3"></a>
## 3. Installation

<a name="section-3-1"></a>
### 3.1 Composer:

```bash
composer install
```

<a name="section-3-2"></a>
### 3.2 .env

```bash
cp .env.example .env
```


```bash
php artisan key:generate
```
<a name="section-3-3"></a>
### 3.3 Starting Sail:

Build and start laravel sail:

```bash
./vendor/bin/sail up -d
```

-d flag runs it in background

or simply: ```sail up -d``` if you added alias.

<a name="section-3-4"></a>
### 3.4 Composer && NPM:

run this
```bash
sail composer update
```

in a separate terminal:
```bash
sail npm install && sail npm run dev
```

navigate to the URL http://localhost

<a name="section-3-5"></a>
### 3.5 Additional Notes

```bash
sail stop                  # stop containers

sail composer require      # install backend packaged
sail npm install           # install frontend packages

sail npm run dev           # compile js and css

sail artisan               # list available artisan commands
sail artisan route:clear   # clear cached routes
sail artisan config:clear  # clear cached config
sail artisan cache:clear   # clear cache
sail artisan view:clear    # clear cached views

sail artisan route:cache   # create a route cache file for faster route registration
sail artisan config:cache  # create a cache file for faster configuration loading
sail artisan view:cache    # compile all of the application's Blade templates

sail artisan test          # running tests

sail shell                 # ssh onto the app container
sail root-shell            # ssh with root privileges
sail restart               # restart server

sail pint                  # to run linting
```

Run ```sail``` to see all options available to you.

**Important Dont forget to re run  sail npm dev after up/restarting your sail environment**

Please note that although you can run npm install /composer install etc on your local machine - due to PHP/other differences
the package version installed may be different it is recommended to use sail <command> to install packages

---

<a name="section-4"></a>
## 4. MySQL Client Set-Up

<a name="section-4-1"></a>
### 4.1 Local Databases
Create a new TCP/IP connection in your MySQL Client application on your local machine with the following parameters:
- Name: volunteering-wales (anything you like)
- MySQL Host: 127.0.0.1
- Username: root
- Password: (Leave empty)
- Database: laravel
- Port: 33062

---

<a name="section-5"></a>
## 5 Xdebug

Read the following:
General: https://laravel.com/docs/9.x/sail#debugging-with-xdebug
CLI: https://laravel.com/docs/9.x/sail#xdebug-cli-usage
Browser: https://laravel.com/docs/9.x/sail#xdebug-browser-usage


If you are using mac/windows you don't need to worry about
your private docker IP address as you can use the following hostnames:
```
# Use docker.for.mac.localhost - for OS X
# Use docker.for.win.localhost - for Windows

SAIL_XDEBUG_MODE=develop,debug,coverage
SAIL_XDEBUG_CONFIG="client_host=docker.for.mac.localhost"
```

VSCode example:
```json
{
    "version": "0.2.0",
    "configurations": [
        {
            "name": "Listen for Xdebug",
            "type": "php",
            "request": "launch",
            "port": 9003,
            "pathMappings": {
                "/var/www/html": "${workspaceFolder}",
            },
            "hostname": "localhost",
            "ignore": ["**/vendor/**/*.php"],
            "xdebugSettings": {
                "max_data": 65536,
                "show_hidden": 1,
                "max_children": 100,
                "max_depth": 3
            }
        }
    ]
}
```

---

<a name="section-6"></a>
## 6 Redis
it is installed by default & I don't think you need to use it on the CLI.

---

<a name="section-7"></a>
## 7 Mail
By default, mails will be visible at: http://localhost:8025

---

<a name="section-8"></a>
## 8 MeiliSearch
By default, mails will be visible at: http://localhost:7700

---

<a name="section-9"></a>
## 9 File Storage
Locally to simulate S3, we will use MinIO - this is already configured. this means we dont have to create a test
bucket on S3.

This is available at: http://localhost:8900, username/pass are sail/password
login and create a bucket named 'volunteering-wales'

---

<a name="section-10"></a>
## 10 Testing

There is a commit pre-hook to run tests after you have done git commit -m "message".. and it will run all the tests.
So while testing please only run applicable tests (using group or test suite or just test class name.)

to run tests:

```bash
sail artisan test --group orders
```

or
```bash
sail artisan test --testsuite orders
```

---

<a name="section-11"></a>
## 11 Sharing Site/Web hooks

```bash
sail share
```

In TrustProxies middleware:

```
protected $proxies = '*';
```
---
<a name="section-12"></a>
## 12 SSR

SSR is implemented by using an external package called SideCar, what this does is use a lambda to handle SSR requests

```bash
sail artisan sidecar:deploy --activate
```

This will deploy changes to the lambda

<a name="section-13"></a>
## 13 Deployment
For deployment, we are using a first party tool called vapor that takes away the complexities of working with AWS. It uses a .yml file
where we can make changes before deploying and it will do the rest. For example want a storage? just add a line to yml (you'll have to create storage first though in AWS).
more info can be found [here](https://docs.vapor.build/1.0/introduction.html)

> ATM, we are using vapor's free offering so there are SOME limits, like we cannot have more than one env, cant have custom domains etc

<a name="section-13-1"></a>
### 13.1 Connecting To Vapor/AWS

Go to https://vapor.laravel.com/, and create a free personal account. I'll add you to this sandbox account, 
after which you will need to run this:

```bash
vapor login
```

or if you prefer, use my account (let me know so I can give you my login)

and then run:

```bash
vapor team:current
```
and if you are not in the 3ev team context, use 

```bash
vapor team:switch
```
and choose the 3ev team context

> You can also manage the DBs, Caching etc directly FROM vapor UI 

<a name="section-13-2"></a>
### 13.2 ENV
Sometimes you will need to change env files. To do so run:

```bash
vapor env:pull production
```

a file will be created on your local machine (.env.production), 
edit this file and then add 

```bash
vapor env:push production
```
You'll also need to deploy (see next section)

**Please do not add/edit any of the database, caching, URL etc related env files. Only**  

if you would like to view ALL env, you will need to access AWS Lambda -> click on configuration. But any changes to core .env might be overwritten by the scripr

<a name="section-13-3"></a>
### 13.3 actually deploying

to deploy you need to do run from root folder

```bash
vapor deploy production
```

This will run a script and upload all your stuff to AWS. 

