COMPOSE = docker compose

.PHONY: up down sqitch deploy revert destroy verify psql composer psy test

up:
	$(COMPOSE) up -d --build

down:
	$(COMPOSE) down

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

composer:
	$(COMPOSE) run --rm --no-deps -w /app -u $(shell id -u) app composer $(ARGS)

psy:
	$(COMPOSE) exec app vendor/bin/psysh

test:
	$(COMPOSE) exec --workdir=/app app vendor/bin/phpunit
