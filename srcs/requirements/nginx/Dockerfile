FROM debian:buster

RUN apt-get update && apt-get upgrade && apt-get install nginx -y

RUN mkdir -p /etc/nginx/ssl
RUN apt-get install openssl -y

RUN openssl req -x509 -nodes -out /etc/nginx/ssl/inception.crt -keyout /etc/nginx/ssl/inception.key -subj "/C=FR/ST=IDF/L=Bruxelles/O=42/OU=42/CN=hubrygo.42.fr/UID=hubrygo"

RUN mkdir -p /var/run/nginx

COPY conf/nginx.conf /etc/nginx/nginx.conf

RUN chmod 755 /var/www/html
RUN chown -R www-data:www-data /var/www/html

EXPOSE 443

CMD ["nginx", "-g", "daemon off;"]
