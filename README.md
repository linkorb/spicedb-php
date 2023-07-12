# Authzed PHP Client

[![Docs](https://img.shields.io/badge/docs-authzed.com-%234B4B6C "Authzed Documentation")](https://docs.authzed.com)

This repository houses the PHP client library for Authzed and SpiceDB.

[SpiceDB] is a database system for managing security-critical permissions checking.

SpiceDB acts as a centralized service that stores authorization data.
Once stored, data can be performantly queried to answer questions such as "Does this user have access to this resource?" and "What are all the resources this user has access to?".

[Authzed] operates the globally available, serverless database platform for SpiceDB.

Supported client API versions:
- [v1](https://buf.build/authzed/api/docs/main/authzed.api.v1)

You can find more info about the API in the [Authzed Documentation API Reference] or the [Authzed API Buf Registry repository].

[SpiceDB]: https://github.com/authzed/spicedb
[Authzed]: https://authzed.com
[Authzed Documentation API Reference]: https://docs.authzed.com/reference/api
[Authzed API Buf Registry repository]: https://buf.build/authzed/api

## Getting Started

We highly recommend following the **[Protecting Your First App]** guide to learn the latest best practice to integrate an application with Authzed.

[Protecting Your First App]: https://docs.authzed.com/guides/first-app

## Basic Usage

### Installation

Using composer tool run:
```shell
composer require linkorb/spicedb-php
```

### Initializing a client

SpiceDB connector depends on `symfony/serializer` and `symfony/http-client`. Instantiation of a new client with pure PHP can be done following way:
```php
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use LinkORB\Authzed\Serializer\JsonLinesDecoder;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\UnwrappingDenormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

new SpiceDB(
    new Serializer(
        [new ArrayDenormalizer(), new UnwrappingDenormalizer(), new ObjectNormalizer(null, null, null, new ReflectionExtractor())],
        [new JsonEncoder(), new JsonLinesDecoder()]
    ),
    HttpClient::create(),
    getenv('SPICEDB_HOST'),
    getenv('SPICEDB_API_KEY')
);
```
For Symfony apps there'll be a separate bundle which is currently WIP

### Performing an API call

SpiceDB connector implements communication through [REST API](https://app.swaggerhub.com/apis-docs/authzed/authzed/1.0#/). Check `LinkORB\Authzed\ConnectorInterface` for available methods. Here's example of write schema request:
```php
$client->writeSchema(new \LinkORB\Authzed\Dto\Request\Schema(
    'definition blog/post {
           relation reader: blog/user
           relation writer: blog/user
           permission read = reader + writer
           permission write = writer
    }
    
    definition blog/user {}'
));
```

### Tests
Tests can be run with following command:
```shell
make run-test
```
For that you need to have [Docker](https://www.docker.com/) installed. Alternatively you can run test with PHP installed on host:
```shell
phpunit -c ./phpunit.xml --testsuite 'Integration' ./tests/
```
