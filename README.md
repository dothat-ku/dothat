----
<img src="https://avatars1.githubusercontent.com/u/57694591?s=460&v=4" align="left" height="200" width="200" >

# Dothat


dothat team project at KU (COSE451)

- Team Members: Shon | Yun | Joey | John 


-----
-----
-----
-----
-----
-----
-----
-----
----
## Requirement
- Nginx
- PHP
- Postgresql

## Operating Systems
- Linux Ubuntu (recommended)

## Installitions

* type in terminal

```bash
$ sudo apt-get update
```

----
# Installing Nginx
```bash
$ sudo apt-get install nginx-full
```
* commands

```bash
$ sudo service nginx start | restart | reload | stop | status
```
#### Configuration
* dot to the configuration file and paste the code below
* file could be find on path ```/etc/nginx/site-available/default ```
* don't forget make a path of folder ```root /path/to/the/clone/folder/of/dothat;```

```bash
limit_req_zone $binary_remote_addr zone=one:10m rate=30r/m;


server {
	listen 80 default_server;
	listen [::]:80 default_server;

	# SSL configuration
	listen 443 ssl default_server;
	listen [::]:443 ssl default_server;	
	include snippets/snakeoil.conf;

	root /path/to/the/clone/folder/of/dothat;
	
	index index.php index.html index.htm index.nginx-debian.html;

	server_name _;

	location / {
		try_files $uri $uri/ =404;
	}

	location ~ \.php$ {
		include snippets/fastcgi-php.conf;
		#fastcgi_pass 127.0.0.1:9000;
		fastcgi_pass unix:/run/php/php7.0-fpm.sock;
	}

	location ~ /\.ht {
		deny all;
	}
}
```

---- 
# Installing PHP
```bash
$ sudo apt-get install php7.0-fpm
```
* or 

```bash
$ sudo apt-get install php
```

----
# Installing Postgresql
```bash
$ sudo apt-get install postgresql postgresql-contrib
```
* Usage postgresql guideline given [here](https://www.digitalocean.com/community/tutorials/how-to-install-and-use-postgresql-on-ubuntu-16-04)

* Once you had installed the postgres sign in via command line interface and create a database called ```dothat```. 
```bash
$ psql -U postgres
Password for user postgres: 
psql (9.5.19)
Type "help" for help.
```

* To create database
```bash
CREATE DATABASE dothat;
```
```bash
postgres=# \c dothat
You are now connected to database "dothat" as user "postgres".
dothat=# 
```
* To make a database scheme just import using below code:
```bash
\i /path/to/dothat/SQL_Querry.sql
```


This will make easy connection for web application.

- if there are some confusing parts please just ignoree and try to make attack others' project. Good luck.