FROM debian:buster

# Ajouter le dépôt de sury.org pour obtenir PHP 7.4
RUN apt-get update -y && apt-get install -y \
    gnupg \
    apt-transport-https \
    lsb-release \
    ca-certificates \
    wget && \
    echo "deb https://packages.sury.org/php/ $(lsb_release -sc) main" | tee /etc/apt/sources.list.d/sury-php.list && \
    wget -qO - https://packages.sury.org/php/apt.gpg | apt-key add -

# Mettre à jour les listes de paquets et installer les paquets nécessaires
RUN apt-get update -y && apt-get install -y \
    wget \
    php7.4 \
    php7.4-fpm \
    php7.4-mysql \
    mariadb-client

# Télécharger WordPress
RUN wget https://fr.wordpress.org/wordpress-6.0-fr_FR.tar.gz -P /var/www

# Décompresser WordPress et configurer les permissions
RUN tar -xzf /var/www/wordpress-6.0-fr_FR.tar.gz -C /var/www && \
    rm /var/www/wordpress-6.0-fr_FR.tar.gz && \
    chown -R root:root /var/www/wordpress

# Créer le répertoire pour PHP-FPM
RUN mkdir -p /run/php

# Télécharger et configurer WP-CLI
RUN wget https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar && \
    chmod +x wp-cli.phar && \
    mv wp-cli.phar /usr/local/bin/wp

# Copier le script dans le conteneur
COPY ./tools/script.sh /bin/wp-script.sh
RUN chmod +x /bin/wp-script.sh

# Définir le point d'entrée
ENTRYPOINT ["sh", "/bin/wp-script.sh"]

