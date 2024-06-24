#!/bin/sh

# A small pause is introduced to allow the database service to fully initialize.
sleep 10

# Modifies the PHP-FPM configuration to listen on TCP port 9000 instead of the default Unix socket.
sed -i "s|listen = /run/php/php7.4-fpm.sock|listen = 9000|" /etc/php/7.4/fpm/pool.d/www.conf

# Changes directory to where WordPress should be installed.
cd /var/www/wordpress

# Configures WordPress by creating a wp-config.php file.
# Uses environment variables for database configuration.
wp config create \
        --dbname="${SQL_DATABASE}" \
        --dbuser="${SQL_USER}" \
        --dbpass="${SQL_PASSWORD}" \
        --dbhost="${SQL_DB_HOST}" \
        --allow-root

# Installs WordPress with initial settings for site title, admin account, etc.
wp core install --url="${WP_URL}" \
    --title="${WP_TITLE}" \
    --admin_user="${WP_ADMIN_USER}" \
    --admin_password="${WP_ADMIN_PASSWORD}" \
    --admin_email="${WP_ADMIN_EMAIL}" \
    --allow-root

# Creates an additional WordPress user with specified role.
wp user create "${WP_USER}" "${WP_USER_EMAIL}" \
    --user_pass="${WP_USER_PASSWORD}" \
    --role="${WP_USER_ROLE}" \
    --allow-root

# Starts PHP-FPM to handle PHP requests.
# The -F option runs PHP-FPM in the foreground, and -R applies additional restrictions for improved security.
/usr/sbin/php-fpm7.4 -F -R

