export UID := $(shell id -u)
export GID := $(shell id -g)
COMPOSE = env UID=$(UID) GID=$(GID) docker compose

.PHONY: up down reset sqitch deploy revert destroy psql install

up:
	$(COMPOSE) up -d --build

down:
	$(COMPOSE) down

reset:
	$(COMPOSE) down -v
	$(MAKE) up

sqitch:
	$(COMPOSE) run --rm sqitch $(ARGS)

deploy:
	$(MAKE) sqitch ARGS='deploy'

revert:
	$(MAKE) sqitch ARGS='revert'

destroy:
	$(MAKE) sqitch ARGS='destroy'

verify:
	$(MAKE) sqitch ARGS='verify'

psql:
	$(COMPOSE) exec postgres psql -U orders -d orders

install:
	$(COMPOSE) run --rm --no-deps --user 0 app chown -R $(UID):$(GID) /app/node_modules
	$(COMPOSE) run --rm --no-deps app npm install --cache /tmp/npm-cache $(ARGS)
