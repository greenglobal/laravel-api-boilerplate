# [Laravel API Boilerplate](https://github.com/greenglobal/laravel-api-boilerplate)

## Maintained by: [KUN](https://github.com/kun391)

The api boilerplate build on Laravel 8, this using to start a project with api faster.

---

## Tutorial

### 1. Start web server with docker-compose (https)

> docker-compose up -d

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

## License

MIT
