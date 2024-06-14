
FROM debian:latest

RUN apt update && apt upgrade && apt install -y \
	nginx

COPY default /etc/nginx/sites-avaible/.

CMD ["nginx", "-g", "daemon off;"]
