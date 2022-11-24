<?php declare(strict_types=1);

namespace LinkORB\Authzed\Tests\Integration;

use LinkORB\Authzed\SpiceDB;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

trait SpicedbClientAwareTrait
{
    public function getClient(): SpiceDB
    {
        return new SpiceDB(
            new Serializer([new ObjectNormalizer()], [new JsonEncoder()]),
            HttpClient::create(),
            getenv('SPICEDB_HOST'),
            getenv('SPICEDB_API_KEY')
        );
    }

    public function getSchema(): string
    {
        return 'definition blog/post {
       relation reader: blog/user
       relation writer: blog/user
       permission read = reader + writer
       permission write = writer
}

definition blog/user {}';
    }
}
