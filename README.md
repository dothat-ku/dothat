<img src="https://avatars1.githubusercontent.com/u/57694591?s=460&v=4" align="left" height="130" width="130" >

</br>

# **dothat_KU(COSE451-00)**

</br></br>

### **Team Members:**
- Shon 
- Yun
- Joey
- John

-----

# Requirement
- **PHP** (7.0 or above)
- **Postgresql**
- Nginx (optional)

# Operating Systems
- Linux Ubuntu (recommended * (16.04 or above))

# Installitions

* type in terminal

```sh
$ sudo apt-get update
```

----
## Installing Nginx (optional)
```sh
$ sudo apt-get install nginx-full
```
* commands

```sh
$ sudo service nginx start | restart | reload | stop | status
```

---- 
## Installing PHP*
```sh
$ sudo apt-get install php-fpm php-pgsql php-mysql
```
* or 

```sh
$ sudo apt-get install php
```
### Configure Nginx to Use the PHP Processor
* Open the Nginx default server block by typing the below command in the terminal
```sh
sudo nano /etc/nginx/site-available/default
```
* first, add index.php file so that index.php file can be served
```sh
index index.php index.html index.htm index.nginx-debian.html;
```

* uncomment the following lines from the file
```sh
location ~ \.php$ {
		include snippets/fastcgi-php.conf;
		#fastcgi_pass 127.0.0.1:9000;
		fastcgi_pass unix:/run/php/php7.0-fpm.sock;
	}

	location ~ /\.ht {
		deny all;
```

* Change the root to make a path to your dothat folder: ```root /path/to/the/clone/folder/of/dothat;```
* Your file should look something like this at the end
```sh
server {
	listen 80 default_server;
	listen [::]:80 default_server;

	# SSL configuration
	listen 443 ssl default_server;
	listen [::]:443 ssl default_server;	
	include snippets/snakeoil.conf;

	root /home/john/dothat-master/dothat
	
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
* save the file and check if everything is working fine by running the following commands
```sh
sudo nginx -t
```
* If everything works fine then reload the server by typing below the line in the terminal
```sh
sudo systemctl reload nginx
```

* reload and restart nginx server configurations with :
```sh
$ sudo service nginx reload
$ sudo service nginx restart
```

----
## Installing Postgresql*
```sh
$ sudo apt-get install postgresql postgresql-contrib
```
#### change to root user

```sh
sudo su
```

#### login and connect as default user
```sh
sudo -u postgres psql
```
* If this is successful, skip to the changing the password section
* If you recieved an error stating that database "postgres" doesn't exist, try connecting to template1 and if successful, continue to changing the password
```sh
sudo -u postgres psql template1
```

#### Authentication Error
* You need to go to the config file, typically located at ```/etc/postgresql/#.#/main/pg_hba.conf ```
* To check the #.# run the following code
```sh
ls /etc/postgresql/
```
* The number that appears after running that code will replace the #.# part of the location
* For example:
```sh
sudo nano /etc/postgresql/10/main/pg_hba.conf
```
* Change
```sh
   local   all             all                                     peer
```
* to
```sh
  local   all             all                                     md5
```
* then restart the server
```sh
sudo service postgresql restart
```

#### Changing Password*
* With an extablished connection to Postgres, issue to ```ALTER USER``` command to change the password for the ```postgres``` user
```sh
postgres=# ALTER USER postgres PASSWORD 'myPassword';
ALTER ROLE
```
* To exit psql client use the \q command
```sh
\q
```

* You can now load into postgres
```sh
$ psql -U postgres
Password for user postgres: 
psql (9.5.19)
Type "help" for help.
```


## Creating Database*
* To create database
```sh
CREATE DATABASE dothat;
```
* Connect to dothat
```sh
postgres=# \c dothat
You are now connected to database "dothat" as user "postgres".
dothat=# 
```

* To make a database scheme just import using below code:
```sh
\i /path/to/dothat/SQL_Querry.sql
```
This will makes easy connection with web application.

----

## Connection : dothat &rightarrow; postgreSQL*

- Change database password configuration in project ```dothat/load.php ```  where ```'your_db_password' to your current postgres``` to your current postgres password. Open file ```load.php``` with any text editor.
```php
// definition of DB connection
define(DB_HOST, 'localhost');
define(DB_PORT, '5432');
define(DB_PASSWD, 'your_db_password');
define(DB_USER, 'postgres');
define(DB_NAME, 'dothat');
```

-----

# Usage :

### options :

* If `nginx` successfuly installed useage :  open your browser and type ```localhost``` or ```127.0.0.0.1```

* Otherwise go to the folder of `cloned_project_folder/dothat/dothat/` and open terminal by **right click  &rightarrow; Open in Terminal** and type `php -S localhost:7654` and open your browser and type ```localhost:7654``` or ```127.0.0.0.1:7654```
 
-----

