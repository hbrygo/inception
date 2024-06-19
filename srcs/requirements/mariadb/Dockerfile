FROM debian:buster

RUN apt-get update && apt-get upgrade -y
RUN apt-get install mariadb-server -y

COPY conf/50-server.cnf	/etc/mysql/mariadb.conf.d/50-server.cnf

COPY tools/script.sh /bin/

RUN chmod +x /bin/script.sh

CMD ["/bin/bash", "-c", "/bin/script.sh && mysqld_safe"]
