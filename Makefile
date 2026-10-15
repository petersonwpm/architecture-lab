export UID := $(shell id -u)
export GID := $(shell id -g)

.PHONY: up down reset sqitch deploy revert destroy psql

up:
	docker compose up -d --build

down:
	docker compose down

reset:
	docker compose down -v
	$(MAKE) up

sqitch:
	docker compose run --rm sqitch $(ARGS)

deploy:
	$(MAKE) sqitch ARGS='deploy'

revert:
	$(MAKE) sqitch ARGS='revert'

destroy:
	$(MAKE) sqitch ARGS='destroy'

psql:
	docker compose exec postgres psql -U orders -d orders

