## How to run calculator

1. Run `docker-compose build --pull --no-cache`
2. Run `docker-compose up`
3. Run `composer install --ignore-platform-reqs`
4. Run `php bin/console doctrine:schema:update --force` from container
5. Open `https://localhost/calculator` in web browser
6. Run `php bin/phpunit` - for running tests
7. Run docker-compose down --remove-orphans to stop the Docker containers.
