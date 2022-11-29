run-test:
	docker run --rm -d --name spicedb -p 8443:8443 --rm authzed/spicedb serve --http-enabled --grpc-preshared-key "somerandomkeyhere"
	docker run --volume $(shell pwd):/app --link spicedb:spicedb php:7.4 /app/vendor/bin/phpunit -c /app/phpunit.xml --testsuite 'Integration' /app/tests/
	docker rm -f spicedb
