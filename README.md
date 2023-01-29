Configure VM
1.	apt install apache2
2.	apt install mysql-server
3.	apt install php-8.1 php-curl php-xml
4.	a2enmod ssl
5.	a2enmod rewrite
6.	nano /etc/apache2/apache2.conf
		- go to
			<Directory /var/www>
		- change "AllowOverride" from "none" to "all"
		- change "require all" to "granted"
7.	apt install composer
8.	composer install
9.	copy .env.example to .env
10. Database configure in .env file if require
11.	create apache site conf file
12.	ssl config
13. php artisan test if available