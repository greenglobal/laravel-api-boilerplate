# [Laravel API Boilerplate](https://github.com/greenglobal/laravel-api-boilerplate)

[![Actions Status](https://github.com/greenglobal/laravel-api-boilerplate/workflows/Build/badge.svg)](https://github.com/greenglobal/laravel-api-boilerplate/actions)

The api boilerplate build on Laravel 8, this using to start a project with api faster.

---

## System requirements

1. PHP >=7.2

2. Nodejs >=10.22.1

3. Docker Engine >=19.03.13

4. Docker compose >=1.27.4

5. mkcert - Install mkcert & generate key following the [guide](https://github.com/FiloSottile/mkcert)

6. cz-cli - Support convention of message when commit to repo. Install following the [guide](https://github.com/commitizen/cz-cli)

---

## Tutorial

### 1. Start web server with docker-compose (https)

> docker-compose up -d

> docker-compose exec <container_app_name> cp .env.example .env

> docker-compose exec <container_app_name> composer install

> docker-compose exec <container_app_name> php artisan key:generate

> docker-compose exec <container_app_name> php artisan migrate --seed

### 2. Run test & linter

> docker-compose exec <container_app_name> vendor/bin/phpunit

> docker-compose exec <container_app_name> vendor/bin/phpcs

### 3. Run fixer for coding style

> docker-compose exec <container_app_name> vendor/bin/phpcbf

### 4. Run command line to update changelogs following [standard-version](https://github.com/conventional-changelog/standard-version)

> yarn release -- --prerelease

### 5. Commit an task

> git add </file>

> cz

> git push to branch

---

## Maintained by: [KUN](https://github.com/kun391)

---

## License

MIT
