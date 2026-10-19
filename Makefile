COMPOSE = docker compose

.PHONY: up down sqitch deploy revert destroy verify psql composer

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
	$(COMPOSE) run --rm --no-deps app composer $(ARGS)
