<?php
// GENERATED CODE -- DO NOT EDIT!

namespace Authzed\Api\V1;

/**
 * SchemaService implements operations on a Permissions System's Schema.
 */
class SchemaServiceClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * Read returns the current Object Definitions for a Permissions System.
     *
     * Errors include:
     * - INVALID_ARGUMENT: a provided value has failed to semantically validate
     * - NOT_FOUND: no schema has been defined
     * @param \Authzed\Api\V1\ReadSchemaRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function ReadSchema(\Authzed\Api\V1\ReadSchemaRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/authzed.api.v1.SchemaService/ReadSchema',
        $argument,
        ['\Authzed\Api\V1\ReadSchemaResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Write overwrites the current Object Definitions for a Permissions System.
     * @param \Authzed\Api\V1\WriteSchemaRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function WriteSchema(\Authzed\Api\V1\WriteSchemaRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/authzed.api.v1.SchemaService/WriteSchema',
        $argument,
        ['\Authzed\Api\V1\WriteSchemaResponse', 'decode'],
        $metadata, $options);
    }

}
