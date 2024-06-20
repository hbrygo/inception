sleep 10

# Chemin vers le fichier de configuration de WordPress
WP_CONFIG_PATH='/var/www/wordpress/wp-config.php'

# Vérifier si le fichier wp-config.php existe
if [ -f "$WP_CONFIG_PATH" ]; then
    echo "WordPress est déjà configuré."
else
    echo "Configuration de WordPress..."
    wp config create --allow-root \
    --dbname=$SQL_DATABASE \
    --dbuser=$SQL_USER \
    --dbpass=$SQL_PASSWORD \
    --dbhost=mariadb:3306 --path='/var/www/wordpress'
    echo "Configuration terminée."
fi
