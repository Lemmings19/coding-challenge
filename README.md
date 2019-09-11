# A coding challenge presented by Rhombus

This repo contains a solution for a coding challenge presented to potential employees.

The challenge, as provided:

> You may not have used the tools or methods before or you may be completely unfamiliar with the general principles of how it may work, but given some thought and researching the internet, you will find a bunch of information and scripts to solve the problem. You are free to consult the internet for a variety of resources including your data of choice but do mention the github repos if you are copying code for the purpose of solving this problem fast. Copying code from other repos is fine, but it needs to be highlighted and appropriately cited.
>
> We are specifically interested in how you solve the problem and your level of understanding both in terms of general scripting/programming and system level architecture flow, and of course, we are interested if you can teach us something with your thoughts and solution.
>
> Good luck, feel free to email us with questions if things need clarification, and we look forward to talking with you in a couple days!
>
> Technical challenge:
> - Download CodeIgniter PHP framework on your local machine.
> - Install Apache server, my php admin, and NodeJs. Connect all of these to CodeIgniter.
> - Create two simple html pages (Admin.php and User.php), print their unique user id and name, coming from your db. No requirement for generating login or registration.
> - Set two different sessions for these users (Admin and User) in two different pages (Admin.php and User.php).
> - Open these two pages in two different browsers, let’s say, Admin.php in chrome and User.php in firefox.
> - Code a logout button on Admin page. By clicking this button, user’s session should be destroyed immediately. Note that, during this activity, User has no idea what just happened. Your user.php page in firefox should immediately get directed somewhere else.
>
> Once the task is completed, please provide all the files.

# Environment and Libraries

**OS**: Ubuntu 16.04.1 LTS "xenial"

**Server**: Apache 2.4.18

**PHP**: 7.3

**MariaDB**: 10.2.25

**CodeIgniter4 PHP Framework**: 4.x

**Nodejs** (development environment only): 8.16.0

**npm** (development environment only): 6.4.1, plus everything npm manages in `package.json`

**Composer**: 1.9.0

## Server First-Time Setup

### Update pacakges in Ubuntu

```
sudo apt update
sudo apt upgrade
```

### Install PHP 7.3

```
sudo add-apt-repository ppa:ondrej/php
sudo apt update
sudo apt remove php7.0
sudo apt install php7.3
sudo apt install php7.3-intl php7.3-curl php7.3-mbstring php7.3-mysql
```

### Install Git and Clone Repo

Git should already be installed. Perform the following Git setup:

- Config username/email: https://help.github.com/articles/set-up-git/
- Config ssh key: https://help.github.com/articles/generating-a-new-ssh-key-and-adding-it-to-the-ssh-agent/#platform-linux
- Clone the repo: `cd /var/www` `git clone git@github.com:Lemmings19/rhombus-coding-challenge.git`
- Symlink the project for easy access: `ln -s /var/www/rhombus-coding-challenge /home/ubuntu/rhombus-coding-challenge` or wherever the project/home directory is located.

### Install Composer
https://getcomposer.org/download/

You're going to want composer to be easily accessible with a command such as `composer`. To do this, you're going to install the `composer.phar` executable with the name `composer`, and you're going to put it into one of the system paths that exist within PATH. Check what those paths are by running the command `$PATH`. I chose `/home/ubuntu/bin` in this example. You can choose somewhere else.

If you want to add a new path to PATH, edit `/etc/environment` or `/etc/profile`. I chose `/etc/profile`, but I forget why; you can google it. Add the line `PATH="$PATH:$HOME/whatever/path/you/want"`, `$HOME` is your home directory; take it out if you want.

```
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('SHA384', 'composer-setup.php') === 'a5c698ffe4b8e849a443b120cd5ba38043260d5c4023dbf93e1558871f1f07f58274fc6f4c93bcfd858c6bd0775cd8d1') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php --install-dir=/home/ubuntu/bin --filename=composer
php -r "unlink('composer-setup.php');"
```

### Configure Apache

Update the Apache to point to the appropriate index folder `/etc/apache2/sites-available`:
```
    DocumentRoot /var/www/html/rhombus-coding-challenge/public
```

### Install MariaDB

```
sudo apt -y install software-properties-common dirmngr
sudo apt-key adv --recv-keys --keyserver hkp://keyserver.ubuntu.com:80 0xF1656F24C74CD1D8
sudo add-apt-repository 'deb [arch=amd64] http://mirror.zol.co.zw/mariadb/repo/10.3/ubuntu xenial main'

sudo apt update
sudo apt install mariadb-server
```

Login and create the database: `mysql -u root -p` ``CREATE DATABASE `rhombus-coding-challenge`;`` `exit`

### Install phpMyAdmin

`sudo apt install phpmyadmin`

Update the Apache config located at `/etc/apache2/sites-available`:
```
    Alias /phpmyadmin /usr/share/phpmyadmin
```

