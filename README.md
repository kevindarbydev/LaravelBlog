# LaravelBlogApp
First things first, we need to create our EC2 instance. Go to the EC2 section of AWS, and press 'Launch instances'. You should now be on a page that looks similar to below.

![Launch Instances page](https://dev-to-uploads.s3.amazonaws.com/uploads/articles/p0bm2rf1q7n48hhgoep4.png)

Name the instance something relevant to your application, or however you'd like. 

For Application Image, select Ubuntu 22.04 (64-bit x86).

![Make sure to select Ubuntu 22.04](https://dev-to-uploads.s3.amazonaws.com/uploads/articles/ns8txoile4un5j01o5pk.png)

We'll choose t2.micro to remain within the free tier.

![Select t2.micro](https://dev-to-uploads.s3.amazonaws.com/uploads/articles/4ml2066zngojnvkgl6sr.png)

Create a key pair and store it in an easily accessible location.

![Create a key pair](https://dev-to-uploads.s3.amazonaws.com/uploads/articles/a6f77y5bfwvf9fowgldd.png)

Create a new security group and allow SSH and HTTP from the internet.

![Use these settings](https://dev-to-uploads.s3.amazonaws.com/uploads/articles/by80t0v4eyq29ihnjbq2.png)


The settings for storage and Advanced details can be left blank. Double-check your configuration and then press 'Launch instance'.

Now, to connect to your instance, return the the 'Instances' page of the EC2 section and find the instance you just created. Select it and press 'Connect'.

![Press Connect in the top right](https://dev-to-uploads.s3.amazonaws.com/uploads/articles/i896oktitupuc40z2zwo.png)

Select 'EC2 Instance Connect' and leave the username as the default, press 'Connect'.

You should now be connected, and see a page like this.

![We are now connected to our server](https://dev-to-uploads.s3.amazonaws.com/uploads/articles/dsr2tado6rjjma7db7ih.png)

Now we're ready to start installing some stuff. Paste the commands below into your terminal, in order. They should all work, as long as you've selected Ubuntu as your AMI. You can copy the command, and then right-click to paste into the AWS Instance Connect terminal.

**Install Nginx**
- sudo apt update

- sudo apt install nginx

- systemctl status nginx (If you see 'active (running)', it's working correctly)

- sudo systemctl restart nginx

- sudo nginx -t

**Install PHP**
- sudo apt update

- sudo apt install --no-install-recommends php8.1

- sudo apt-get install php8.1-cli php8.1-common php8.1-mysql php8.1-zip php8.1-gd php8.1-mbstring php8.1-curl php8.1-xml php8.1-bcmath php8.1-fpm

**Install Composer**
- curl -sS https://getcomposer.org/installer -o /tmp/composer-setup.php
```
- HASH=`curl -sS https://composer.github.io/installer.sig`
```
- echo $HASH

- php -r "if (hash_file('SHA384', '/tmp/composer-setup.php') === '$HASH') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"

- sudo php /tmp/composer-setup.php --install-dir=/usr/local/bin --filename=composer

- composer

**Install MySQL**

- sudo apt update

- sudo apt install mysql-server

- sudo mysql

- ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY 'your password';

Make sure to change 'your password' to your actual password, and save it securely. We'll need it later on.
You can type \q or exit to quit mysql mode.

- sudo systemctl restart nginx

- sudo systemctl restart php8.1-fpm

**Set Permissions for the web server directory**

- sudo mkdir -p /var/www/html/

- sudo chown -R ubuntu:ubuntu /var/www/

Okay! Now we're ready to clone our project onto our server. Let's do so in the home directory by using:

- cd ~

- sudo git clone https://github.com/kevindarbydev/LaravelBlog.git

> or clone the repo for the project you had in mind

From now on I will reference the project folder by 'YourAppName'. Replace YourAppName with the name of your folder. 

- sudo mv YourAppName /var/www/YourAppName

- cd /var/www/

- dir

You should now see this (Calling 'dir' in the var/www/ directory should return your project folder):

![Calling 'dir' in the var/www/ directory should return your project folder](https://dev-to-uploads.s3.amazonaws.com/uploads/articles/eznq50266p7t8w8pc74r.png)

Now we need to set permissions for some laravel-specific folders on the web server (cache + storage).

- sudo chown -R www-data.www-data /var/www/YourAppName/storage

- sudo chown -R www-data.www-data /var/www/YourAppName/bootstrap/cache

- sudo chmod -R ugo+rw /var/www/YourAppName/storage/logs 

> (adds read/write permissions for the owner, group, and others to all files and directories within the storage/logs directory)

- mkdir -p /var/www/YourAppName/storage/framework/{sessions,views,cache} 

> creates three directories (sessions, views, and cache) inside the framework directory

- sudo chmod -R ugo+rw /var/www/YourAppName/storage/framework

> adds read/write permissions for the owner, group, and others to all files and directories within the storage/framework

**Server Configuration**
Now our project files are ready to go. We just need to configure a Nginx server block to serve our files. We'll create a config file in the `etc/nginx/sites-available` directory.
Remember to change 'YourAppName' where appropriate.

- sudo nano /etc/nginx/sites-available/YourAppName

Paste the following into the nano interface. `server_domain_or_IP` can be replaced by the public IPv4 address of your EC2 instance. This can easily be found on the Instance summary in AWS.

```
server {
    listen 80;
    server_name server_domain_or_IP;
    root /var/www/YourAppName/public;

    add_header X-Frame-Options "SAMEORIGIN";
    add_header X-XSS-Protection "1; mode=block";
    add_header X-Content-Type-Options "nosniff";

    index index.html index.htm index.php;

    charset utf-8;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location = /favicon.ico { access_log off; log_not_found off; }
    location = /robots.txt  { access_log off; log_not_found off; }

    error_page 404 /index.php;

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.1-fpm.sock;
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }
}
```

Once you've pasted it, you can do Ctrl+S to save, and then Ctrl+X to exit.

Now to activate our configuration, simply run this command:

- sudo ln -s /etc/nginx/sites-available/YourAppName /etc/nginx/sites-enabled/

While we're at it, let's remove the default configuration:

- sudo rm -f /etc/nginx/sites-enabled/default

You can double check everything is working and ready to go with:

- sudo nginx -t

Apply changes:

- sudo systemctl reload nginx

Visit your project directory on the server and run:

- sudo cp .env.example .env

- sudo nano .env

> Here you can fine tune any required settings for your app. If you've cloned LaravelBlogApp, you'll need to generate an app key:

- composer update

- php artisan key:generate

If you get an error about permissions, try this command:

- sudo chown -R ubuntu:ubuntu /var/www/YourAppName

**Create MySQL Database**

- sudo mysql -u root -p

- CREATE DATABASE your_db_name;

After creating the database, we'll need to update our `.env`.

- sudo nano /var/www/YourAppName/.env

Replace `DB_DATABASE` with the name you entered and replace `DB_PASSWORD` with the password you used when installing MySQL. Afterwards, run these commands:

- php artisan migrate
- php artisan db:seed

- sudo service nginx restart

Visit the public IP of your instance:
`http://YOUR_IP`
Make sure it's http, as some browsers will default to https.

Afterwards, if everything went well, your app should be up and running!

![Woohoo! It's hosted](https://dev-to-uploads.s3.amazonaws.com/uploads/articles/3hybl5maboyyekn2el1p.jpg)

Here are some resources I referred to often while writing this article. Hopefully they can help you too if you get stuck. 

Digital Ocean - https://www.digitalocean.com/community/tutorials/how-to-install-and-configure-laravel-with-lemp-on-ubuntu-18-04

Deploying Laravel to AWS - https://www.linkedin.com/pulse/organized-steps-deploy-laravel-app-ec2-instance-2204-selvanantham/
