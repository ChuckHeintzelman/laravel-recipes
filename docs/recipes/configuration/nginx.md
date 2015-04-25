---
Title:    Creating a Nginx VirtualHost
Topics:   configuration, Nginx
Code:     -
Id:       26
Position: 3
---

{problem}
The default Nginx web page shows for your project.

You have Nginx installed and have created a Laravel project, but the web page returned by your browser is the default Nginx web page.
{/problem}

{solution}
Create a Nginx Virtual Host for your project.

{bash}
laravel:~$ cd /etc/nginx/sites-available
laravel:/etc/nginx/sites-available$ sudo vi myapp
{/bash}

Have the contents of the file match what's below.

{text}
server {
    listen 80;
    server_name myapp.localhost.com;
    root /home/vagrant/projects/myapp/public;
    
    index index.html index.htm index.php;
    
    charset utf-8;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }
    
    location = /favicon.ico { access_log off; log_not_found off; }
    location = /robots.txt  { access_log off; log_not_found off; }

    access_log off;
    error_log  /var/log/nginx/myapp-error.log error;

    sendfile off;

    client_max_body_size 100m;

    location ~ \.php$ {
        fastcgi_split_path_info ^(.+\.php)(/.+)$;
        fastcgi_pass unix:/var/run/php5-fpm.sock;
        fastcgi_index index.php;
        include fastcgi_params;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        fastcgi_intercept_errors off;
        fastcgi_buffer_size 16k;
        fastcgi_buffers 4 16k;
    }

    location ~ /\.ht {
        deny all;
    }
}
{/text}

Save the file, then continue below.

{bash}
laravel:/etc/nginx/sites-available$ cd ../sites-enabled
laravel:/etc/nginx/sites-enabled$ sudo ln -s /etc/nginx/sites-available/myapp
laravel:/etc/apache2/sites-enabled$ sudo service nginx restart
{/bash}

#### Fixing Permissions

If you're running a virtual machine under Vagrant, you may want to change the user and group to avoid permission issues.

To do this:

{bash}
laravel:~$ cd /etc/php5/fpm/pool.d
laravel:/etc/php5/fpm/pool.d$ sudo vi www.conf
{/bash}

Change the `user` and `group` lines to your user and group.

{text}
user = vagrant
group = vagrant
{/text}

Save the file and restart the PHP FastCGI Process Manager.

{bash}
laravel:/etc/php5/fpm/pool.d$ sudo service php5-fpm restart
{/bash}
{/solution}

{discussion}
Nginx has many configuration options.

The configuration above is a basic configuration which works with Laravel. Nginx provides great power and flexibility with it's configuration. Check out the [Nginx Website](http://wiki.nginx.org/Main) for more information.
{/discussion}
