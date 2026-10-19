# Event-driven architecture lab

Ambiente local para experimentar com arquitetura orientada a eventos. O runtime HTTP usa PHP 8.4, Symfony 7.4, Apache e Composer em containers. PostgreSQL 18, Sqitch e Apache Kafka 4.1.0 são serviços independentes.

## Requisitos

- Docker Engine e Docker Compose
- Rede externa `reverse-proxy` com Traefik conectado
- Entrada local para `eda.local` apontando para o Traefik

PHP, Composer e dependências da aplicação são executados nos containers; não é necessário instalá-los no host.

## Iniciar

```sh
cp .env.example .env
# Ajuste POSTGRES_PASSWORD em .env para corresponder ao ambiente existente.
make up
```

Abra `http://eda.local`. O esqueleto Symfony ainda não define rotas de aplicação, portanto uma resposta HTTP 404 confirma que o tráfego chega ao runtime.

Use Composer pelo container:

```sh
make composer ARGS='install'
make composer ARGS='about'
```

## Banco e migrations

O volume `postgres_data` e o plano Sqitch existente são preservados. `make deploy` aplica apenas changes pendentes; `make sqitch ARGS='verify'` verifica o estado versionado.

```sh
make deploy
make sqitch ARGS='verify'
make psql
```

O serviço `kafka` permanece disponível na rede interna em `kafka:9092`. O serviço `sqitch` usa as variáveis `POSTGRES_*` do `.env` para acessar o PostgreSQL.

`make down` para os containers sem remover volumes. Não use `docker compose down -v` se quiser preservar os dados.
