#!/bin/sh

# start maria db service
service mariadb start

# execute next commands as root
mariadb -v -u root <<EOF

CREATE DATABASE IF NOT EXISTS $SQL_DATABASE;

CREATE USER IF NOT EXISTS '$SQL_USER'@'%' IDENTIFIED BY '$SQL_PASSWORD';

GRANT ALL PRIVILEGES ON $SQL_DATABASE.* TO '$SQL_USER'@'%';

GRANT ALL PRIVILEGES ON $SQL_DATABASE.* TO 'root'@'%' IDENTIFIED BY '$SQL_ROOT_PASSWORD';

SET PASSWORD FOR 'root'@'localhost' = PASSWORD('$SQL_ROOT_PASSWORD');

FLUSH PRIVILEGES;

EOF

# wait 5 sec that everything is done 
sleep 5

# stops maria db service , needs to be started from docker compose
service mariadb stop

# Exécute all comands fron file
exec "$@"

