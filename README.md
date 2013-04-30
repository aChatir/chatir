How to Install :

    1 - add 127.0.0.1 chatir.loc to hosts file

    2 - add new vhosts to the httpd-vhosts.conf file
        <VirtualHost *:80>
            ServerName chatir.loc
            DocumentRoot C:/wamp/www/Chatir/public
            SetEnv APPLICATION_ENV "development"
            <Directory C:/wamp/www/Chatir/public>
                DirectoryIndex index.php
                AllowOverride All
                Order allow,deny
                Allow from all
            </Directory>
        </VirtualHost>

    3 - run this commande to install all dependency
        - $ cd chatir/
        - $ php composer.phar install
            or
        - $ php composer.phar update


    4 - create a database with the name wegener

    5 - import sql from the wegner.sql file (see chatir/data directory)
        or run this sql :
        DROP TABLE IF EXISTS `foo`;
        CREATE TABLE IF NOT EXISTS `foo` (
          `id` int(11) NOT NULL AUTO_INCREMENT,
          `bar` varchar(255) NOT NULL,
          PRIMARY KEY (`id`)
        ) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
        
    6 - now you can test you app with this url http://chatir.loc/wegener

    7 - done.

I hoppe that is the same as you want :)