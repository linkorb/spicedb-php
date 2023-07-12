<?php declare(strict_types=1);

namespace LinkORB\Authzed\Tests\Integration;

use LinkORB\Authzed\Serializer\JsonLinesDecoder;
use LinkORB\Authzed\SpiceDB;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Normalizer\UnwrappingDenormalizer;
use Symfony\Component\Serializer\Serializer;

trait SpicedbClientAwareTrait
{
    public function getClient(): SpiceDB
    {
        return new SpiceDB(
            new Serializer(
                [new ArrayDenormalizer(), new UnwrappingDenormalizer(), new ObjectNormalizer(null, null, null, new ReflectionExtractor())],
                [new JsonEncoder(), new JsonLinesDecoder()]
            ),
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
