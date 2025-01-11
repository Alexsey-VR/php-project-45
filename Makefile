install:
	composer install

setup:
	export PATH=$PATH:$PWD/vendor/bin
	export PATH=$PATH:$PWD/bin

brain-games:
	php ./bin/brain-games

validate:
	composer validate

lint:
	composer exec --verbose phpcs -- --standard=PSR12 src bin
