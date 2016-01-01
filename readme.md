WebKB Laravel Starter Kit
=========================

#### Starter Kit for Laravel based application used by WebKB.


### Quick Installation

> git pull -v https://gkmahendran09@bitbucket.org/webkb/laravel-starter-kit.git



`composer install`

Copy `.env.example` to `.env` and update your local configuration

`php artisan key:generate`

`npm install`

`grunt`

`chmod -R 777 storage/*`
`chmod -R 777 bootstrap/cache/*`

Copy the contents of `Public` folder to `public_html` and update the path variables
in **index.php**




### Installatio Info

Project setups

Step 1:

Install Composer

curl -sS https://getcomposer.org/installer | php

and then move the file to '/usr/local/bin'.

sudo mv composer.phar /usr/local/bin/composer

Step 2:

Install Git

Ubuntu:
    sudo apt-get update
    sudo apt-get install git
CentOS:
	sudo yum update
	sudo yum install git

	git --version

git config --global user.name "testuser"
git config --global user.email "testuser@example.com"

mkdir /path/to/your/project
cd /path/to/your/project
git init
git remote add origin https://gkmahendran09@bitbucket.org/webkb/webkb.git

Step 3:

Install Laravel

via Composer
composer create-project laravel/laravel blog "5.1.*"

via Laravel Installer
composer global require "laravel/installer"
export PATH="~/.composer/vendor/bin:$PATH"

laravel new blog

Step 4:

Config laravel
give write permission to bootstrap/cache and storage folders
sudo chmod -R 777 bootstrap/cache
sudo chmod -R 777 storage

Generate application key
php artisan key:generate


Step 5:

Install nodejs	-	sudo apt-get install nodejs-legacy
Install npm

install grunt package
sudo npm install -g grunt-cli

npm install

Note:
Ubuntu troubleshoot
sudo apt-get --purge remove node
http://stackoverflow.com/questions/20937313/grunt-command-doesnt-do-anything



Step 6:

Install ruby
Install gem
Install ruby sass

### License

Private
