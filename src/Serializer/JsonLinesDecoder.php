<?php

namespace LinkORB\Authzed\Serializer;

use Symfony\Component\Serializer\Encoder\JsonDecode;

class JsonLinesDecoder extends JsonDecode
{
    public function decode(string $data, string $format, array $context = [])
    {
        $decodedData = [];

        foreach (explode("\n", $data) as $line) {
            if ($line === '') {
                continue;
            }

            $decodedData[] = parent::decode($line, 'json', $context);
        }

        return $decodedData;
    }

    public function supportsDecoding(string $format)
    {
        return 'jsonl' === $format;
    }
}
