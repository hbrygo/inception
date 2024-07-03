COMPOSE=docker-compose -f srcs/docker-compose.yml
BUILD=$(COMPOSE) build --parallel --no-cache
UP=$(COMPOSE) up -d
DOWN=$(COMPOSE) down
RESTART=$(COMPOSE) down && $(COMPOSE) up -d

.PHONY: all
all: create build up

.PHONY: create
create:
	mkdir -p /home/hubrygo/data/mariadb
	mkdir -p /home/hubrygo/data/wordpress

.PHONY: build
build:
	$(BUILD)

.PHONY: up
up:
	$(UP)

.PHONY: down
down:
	$(DOWN)

.PHONY: restart
restart:
	$(RESTART)

.PHONY: clean
clean:
	$(DOWN) --volumes
	docker rmi $(docker images -a -q)

.PHONY: logs
logs:
	$(COMPOSE) logs -f

.PHONY: re
re: clean all
