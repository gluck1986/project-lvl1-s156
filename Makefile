install:
	composer install
test:
	composer run-script phpunit tests
run:
	bin/brain-games
lint:
	composer run-script phpcs -- --standard=PSR2 src bin