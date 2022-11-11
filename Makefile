run-test:
	docker run --rm -d --name spicedb -p 8443:8443 --rm authzed/spicedb serve --http-enabled --grpc-preshared-key "somerandomkeyhere"
	docker run --volume $PWD:/app --link spicedb:spicedb php:7.4 -c "/app/vendor/bin/phpunit --testsuite 'Integration' /app/tests/"
