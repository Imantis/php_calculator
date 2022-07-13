## How to run calculator

1. Run `docker-compose build --pull --no-cache`
2. Run `docker-compose up`
3. Run `composer install --ignore-platform-reqs`
4. Run `php bin/console doctrine:schema:update --force` from docker container
5. Open `https://localhost/calculator` in web browser

===============================================================

## How to run testings

6. Run `php bin/console --env=test doctrine:database:create` (from docker container)
7. Run `php bin/console --env=test doctrine:schema:create` (from docker container)
8. Run `php bin/phpunit` - for running tests (from docker container)
9. Run docker-compose down --remove-orphans to stop the Docker containers.
