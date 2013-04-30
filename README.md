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

    3 - create a database with the name wegener

    4 - import sql from the wegner.sql file

    5 - now you can test you app with this url http://chatir.loc/wegener

    6 - done.

I hoppe that is the same as you want :)