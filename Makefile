install:
	composer install

setup:
	export PATH=$PATH:$PWD/vendor/bin
	export PATH=$PATH:$PWD/bin

brain-games:
	php ./bin/brain-games

validate:
	composer validate
