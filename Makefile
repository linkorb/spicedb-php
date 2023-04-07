run-test:
	docker run --rm -d --name spicedb -p 8443:8443 -p 50051:50051 --rm authzed/spicedb serve --http-enabled --grpc-preshared-key "somerandomkeyhere"
	docker build -t spicedb/php -f ./php.Dockerfile .
	docker run --volume $(shell pwd):/app --link spicedb:spicedb spicedb/php /app/vendor/bin/phpunit -c /app/phpunit.xml --testsuite IntegrationWithoutCaveat
	docker restart spicedb
	docker run --volume $(shell pwd):/app --link spicedb:spicedb spicedb/php /app/vendor/bin/phpunit -c /app/phpunit.xml --testsuite IntegrationCaveat
	docker rm -f spicedb
