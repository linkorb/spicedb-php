<?php declare(strict_types=1);

require dirname(__FILE__).'/../vendor/autoload.php';

$client = new \Authzed\Api\V1\SchemaServiceClient('localhost:50051', [
    'credentials' => \Grpc\ChannelCredentials::createInsecure(),
    'update_metadata' => function ($metaData) {
        $metaData['Authorization'] = 'Bearer somerandomkeyhere';
        return $metaData;
    },
]);

$request = new \Authzed\Api\V1\WriteSchemaRequest();
$request->setSchema("definition blog/user {}

definition blog/post {
	relation reader: blog/user
	relation writer: blog/user

	permission read = reader + writer
	permission write = writer
}");

var_dump($client->WriteSchema($request));

//$client = new \Authzed\Api\V1\PermissionsServiceClient('localhost:9090', [
//    'credentials' => \Grpc\ChannelCredentials::createInsecure(),
//]);
//
//$request = new \Authzed\Api\V1\CheckPermissionRequest()
//
//$client->CheckPermission();
